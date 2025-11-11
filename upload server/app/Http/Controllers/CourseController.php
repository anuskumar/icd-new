<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\College;
use App\Models\Course;
use App\Models\Course_exam_detail;
use App\Models\CourseType;
use App\Models\Exam;
use App\Models\InstitutionType;
use App\Models\Subcategory;
use App\Models\Qualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\CarbonInterval;

class CourseController extends Controller
{
    public function courselist()
    {
        $page_data['menu'] = 'course';
        return view('admin_panel.courselist')->with($page_data);
    }

    public function get_courselist()
    {

        $courses = Course::with('qualification', 'courseType')->orderBy('id', 'desc');

        return datatables()->eloquent($courses)
            ->addIndexColumn()
            ->editColumn('status', function ($course) {
                return $course->status == 1 ? '<span class="bg-lightgreen badges">Active</span>' : '<span class="bg-lightred badges">Inactive</span>';
            })
            ->editColumn('course_type_id', function ($d) {
                return $d->courseType ? $d->courseType->name : 'N/A';
            })
            ->addColumn('action', function ($course) {
                $editUrl = asset('admin_assets/assets/img/icons/edit.svg');
                $deleteUrl = asset('admin_assets/assets/img/icons/delete.svg');

                $details = '<a class="me-3" href="' . route('admin_panel.courses',base64_encode( $course->id)) . '"><img src="' . $editUrl . '" alt="img"></a>';
                $details .= '<a href="javascript:void(0)" data-toggle="modal" data-target="#delete_modal" title="Delete" onclick="delete_confirm(\'/del-course/' . $course->id . '\')"><img src="' . $deleteUrl . '" alt="img"></a>';
                return $details;
            })
            ->rawColumns(['status','course_type_id', 'action'])
            ->make(true);
    }


    public function courses(Request $req, $id = '')
    {
        if($id){
            $id = base64_decode($id);
        }
        if ($_POST) {
            DB::beginTransaction();
            try {
                if ($req->post('id') == '') {
                    $data = new Course();
                } else {
                    $data = Course::find($req->post('id'));
                }

                $data->name = $req->post('name');
                $data->course_type_id = $req->post('course_type_id');
                $data->description = $req->post('description');
                $data->duration = $req->post('duration');
                $data->fee = $req->post('fee');
                $data->qualification_id = $req->post('qualification_id');
                $data->content = $req->post('content');
                $data->admission = $req->post('admission');
                $data->status = $req->post('status');

                $data->save();

                $examIds = $req->post('exam_id', []);
                Course_exam_detail::where('course_id', $data->id)->delete();
                foreach ($examIds as $value) {
                    $courseExamDetail = new Course_exam_detail();
                    $courseExamDetail->course_id = $data->id;
                    $courseExamDetail->exam_id = $value;
                    $courseExamDetail->save();
                }
                DB::commit();

                if ($req->post('id')) {
                    return redirect()->route('admin_panel.courselist')->with('success', 'Course updated successfully');
                } else {
                    return redirect()->route('admin_panel.courselist')->with('success', 'Course created successfully');
                }
            } catch (\Exception $e) {
                DB::rollback();
                dd($e->getMessage());
                return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
            }
        }

        $page_data['course_data'] = $course_data = $id
            ? Course::with(['courseExamDetails', 'colleges' => function ($query) {
                $query->whereNull('college_course_details.deleted_at')
                    ->whereNull('colleges.deleted_at');
                //   ->with('institutionType');
            }])->find($id)
            : null;

        info($course_data);

        $page_data['examIds'] = $course_data ? $course_data->courseExamDetails->pluck('exam_id')->toArray() : [];
        $page_data['menu'] = 'courselist';
        $page_data['exam'] = Exam::get();
        $page_data['course'] = CourseType::get();
        $page_data['category'] = Category::get();
        $page_data['institution'] = InstitutionType::get();
        $page_data['qualifications'] = Qualification::get();

        return view('admin_panel.add_course')->with($page_data);
    }


    public function delCourse(Request $request, $id)
    {
        try {
            $data = Course::find($id);

            if ($data) {
                // Deleting related course exam details
                $data->courseExamDetails()->delete();
                // Deleting the course itself
                $data->delete();
                return Redirect::back()->with('success', 'Deleted successfully!');
            } else {
                return Redirect::back()->with('error', 'Data Not Found');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
        }
    }

    public function getExamsByCourse($courseId)
    {
        $course = Course::with('courseExamDetails.exam')->find($courseId);
        if (!$course) {
            return response()->json(['error' => 'Course not found'], 404);
        }

        $exams = $course->courseExamDetails->map(function ($courseExamDetail) {
            return $courseExamDetail->exam;
        });

        return response()->json($exams);
    }


    public function showCoursesBySubcategory($categoryId, $subcategoryId)
    {
        // Fetch the subcategory
        $subcategory = Subcategory::findOrFail($subcategoryId);

        // Fetch the courses associated with the category and subcategory
        $courses = Course::where('category_id', $categoryId)
            ->where('subcategory_id', $subcategoryId)
            ->get();

        // Pass the subcategory and courses to the view
        return view('website.web_course_list', compact('subcategory', 'courses'));
    }
}
