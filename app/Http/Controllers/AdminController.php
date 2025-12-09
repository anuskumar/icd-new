<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;
use App\Models\Student;
use App\Models\Qualification;
use App\Models\StudentFile;
use App\Models\EnrollmentModel;
use App\Models\College;
use App\Models\Course;
use App\Models\Exam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        // Total Students
        $totalStudents = Student::count();
        
        // Total Enrollments
        $totalEnrollments = EnrollmentModel::count();
        $pendingEnrollments = EnrollmentModel::where(function($query) {
            $query->where('status', 'pending')
                  ->orWhereNull('status');
        })->count();
        $verifiedEnrollments = EnrollmentModel::where('status', 'verified')->count();
        $completedEnrollments = EnrollmentModel::where('status', 'completed')->count();
        $rejectedEnrollments = EnrollmentModel::where('status', 'rejected')->count();
        
        // Pending Document Approvals (enrollments with messages but not confirmed)
        $pendingDocumentApprovals = EnrollmentModel::whereNotNull('message')
            ->where(function($query) {
                $query->where('file_upload_status', '!=', 'confirmed')
                      ->orWhereNull('file_upload_status');
            })
            ->count();
        
        // Total Colleges and Courses
        $totalColleges = College::count();
        $totalCourses = Course::count();
        $totalExams = Exam::count();
        
        // Total Users (excluding admin and students)
        $totalUsers = User::whereNotIn('user_type', ['A', 'S'])->count();
        
        // Recent Enrollments (last 10)
        $recentEnrollments = EnrollmentModel::with('college', 'course', 'user', 'student')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
        
        // Recent Activity (recent enrollments and document uploads)
        $recentActivity = collect();
        
        try {
            // Get recent enrollments for activity log
            $recentEnrollmentsForActivity = EnrollmentModel::with('college', 'course', 'user')
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get()
                ->map(function($enrollment) {
                    return [
                        'type' => 'enrollment',
                        'message' => 'New enrollment: ' . ($enrollment->user->name ?? 'N/A') . ' enrolled in ' . ($enrollment->course->name ?? 'N/A'),
                        'date' => $enrollment->created_at,
                        'icon' => 'file-text'
                    ];
                });
            
            // Get recent document uploads
            $recentDocuments = StudentFile::with('student', 'qualification')
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get()
                ->map(function($file) {
                    return [
                        'type' => 'document',
                        'message' => 'Document uploaded: ' . ($file->student->first_name ?? '') . ' ' . ($file->student->last_name ?? '') . ' - ' . ($file->qualification->name ?? 'N/A'),
                        'date' => $file->created_at,
                        'icon' => 'upload'
                    ];
                });
            
            $recentActivity = $recentEnrollmentsForActivity->merge($recentDocuments)
                ->sortByDesc(function($item) {
                    return $item['date']->timestamp;
                })
                ->take(5)
                ->values();
        } catch (\Exception $e) {
            Log::error('Error loading recent activity: ' . $e->getMessage());
            $recentActivity = collect();
        }
        
        // Enrollment trends (last 6 months)
        $enrollmentTrends = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthName = $date->format('M Y');
            $count = EnrollmentModel::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
            $enrollmentTrends[] = [
                'month' => $monthName,
                'count' => $count
            ];
        }
        
        $page_data = [
            'totalStudents' => $totalStudents,
            'totalEnrollments' => $totalEnrollments,
            'pendingEnrollments' => $pendingEnrollments,
            'verifiedEnrollments' => $verifiedEnrollments,
            'completedEnrollments' => $completedEnrollments,
            'rejectedEnrollments' => $rejectedEnrollments,
            'pendingDocumentApprovals' => $pendingDocumentApprovals,
            'totalColleges' => $totalColleges,
            'totalCourses' => $totalCourses,
            'totalExams' => $totalExams,
            'totalUsers' => $totalUsers,
            'recentEnrollments' => $recentEnrollments,
            'recentActivity' => $recentActivity,
            'enrollmentTrends' => $enrollmentTrends,
        ];
        
        return view('admin_panel.dashboard', $page_data);
    }

    public function userlist()
    {
        $page_data['menu'] = 'users';
        return view('admin_panel.userlist')->with($page_data);
    }

    public function get_userlist()
    {
        $users = User::whereNotIn('user_type', ['A', 'S'])->orderBy('id', 'desc');

        return datatables()->eloquent($users)
            ->addIndexColumn()
            ->addColumn('name', function ($d) {
                return $d->name;
            })

            ->addColumn('action', function ($d) {
                $editUrl = asset('admin_assets/assets/img/icons/edit.svg');
                $deleteUrl = asset('admin_assets/assets/img/icons/delete.svg');

                $details = '<a class="me-3" href="' . route('admin_panel.users', $d->id) . '"><img src="' . $editUrl . '" alt="img"></a>';
                $details .= '<a href="javascript:void(0)" data-toggle="modal" data-target="#delete_modal" title="Delete" onclick="delete_confirm(\'/del-user/' . $d->id . '\')"><img src="' . $deleteUrl . '" alt="img"></a>';
                return $details;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function users(Request $req, $id = '')
    {
        // dd($req->all());
        if ($req->isMethod('post')) {
            DB::beginTransaction();
            try {
                // Determine if we're creating a new user or updating an existing one
                if ($req->post('id') == '') {
                    $data = new User();
                } else {
                    $data = User::find($req->post('id'));
                    if (!$data) {
                        return redirect()->back()->with('error', 'Data not found');
                    }
                }

                // Assign values from the request
                $data->name = $req->post('name');
                $data->user_type = $req->post('user_type');
                $data->phone_no = $req->post('phone_no');
                $data->email = $req->post('email');

                // Store the plain-text password in password2 field and the hashed password in password field

                $plainPassword = $req->post('password2');
                if ($plainPassword) {
                    $data->password = bcrypt($plainPassword); // Hashing the password
                    $data->password2 = $plainPassword;        // Storing plain-text password (not recommended for security)
                }
                // Save the data
                $data->save();

                DB::commit();
                // Redirect with success message
                if ($req->post('id')) {
                    return redirect()->route('admin_panel.userlist')->with('success', 'Data updated successfully');
                } else {
                    return redirect()->route('admin_panel.userlist')->with('success', 'Data created successfully');
                }
            } catch (\Exception $e) {
                DB::rollback();
                // Log the error message to troubleshoot
                Log::error('Error occurred: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
            }
        }

        // Handle GET request
        $page_data = [];
        if ($id) {
            $page_data['user_data'] = User::find($id);
            if (!$page_data['user_data']) {
                return redirect()->back()->with('error', 'Data not found');
            }
        }

        return view('admin_panel.add_user', $page_data);
    }




    public function delUser(Request $request, $id)
    {
        try {
            $user = User::find($id);

            if ($user) {
                $user->delete();
                return Redirect::back()->with('success', 'Deleted successfully!');
            } else {
                return Redirect::back()->with('error', 'Data Not Found');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
        }
    }

    public function documents(Request $request)
    {
        $students = Student::all();
        $certificates = collect();

        // Check if this is an AJAX request - check multiple conditions for better compatibility
        $acceptHeader = $request->header('Accept', '');
        $isAjax = $request->ajax() || 
                  $request->wantsJson() || 
                  $request->header('X-Requested-With') === 'XMLHttpRequest' ||
                  $request->header('Accept') === 'application/json' ||
                  strpos($acceptHeader, 'application/json') !== false;

        // If AJAX call with 'student_id', fetch certificates
        if ($isAjax && $request->has('student_id')) {
            $request->validate([
                'student_id' => 'required|exists:students,id',
            ]);
            $certificates = StudentFile::with('student', 'qualification')
                ->where('student_id', $request->student_id)
                ->get();
            return response()->json(['success' => true, 'certificates' => $certificates]);
        }

        // Handle non-AJAX requests (direct page load)
        $selectedStudent = $request->has('student_id') ? Student::find($request->student_id) : null;
        return view('admin_panel.student_documents', compact('students', 'certificates', 'selectedStudent'));
    }


    public function downloadCertificate($id)
    {
        $certificate = StudentFile::findOrFail($id);

        // Check if file exists
        if (Storage::disk('public')->exists($certificate->files)) {
            return response()->download(storage_path("app/public/{$certificate->files}"), $certificate->original_file_name);
        }

        return back()->with('error', 'File not found!');
    }
}
