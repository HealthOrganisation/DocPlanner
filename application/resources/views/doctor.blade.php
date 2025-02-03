<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    height: 80%;
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
    margin-bottom: 6px;
    margin-left: -13cm;
    color: rgb(0, 0, 0);
}

.title-container h1 {
    font-size: 36px;
    margin-top: -300px;
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
                <h1>Introduce you to our experts</h1>
                <p>choose from our experts doctors and get the help you need</p>
            </div>
           
        </div>
    </div>

    

    
    <br><br><br>
</body>

<footer>
    @include('footer')
</footer>
</html>
