<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\College;
use App\Models\College_course_detail;
use App\Models\Country;
use App\Models\Course;
use App\Models\Course_exam_detail;
use App\Models\Exam;
use App\Models\InstitutionType;
use App\Models\State;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class CollegeController extends Controller
{
    public function collegelist()
    {
        $page_data['menu'] = 'college';
        return view('admin_panel.collegelist')->with($page_data);
    }

    public function get_collegelist()
    {
        // Eager load institutionType relationship to reduce queries
        $colleges = College::with('institutionType', 'country')->leftJoin('institution_type', 'colleges.institution_type_id', '=', 'institution_type.id')
            ->select('colleges.*', 'institution_type.name as institution_type_name')
            ->orderBy('colleges.id', 'desc');

        return datatables()->eloquent($colleges)
            ->addIndexColumn()
            ->editColumn('image', function ($d) {
                $imagePath = 'storage/app/public/' . $d->image;
                $defaultImage = asset('admin_assets/assets/img/no-image.png');
                $editIcon = '<i class="fe fe-edit" data-bs-toggle="tooltip" title="Edit"></i>';

                $url = $d->image ? asset($imagePath) : $defaultImage;
                return '<img src="' . $url . '" height="50" /><br>
                        <a href="javascript:void(0);" class="me-3 edit-college" data-toggle="modal" data-target="#editCollegeModal" data-college-id="' . $d->id . '">' . $editIcon . '</a>';
            })
            ->editColumn('brochure', function ($d) {
                $url = asset('storage/app/public/' . $d->brochure);
                $pdf_icon = asset('admin_assets/assets/img/icons/pdf.svg');
                $editIcon = '<i class="fe fe-edit" data-bs-toggle="tooltip" title="Edit"></i>';

                $details = '<a class="me-3" href="' . $url . '" target="_blank"><img src="' . $pdf_icon . '" alt="pdf-icon"></a>';
                $details .= '<a href="javascript:void(0);" class="me-3 edit-brochure" data-toggle="modal" data-target="#editBrochureModal" data-college-id="' . $d->id . '">' . $editIcon . '</a>';

                return $details;
            })
            ->editColumn('status', function ($d) {
                return $d->status == 1 ? '<span class="bg-lightgreen badges">Active</span>' : '<span class="bg-lightred badges">Inactive</span>';
            })
            ->editColumn('institution_type_id', function ($d) {
                return $d->institutionType ? $d->institutionType->name : 'N/A';
            })
            ->editColumn('country_id', function ($d) {
                return $d->country ? $d->country->name : 'N/A';
            })
            ->addColumn('action', function ($d) {
                $editUrl = asset('admin_assets/assets/img/icons/edit.svg');
                $deleteUrl = asset('admin_assets/assets/img/icons/delete.svg');

                $details = '<a class="me-3" href="' . route('admin_panel.colleges', base64_encode($d->id)) . '"><img src="' . $editUrl . '" alt="img"></a>';
                $details .= '<a href="javascript:void(0)" data-toggle="modal" data-target="#delete_modal" title="Delete" onclick="delete_confirm(\'/del-college/' . $d->id . '\')"><img src="' . $deleteUrl . '" alt="img"></a>';
                return $details;
            })
            ->rawColumns(['image', 'brochure', 'status', 'action'])
            ->make(true);
    }


    public function colleges(Request $req, $id = '')
{

    // info($id);
    if ($req->isMethod('post')) {
        // Validation rules

            $rules = [
                'id'=>'nullable',
                'name' => 'required|string|max:255',
                'institution_type_id' => 'required',
                'countryId' => 'required|exists:countries,id',
                'state_id' => 'required|exists:states,id',
                'city_id' => 'nullable|exists:cities,id',
                'intake_date' => 'required|date',
                'intake_date2' => 'nullable|date',
                'intake_date3' => 'nullable|date',
                'graduation_marks' => 'required|numeric|min:0|max:100',
                'content' => 'nullable|string',
                'admission' => 'nullable|string',
                'status' => 'required',
                'map_info' => 'required|string',
                'streetview_info' => 'required|string',
                // 'brochure' => 'required|file|mimes:pdf|max:25600',
                // 'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
                // 'banner_image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
                'course_id' => 'required',
            ];

            if (empty($req->post('id'))) {
                // Create case - files are required
                $rules['brochure'] = 'required|file|mimes:pdf|max:25600';
                $rules['image'] = 'required|image|mimes:jpeg,png,jpg,webp|max:5120';
                $rules['banner_image'] = 'required|image|mimes:jpeg,png,jpg|max:5120';
            } else {
                // Update case - files are optional
                $rules['brochure'] = 'nullable|file|mimes:pdf|max:25600';
                $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120';
                $rules['banner_image'] = 'nullable|image|mimes:jpeg,png,jpg|max:5120';
            }

            $req->validate($rules);




        DB::beginTransaction();
        try {

            // Determine if we are updating or creating
            $data = $req->post('id') ? College::findOrFail($req->post('id')) : new College();


            // Update fields
            $data->fill([
                'name' => $req->post('name'),
                'institution_type_id' => $req->post('institution_type_id'),
                'country_id' => $req->post('countryId'),
                'state_id' => $req->post('state_id'),
                'city_id' => $req->post('city_id'),
                'intake_date' => $req->post('intake_date'),
                'intake_date2' => $req->post('intake_date2'),
                'intake_date3' => $req->post('intake_date3'),
                'graduation_marks' => $req->post('graduation_marks'),
                'content' => $req->post('content'),
                'admission' => $req->post('admission'),
                'status' => $req->post('status'),
                'map_info' => $req->post('map_info'),
                'streetview_info' => $req->post('streetview_info'),
            ]);

            // Handle file uploads
            foreach (['brochure', 'image', 'banner_image'] as $fileType) {
                if ($req->hasFile($fileType)) {
                    $file = $req->file($fileType);
                    $filePath = 'college/' . uniqid() . '.' . $file->getClientOriginalExtension();
                    Storage::disk('public')->put($filePath, file_get_contents($file->getRealPath()));
                    $data->{$fileType} = $filePath;
                }
            }

            // Save college data
            $data->save();

            // Update course details

            $courseIds = $req->input('course_id', []);
            $courseAmounts = $req->input('course_amount', []);

            $courses = [];

            $courseIds_edit_array = [];
            $courseAmounts_edit = $req->input('course_amount_edit', []);
            $courseIds_edit = $req->input('course_id_edit', []);
            $selected_course_id = $req->input('selected_course_id', []);

            if($selected_course_id){

            foreach ($courseIds_edit as $index => $courseIde) {

                    $courseIds_edit_array[] = [
                        'course_id' => $courseIde,
                        'course_amount' => $courseAmounts_edit[$index],
                        'id' => $selected_course_id[$index],
                    ];

            }


            if($courseIds_edit_array){

                 foreach ($courseIds_edit_array as $valueData) {

                $collageCourse = College_course_detail::find($valueData['id']);

                if($collageCourse){
                    $collageCourse->course_id = $valueData['course_id'];
                    $collageCourse->course_amount = $valueData['course_amount'];
                    $collageCourse->save();
                }

                 }
            }

            }

            foreach ($courseIds as $index => $courseId) {

                    $courses[] = [
                        'course_id' => $courseId,
                        'course_amount' => $courseAmounts[$index],
                    ];

            }

               foreach ($courses as $value) {

                if($value['course_id']){
                College_course_detail::create([
                    'college_id' => $data->id,
                    'course_id' => $value['course_id'],
                    'course_amount' => $value['course_amount'] ?? null ,
                ]);
                }


            }




            DB::commit();
            // dd($courses);
            return redirect()->route('admin_panel.collegelist')->with('success', $req->post('id') ? 'College updated successfully' : 'College created successfully');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
        }
    }

    // Prepare data for view
    $page_data = [];
    if ($id) {
        $id = base64_decode($id);
        $college = College::find($id);
        $page_data['college_data'] = $college;
        $page_data['selected_course_ids'] = College_course_detail::where('college_id', $id)->select('id','course_id','course_amount')->get()->toArray();
        // dd($page_data['selected_course_ids']);
        $page_data['states'] = State::where('country_id', $college->country_id)->get();
        $page_data['cities'] = City::where('state_id', $college->state_id)->get();
    } else {
        $page_data['college_data'] = null;
        $page_data['selected_course_ids'] = [];
        $page_data['states'] = collect();
        $page_data['cities'] = collect();
    }

    $page_data['menu'] = 'collegelist';
    $page_data['exam'] = Exam::get();
    $page_data['courses'] = Course::with('exams')->get();
    $page_data['country'] = Country::get();
    $page_data['category'] = Category::get();
    $page_data['institution'] = InstitutionType::get();

    return view('admin_panel.add_college', $page_data);
}



    public function getState($countryId)
    {
        $states = State::where('country_id', $countryId)->pluck('name', 'id');
        return response()->json($states);
    }

    public function getCities($stateId)
    {
        $cities = City::where('state_id', $stateId)->pluck('name', 'id');
        return response()->json($cities);
    }

    public function delCollege(Request $request, $id)
    {
        try {
            $data = College::find($id);
            if ($data) {
                $data->collegeCourseDetails()->delete();
                if ($data->image && Storage::disk('public')->exists($data->image)) {
                    Storage::disk('public')->delete($data->image);
                }
                if ($data->brochure && Storage::disk('public')->exists($data->brochure)) {
                    Storage::disk('public')->delete($data->brochure);
                }
                $data->delete();
                return Redirect::back()->with('success', 'Deleted successfully!');
            } else {
                return Redirect::back()->with('error', 'Data Not Found');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
        }
    }

    public function editCollegeBrochure(Request $request)
    {
        $collegeId = $request->input('college_id');

        if ($request->hasFile('brochure')) {

            // Fetch the college record
            $college = College::find($collegeId);

            // Check if the college has an existing brochure and delete it
            if ($college && $college->brochure) {
                $existingBrochurePath = storage_path('app/public/' . $college->brochure);
                if (file_exists($existingBrochurePath)) {
                    unlink($existingBrochurePath); // Delete the old brochure
                }
            }

            // Store the new brochure
            $brochure = $request->file('brochure');
            $brochureName = 'brochure_' . $collegeId . '.' . $brochure->getClientOriginalExtension();
            $brochure->storeAs('public/college', $brochureName);

            // Update the college record with the new brochure path
            $college->brochure = 'college/' . $brochureName;
            $college->save();

            return redirect()->back()->with('success', 'College brochure updated successfully.');
        }

        return redirect()->back()->with('error', 'Failed to update college brochure.');
    }


    public function editCollegeImage(Request $request)
    {
        $collegeId = $request->input('college_id');
        // info($collegeId);

        if ($request->hasFile('image')) {

            // Fetch the college record
            $college = College::find($collegeId);

            // Check if the college has an existing image and delete it
            if ($college && $college->image) {
                $existingImagePath = storage_path('app/public/' . $college->image);
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath); // Delete the old image
                }
            }

            // Store the new image
            $image = $request->file('image');
            $imageName = 'college_' . $collegeId . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/college', $imageName);

            // Update the college record with the new image path
            $college->image = 'college/' . $imageName;
            $college->save();

            return redirect()->back()->with('success', 'College image updated successfully.');
        }

        return redirect()->back()->with('error', 'Failed to update college image.');
    }


    public function getSubcategories(Request $request)
    {
        $subcategories = Subcategory::whereJsonContains('category_id', $request->category_id)->get();
        return response()->json($subcategories);
    }

    public function showCollegesBySubcategory(Request $request, $categoryId, $subcategoryId)
    {
        $subcategory = Subcategory::findOrFail($subcategoryId);
        $selectedCountries = $request->input('countries', []);
        $selectedInstitute = $request->input('institutes', []);
        $selectedFees = $request->input('fees', []);

        // Start with the basic query
        $query = College::where('category_id', $categoryId)
            ->where('subcategory_id', $subcategoryId)
            ->with(['country', 'state', 'city', 'courses']);

        // Apply country and institution filters
        if (!empty($selectedCountries)) {
            $query->whereIn('country_id', $selectedCountries);
        }

        if (!empty($selectedInstitute)) {
            $query->whereIn('institution_type_id', $selectedInstitute);
        }

        // Handle fee range filters
        if (!empty($selectedFees)) {
            info($selectedFees); // Debugging selected fees

            $query->whereHas('courses', function ($query) use ($selectedFees) {
                foreach ($selectedFees as $feeRange) {
                    // Apply the correct fee conditions
                    if (strpos($feeRange, '<') === 0 && strpos($feeRange, '>') === false) {
                        // Example: "<100000"
                        $maxFee = str_replace('<', '', $feeRange);
                        $query->where('fee', '<', (int)$maxFee);
                    } elseif (strpos($feeRange, '>') === 0) {
                        // Example: ">500000"
                        $minFee = str_replace('>', '', $feeRange);
                        $query->where('fee', '>', (int)$minFee);
                    } elseif (strpos($feeRange, '<') > 0 && strpos($feeRange, '>') === false) {
                        // Example: "100000<200000"
                        list($minFee, $maxFee) = explode('<', $feeRange);
                        $query->whereBetween('fee', [(int)$minFee, (int)$maxFee]);
                    } elseif (strpos($feeRange, '00000') === 0) {
                        // Example: "00000<500000"
                        list($minFee, $maxFee) = explode('<', $feeRange);
                        $query->whereBetween('fee', [(int)$minFee, (int)$maxFee]);
                    }
                }
            });
        }



        // Fetch filtered colleges
        $colleges = $query->get();
        // info($colleges);

        // Fetch countries and institution types for filters
        $country = Country::get();
        $institution_type = InstitutionType::get();

        // Check if the request is an AJAX request
        if ($request->ajax()) {
            return view('website.partials.college_list_partial', compact('colleges'))->render();
        }

        return view('website.web_college_list', compact('subcategory', 'colleges', 'country', 'institution_type', 'categoryId', 'subcategoryId'));
    }



    private function parseFeeRange($feeRange)
    {
        switch ($feeRange) {
            case '< 1 Lakh':
                return [0, 100000];
            case '1 - 2 Lakh':
                return [100000, 200000];
            case '2 - 3 Lakh':
                return [200000, 300000];
            case '3 - 5 Lakh':
                return [300000, 500000];
            case '> 5 Lakh':
                return [500000, PHP_INT_MAX];
            default:
                return [0, PHP_INT_MAX];
        }
    }

    public function getInstitutetype(Request $request)
    {
        $college = College::find($request->college_id);

        if ($college) {
            $institutionTypes = $college->institutionTypes; // Ensure this relationship exists and is correct
            if ($institutionTypes->isEmpty()) {
                return response()->json(['message' => 'No institution types found for this college'], 404);
            }
            return response()->json($institutionTypes);
        }

        return response()->json(['message' => 'College not found'], 404);
    }


    //college details fetching to display in the front-end
    public function showCollege($id)
    {

        if($id){
        $id = base64_decode($id);
    }
        $collegeShow = College::with(['country', 'state', 'city', 'courses'])->findOrFail($id);

        return view('colleges.collegeView', compact('collegeShow'));
    }

    public function listingCollege(Request $request, $countryId)
    {

        if($countryId){
        $countryId = base64_decode($countryId);
    }
        $country = Country::find($countryId);
        $states = State::where('country_id', $countryId)->get();
        $collegesQuery = College::with(['country', 'city', 'courses', 'institutionType'])
            ->where('country_id', $countryId);

        // Apply filters based on request parameters
        if ($request->has('state') && !empty($request->input('state'))) {
            $stateNames = $request->input('state');
            $stateIds = State::whereIn('name', $stateNames)->pluck('id')->toArray();
            $collegesQuery->whereIn('state_id', $stateIds);
        }

        if ($request->has('fees')) {
            $fees = $request->input('fees');
            foreach ($fees as $fee) {
                switch ($fee) {
                    case 'Below 2 Lakh':
                        $collegesQuery->whereHas('courses', function ($query) {
                            $query->where('fee', '<', 200000);
                        });
                        break;
                    case '2 Lakh - 5 Lakhs':
                        $collegesQuery->whereHas('courses', function ($query) {
                            $query->whereBetween('fee', [200000, 500000]);
                        });
                        break;
                    case 'Above 5 Lakhs':
                        $collegesQuery->whereHas('courses', function ($query) {
                            $query->where('fee', '>', 500000);
                        });
                        break;
                }
            }
        }

        if ($request->has('institutionType')) {
            $institutionTypeIds = array_map(function ($type) {
                return InstitutionType::where('name', $type)->first()->id;
            }, $request->input('institutionType'));
            $collegesQuery->whereIn('institution_type_id', $institutionTypeIds);
        }

        $colleges = $collegesQuery->get();

        $countries = Country::all();
        $institutionTypes = InstitutionType::all();

        if ($request->ajax()) {
            return response()->json(['colleges' => $colleges]); // Return colleges as JSON
        } else {
            return view('colleges.colleges', compact('colleges', 'countries', 'institutionTypes', 'country', 'states', 'countryId'));
        }
    }


    public function downloadBrochure($id)
    {
        $college = College::findOrFail($id);

        if (Storage::disk('public')->exists($college->brochure)) {
            $filePath = storage_path("app/public/{$college->brochure}");
            $fileName = ($college->name ?? 'College') . '_Brochure.pdf';
            return response()->download($filePath, $fileName);
        }
        return redirect()->back()->with('error', 'Brochure not available for this college.');
    }

    public function delete_collagecourse(Request $request){

        $id = $request->get('id');
        if($id){
             $collageCourse = College_course_detail::find($id);
             if($collageCourse){
                $collageCourse->delete();
               return response()->json(['success' => True,'message' => 'Deleted Succefully']);
             }else{

               return response()->json(['success' => False,'message' => 'Error Occured']);

             }
        }
    }
}
