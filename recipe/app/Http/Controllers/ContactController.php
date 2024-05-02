<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendContactForm(Request $request)
    {
        // Validate the form data (add validation rules as needed)

        $formData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

        // Send the email
        Mail::to('sarghinimed@gmail.com')->send(new ContactFormMail($formData));

        // Redirect back or to a success page
        return redirect()->route('starter.contact')->with('success', 'Your message has been sent.');
    }
}
