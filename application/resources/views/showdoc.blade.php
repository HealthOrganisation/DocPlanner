@extends('layouts.app')

@section('content')
<!-- Include Bootstrap & jQuery -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<header>
    @include('header')
</header>

<br><br>

<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="{{ asset('storage/' . $doctor->image) }}" alt="Doctor Image" class="profile-image">
                   
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>{{ $doctor->nom }}</h5>
                    <br>
                    <h6>available</h6>
                    <br>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Availability</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <div class="col-md-2">
                        <input type="button" class="profile-edit-btn" value="Book An Appointment" onclick="window.location.href='/appointment';"/>

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <!-- About Section -->
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        
                        <div class="row">
                            <div class="col-md-6"><label>Full Name</label></div>
                            <div class="col-md-6"><p>{{ $doctor->nom }}</p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><label>Specialty</label></div>
                            <div class="col-md-6"><p>{{ $doctor->specialite }}</p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><label>Phone Number</label></div>
                            <div class="col-md-6"><p>{{ $doctor->phone }}</p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><label>Location</label></div>
                            <div class="col-md-6"><p>{{ $doctor->location }}</p></div>
                        </div>
                    </div>

                    <!-- Availability Section -->
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        @if($doctor->availabilities->isNotEmpty())
                            @foreach($doctor->availabilities as $availability)
                                <div class="row">
                                    <div class="col-md-6"><label>Available Date</label></div>
                                    <div class="col-md-6"><p>{{ $availability->date }}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"><label>Start Time</label></div>
                                    <div class="col-md-6"><p>{{ $availability->start_time }}</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"><label>Finish Time</label></div>
                                    <div class="col-md-6"><p>{{ $availability->end_time }}</p></div>
                                </div>
                            @endforeach
                        @else
                            <p>No availabilities found.</p>
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
    </form>           
</div>

<footer>
    @include('footer')
</footer>
<style>
body{
    background: -webkit-linear-gradient(left, #ffffff, #ffffff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #356f39;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 130%;
    padding: 3%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
.profile-work .profile-edit-btn {
    background-color: #f4f4f4; /* Change button color */
    color: rgb(133, 133, 133); /* Text color */
    width: 100%; /* Adjust width */
    padding: 8px 200px; /* Adjust padding */
    border-radius: 30px; /* Rounded corners */
    font-size: 16px; /* Adjust text size */
    text-align: left; /* Align text */
    padding-left: 15px;
    margin-top: 10px; /* Adjust margin */
    transition: 0.3s; /* Smooth transition */
}

.profile-work .profile-edit-btn:hover {
    background-color: #004999; /* Darker shade on hover */
}

</style>
<script>
    $(document).ready(function(){
        $('#profile-tab').on('click', function(){
            $('html, body').animate({
                scrollTop: $("#profile").offset().top
            }, 500);
        });
    });
    </script>
@endsection