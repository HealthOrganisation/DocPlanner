<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Availability;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // Fetch treatments (specialities)
    public function getTreatments()
    {
        $treatments = Doctor::distinct()->pluck('specialite');
        return response()->json($treatments);
    }

    // Fetch doctors by treatment
    public function getDoctors(Request $request)
    {
        $treatment = $request->input('treatment');
        $doctors = Doctor::where('specialite', $treatment)->get(['id_doctor', 'nom', 'specialite']);
        return response()->json($doctors);
    }

    // Fetch available times for a doctor on a specific date
    public function getAvailableTimes(Request $request)
    {
        $doctorId = $request->input('doctor_id');
        $date = $request->input('date');

        $availabilities = Availability::where('id_doc', $doctorId)
            ->where('date', $date)
            ->where('is_available', true)
            ->get(['start_time', 'end_time']);

        return response()->json($availabilities);
    }

    // Book an appointment
    public function bookAppointment(Request $request)
    {
        $validated = $request->validate([
            'id_doctor' => 'required|exists:doctors,id_doctor',
            'id_dispo' => 'required|exists:availabilities,id_dispo',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
        ]);

        $appointment = Appointment::create([
            'id_doctor' => $validated['id_doctor'],
            'id_dispo' => $validated['id_dispo'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
        ]);

        // Mark availability as used
        $availability = Availability::find($validated['id_dispo']);
        $availability->update(['is_available' => false]);

        return response()->json(['message' => 'Appointment booked successfully!', 'appointment' => $appointment]);
    }




    //////////////////////////index

    public function index()
    {
        $appointments = Appointment::with('disponibilite')->get(); // Charge les rendez-vous avec leurs disponibilités
        return view('myappointment', compact('appointments'));
    }
    
    

    public function show($id_user, $id)
    {
        $appointment = Appointment::where('id_patient', $id_user)->where('id', $id)->first();

        if (!$appointment) {
            return response()->json(['message' => 'Rendez-vous non trouvé'], 404);
        }

        return response()->json($appointment);
    }
}
