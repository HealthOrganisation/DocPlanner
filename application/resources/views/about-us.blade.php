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
            background: #e0f0ff; /* Light blue background */
            color: #333;
            line-height: 1.6;
        }

        .about-header {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('../images/GettyImages-2027653518.webp') no-repeat center center/cover;
            text-align: center;
            color: white;
            padding: 80px 20px;
            border-bottom: 5px solid #ffd700; /* Gold color */
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

        .about-container {
            padding: 40px 20px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            justify-items: center;
        }

        .team-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 100%;
            max-width: 340px;
            opacity: 0; /* Start hidden */
            transform: translateY(20px); /* Start off-screen for animation */
            animation: slideIn 0.5s forwards; /* Slide in animation */
        }

        @keyframes slideIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .team-card:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.3);
        }

        .team-card .icon {
            font-size: 3rem;
            color: #007bff; /* Blue color */
            margin-bottom: 15px;
            transition: color 0.3s ease;
        }

        .team-card:hover .icon {
            color: #ffd700; /* Change icon color on hover to gold */
        }

        .team-card h2 {
            font-size: 1.8rem;
            color: #3d1818;
            margin-bottom: 10px;
        }

        .team-card p {
            font-size: 1rem;
            color: #555;
        }

        @media (max-width: 768px) {
            .about-header h1 {
                font-size: 2.5rem;
            }

            .about-header .mission {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <div class="about-header">
        <h1>
            Innovative Medical Appointment Management</h1>
        <p class="mission">Our mission is to revolutionize appointment scheduling for patients by facilitating access to healthcare while ensuring a seamless, fast, and secure experience.</p>
    </div>
    <main class="about-container">
        <div class="team-card">
            <div class="icon"><i class="fas fa-calendar-alt"></i></div>
            <h2>Simplified Scheduling</h2>
            <p>Our intuitive platform allows patients to book an appointment in just a few clicks, reducing waiting time and administrative hassle.</p>
        </div>
        <div class="team-card">
            <div class="icon"><i class="fas fa-stethoscope"></i></div>
            <h2>Connecting with Doctors</h2>
            <p>We offer a wide selection of specialized doctors, ensuring that every patient finds the professional best suited to their needs.</p>
        </div>
        <div class="team-card">
            <div class="icon"><i class="fas fa-comments"></i></div>
            <h2>Dedicated Customer Support</h2>
            <p>A dedicated support team is available to answer all your questions regarding appointment booking.</p>
        </div>
        <div class="team-card">
            <div class="icon"><i class="fas fa-lock"></i></div>
            <h2>Data Security</h2>
            <p>We guarantee the protection of our patients' personal data through advanced security protocols that comply with privacy standards.</p>
        </div>
        <div class="team-card">
            <div class="icon"><i class="fas fa-clipboard-check"></i></div>
            <h2>Appointment Tracking</h2>
            <p>Receive automatic reminders and easily check your appointment history to never miss a consultation.</p>
        </div>
        <div class="team-card">
            <div class="icon"><i class="fas fa-user-md"></i></div>
            <h2>Verified Healthcare Professionals</h2>
            <p>All our doctors are carefully selected and verified to ensure the quality and reliability of the care provided.</p>
        </div>
    </main>
    <script>
        // Add animations to the header and cards
        document.addEventListener("DOMContentLoaded", () => {
            const header = document.querySelector(".about-header");
            const cards = document.querySelectorAll(".team-card");

            // Header animation
            header.style.opacity = 0;
            header.style.transform = "translateY(-20px)";
            setTimeout(() => {
                header.style.transition = "all 1s ease";
                header.style.opacity = 1;
                header.style.transform = "translateY(0)";
            }, 200);

            // Card animations on load
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.animationDelay = `${index * 100}ms`; // Add delay for staggered effect
                    card.style.animationDuration = "0.5s"; // Set animation duration
                    card.style.animationFillMode = "forwards"; // Keep the end state
                }, index * 300);
            });
        });
    </script>
</body>
</html>