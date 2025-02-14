<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Profile</title>

  <link rel="stylesheet" href="styles.css"> <!-- Add your CSS file here -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
  <div class="profile-container">
    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="profile-header">
        <img id="profileImage" src="{{ asset('images/' . $doctor->image) }}" alt="Profile Image" class="profile-image" />
        <h2 id="fullName">{{ $doctor->nom }}</h2>
        <p id="specialty">{{ $doctor->specialite }}</p>
        <p id="location">{{ $doctor->location }}</p>
        <div class="actions">
          <button class="edit-btn" onclick="editPhoto()">✏️ Edit Photo</button>
          <button class="delete-btn" onclick="deletePhoto()">🗑️ Delete Photo</button>
        </div>
      </div>

      <!-- Sidebar Navigation -->
      <nav>
        <ul>
          <li class="nav-item" id="navPersonalInfo">🧑‍💼 Personal Information</li>
          <li class="nav-item" id="navCertifications">📜 Certifications & Degrees</li>
          <li class="nav-item" id="navAvailability">📅 Availability</li>
          <li class="nav-item" id="navStatistics">📊 Statistics</li>
          <li class="nav-item" id="navReviews">💬 Patient Reviews</li>
          <li class="nav-item" id="navLogout">🔐 Log Out</li>
        </ul>
      </nav>
    </aside>

    <!-- Main Content -->
    <section class="profile-form">
      <h1><i><center>Doctor Panel</center></i></h1>

      <!-- Personal Information Form -->
      <form id="personalInfoForm">
        <div class="form-group">
          <input id="firstName" type="text" value="{{ $doctor->nom }}" placeholder="First Name" />
          <input id="lastName" type="text" value="{{ $doctor->nom }}" placeholder="Last Name" />
        </div>
        <div class="form-group">
          <input id="email" type="email" value="{{ $doctor->email }}" placeholder="Email" />
          <span class="verified">Verified</span>
        </div>
        <div class="form-group">
          <input id="phone" type="text" value="{{ $doctor->phone }}" placeholder="Phone Number" />
          <select id="specialtySelect">
            <option disabled value="">Specialty</option>
            <option {{ $doctor->specialite == 'Cardiologist' ? 'selected' : '' }}>Cardiologist</option>
            <option {{ $doctor->specialite == 'Neurologist' ? 'selected' : '' }}>Neurologist</option>
            <option {{ $doctor->specialite == 'Dermatologist' ? 'selected' : '' }}>Dermatologist</option>
            <option {{ $doctor->specialite == 'Orthopedic' ? 'selected' : '' }}>Orthopedic</option>
          </select>
        </div>
        <div class="form-group">
          <input id="experience" type="text" value="{{ $doctor->experience }}" placeholder="Years of Experience" />
        </div>

        <div class="form-group">
          <input id="address" type="text" value="{{ $doctor->location }}" placeholder="Address" />
        </div>
        <div class="form-actions">
          <button type="button" id="discardChanges">Discard Changes</button>
          <button type="submit" id="saveChanges">Save Changes</button>
        </div>
      </form>

      <!-- Certifications Section -->
      <div id="certificationsSection" class="hidden">
        <h3>Certifications & Degrees</h3>
        <!-- Add your certification logic here -->
      </div>

      <!-- Availability Section -->
      <div id="availabilitySection">
        <h3>Availability</h3>
        <ul>
          @foreach ($availabilities as $availability)
            <li>{{ $availability->date }} - {{ $availability->start_time }} to {{ $availability->end_time }}
                @if ($availability->is_available) (Available) @else (Not Available) @endif
            </li>
          @endforeach
        </ul>
      </div>

      <!-- Statistics Section -->
      <div id="statisticsSection" class="hidden">
        <h3>Statistics</h3>
        <!-- Display any doctor statistics, like number of patients attended, etc. -->
      </div>

      <!-- Reviews Section -->
      <div id="reviewsSection">
        <h3>Patient Reviews</h3>
        @foreach ($reviews as $review)
          <div class="review">
            <p><strong>Patient {{ $review->id_patient }}:</strong></p>
            <p>{{ $review->comment }}</p>
            <p>Rating: {{ $review->rating }} / 5</p>
          </div>
        @endforeach
      </div>

    </section>
  </div>
  <script>
    // Your JS code for handling photo editing, certification, and availability sections
  </script>
</body>
</html>


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

}

/* Calendar Container */
.calendar-container {
  background: #fff;
  padding: 15px; /* Réduction du padding */
  color: #222;
  border-radius: 8px;
  width: 720px; /* Largeur du conteneur pour réduire la taille globale */
  margin: 0 auto; /* Centrer le calendrier */
}

/* Calendar Header */
.calendar-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 10px;
  font-size: 0.9rem; /* Taille de texte réduite */
  font-weight: bold;
}

/* Calendar Grid */
.days,
.calendar-grid {
  display: grid;
  grid-template-columns: repeat(7, 1fr); /* Toujours 7 colonnes */
  text-align: center;
  gap: 5px; /* Espacement réduit entre les cellules */
}

/* Calendar Cell */
.calendar-cell {
  background: #d8d8d8;
  border-radius: 50%;
  padding: 8px; /* Réduction de la taille des cellules */
  cursor: pointer;
  transition: background 0.3s, transform 0.2s;
  font-size: 0.8rem; /* Réduction de la taille du texte dans les cellules */
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
    height: 100vh;


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
  /*
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
    width: 50px; /* Ajustez selon vos besoins
    height: 50px; /* Ajustez selon vos besoins
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
  */
  .cards-wrapper {
  display: flex;
  align-items: center; /* Centre les flèches verticalement */
  justify-content: center; /* Centre les cartes et les flèches horizontalement */
  gap: 20px; /* Espace entre les flèches et les cartes */
  position: relative; /* Nécessaire pour positionner les flèches correctement */
}

.arrow {
  font-size: 2rem;
  color: #007bff;
  cursor: pointer;
  user-select: none;
  width: 40px;
  height: 40px;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
  background-color: #f9f9f9; /* Couleur de fond */
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
  z-index: 10; /* S'assure que les flèches sont toujours visibles */
}

.arrow:hover {
  background-color: #007bff; /* Change de couleur au survol */
  color: #fff;
  transform: scale(1.2); /* Effet d'agrandissement au survol */
}

.cards-container {
  display: flex;
  gap: 20px; /* Espace entre les cartes */
  }

.card {
  background-color: white;
  border-radius: 15px;
  text-align: center;
  padding: 5px;
  width: 200px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s, background-color 0.3s;
}

.card.highlighted {
  background-color: #007bff;
  color: white;
  transform: scale(1.1);
}

.card.highlighted .stars {
  color: #ffd700;
}

.profile-pic {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  margin-bottom: 10px;
  border: 3px solid white;
}

.stars {
  color: #007bff;
  font-size: 1.2rem;
  margin-bottom: 10px;
}

.name {
  font-size: 1.2rem;
  font-weight: bold;
  margin-bottom: 5px;
}

.role {
  color: #666;
  margin-bottom: 15px;
}

.quote {
  font-size: 0.9rem;
  color: #666;
  margin: 0;
}

.card.highlighted .quote {
  color: white;
}

.quote-icon {
  color: #007bff;
  font-size: 1.5rem;
  margin: 0 5px;
}

.card:hover {
  transform: translateY(-5px);
}

  .statistics-section {
    text-align: center;
    margin: 30px 0;
  }

  .stat-badges {
  display: grid;
  grid-template-columns: repeat(2, 1fr); /* Deux badges par ligne */
  gap: 10px; /* Espace entre les badges */
  justify-items: center; /* Centrer horizontalement chaque badge */
}

  .stat-badge {
    background: #f9f9f9;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    width: 200px;
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

  #certificationsSection {
  padding: 0.3rem;
  background: linear-gradient(135deg,rgb(255, 255, 255), #ffffff); /* Dégradé doux */
  border-radius: 15px;
  box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); /* Ombre moderne */
}

#certificationsSection h3 {
  text-align: center;
  color: #007bff;
  font-size: 1.8rem;
  font-weight: bold;
  margin-bottom: 1rem;
  text-shadow: 0 2px 4px rgba(0, 123, 255, 0.3); /* Texte lumineux */
}

#certificationsForm {
  display: grid;
  gap: 1rem;
}

#certificationsForm .form-group {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
}

#certificationsForm input,
#certificationsForm button {
  width: 300px;
  padding: 0.8rem;
  margin: 0 auto;
  border: none;
  border-radius: 7px;
  font-size: 1rem;
  outline: none;
  transition: all 0.3s ease;
}

#certificationsForm input {
  background: #f9f9f9;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

#certificationsForm input:focus {
  background: #ffffff;
  box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
  border: 1px solid #007bff;
}

#certificationsForm button {
  background: linear-gradient(135deg, #007bff, #00bfff);
  color: white;
  cursor: pointer;
  font-weight: bold;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
  box-shadow: 0 4px 6px rgba(0, 123, 255, 0.2);
}

#certificationsForm button:hover {
  background: linear-gradient(135deg, #0056b3, #007bff);
  box-shadow: 0 6px 12px rgba(0, 123, 255, 0.4);
  transform: translateY(-2px);
}

#certificationsList {
  list-style: none;
  margin-top: 2rem;
  padding: 0;
  display: grid;
  gap: 1rem;
}

#certificationsList li {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: linear-gradient(135deg, #ffffff, #f0f8ff);
  padding: 1rem;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

#certificationsList li img {
  width: 50px;
  height: 50px;
  border-radius: 5px;
  border: 2px solidrgb(192, 199, 206);
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

#certificationsList li button {
  background: #ff6b6b;
  border: none;
  padding: 0.5rem 1rem;
  border-radius: 5px;
  color: white;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
}

#certificationsList li button:hover {
  background: #d32f2f;
  box-shadow: 0 4px 6px rgba(211, 47, 47, 0.3);
}

  </style>
</body>

</html>
