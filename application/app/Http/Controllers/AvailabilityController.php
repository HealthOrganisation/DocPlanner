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
            'id_doc' => 'required|exists:doctors,id_doctor',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'is_available' => 'required|boolean',
        ]);

        Availability::create($request->all());

        return redirect()->route('availabilities.index')->with('success', 'Availability created successfully.');
    }

    public function edit(Availability $availability)
    {
        $doctors = Doctor::pluck('nom', 'id_doctor');
        return view('availabilities.edit', compact('availability', 'doctors'));
    }

    public function update(Request $request, Availability $availability)
    {
        $request->validate([
            'id_doc' => 'required|exists:doctors,id_doctor',
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

        return redirect()->route('availabilities.index')->with('success', 'Availability deleted successfully.');
    }
}
