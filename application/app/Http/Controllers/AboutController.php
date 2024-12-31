<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // Retourner la vue "about-us"
        return view('about-us');
    }
}
