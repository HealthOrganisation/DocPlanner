<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Profile</title>
  
  <link rel="stylesheet" href="styles.css"> <!-- Ajouter votre CSS ici -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>
<body>
  <div class="profile-container">
    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="profile-header">
        <img id="profileImage" src="\images\doc1.jpeg" alt="Profile Image" class="profile-image" />
        <h2 id="fullName">Dr. John Doe</h2>
        <p id="specialty">Cardiologist</p>
        <div class="actions">
          <button class="edit-btn">✏️</button>
          <button class="delete-btn">🗑️</button>
        </div>
      </div>
 <!-- ici le docteur peut modifier ses informations  -->



      <!-- Sidebar Navigation -->
      <nav>
        <ul>
          <li class="nav-item" id="navPersonalInfo">🧑‍💼 Personal Information</li>
          <li class="nav-item" id="navAvailability">📅 Availability</li>
          <li class="nav-item" id="navStatistics">📊 Statistics</li>
          <li class="nav-item" id="navReviews">💬 Patient Reviews</li>
          
          <li class="nav-item" id="navLogout">🔐 Log Out</li>
        </ul>
      </nav>
    </aside>

    <!-- Main Content -->
    <section class="profile-form">
      <h1><i><center>Doctor Profile</center></i></h1>
      <br>

      <!-- Personal Information Form -->
      <form id="personalInfoForm">
        <div class="form-group">
          <input id="firstName" type="text" placeholder="First Name" />
          <input id="lastName" type="text" placeholder="Last Name" />
        </div>
        <div class="form-group">
          <input id="email" type="email" placeholder="Email" />
          <span class="verified">Verified</span>
        </div>
        <div class="form-group">
          <input id="phone" type="text" placeholder="Phone Number" />
          <select id="specialtySelect">
            <option disabled value="">Specialty</option>
            <option>Cardiologist</option>
            <option>Neurologist</option>
            <option>Dermatologist</option>
            <option>Orthopedic</option>
          </select>
        </div>
        <div class="form-group">
          <input id="degrees" type="text" placeholder="Degrees/Certifications" />
          <input id="experience" type="text" placeholder="Years of Experience" />
        </div>
        <div>
          <label>Select Languages:</label>
          <div class="language-options">
            <label><input type="checkbox" value="Français" /> Français</label>
            <label><input type="checkbox" value="Espagnol" /> Espagnol</label>
            <label><input type="checkbox" value="Anglais" /> Anglais</label>
            <label><input type="checkbox" value="Arabe" /> Arabe</label>
            <label><input type="checkbox" value="Allemand" /> Allemand</label>
          </div>
        </div>
        <div class="form-group">
          <input id="address" type="text" placeholder="Address" />
        </div>
        <div class="form-actions">
          <button type="button" id="discardChanges">Discard Changes</button>
          <button type="submit">Save Changes</button>
        </div>
      </form>

      <!-- Availability Section -->
      <div id="availabilitySection">
        <div class="main-container">
          <!-- Header -->
          <div class="header"><h3>Doctor Availability Management</h3></div>
      
          <!-- Add Availability Button -->
          <button id="addAvailabilityBtn">+ Add Availability</button>
      
          <!-- Calendar -->
          <div class="calendar-container">
            <div class="calendar-header">
              <div class="arrow" id="prevMonth">&lt;</div>
              <div id="currentMonthYear"></div>
              <div class="arrow" id="nextMonth">&gt;</div>
            </div>
            <div class="days">
              <div>Sun</div>
              <div>Mon</div>
              <div>Tue</div>
              <div>Wed</div>
              <div>Thu</div>
              <div>Fri</div>
              <div>Sat</div>
            </div>
            <div class="calendar-grid" id="calendarGrid"></div>
          </div>
      
          <!-- Saved Availabilities -->
          <div id="availabilityList">
            <h3>Saved Availabilities</h3>
            <ul id="availabilities"></ul>
          </div>
      
          <!-- Availability Modal -->
          <div id="availabilityModal" class="modal-overlay" style="display: none;">
            <div class="modal">
              <h3>Add Availability</h3>
              <label for="date">Date:</label>
              <input type="date" id="availabilityDate" />
              <label for="startTime">Start Time:</label>
              <input type="time" id="availabilityStartTime" />
              <label for="endTime">End Time:</label>
              <input type="time" id="availabilityEndTime" />
              <div class="modal-buttons">
                <button class="btn cancel" id="cancelModal">Cancel</button>
                <button class="btn save" id="saveAvailability">Save</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Statistics Section -->
      <div id="statisticsSection" class="hidden">
        <h3>Statistics Overview</h3>
        <div class="stat-badges">
          <div class="stat-badge">
            <i class="fas fa-calendar-alt"></i>
            <p>Total Appointments</p>
            <span id="totalAppointments">50</span>
          </div>
          <div class="stat-badge">
            <i class="fas fa-user"></i>
            <p>Total Patients</p>
            <span id="totalPatients">20</span>
          </div>
          <div class="stat-badge">
            <i class="fas fa-times-circle"></i>
            <p>Cancelled Appointments</p>
            <span id="cancelledAppointments">7</span>
          </div>
          <div class="stat-badge">
            <i class="fas fa-star"></i>
            <p>Average Rating</p>
            <span id="averageRating">5 ⭐</span>
          </div>
        </div>
      </div>

      <!-- Patient Reviews Section -->
      <div id="reviewsSection" class="hidden">
        <h3>Patient Reviews</h3>
        <div class="review-container">
          <img id="reviewImage" src="pat2.png" alt="Review" class="review-image" />
          <div class="review-details">
            <h3 id="reviewName">John Doe</h3>
            <p id="reviewComment">Great doctor!</p>
            <div class="stars" id="reviewStars">
              ⭐⭐⭐⭐⭐
            </div>
          </div>
          <div class="review-navigation">
            <button id="prevReview">Previous</button>
            <button id="nextReview">Next</button>
          </div>
        </div>
      </div>

  
    </section>
  </div>
  <script > 
    document.addEventListener("DOMContentLoaded", () => {
  // Log Out
  const navLogout = document.getElementById("navLogout");
  navLogout.addEventListener("click", () => {
    const confirmation = confirm("Are you sure you want to log out?");
    if (confirmation) {
      alert("You have logged out successfully!");
      window.location.href = "/login"; // Changez '/login' par l'URL de votre page de connexion
    }
  });

  // Variables pour le calendrier
  const calendarGrid = document.getElementById("calendarGrid");
  const currentMonthYear = document.getElementById("currentMonthYear");
  const prevMonthBtn = document.getElementById("prevMonth");
  const nextMonthBtn = document.getElementById("nextMonth");
  const addAvailabilityBtn = document.getElementById("addAvailabilityBtn");
  const saveAvailabilityBtn = document.getElementById("saveAvailability");
  const cancelModalBtn = document.getElementById("cancelModal");
  const availabilitiesList = document.getElementById("availabilities");
  const availabilityModal = document.getElementById("availabilityModal");
  const availabilityDate = document.getElementById("availabilityDate");
  const availabilityStartTime = document.getElementById("availabilityStartTime");
  const availabilityEndTime = document.getElementById("availabilityEndTime");

  let currentDate = new Date();

  // Mise à jour du calendrier
  function updateCalendar() {
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();
    const firstDay = new Date(year, month, 1).getDay();
    const totalDays = new Date(year, month + 1, 0).getDate();

    currentMonthYear.textContent = currentDate.toLocaleString("default", {
      month: "long",
      year: "numeric",
    });

    calendarGrid.innerHTML = "";

    for (let i = 0; i < firstDay; i++) {
      calendarGrid.innerHTML += `<div class="calendar-cell empty"></div>`;
    }

    for (let day = 1; day <= totalDays; day++) {
      calendarGrid.innerHTML += `<div class="calendar-cell">${day}</div>`;
    }
  }

  // Navigation dans le calendrier
  prevMonthBtn.addEventListener("click", () => {
    currentDate.setMonth(currentDate.getMonth() - 1);
    updateCalendar();
  });

  nextMonthBtn.addEventListener("click", () => {
    currentDate.setMonth(currentDate.getMonth() + 1);
    updateCalendar();
  });

  // Gestion des disponibilités
  addAvailabilityBtn.addEventListener("click", () => {
    availabilityModal.style.display = "flex";
  });

  cancelModalBtn.addEventListener("click", () => {
    availabilityModal.style.display = "none";
  });

  saveAvailabilityBtn.addEventListener("click", () => {
    const date = availabilityDate.value;
    const startTime = availabilityStartTime.value;
    const endTime = availabilityEndTime.value;

    if (date && startTime && endTime) {
      const li = document.createElement("li");
      li.textContent = `${date} | ${startTime} - ${endTime}`;
      availabilitiesList.appendChild(li);

      availabilityModal.style.display = "none";
      availabilityDate.value = "";
      availabilityStartTime.value = "";
      availabilityEndTime.value = "";
    } else {
      alert("Please fill all fields!");
    }
  });

  updateCalendar();

  // Variables globales pour le profil
  const profile = {
    firstName: "",
    lastName: "",
    email: "",
    phone: "",
    specialty: "",
    degrees: "",
    experience: "",
    address: "",
  };

  let languages = [];
  let activeItem = "Personal Information";

  // Gestion des reviews
  let currentReview = 0;
  const reviews = [
    {
      name: "Nina Holloway",
      comment: "Leaf viewing is a great way to spend a fall vacation...",
      stars: 4,
      image: "/images/pat2.png",
    },
    {
      name: "Steve Fletcher",
      comment: "Big tour business and plenty of options for everyone.",
      stars: 4,
      image: "/images/pat3.jpg",
    },
    {
      name: "Oscar Rogers",
      comment: "Hot apple cider on a crisp afternoon is a dream!",
      stars: 3,
      image: "/images/pat3.jpg",
    },
    {
      name: "Asmae Rogers",
      comment: "Hot apple cider on a crisp afternoon is a dream!",
      stars: 3,
      image: "/images/pat2.png",
    },
  ];

  const updateReview = () => {
    const review = reviews[currentReview];
    document.getElementById("reviewImage").src = review.image;
    document.getElementById("reviewName").innerText = review.name;
    document.getElementById("reviewComment").innerText = review.comment;
    document.getElementById("reviewStars").innerHTML = "⭐".repeat(review.stars);
  };

  document.getElementById("prevReview").addEventListener("click", () => {
    if (currentReview > 0) {
      currentReview--;
      updateReview();
    }
  });

  document.getElementById("nextReview").addEventListener("click", () => {
    if (currentReview < reviews.length - 1) {
      currentReview++;
      updateReview();
    }
  });

  // Afficher et masquer les sections
  const showSection = (sectionId) => {
    const sections = [
      "personalInfoForm",
      "availabilitySection",
      "statisticsSection",
      "reviewsSection",
      "logoutSection",
    ];

    sections.forEach((id) => {
      const section = document.getElementById(id);
      if (section) {
        if (id === sectionId) {
          section.classList.remove("hidden");
        } else {
          section.classList.add("hidden");
        }
      }
    });
  };

  document.getElementById("navPersonalInfo").addEventListener("click", () =>
    showSection("personalInfoForm")
  );
  document.getElementById("navAvailability").addEventListener("click", () =>
    showSection("availabilitySection")
  );
  document.getElementById("navStatistics").addEventListener("click", () =>
    showSection("statisticsSection")
  );
  document.getElementById("navReviews").addEventListener("click", () =>
    showSection("reviewsSection")
  );

  // Initialisation
  showSection("personalInfoForm");
  updateReview();
});

</script>      


  <style>



    /* Amélioration des champs d'entrée */
input, select {
    border: 1px solid #ccc; /* Bordure fine */
    border-radius: 5px; /* Angles arrondis */
    padding: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Ombre subtile */
    transition: all 0.3s ease; /* Transition pour un effet fluide */
  }
  
  input:focus, select:focus {
    border-color: #007bff; /* Couleur bleue pour indiquer le focus */
    box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2); /* Ombre accentuée */
    outline: none; /* Supprimer l'effet par défaut */
  }
  
    .hidden {
        display: none;
      }
      
    /* General Styles */
    body {
       
        margin: 0;
        padding: 0;
           background-image: url(/images/3d.jpg);
          background-size: cover;
          background-repeat: no-repeat;
          height: 100vh;
      }
      
/* Calendar Container */
.calendar-container {
    background: #fff;
    padding: 10px;
    color: #222;
    border-radius: 8px;
  }
  
  .calendar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
    font-size: 1rem;
    font-weight: bold;
  }
  
  .days,
  .calendar-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    text-align: center;
  }
  
  .calendar-cell {
    background: #d8d8d8;
    border-radius: 50%;
    padding: 10px;
    margin: 2px;
    cursor: pointer;
    transition: background 0.3s, transform 0.2s;
  }
  
  .calendar-cell:hover {
    background: #00d1ff;
    transform: translateY(-2px);
  }
  
  /* Modal Overlay */
  .modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
  }
  
  .modal {
    background: #333;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.5);
    width: 300px;
    color: #fff;
  }
  
  .modal h3 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 1.5rem;
    color: #00d1ff;
  }
  
  .modal label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }
  
  .modal input {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #555;
    border-radius: 5px;
    background: #444;
    color: #fff;
  }
  
  .modal-buttons {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
  }
  
  /* Save Button */
.btn.save {
    background: #00d1ff;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 0 10px rgba(0, 209, 255, 0.5); /* Initial glow */
  }
  
  .btn.save:hover {
    background: #007bff;
    box-shadow: 0 0 20px rgba(0, 123, 255, 0.8), 0 0 30px rgba(0, 123, 255, 0.6); /* Increased glow */
    transform: scale(1.1); /* Slightly enlarge button */
  }
  
  /* Cancel Button */
  .btn.cancel {
    background: #f44336;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 0 10px rgba(244, 67, 54, 0.5); /* Initial glow */
  }
  
  .btn.cancel:hover {
    background: #d32f2f;
    box-shadow: 0 0 20px rgba(211, 47, 47, 0.8), 0 0 30px rgba(211, 47, 47, 0.6); /* Increased glow */
    transform: scale(1.1); /* Slightly enlarge button */
  }
  
  #addAvailabilityBtn {
    display: block;
    margin: 20px auto;
    padding: 10px 20px;
    font-size: 1em;
    background: linear-gradient(135deg, #00d1ff, #007bff);
    color: white;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 0 10px rgba(0, 209, 255, 0.5); /* Initial glow */
  }
  
  #addAvailabilityBtn:hover {
    background: linear-gradient(135deg, #007bff, #0056b3);
    box-shadow: 0 0 20px rgba(0, 123, 255, 0.8), 0 0 30px rgba(0, 123, 255, 0.6); /* Enhanced glow */
    transform: scale(1.1); /* Slightly enlarge button */
  }
  
  
  /* Profile Container */
  .profile-container {
    display: flex;
    max-width: 900px;
    margin: 6rem auto;
    background: #f4f4f4;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    overflow: hidden;
  }
  
  /* Sidebar */
  .sidebar {
    width: 23%;
    background: #f9f9f9;
    padding: 1rem;
    border-right: 1px solid #ddd;
  }
  
  .profile-header {
    text-align: center;
  }
  
  /* Amélioration de l'image du docteur */
.profile-image {
    width: 150px; /* Augmentez la taille */
    height: 150px; /* Correspond à la largeur */
    border-radius: 50%; /* Cercle parfait */
    border: 3px solid #ddd; /* Bordure fine autour de l'image */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Ombre subtile */
    object-fit: cover; /* Ajuste l'image sans déformation */
    margin-bottom: 15px; /* Espacement sous l'image */
    transition: transform 0.3s ease; /* Transition fluide pour hover */
  }
  
  .profile-image:hover {
    transform: scale(1.05); /* Agrandissement léger au survol */
  }
  
  
  .actions button {
    margin: 0rem;
    background: transparent;
    border: none;
    font-size: 0.9rem;
    cursor: pointer;
  }
  
  nav ul {
    list-style: none;
    padding: 0;
  }
  
  nav li {
    padding: 0.5rem;
    cursor: pointer;
    transition: background 0.3s ease;
  }
  
  nav li:hover,
  nav li.active {
    background: linear-gradient(135deg, #00d1ff, #007bff);
    color: #ffffffc4;
    border-radius: 5px;
  }
  
  /* Main Content */
  .profile-form {
    flex: 1;
    padding: 2rem;
    background: #eaeaea;
  }
  
  h1,
  h3 {
    margin-bottom: 1rem;
    color: #333;
  }
  
  .form-group {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
  }
  
  .form-group input,
  .form-group select {
    flex: 1;
    padding: 0.5rem;
    border: 1px solid #ddd;
    border-radius: 50px;
    outline: none;
    font-size: 0.9rem;
  }
  
  .verified {
    color: #6c6c6d;
    font-weight: bold;
    align-self: center;
  }
  
  .language-options label {
    display: block;
    margin-bottom: 0.5rem;
  }
  
  .form-actions {
    display: flex;
    gap: 1rem;
    justify-content: flex-start;
  }
  
  button {
    padding: 0.3rem 0.9rem;
    border: none;
    border-radius: 70px;
    cursor: pointer;
    font-weight: bold;
    color: #fff;
    font-size: 1rem;
    transition: background 0.3s ease, transform 0.2s ease;
  }
  
  button[type="submit"] {
    background: #6c6c6d;
  }
  
  button[type="button"] {
    background: #4f9eee;
  }
  
  button:hover {
    transform: translateY(-2px);
    opacity: 0.5;
  }
  .reviews-section {
    text-align: center;
    margin: 20px 0;
  }
  
  .review-container {
    max-width: 400px;
    margin: auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 10px;
    background-color: #f8f8f8;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  
  .review-image {
    display: block;
    margin: 0 auto;
    width: 50px; /* Ajustez selon vos besoins */
    height: 50px; /* Ajustez selon vos besoins */
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 15px;
  }
  
  .review-details h3 {
    margin: 10px 0;
    color: #007bff;
    font-size: 1rem;
    font-weight: bold;
    text-align: center;
  }
  
  .review-details p {
    color: #333;
    font-size: 1rem;
    margin: 10px 0;
    text-align: center;
  }
  
  .stars {
    color: #f5a623;
    font-size: 1rem;
    margin: 10px 0;
    text-align: center;
  }
  
  .review-navigation {
    margin-top: 15px;
    display: flex;
    justify-content: center;
    gap: 10px;
  }
  
  .review-navigation button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    transition: background-color 0.3s ease, transform 0.2s ease;
  }
  
  .review-navigation button:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
  }
  
  .review-navigation button:disabled {
    background-color: #cccccc;
    cursor: not-allowed;
  }
  
  .statistics-section {
    text-align: center;
    margin: 30px 0;
  }
  
  .stat-badges {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 20px;
  }
  
  .stat-badge {
    background: #f9f9f9;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    width: 150px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
  .stat-badge i {
    font-size: 2rem; /* Adjust size of the icon */
    color: #007bff; /* Icon color */
    margin-bottom: 10px;
    transition: color 0.3s ease, transform 0.3s ease;
  }
  
  .stat-badge:hover i {
    color: #0056b3; /* Darker color on hover */
    transform: scale(1.2); /* Slightly enlarge on hover */
  }
  
  
  .stat-badge p {
    margin: 10px 0;
    color: #333;
  }
  
  .stat-badge span {
    font-size: 1.5em;
    font-weight: bold;
    color: #007bff;
  }
  
 
  </style>
</body>
</html>
