<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
}

.contact-container {
    position: relative;
    height: 100vh;
}

.image-section {
    height: 100%;
}

.image-section img {
    width: 100%;
    height: 110%;
    object-fit: cover;
}

.triangle-section {
    position: absolute;
    top: 66%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 70%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.title-container {
    margin-bottom: 60px;
    margin-left: -13cm;
    color: rgb(0, 0, 0);
}

.title-container h1 {
    font-size: 36px;
    margin-top: -2px;
}

.title-container p {
    font-size: 18px;
}

.form-container {
    background: white;
    padding: 30px;
    box-shadow: 11px 31px 61px 0px rgba(158, 158, 158, 1);
    border-radius: 30px;
    width: 100%;
}

.row {
    display: flex;
    gap: 1.5cm;
    margin-left: 6cm;
    margin-top: 0.6cm;
}

.input-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 15px;
    width: 29%;
}

.input-group input,
.input-group textarea {
    padding: 13px;
    border: 1px solid #999999;
    border-radius: 15px;
    width: 100%;
}

.input-groupe {
    display: flex;
    flex-direction: column;
    margin-bottom: 15px;
    width: 50%;
    margin-left: 6cm;
}

.input-groupe input,
.input-groupe textarea {
    padding: 13px;
    border: 1px solid #999999;
    border-radius: 15px;
    width: 100%;
}

textarea {
    height: 100px;
    resize: none;
}

button {
    width: 15%;
    padding: 10px;
    background-color: #3579c3;
    color: white;
    border: none;
    border-radius: 17px;
    cursor: pointer;
    margin-left: 10cm;
}

button:hover {
    background-color: #285a8e;
}

/* Find Us Here Section */
.find-us-section {
    text-align: center;
    background-color: #ffffff;
    padding: 50px 20px;
}

.find-us-title {
    font-size: 36px;
    margin-bottom: 30px;
    margin-right: 20cm;
}

.widgets {
    display: flex;
    justify-content: space-around;
    gap: 20px;
}

.widget {
    background-color: #e6f7ff;
    padding: 15px;
    border-radius: 10px;
    width: 40%;
    text-align: center;
}

.widget-icon {
    font-size: 30px;
    margin-bottom: 10px;
    color: #3579c3; /* Blue color for the icons */
}

.widget-title {
    font-size: 24px;
    margin-bottom: 5px;
}

.widget-text {
    font-size: 18px;
    color: #555;
}

/* Google Map Section */
.map-section {
    margin-top: 6px;
    text-align: center;
}

.map-container {
    width: 70%;
    height: 350px;
    margin-left: 5.5cm;
}
</style>
<body>
    <header>
        @include('header')
    </header>
    <div class="contact-container">
        <div class="image-section">
            <img src="images/cont2.jpg" alt="Contact Image">
        </div>
        <div class="triangle-section">
            <div class="title-container">
                <h1>Contact Us</h1>
                <p>Kindly reach us to get the fastest response and treatment</p>
            </div>
            <div class="form-container">
                <form action="{{ route('contactus.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="input-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="input-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="input-groupe">
                        <label for="message">Message:</label>
                        <input type="text" name="message" required>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <div class="find-us-section">
        <h2 class="find-us-title">Find Us Here</h2>
        <div class="widgets">
            <div class="widget">
                <div class="widget-icon"><i class="fas fa-phone-alt"></i></div>
                <div class="widget-title">Phone</div>
                <div class="widget-text">+123-456-7890</div>
            </div>
            <div class="widget">
                <div class="widget-icon"><i class="fas fa-envelope"></i></div>
                <div class="widget-title">Email</div>
                <div class="widget-text">example@example.com</div>
            </div>
            <div class="widget">
                <div class="widget-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div class="widget-title">Location</div>
                <div class="widget-text">123 Main St, City, Country</div>
            </div>
        </div>
    </div>

    <div class="map-section">
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3164.943899019086!2d-122.08424968469173!3d37.421999979825195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb5f9f1d64a87%3A0xf1f8f1d64a87f1f8!2sGoogleplex!5e0!3m2!1sen!2sus!4v1636427472103!5m2!1sen!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    <br><br><br>
</body>

<footer>
    @include('footer')
</footer>
</html>
