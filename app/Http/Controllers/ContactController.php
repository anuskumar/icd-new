<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('website.contact');
    }

    public function submitContactForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'course_country_interest' => 'required',
            'enquiry' => 'nullable',
        ]);

        // Process the form data (e.g., send an email, save to database)

        return redirect()->back()->with('success', 'Thank you for your message. We will get back to you shortly.');
    }
}
