<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Contactus;
class ContactusController extends Controller
{
    public function show()
    {
        // Show the contact form
        return view('contactus');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);
        Contactus::create($validated);
        // Sanitize the validated input to prevent XSS attacks
        $sanitizedData = [
            'name' => htmlspecialchars($validated['name'], ENT_QUOTES, 'UTF-8'),
            'email' => htmlspecialchars($validated['email'], ENT_QUOTES, 'UTF-8'),
            'message' => htmlspecialchars($validated['message'], ENT_QUOTES, 'UTF-8')
        ];

        // Send an email to the admin (your email)
        Mail::to('newstvx2024@gmail.com')->send(new ContactFormMail($sanitizedData));

        // Redirect or return a response
        return redirect()->back()->with('success', 'Your message has been sent!');
    }
}
