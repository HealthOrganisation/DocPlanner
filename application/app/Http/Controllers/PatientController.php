<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show patient's profile
    // Show patient's profile
    public function showProfile()
    {
        // Get the patient's information along with their appointments
        $patient = Patient::with('appointments')->where('id_user', Auth::id())->first();

        // Check if the patient exists
        if (!$patient) {
            return redirect()->route('home')->with('error', 'Patient profile not found.');
        }

        // Pass the patient's data and appointments to the view
        return view('PatientProfile', [
            'patient' => $patient,
            'appointments' => $patient->appointments
        ]);
    }


    // Edit patient's profile
    public function editProfile()
    {
        $patient = Patient::where('id_user', Auth::id())->first();

        if (!$patient) {
            return redirect()->route('home')->with('error', 'Patient profile not found.');
        }

        return view('PatientEdit', compact('patient'));
    }

    // Update patient's profile
    public function updateProfile(Request $request)
    {
        $patient = Patient::where('id_user', Auth::id())->first();

        if (!$patient) {
            return redirect()->route('home')->with('error', 'Patient profile not found.');
        }

        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'poids' => 'required|numeric',
            'taille' => 'required|numeric',
        ]);

        // Update the profile
        $patient->update($validatedData);

        return redirect()->route('patients.profile')->with('success', 'Profile updated successfully.');
    }

    // Patient's appointments (Just an example, you would have a related model for appointments)
    public function appointments()
    {
        $appointments = Auth::user()->appointments()->latest()->get(); // Assuming appointments have a user relation

        return view('patients.appointments', compact('appointments'));
    }
}


    // Patient's messages (If you have a messaging system, you can retrieve it here)

