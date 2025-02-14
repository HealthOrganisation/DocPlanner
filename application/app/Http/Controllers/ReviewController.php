<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Doctor;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Policies\ReviewPolicy;

class ReviewController extends Controller
{
    public function index(Doctor $doctor)
    {
        $reviews = $doctor->reviews()->with('patient')->paginate(10);
        return view('reviews.index', compact('reviews', 'doctor'));
    }

    public function create(Doctor $doctor)
    {
        return view('reviews.create', compact('doctor'));
    }

    public function store(Request $request, Doctor $doctor)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $patient = Auth::user()->patients()->first();

        if (!$patient) {
            return redirect()->back()->with('error', 'You are not a registered patient.');
        }

        $review = new Review();
        $review->id_doctor = $doctor->id_doctor;
        $review->id_patient = $patient->id_patient;
        $review->comment = $validatedData['comment'];
        $review->rating = $validatedData['rating'];
        $review->save();

        return redirect()->route('doctors.show', $doctor)->with('success', 'Review created successfully.');
    }

    public function show(Doctor $doctor, $id_dispo)
    {
        $review = $doctor->reviews()->where('id_dispo', $id_dispo)->firstOrFail();
        return view('reviews.show', compact('review', 'doctor'));
    }

    public function edit(Doctor $doctor, $id_dispo)
    {
        $review = $doctor->reviews()->where('id_dispo', $id_dispo)->firstOrFail();
        $this->authorize('update', $review);
        return view('reviews.edit', compact('review', 'doctor'));
    }

    public function update(Request $request, Doctor $doctor, $id_dispo)
    {
        $review = $doctor->reviews()->where('id_dispo', $id_dispo)->firstOrFail();
        $this->authorize('update', $review);

        $validatedData = $request->validate([
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review->update($validatedData);

        return redirect()->route('doctors.show', $doctor)->with('success', 'Review updated successfully.');
    }

    public function destroy(Doctor $doctor, $id_dispo)
    {
        $review = $doctor->reviews()->where('id_dispo', $id_dispo)->firstOrFail();
        $this->authorize('delete', $review);

        $review->delete();

        return redirect()->route('doctors.show', $doctor)->with('success', 'Review deleted successfully.');
    }
}
