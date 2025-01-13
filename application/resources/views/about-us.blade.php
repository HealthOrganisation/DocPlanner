<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos de nous</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
    <header>
    @include('header')
    </header>

    <style>
        body {
            font-family: 'Raleway', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: #ffffff; /* Light blue background */
            color: #333;
            line-height: 1.6;
        }

        .about-header {
            background: url('../images/mid.jpg') no-repeat center center/cover;
            text-align: center;
            color: rgb(0, 0, 0);
            padding: 80px 20px;
            /* border-bottom: 5px solid #3579c3; Gold color */
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .about-header h1 {
            font-size: 3.5rem;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .about-header .mission {
            font-size: 1.3rem;
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 50px 20px;
}

.card-container {
    display: flex;
    gap: 20px;
}

.card {
    background-color: white;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    cursor: pointer;
    width: 300px;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    background-color: #e3f2fd; /* Light blue hover effect */
}

.card i {
    font-size: 3rem;
    color: #3579c3;
    margin-bottom: 10px;
}

.card h2 {
    font-size: 1.5rem;
    margin-bottom: 10px;
}

.card .line {
    height: 3px;
    background-color: #3579c3;
    width: 50px;
    margin: 0 auto 10px;
}

.card p {
    font-size: 1rem;
    color: #555;
    line-height: 1.5;
}

    </style>
</head>
<body>
    <div class="about-header">
        <h1>
            About Us</h1>
        <p class="mission">we strive to make healthcare simple, accessible, and reliable.</p>
    </div>
    <main class="container">
      <div class="card-container">
          <div class="card">
              <i class="fas fa-book"></i>
              <h2>Our Mission</h2>
              <div class="line"></div>
              <p>We strive to provide the best services to our community by promoting education and continuous learning.</p>
          </div>
          <div class="card">
              <i class="fas fa-globe"></i>
              <h2>Our Vision</h2>
              <div class="line"></div>
              <p>To become a global leader in delivering accessible and high-quality healthcare solutions.</p>
          </div>
          <div class="card">
              <i class="fas fa-trophy"></i>
              <h2>Achievement</h2>
              <div class="line"></div>
              <p>Recognized as one of the top healthcare providers with numerous awards and accolades.</p>
          </div>
      </div>
  </main>
  
   
</body>
<footer>
    @include('footer')
</footer>
</html>