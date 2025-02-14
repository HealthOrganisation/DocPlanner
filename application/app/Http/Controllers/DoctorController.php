<?php

namespace App\Http\Controllers;
use App\Models\Doctor; 

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function showProfile()
    {
        return view('Pages.DoctorProfile');
    }
    public function doctor()
    {
        $doctors = Doctor::all();
        return view('doctor', compact('doctors'));
    }
    public function show($id)
{
    // Fetch the doctor by ID
    $doctor = Doctor::where('id_doctor', $id)->firstOrFail();

    // Return the view with the doctor data
    return view('showdoc', compact('doctor'));
}

}
