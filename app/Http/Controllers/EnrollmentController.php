<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EnrollmentModel;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EnrollmentController extends Controller
{
    public function enroll(Request $request)
    {
        $request->validate([
            'college_id' => 'required|exists:colleges,id',
            'course_id' => 'required|exists:courses,id'
        ]);

        $existed = EnrollmentModel::where([
            'user_id' => Auth::id(),
            'college_id' => $request->college_id,
            'course_id' => $request->course_id
        ])->first();

        if ($existed) {
            return response()->json(['message' => 'You have already enrolled in this course.'], 400);
        }

        $user = Auth::user();
        EnrollmentModel::create([
            'user_id' => $user->id,
            'college_id' => $request->college_id,
            'course_id' => $request->course_id

        ]);

        return response()->json(['message' => 'Enrollment request sent successfully. We will contact you soon.'], 200);
    }

    // Method to show enrollment details
    public function enrollmentDetails()
    {
        $user = Auth::user();
        if ($user->user_type === 'A') {
            $enrollDetails = EnrollmentModel::with('college', 'course', 'user', 'student')->get();
        } else {
            $enrollDetails = EnrollmentModel::where('user_id', $user->id)->with('college', 'course', 'user', 'student')->get();
        }

        return view('enrollments.enrollment', ['enrollDetails' => $enrollDetails]);
    }

    public function studentEnrollmentDetails()
    {
        $user = Auth::user();
        $enrollDetails = EnrollmentModel::where('user_id', $user->id)->with('college', 'course')->get();

        info($enrollDetails);
        return view('enrollments.enrollment', ['enrollDetails' => $enrollDetails]);
    }

    public function sendRequest(Request $request)
    {
        $request->validate([
            'enrollment_id' => 'required|exists:enrollments,id',
            'message' => 'required|string|max:500',
        ]);

        $enrollment = EnrollmentModel::find($request->enrollment_id);
        $enrollment->message = $request->message;
        $enrollment->save();

        return response()->json(['message' => 'Request sent successfully!']);
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'enrollment_id' => 'required|exists:enrollments,id',
            'status' => 'required|string|in:pending,under_review,verified,completed,rejected',
        ]);

        $enrollment = EnrollmentModel::find($request->enrollment_id);
        $enrollment->status = $request->status;
        $enrollment->save();

        return response()->json(['message' => 'Status updated successfully!']);
    }

    public function confirmUpload(Request $request, $enrollmentId)
    {
        // Validate the incoming request data
        $request->validate([
            'file_upload_status' => 'required|in:confirmed', // Only allow "confirmed" status
        ]);

        // Retrieve the enrollment entry from the database
        $enrollment = EnrollmentModel::findOrFail($enrollmentId);

        // Ensure the student can only confirm upload if the admin has requested
        if (!$enrollment->message) {
            return response()->json(['message' => 'No request from the admin for file upload confirmation.'], 400);
        }

        // Update the file upload status to "confirmed"
        $enrollment->file_upload_status = $request->file_upload_status;
        $enrollment->save();

        // Return a successful response to update the UI
        return response()->json([
            'message' => 'File upload confirmed successfully!',
            'status' => 'confirmed'
        ]);
    }
}
