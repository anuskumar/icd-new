<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;
use App\Models\Student;
use App\Models\Qualification;
use App\Models\StudentFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;


class AdminController extends Controller
{
    public function dashboard()
    {
        
        return view('admin_panel.dashboard');
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

        // If AJAX call with 'student_id', fetch certificates
        if ($request->ajax() && $request->has('student_id')) {
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
