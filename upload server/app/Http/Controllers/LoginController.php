<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\RegisterRequest;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin_panel.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check user type and redirect accordingly
            if ($user->user_type === 'A') {
                return redirect()->route('admin_panel.dashboard');

            } elseif ($user->user_type === 'S') {
                return redirect()->route('student_panel.student_dashboard');

            }elseif ($user->user_type === 'staff') {
                return redirect()->route('admin_panel.dashboard');

            }
            elseif ($user->user_type === 'sub_agent') {
                return redirect()->route('admin_panel.dashboard');

            }

        }

        return back()->withErrors([
            'email' => __('auth.failed'),
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function showRegistrationForm()
    {
        return view('admin_panel.signup');
    }
    public function register(RegisterRequest $request)
    {
        DB::beginTransaction(); // Start the transaction

        try {
            // Validate the request data
            // $request->validate([
            //     'name' => 'required|string',
            //     'phone_no' => 'required|string',
            //     'email' => 'required|email|unique:users,email',
            //     'password' => 'required|string|min:8|confirmed', // 'confirmed' ensures password_confirmation matches
            // ]);

            // Create a new user instance
            $user = new User();
            $user->name = $request->name;
            $user->phone_no = $request->phone_no;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->password2 = $request->password_confirmation;
            $user->user_type = 'S'; // Assuming 'S' represents student

            // Attempt to save the user
            if ($user->save()) {
                // Create and save student data related to the user
                $student = new Student();
                $student->user_id = $user->id;
                $student->first_name = $request->post('name');
                $student->email = $request->post('email');
                $student->phone = $request->post('phone_no');
                $student->save();

                // Commit the transaction as everything was successful
                DB::commit();

                // Attempt to log in the user
                $credentials = $request->only('email', 'password');
                if (Auth::attempt($credentials)) {
                    return redirect()->route('home');
                }
            }

            // Rollback if the user or student data couldn't be saved
            DB::rollBack();
            // return redirect()->back()->with('error', 'Unable to register the user at this time.');

        } catch (\Exception $e) {
            // Rollback the transaction in case of an exception
            DB::rollBack();

            // Log the exception for debugging
            Log::error('Registration Error: ' . $e->getMessage());

            // Redirect back with an error message
            // return redirect()->back()->with('error', 'An error occurred during registration. Please try again.');
        }
    }
    public function test()
    {
        return view('admin_panel.test');
    }
}
