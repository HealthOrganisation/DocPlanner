@extends('layouts.app')
@include('header')

@section('content')
    <div class="home-page">
        <!-- Slider Section -->
        <div class="slider">
            <!-- Slides -->
            <div class="slides" style="transform: translateX({{ -$currentIndex * 100 }}%);">
                @foreach ($images as $index => $image)
                    <div class="slide" key="{{ $index }}">
                        <img src="{{ asset($image['src']) }}" alt="Slide {{ $index + 1 }}" />
                        <div class="slide-content">
                            <h1>{{ $image['title'] }}</h1>
                            <p>{{ $image['description'] }}</p>
                            <button onclick="joinNow()">{{ $image['buttonText'] }}</button>
                        </div>
                    </div>
                @endforeach
            </div>
            <head>
              <!-- Add this in your head tag -->
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
            </head>
            
            <!-- Triangle Box -->
            <div class="triangle-box">
                <div class="box-section">
                    <i class="fas fa-user"></i>
                    <p class="number">10,000+</p>
                    <p>Users</p>
                </div>
                <div class="box-section">
                    <i class="fas fa-user-md"></i>
                    <p class="number">500+</p>
                    <p>Doctors</p>
                </div>
                <div class="box-section">
                    <i class="fas fa-star"></i>
                    <p class="number">4</p>
                    <p>Years of Experience</p>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <button class="prev" onclick="prevSlide()">❮</button>
            <button class="next" onclick="nextSlide()">❯</button>
        </div>

        <!-- Info Section -->
        <div class="info-section">
            <div class="info-left">
                <img src="{{ asset('images/docs.png') }}" alt="Small image" />
            </div>
            <div class="info-right-container">
                <div class="info-right-background"></div>
                <div class="info-right">
                    <h2>About our website</h2>
                    <p class="description">
                        Book your doctor’s appointment in just a few clicks and explore profiles of top healthcare professionals near you.
                    </p>
                    <br>
                    <button>Learn More</button>
                </div>
            </div>
        </div>

        <!-- Latest Blogs Section -->
        <div class="latest-blogs-section">
            <h2>Our Latest Blogs</h2>
            <div class="yellow-line"></div>
            <div class="blogs-container">
                <div class="big-article">
                    <img src="{{ asset('images/health.jpg') }}" alt="The Future of Healthcare Technology" />
                    <div class="blog-info">
                        <h3>The Future of Healthcare Technology</h3>
                        <p>
                            Discover how technology is revolutionizing healthcare and improving patient outcomes.
                        </p>
                    </div>
                </div>

                <div class="small-articles">
                    @foreach ($blogs as $blog)
                        <div class="small-article">
                            <img src="{{ asset('images/health.jpg') }}" alt="{{ $blog['title'] }}" />
                            <div class="blog-info">
                                <h3>{{ $blog['title'] }}</h3>
                                <p>{{ $blog['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <button class="read-all-blogs">Read All Blogs</button>
        </div>

        <!-- Doctors Section -->
        <div class="doctors-section">
            <h2>Meet Our Professional Doctors</h2>
            <div class="yellow-line"></div>
            <div class="doctor-slider">
                @foreach ($doctors as $doctor)
                    <div class="doctor-card">
                        <img src="{{ asset($doctor['img']) }}" alt="Doctor's Image" class="doctor-image" />
                        <h3>{{ $doctor['name'] }}</h3>
                        <p>{{ $doctor['specialty'] }}</p>
                        <div class="rating">⭐ {{ $doctor['rating'] }}</div>
                        <div class="social-links">
                            <a href="{{ $doctor['linkedin'] }}" target="_blank">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="{{ $doctor['facebook'] }}" target="_blank">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let currentIndex = 0;
        const images = @json($images);

        function nextSlide() {
            currentIndex = (currentIndex + 1) % images.length;
            updateSlide();
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            updateSlide();
        }

        function updateSlide() {
            const slideContainer = document.querySelector('.slides');
            slideContainer.style.transform = `translateX(${ -currentIndex * 100 }%)`;
        }

        function joinNow() {
            alert('Joining now...');
        }
    </script>
@endsection

@section('styles')
    <style>
      
        /* Slider styling */
        .slider {
            margin-top: -1cm;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            flex-shrink: 0;
            width: 100%;
            height: 100%;
            position: relative;
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .slide-content {
            position: absolute;
            top: 20%;
            left: 10%;
            color: rgb(0, 0, 0);
            z-index: 2;
            max-width: 400px;
        }

        .slide-content h1 {
            font-size: 2.5rem;
            margin-top:3cm;
        }

        .slide-content p {
            font-size: 1.2rem;
            margin: 0 0 20px 0;
        }

        .slide-content button {
            padding: 10px 20px;
            margin-top:0.5cm;
            background-color: transparent;
            color: #d4af37;
            border: 3px solid #d4af37;
            border-radius: 5px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .slide-content button:hover {
            color: white;
            background-color: #d4af37;
        }

        /* Triangle Box styling */
        .triangle-box {
            position: absolute;
            bottom: 1%;
            left: 50%;
            transform: translateX(-50%);
            width: 70%;
            max-width: 600px;
            height: 120px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.25);
            display: flex;
            justify-content: space-around;
            align-items: center;
            z-index: 3;
        }

        .box-section {
            text-align: center;
            flex: 1;
        }

        .box-section i {
            font-size: 1.8rem;
            color: #3579c3;
            margin-bottom: 5px;
        }

        .box-section .number {
            font-size: 1.6rem;
            font-weight: bold;
            color: #3579c3;
        }

        .box-section p {
            margin: 0;
            font-size: 0.9rem;
            color: #3579c3;
        }

        button.prev,
        button.next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: transparent;
            color: black;
            border: none;
            font-size: 2rem;
            cursor: pointer;
            z-index: 2;
        }

        button.prev {
            left: 10px;
        }

        button.next {
            right: 10px;
        }

        .info-section {
            display: flex;
            align-items: center;
            margin: 60px auto;
            padding: 0 20px;
            max-width: 80%;
            height: 100%;
        }

        .info-left img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .info-right-container {
            position: relative;
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .info-right-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/1.png');
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
            z-index: 0;
        }

        .info-right {
            position: relative;
            z-index: 1;
            padding: 40px;
            color: #fff;
            border-radius: 10px;
        }

        .info-right h2 {
            font-size: 2rem;
            color: #333;
            margin-top: -100px;
        }

        .info-right .description {
            font-size: 1.2rem;
            color: #555;
            margin: 10px 0;
        }

        .info-right button {
            padding: 15px 20px;
            background-color: transparent;
            color: #d4af37;
            border: 3px solid #d4af37;
            border-radius: 5px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .info-right button:hover {
            color: white;
            background-color: #d4af37;
        }
    </style>
@endsection
