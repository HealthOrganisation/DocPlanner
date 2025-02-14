@extends('layouts.app')

@section('content')
<div class="doctor-profile">
    <div class="profile-header">
        <img src="{{ asset('storage/images/' . $doctor->image) }}" alt="Doctor Image" class="profile-image">
        <h2>{{ $doctor->nom }}</h2>
        <p><strong>Specialty:</strong> {{ $doctor->specialite }}</p>
        <p><strong>Location:</strong> {{ $doctor->location }}</p>
        <p><strong>Phone:</strong> {{ $doctor->phone }}</p>
        <p><strong>Availability:</strong> {{ $doctor->availabilityStatus }}</p>
    </div>
</div>
@endsection
