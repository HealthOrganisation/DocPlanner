<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
    margin: 0;
    width: 100%;
    overflow-x: hidden; /* Prevent horizontal scrolling */
}

        .slider {
            height: 110vh;
        }
        .slider img {
            width: 100%;
            height: 40%;
            object-fit: cover;
        }
        .slide-content {
            position: absolute;
            top: 10%;
            left: 10%;
            color: rgb(0, 0, 0);
            z-index: 2;
            max-width: 400px;
        }
        .slide-content h1 {
            font-size: 2.5rem;
            margin-top: 3cm;
        }
        .slide-content p {
            font-size: 1.2rem;
            margin: 0 0 20px 0;
        }
        .slide-content button {
            padding: 10px 20px;
            margin-top: 0.5cm;
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
        /* Custom styles for black arrows with no background */
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-image: none;
            width: 2rem;
            height: 2rem;
        }
        .carousel-control-prev-icon::after,
        .carousel-control-next-icon::after {
            content: '';
            border: solid black;
            border-width: 0 4px 4px 0;
            display: inline-block;
            padding: 8px;
        }
        .carousel-control-prev-icon::after {
            transform: rotate(135deg);
            -webkit-transform: rotate(135deg);
        }
        .carousel-control-next-icon::after {
            transform: rotate(-45deg);
            -webkit-transform: rotate(-45deg);
        }
        /* Adjust left and right controls position */
        .carousel-control-prev {
            left: -2rem;
        }
        .carousel-control-next {
            right: -2rem;
        }
        /* Ensure no extra arrows or scrollbars */
        body {
            overflow-x: hidden;
        }
        .triangle-box {
            position: absolute;
            bottom: -12%;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            max-width: 600px;
            height: 140px;
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
        .info-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 50px 10%;
            background-color: #ffffff;
        }

        .info-left, .info-right {
            flex: 1;
            position: relative; /* Allow positioning of text on top of the image */
        }

        .info-left img {
            width: 100%; /* Adjust the width to your preference */
            height: auto;
            max-width: 100%; /* Ensures the image scales responsively */
        }

        .info-right img {
            margin-top: -2cm;
            width: 100%; /* Adjust the width of the image */
            height: 8cm;
            max-width: 100%;
            border-radius: 1em;
        }

        .info-left h2 {
            font-size: 2rem;
            color: #333;
            margin-top: 0;
            position: absolute; /* Position on top of the image */
            top: 10%;
            left: 10%;
            z-index: 2; /* Ensure the text stays on top */
        }

        .info-left .description {
            font-size: 1.2rem;
            color: #555;
            margin-top: 1cm;
            position: absolute; /* Position on top of the image */
            top: 20%;
            left: 10%;
            z-index: 2; /* Ensure the text stays on top */
        }

        .info-left button {
            margin-top: 2.5cm;
            padding: 15px 20px;
            background-color: transparent;
            color: #d4af37;
            border: 3px solid #d4af37;
            border-radius: 5px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            position: absolute; /* Position on top of the image */
            top: 35%;
            left: 10%;
            z-index: 2; /* Ensure the text stays on top */
        }

        .info-left button:hover {
            color: white;
            background-color: #d4af37;
        }
        .btn-primary:hover {
        background-color: #475d78; /* Darker shade of blue */
        border-color: #475d78;
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2); /* Stronger shadow on hover */
    }
    .doctors-section {
    background-color: #fdf6e3;
     /* Light yellow background */
     width: 95%;
     margin-left:1.5cm;
     border-radius: 20px;
    padding: 50px 10%;
}

.doctor-card {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
}

.doctor-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 10px;
}

.doctor-info h4 {
    font-size: 1.5rem;
    margin-top: 15px;
}

.doctor-info p {
    color: #555;
    margin-top: 5px;
}

.rating {
    margin-top: 10px;
}

.star {
    color: #ff9800; /* Golden color */
}

.social-links {
    margin-top: 15px;
}

.social-icon {
    font-size: 1.5rem;
    color: #3579c3;
    margin: 0 10px;
}

.social-icon:hover {
    color: #d4af37;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {

    width: 2rem;
    height: 2rem;
}

.carousel-control-prev-icon::after,
.carousel-control-next-icon::after {
    content: '';
    border: solid black;
    border-width: 0 4px 4px 0;
    display: inline-block;
    padding: 8px;
}

.carousel-control-prev-icon::after {
    transform: rotate(135deg);
}

.carousel-control-next-icon::after {
    transform: rotate(-45deg);
}

    </style>
</head>
<body>

<header>
    @include('header')
</header>

<div id="carouselExampleIndicators" class="carousel slide slider" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/doc.png') }}" class="d-block w-100" alt="Slide 1">
            <div class="slide-content">
                <h1>Join the Network of Leading Doctors</h1>
                <p>Create your profile, connect with patients, and become a part of a trusted healthcare community.</p>
                <a href="/login">
                    <button>Join now</button>
                  </a>
                  
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/pat.png') }}" class="d-block w-100" alt="Slide 2">
            <div class="slide-content">
                <h1>Effortless Appointments Expert Care</h1>
                <p>Book your doctor’s appointment in just a few clicks and explore profiles of top healthcare professionals near you.</p>
                <a href="/login">
                    <button>Book an Appointment</button>
                  </a>
                  
            </div>
        </div>
    </div>
    <!-- Left and right controls (arrows) -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

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

<div class="info-section">
    <div class="info-right">
        <img src="{{ asset('images/docs.png') }}" alt="Right Image">
    </div>
    <div class="info-left">
        <img src="{{ asset('images/1.png') }}" alt="Left Image">
        <h2>Our Commitment to Excellence</h2>
        <p class="description">Discover the benefits of joining our network and connecting with a community dedicated to superior healthcare.</p>
        <a href="/about-us">
            <button>Learn More</button>
          </a>
    </div>
</div>
<div class="latest-blogs-section" style="padding: 50px 10%; background-color: #ffffff;">
    <h2 style="text-align: center; font-size: 2rem; position: relative; padding-bottom: 10px;">Our Latest Blogs
        <span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80px; height: 4px; background-color: #d4af37;"></span>
    </h2>
    <div class="blogs-content" style="display: flex; justify-content: space-between;">
        <div class="big-blog" style="flex: 0 0 65%; padding-right: 90px;margin-top: 30px;">
            <div class="blog-card" style="background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                <img src="{{ asset('images/health.jpg') }}" alt="Big Blog" style="width: 90%; border-radius: 10px;">
                <h3 style="font-size: 1.8rem; margin-top: 20px;">Blog Title One</h3>
                <p style="font-size: 1.1rem; color: #555;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet accumsan arcu, et tempor lorem. Sed ut nunc at neque facilisis tincidunt.</p>
            </div>
        </div>
        <div class="small-blogs" style="flex: 0 0 40%; display: flex; flex-direction: column; gap: 25px; margin-top: 30px; margin-left:-44px;"> <!-- Add margin-top here -->
            <div class="blog-card" style="background-color: white; padding: 15px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); display: flex; align-items: center;">
                <img src="{{ asset('images/health.jpg') }}" alt="Small Blog" style="width: 120px; height: 100px; border-radius: 10px; object-fit: cover; margin-right: 15px;">
                <div>
                    <h4 style="font-size: 1.4rem; margin: 0;">Blog Title Two</h4>
                    <p style="font-size: 1rem; color: #555; margin-top: 5px;">A short description of the blog goes here to summarize the content.</p>
                </div>
            </div>
            <div class="blog-card" style="background-color: white; padding: 15px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); display: flex; align-items: center;">
                <img src="{{ asset('images/health.jpg') }}" alt="Small Blog" style="width: 120px; height: 100px; border-radius: 10px; object-fit: cover; margin-right: 15px;">
                <div>
                    <h4 style="font-size: 1.4rem; margin: 0;">Blog Title Three</h4>
                    <p style="font-size: 1rem; color: #555; margin-top: 5px;">This is another small blog with a brief description to entice the reader.</p>
                </div>
            </div>
            <div class="blog-card" style="background-color: white; padding: 15px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); display: flex; align-items: center;">
                <img src="{{ asset('images/health.jpg') }}" alt="Small Blog" style="width: 120px; height: 100px; border-radius: 10px; object-fit: cover; margin-right: 15px;">
                <div>
                    <h4 style="font-size: 1.4rem; margin: 0;">Blog Title Three</h4>
                    <p style="font-size: 1rem; color: #555; margin-top: 5px;">This is another small blog with a brief description to entice the reader.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center" style="margin-top: 1px;">
        <button class="btn btn-primary" style="background-color: #3579c3; border-color: #3579c3; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 70px; margin-right: 12cm; margin-top: -10px;" 
        onclick="window.location.href='/articles';">Read All Blogs</button>
    </div>
    
</div>
<div class="doctors-section" style="padding: 50px 10%; background-color: #fdf6e3;">
    <h2 style="text-align: center; font-size: 2rem; position: relative; padding-bottom: 10px;">Meet Our Professional Doctors
        <span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80px; height: 4px; background-color: #d4af37;border-radius: 1em;"></span>
    </h2>
    <div id="doctorCarousel" class="carousel slide" data-bs-ride="false"> <!-- Remove the auto-slide by setting data-bs-ride="false" -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <!-- Doctor 1 -->
                    <div class="col-md-4">
                        <div class="doctor-card">
                            <img src="{{ asset('images/prof.jpg') }}" class="d-block w-100" alt="Doctor 1">
                            <div class="doctor-info">
                                <h4>Dr. John Doe</h4>
                                <p>Speciality: Cardiologist</p>
                                <div class="rating">
                                    <span class="star">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                </div>
                                <div class="social-links">
                                    <a href="#" class="social-icon"><i class="fab fa-linkedin"></i></a>
                                    <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                                    <a href="mailto:doctor1@example.com" class="social-icon"><i class="fas fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Doctor 2 -->
                    <div class="col-md-4">
                        <div class="doctor-card">
                            <img src="{{ asset('images/prof.jpg') }}" class="d-block w-100" alt="Doctor 2">
                            <div class="doctor-info">
                                <h4>Dr. Jane Smith</h4>
                                <p>Speciality: Dermatologist</p>
                                <div class="rating">
                                    <span class="star">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                </div>
                                <div class="social-links">
                                    <a href="#" class="social-icon"><i class="fab fa-linkedin"></i></a>
                                    <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                                    <a href="mailto:doctor2@example.com" class="social-icon"><i class="fas fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Doctor 3 -->
                    <div class="col-md-4">
                        <div class="doctor-card">
                            <img src="{{ asset('images/prof.jpg') }}" class="d-block w-100" alt="Doctor 3">
                            <div class="doctor-info">
                                <h4>Dr. Emily Brown</h4>
                                <p>Speciality: Neurologist</p>
                                <div class="rating">
                                    <span class="star">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                </div>
                                <div class="social-links">
                                    <a href="#" class="social-icon"><i class="fab fa-linkedin"></i></a>
                                    <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                                    <a href="mailto:doctor3@example.com" class="social-icon"><i class="fas fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Next 3 Doctors -->
            <div class="carousel-item">
                <div class="row">
                    <div class="col-md-4">
                        <div class="doctor-card">
                            <img src="{{ asset('images/prof.jpg') }}" class="d-block w-100" alt="Doctor 4">
                            <div class="doctor-info">
                                <h4>Dr. Anna Green</h4>
                                <p>Speciality: Surgeon</p>
                                <div class="rating">
                                    <span class="star">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                </div>
                                <div class="social-links">
                                    <a href="#" class="social-icon"><i class="fab fa-linkedin"></i></a>
                                    <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                                    <a href="mailto:doctor4@example.com" class="social-icon"><i class="fas fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="doctor-card">
                            <img src="{{ asset('images/prof.jpg') }}" class="d-block w-100" alt="Doctor 5">
                            <div class="doctor-info">
                                <h4>Dr. Michael Taylor</h4>
                                <p>Speciality: Pediatrician</p>
                                <div class="rating">
                                    <span class="star">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                </div>
                                <div class="social-links">
                                    <a href="#" class="social-icon"><i class="fab fa-linkedin"></i></a>
                                    <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                                    <a href="mailto:doctor5@example.com" class="social-icon"><i class="fas fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="doctor-card">
                            <img src="{{ asset('images/prof.jpg') }}" class="d-block w-100" alt="Doctor 6">
                            <div class="doctor-info">
                                <h4>Dr. Lisa White</h4>
                                <p>Speciality: Ophthalmologist</p>
                                <div class="rating">
                                    <span class="star">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                    <span class="star">&#9733;</span>
                                </div>
                                <div class="social-links">
                                    <a href="#" class="social-icon"><i class="fab fa-linkedin"></i></a>
                                    <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                                    <a href="mailto:doctor6@example.com" class="social-icon"><i class="fas fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#doctorCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#doctorCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<br><br>
<footer>
    @include('footer')
</footer>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
