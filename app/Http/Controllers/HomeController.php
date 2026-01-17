<?php

namespace App\Http\Controllers;


use App\Models\Blog;
use App\Models\College;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Exam;

class HomeController extends Controller
{
    public function home()
    {
        $blogs = Blog::with('author')
            ->where('is_published', true)
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->get();

        return view('website.home', compact('blogs'));
    }

    public function collegeDetails()
    {
        // dd($id);
        $college = College::with(['country', 'state', 'city', 'courses'])->get();
        return view('website.web_college_details', compact('college'));
    }

    public function courseDetails($id)
    {
        // dd($id);
        $course = Course::findOrFail($id);
        // info($course);
        return view('website.web_course_details', compact('course'));
    }

    // public function show($id)
    // {
    //     $college = College::with(['country', 'state', 'city'])->findOrFail($id);
    //     return view('web_college_details', compact('college'));
    // }

    public function userDetails(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|max:255',
        ]);

        // Create a new User_detail record
        $userDetail = new User();
        $userDetail->name = $validatedData['name'];
        $userDetail->email = $validatedData['email'];
        $userDetail->address = $validatedData['address'];
        $userDetail->phone = $validatedData['phone'];
        $userDetail->password = bcrypt($validatedData['password']); // Storing the password as hashed
        $userDetail->save();

        // Return a response, you can customize this as needed
        return response()->json(['message' => 'Details submitted successfully!']);
    }

    public function examDetails($id)
    {
        // dd($id);
        $exam = Exam::findOrFail($id);
        return view('website.web_exam_details', compact('exam'));
    }

    public function collegeTest()
    {
        return view('colleges.colleges');
    }

    public function collegeOverView()
    {
        return view('colleges.collegeView');
    }
}
