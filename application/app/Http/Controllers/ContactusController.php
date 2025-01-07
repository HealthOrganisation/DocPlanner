<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        // Sanitize the validated input to prevent XSS attacks
        $sanitizedData = [
            'name' => htmlspecialchars($validated['name'], ENT_QUOTES, 'UTF-8'),
            'email' => htmlspecialchars($validated['email'], ENT_QUOTES, 'UTF-8'),
            'message' => htmlspecialchars($validated['message'], ENT_QUOTES, 'UTF-8')
        ];

        // Save the sanitized contact form data to the database
        Contactus::create($sanitizedData);

        // Send an email directly to the admin
        $emailContent = "Name: " . $sanitizedData['name'] . "\n";
        $emailContent .= "Email: " . $sanitizedData['email'] . "\n";
        $emailContent .= "Message: " . $sanitizedData['message'];

        // Send the email
        Mail::raw($emailContent, function ($message) use ($sanitizedData) {
            $message->to('newstvx2024@gmail.com')
                    ->subject('New Contact Us Message')
                    ->from($sanitizedData['email'], $sanitizedData['name']);
        });

        // Redirect or return a response with success message
        return redirect()->back()->with('success', 'Your message has been sent!');
    }
}