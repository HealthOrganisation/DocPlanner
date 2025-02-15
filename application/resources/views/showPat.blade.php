@extends('layouts.app')

@section('content')
<!-- Inclure Bootstrap & jQuery -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<header>
    @include('header')
</header>
<br>
<br>
<br>
<br><br>
<br>


<div class="container emp-profile mt-5 mb-5">
    <div class="profile-head">
        <h6>Informations du Patient</h6>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">À propos</a>
            </li>
        </ul>
    </div>

    <br>
<br>


        <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
                <!-- Section À propos -->
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-6"><label>Nom Complet</label></div>
                        <div class="col-md-6"><p>{{ $patient->nom }}</p></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><label>Date de Naissance</label></div>
                        <div class="col-md-6"><p>{{ $patient->date_naissance }}</p></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><label>Poids</label></div>
                        <div class="col-md-6"><p>{{ $patient->poids }}</p></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><label>Taille</label></div>
                        <div class="col-md-6"><p>{{ $patient->taille }}</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<footer>
    @include('footer')
</footer>

<style>
body {
    background: #ffffff;
}

.profile-head h5 {
    color: #333;
}

.profile-head h6 {
    color: #356f39;
}

.profile-edit-btn {
    border: none;
    border-radius: 1.5rem;
    width: 100%;
    padding: 3%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}

.profile-work {
    padding: 14%;
    margin-top: -15%;
}

.profile-tab label {
    font-weight: 600;
}

.profile-tab p {
    font-weight: 600;
    color: #0062cc;
}

.profile-head h6 {
    color: #4caf50; /* Green color for visibility */
    font-size: 22px; /* Slightly larger font size for emphasis */
    font-weight: bold; /* Make the text bold */
    text-transform: uppercase; /* Uppercase to make it stand out */
    margin-bottom: 20px; /* Space below the heading */
    letter-spacing: 1px; /* Slight spacing between letters */
}

</style>

<script>
    $(document).ready(function(){
        $('#appointments-tab').on('click', function(){
            $('html, body').animate({
                scrollTop: $("#appointments").offset().top
            }, 500);
        });
    });
</script>
@endsection
