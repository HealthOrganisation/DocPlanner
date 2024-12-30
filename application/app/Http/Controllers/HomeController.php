<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // The index method that will handle the main page
    public function index()
    {
        $currentIndex = 0; 
        // Sample data for images
        $images = [
            [
                'src' => 'images/doc.png',
                'title' => 'Join the Network of Leading Doctors',
                'description' => 'Create your profile, connect with patients, and become a part of a trusted healthcare community.',
                'buttonText' => 'Join Now',
            ],
            [
                'src' => 'images/pat.png',
                'title' => 'Effortless Appointments Expert Care',
                'description' => 'Book your doctor’s appointment in just a few clicks and explore profiles of top healthcare professionals near you.',
                'buttonText' => 'Book an Appointment',
            ]
        ];

        // Sample data for blogs
        $blogs = [
            ['title' => '5 Tips for a Healthy Lifestyle', 'description' => 'Learn simple ways to maintain your health and wellness.'],
            ['title' => 'Understanding Mental Health', 'description' => 'Explore the importance of mental health and how to manage it.'],
            ['title' => 'Understanding Mental Health', 'description' => 'Explore the importance of mental health and how to manage it.'],
        ];

        // Sample data for doctors
        $doctors = [
            ['name' => 'Dr. Sarah Johnson', 'specialty' => 'Cardiologist', 'rating' => 4.8, 'img' => 'images/prof.jpg', 'linkedin' => 'https://linkedin.com/in/sarah-johnson', 'facebook' => 'https://facebook.com/sarahjohnson'],
            ['name' => 'Dr. Michael Brown', 'specialty' => 'Dermatologist', 'rating' => 4.7, 'img' => 'images/prof.jpg', 'linkedin' => 'https://linkedin.com/in/michael-brown', 'facebook' => 'https://facebook.com/michaelbrown'],
            ['name' => 'Dr. Emily Davis', 'specialty' => 'Pediatrician', 'rating' => 4.9, 'img' => 'images/prof.jpg', 'linkedin' => 'https://linkedin.com/in/emily-davis', 'facebook' => 'https://facebook.com/emilydavis'],
        ];

        // Pass the data to the view
        return view('HomePage', compact('currentIndex','images', 'blogs', 'doctors'));
    }
}
