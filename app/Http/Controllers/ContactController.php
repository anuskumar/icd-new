<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

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

        Mail::to(config('mail.from.address'))->send(new ContactFormMail($validatedData));

        return redirect()->back()->with('success', 'Thank you for your message. We will get back to you shortly.');
    }
}
