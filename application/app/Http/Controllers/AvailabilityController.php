<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvailabilityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $availabilities = Availability::with('doctor')->get();
        return view('availabilities.index', compact('availabilities'));
    }

    public function show(Availability $availability)
    {
        return view('availabilities.show', compact('availability'));
    }

    public function create()
    {
        $doctors = Doctor::pluck('nom', 'id_doctor');
        return view('availabilities.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'is_available' => 'required|boolean',
        ]);

        // Automatically associate with logged-in doctor
        $doctor = auth()->user()->doctor;

        Availability::create([
            'id_doctor' => $doctor->id_doctor,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'is_available' => $request->is_available
        ]);

        return redirect()->back()->with('success', 'Availability added successfully.');
    }


    public function edit(Availability $availability)
    {
        $doctors = Doctor::pluck('nom', 'id_doctor');
        return view('availabilities.edit', compact('availability', 'doctors'));
    }

    public function update(Request $request, Availability $availability)
    {
        $request->validate([
            'id_doctor' => 'required|exists:doctors,id_doctor',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'is_available' => 'required|boolean',
        ]);

        $availability->update($request->all());

        return redirect()->route('availabilities.show', $availability)->with('success', 'Availability updated successfully.');
    }

    public function destroy(Availability $availability)
    {
        $availability->delete();

        return redirect()->route('availabilities')->with('success', 'Availability deleted successfully.');
    }
}
