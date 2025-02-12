<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use App\Models\Availability;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $doctors = Doctor::paginate(15);
        return view('doctors.index', compact('doctors'));
    }

    public function show(Doctor $doctor)
    {
        $doctor->load('reviews', 'availabilities');
        return view('doctors.show', compact('doctor'));
    }

    // DoctorController.php
    public function update(Request $request, User $user, Doctor $doctor)
    {
        // Authorization check: Make sure the user is authorized to update this doctor profile
        if ($user->id !== $doctor->id_user) {
            abort(403);  // Forbid access if the user doesn't match
        }

        // Validate the input data
        $validatedData = $request->validate([
            'id_user' => ['required', Rule::exists('users', 'id')],
            'nom' => 'required|string|max:255',
            'specialite' => 'required|string',
            'location' => 'required|string',
            'phone' => 'required|string',
            'date_debut' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'availabilityStatus' => 'required|boolean',
        ]);

        // Handle image upload if it exists
        if ($request->hasFile('image')) {
            // If the doctor already has an image, delete it
            if ($doctor->image) {
                Storage::delete($doctor->image);
            }
            // Store the new image
            $validatedData['image'] = $request->file('image')->store('doctor_images', 'public');
        } else {
            // If no new image, keep the old one
            $validatedData['image'] = $doctor->image;
        }

        // Update the doctor record
        $doctor->update($validatedData);

        // Redirect to the doctor's profile with a success message
        return redirect()->route('doctors.show', $doctor)->with('success', 'Doctor updated successfully.');
    }





    public function create()
    {
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_user' => ['required', Rule::exists('users', 'id')],
            'nom' => 'required|string|max:255',
            'specialite' => 'required|string',
            'location' => 'required|string',
            'phone' => 'required|string',
            'date_debut' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'availabilityStatus' => 'required|boolean',
        ]);

        $doctor = Doctor::create($validatedData);

        if ($request->hasFile('image')) {
            $doctor->image = $request->file('image')->store('doctor_images', 'public');
            $doctor->save();
        }

        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully.');
    }

    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }



    public function destroy(Doctor $doctor)
    {
        $this->authorize('delete', $doctor);

        if ($doctor->image) {
            Storage::delete($doctor->image);
        }

        $doctor->delete();

        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }
}
