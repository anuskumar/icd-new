<?php

namespace App\Http\Controllers;

use App\Exports\SampleExport;
use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
use App\Models\Country;
use App\Models\State;
use App\Models\Student;
use App\Models\StudentAddress;
use App\Models\StudentEducation;
use App\Models\Qualification;
use App\Models\User;
use App\Models\StudentFile;
use App\Models\EnrollmentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function sdashboard()
    {
        $user = Auth::user();
        $student = $user->student;
        
        // Get enrollment statistics
        $totalEnrollments = EnrollmentModel::where('user_id', $user->id)->count();
        $pendingEnrollments = EnrollmentModel::where('user_id', $user->id)
            ->where(function($query) {
                $query->where('status', 'pending')
                      ->orWhereNull('status');
            })
            ->count();
        $underReviewEnrollments = EnrollmentModel::where('user_id', $user->id)
            ->where('status', 'under_review')
            ->count();
        $verifiedEnrollments = EnrollmentModel::where('user_id', $user->id)
            ->where('status', 'verified')
            ->count();
        $completedEnrollments = EnrollmentModel::where('user_id', $user->id)
            ->where('status', 'completed')
            ->count();
        $rejectedEnrollments = EnrollmentModel::where('user_id', $user->id)
            ->where('status', 'rejected')
            ->count();
        
        // Get recent enrollments (last 5)
        $recentEnrollments = EnrollmentModel::where('user_id', $user->id)
            ->with('college', 'course')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        // Get total certificates uploaded
        $totalCertificates = 0;
        if ($student) {
            $totalCertificates = StudentFile::where('student_id', $student->id)->count();
        }
        
        $page_data = [
            'student' => $student,
            'user' => $user,
            'totalEnrollments' => $totalEnrollments,
            'pendingEnrollments' => $pendingEnrollments,
            'underReviewEnrollments' => $underReviewEnrollments,
            'verifiedEnrollments' => $verifiedEnrollments,
            'completedEnrollments' => $completedEnrollments,
            'rejectedEnrollments' => $rejectedEnrollments,
            'recentEnrollments' => $recentEnrollments,
            'totalCertificates' => $totalCertificates,
        ];
        
        return view('student_panel.student_dashboard', $page_data);
    }

    public function studentlist()
    {
        $page_data['menu'] = 'student';
        return view('admin_panel.studentlist')->with($page_data);
    }

    public function get_studentlist()
    {
        // Get the authenticated user's ID
        $userId = Auth::id();
        $user = Auth::user();

        // Check if the user is an admin
        if ($user && $user->user_type === 'A') {
            // If the user is an admin, get all students with eager loading
            $students = Student::with('country')->orderBy('id', 'desc');
        } else {
            // Otherwise, get students belonging to the user with eager loading
            $students = Student::with('country')->where('user_id', $userId)->orderBy('id', 'desc');
        }

        return datatables()->eloquent($students)
            ->addIndexColumn()
            ->addColumn('full_name', function ($student) use ($user) {
                $fullName = $student->first_name . ' ' . $student->last_name;

                // If the user is an admin, append the admin's name and user type
                // if ($user && $user->user_type === 'A') {
                //     return $fullName . ' (' . $user->name . ', ' . $user->user_type . ')';
                // }

                return $fullName;
            })
            ->addColumn('country_id', function ($student) {
                return $student->country ? $student->country->name : 'N/A';
            })
            ->addColumn('action', function ($student) {
                $editUrl = asset('admin_assets/assets/img/icons/edit.svg');
                $deleteUrl = asset('admin_assets/assets/img/icons/delete.svg');

                $details = '<a class="me-3" href="' . route('admin_panel.students', $student->id) . '"><img src="' . $editUrl . '" alt="img"></a>';
                $details .= '<a href="javascript:void(0)" data-toggle="modal" data-target="#delete_modal" title="Delete" onclick="delete_confirm(\'/del-student/' . $student->id . '\')"><img src="' . $deleteUrl . '" alt="img"></a>';
                return $details;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function students(Request $req, $id = '')
    {
        if ($req->isMethod('post')) {
            DB::beginTransaction();
            try {
                $data = Student::find($req->post('id')) ?: new Student();

                if ($req->has('first_name')) {
                    $data->first_name = $req->post('first_name');
                    $data->last_name = $req->post('last_name');
                    $data->birth_date = $req->post('birth_date');
                    $data->country_id = $req->post('countryId');
                    $data->passport_number = $req->post('passport_number');
                    $data->passport_expiry = $req->post('passport_expiry');
                    $data->gender = $req->post('gender');
                    $data->email = $req->post('email');
                    $data->phone = $req->post('phone');

                    $fullName = $data->first_name . ' ' . $data->last_name;

                    if (!$data->user_id) {
                        $user = new User();
                        $user->name = $fullName;
                        $user->email = $req->post('email');
                        $user->password = bcrypt($req->post('password'));
                        $user->password2 = $req->post('password_confirmation');
                        $user->user_type = 'S';
                        $user->save();

                        $data->user_id = $user->id;
                    } else {
                        $user = User::find($data->user_id);
                        if ($req->has('password')) {
                            $user->password = bcrypt($req->post('password'));
                            $user->password2 = $req->post('password_confirmation');
                            $user->save();
                        }
                    }

                    $data->save();

                    Log::info('Saved Student Data: ', $data->toArray());
                }

                if ($data->id) {
                    if ($req->has('address')) {
                        $address = $data->student_address ?: new StudentAddress();
                        $address->student_id = $data->id;
                        $address->address = $req->post('address');
                        $address->city = $req->post('city');
                        $address->country = $req->post('country_add');
                        $address->state = $req->post('state_add');
                        $address->zipcode = $req->post('zipcode');
                        $address->save();

                        Log::info('Saved Address Data: ', $address->toArray());
                    }

                    if ($req->has('country_edu')) {
                        $education = $data->student_education ?: new StudentEducation();
                        $education->student_id = $data->id;
                        $education->country_of_education = $req->post('country_edu');
                        $education->highest_education = $req->post('highest_level_of_education');
                        $education->grading_scheme = $req->post('grading_scheme');
                        $education->grade_scale = $req->post('grade_scale');
                        $education->grade_average = $req->post('grade_average');
                        $education->save();

                        Log::info('Saved Education Data: ', $education->toArray());
                    }
                } else {
                    Log::error('Student ID is null. Unable to save address or education data.');
                    throw new \Exception('Student ID is null. Unable to save address or education data.');
                }

                DB::commit();

                return response()->json(['success' => true, 'student_id' => $data->id]);
            } catch (\Exception $e) {
                DB::rollback();
                Log::error('Error occurred: ' . $e->getMessage(), ['exception' => $e, 'request_data' => $req->all()]);
                return response()->json(['success' => false, 'message' => $e->getMessage()]);
            }
        }

        //Handle GET request

        $page_data = [];
        if ($id) {
            $page_data['student_data'] = Student::with('student_address', 'student_education', 'user')->find($id);
            if (!$page_data['student_data']) {
                return redirect()->back()->with('error', 'Student not found');
            }

            $studentAddress = $page_data['student_data']->student_address;
            if ($studentAddress) {
                $page_data['states'] = State::where('country_id', $studentAddress->country)->get();
            } else {
                $page_data['states'] = collect();
            }
        } else {
            $page_data['student_data'] = new Student();
            $page_data['states'] = collect();
        }

        $page_data['country'] = Country::get();
        $page_data['qualifications'] = Qualification::all();

        return view('admin_panel.add_student', $page_data);
    }




    //showing corresponding states according to country

    public function getStates($country_id)
    {
        $states = State::where('country_id', $country_id)->pluck('name', 'id');
        return response()->json($states);
    }


    protected function handleError($req, $message)
    {
        if ($req->ajax()) {
            return response()->json(['error' => $message], 404);
        }
        return redirect()->back()->with('error', $message);
    }

    protected function handleSuccess($req, $data)
    {
        $message = $req->post('id') ? 'Student data updated successfully' : 'Student data created successfully';
        if ($req->ajax()) {
            return response()->json(['success' => true, 'message' => $message]);
        }
        return $this->redirectAfterSuccess($req, $message);
    }

    protected function redirectAfterSuccess($req, $message)
    {
        if ($req->post('id')) {
            $route = auth()->user()->user_type == 'S' ? 'student_panel.student_dashboard' : 'admin_panel.studentlist';
            return redirect()->route($route)->with('success', $message);
        } else {
            return redirect()->route('admin_panel.studentlist')->with('success', 'Student data created successfully');
        }
    }

    protected function handleException($req, \Exception $e)
    {
        Log::error('Error occurred: ' . $e->getMessage(), ['exception' => $e, 'request_data' => $req->all()]);
        if ($req->ajax()) {
            return response()->json(['error' => 'Error occurred: ' . $e->getMessage()], 500);
        }
        return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
    }





    public function delStudent(Request $request, $id)
    {
        try {
            $student = Student::find($id);

            if ($student) {
                // Delete the associated files from storage
                foreach ($student->studentFiles as $file) {
                    Storage::disk('public')->delete('uploads/' . $file->files);
                }

                // Delete the student files records from the database
                $student->studentFiles()->delete();

                // Delete the student record from the database
                $student->delete();

                return Redirect::back()->with('success', 'Deleted successfully!');
            } else {
                return Redirect::back()->with('error', 'Data Not Found');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
        }
    }

    public function studentimport()
    {
        return view('admin_panel.student_import');
    }

    public function importExcelData(Request $request)
    {
        $request->validate([
            'import_file' => [
                'required',
                'file',
                'mimes:csv,xlsx'
            ]
        ]);

        Excel::import(new StudentsImport, $request->file('import_file'));
        return redirect()->back()->with('status', 'Imported Successfully');
    }

    public function downloadSampleFile()
    {
        return Excel::download(new SampleExport, 'Sample.csv');
    }

    public function importStudents(Request $request)
    {
        $request->validate([
            'import_file' => 'required|mimes:csv,txt'
        ]);

        $file = $request->file('import_file');
        $data = array_map('str_getcsv', file($file));
        array_shift($data);

        $genderMapping = [
            'male' => 0,
            'female' => 1,
        ];

        foreach ($data as $row) {
            $gender = isset($genderMapping[strtolower($row[2])]) ? $genderMapping[strtolower($row[2])] : null;

            $user = User::create([
                'name' => $row[0] . ' ' . $row[1],
                'email' => $row[4],
                'password' => bcrypt($row[5]),
                'password2' => $row[5],
                'user_type' => 'S',
            ]);

            Student::create([
                'first_name' => $row[0],
                'last_name' => $row[1],
                'gender' => $gender,
                'phone' => $row[3],
                'email' => $row[4],
                'user_id' => $user->id,
            ]);
        }

        return redirect()->back()->with('status', 'Imported Successfully');
    }



    public function certificates()
    {
        $qualifications = Qualification::all();

        // Ensure you fetch certificates using the correct student ID
        $student = auth()->user()->student; // Fetch the student record for the logged-in user

        if (!$student) {
            $certificates = collect(); // Empty collection if no student found
        } else {
            $certificates = StudentFile::with('qualification')->where('student_id', $student->id)->orderBy('created_at', 'desc')->get();
        }

        return view('student_panel.certificates', compact('qualifications', 'certificates'));
    }

    public function getQualificationFiles($qualificationId)
    {
        $student = auth()->user()->student;

        if (!$student) {
            return response()->json(['success' => false, 'message' => 'No student found.']);
        }

        $files = StudentFile::where('student_id', $student->id)
            ->where('qualification_id', $qualificationId)
            ->orderBy('created_at', 'desc')
            ->get();

        $filesData = $files->map(function($file) {
            $filePath = storage_path('app/public/' . $file->files);
            $fileSize = file_exists($filePath) ? round(filesize($filePath) / 1024, 2) : 0;
            
            return [
                'id' => $file->id,
                'original_file_name' => $file->original_file_name,
                'file_size' => $fileSize,
                'created_at' => $file->created_at->toISOString(),
            ];
        });

        return response()->json([
            'success' => true,
            'files' => $filesData,
        ]);
    }


    public function uploadCertificate(Request $request)
    {
        // Validate the incoming request - allow multiple files
        $request->validate([
            'qualification_id' => 'required|exists:qualifications,id',
            'files.*' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'files' => 'required|array|min:1',
        ]);

        // Ensure the authenticated user has a corresponding student
        $student = auth()->user()->student;

        if (!$student) {
            return response()->json(['success' => false, 'message' => 'No student found for the authenticated user.']);
        }

        // Handle multiple file uploads
        if ($request->hasFile('files')) {
            $uploadedFiles = [];
            $errors = [];

            foreach ($request->file('files') as $file) {
                try {
                    $originalFileName = $file->getClientOriginalName();
                    $filePath = $file->store('certificates', 'public');

                    // Create a new certificate record for each file
                    $certificate = StudentFile::create([
                        'student_id' => $student->id,
                        'user_id' => auth()->id(),
                        'qualification_id' => $request->qualification_id,
                        'files' => $filePath,
                        'original_file_name' => $originalFileName,
                    ]);

                    $uploadedFiles[] = $certificate->load('qualification');
                } catch (\Exception $e) {
                    $errors[] = $originalFileName . ': ' . $e->getMessage();
                }
            }

            if (count($uploadedFiles) > 0) {
                return response()->json([
                    'success' => true,
                    'message' => count($uploadedFiles) . ' file(s) uploaded successfully!',
                    'certificates' => $uploadedFiles,
                    'errors' => $errors,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to upload files.',
                    'errors' => $errors,
                ]);
            }
        }

        // Return an error if file upload failed
        return response()->json(['success' => false, 'message' => 'No files provided.']);
    }




    public function downloadCertificate($id)
    {
        $certificate = StudentFile::findOrFail($id);
        $filePath = storage_path('app/public/' . $certificate->files);

        // Use the original file name when downloading
        if (file_exists($filePath)) {
            return response()->download($filePath, $certificate->original_file_name);
        }

        return redirect()->back()->with('error', 'File not found.');
    }


    public function deleteCertificate($id)
    {
        $certificate = StudentFile::withTrashed()->findOrFail($id);

        try {

            if (!is_null($certificate->files)) {
                $filePath = $certificate->files;
                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                } else {
                    return response()->json(['success' => false, 'message' => 'File not found in storage'], 404);
                }
            }


            $certificate->forceDelete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting certificate'], 500);
        }
    }
}
