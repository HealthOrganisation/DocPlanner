<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function showProfile()
    {
        return view('Pages.DoctorProfile');
    }
}
