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
          <li class="nav-item" id="navReviews">💬 Patient Reviews</li>
          <li class="nav-item" id="navLogout">🔐 Log Out</li>
        </ul>
      </nav>
    </aside>

    <!-- Main Content -->
    <section class="profile-form">
      <h1><center>Doctor Panel</center></h1>

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
/* General Styles */
body, html {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
}

.profile-container {
  display: flex;
  height: 100vh;
}

.sidebar {
  width: 23%;
  background: #f9f9f9;
  padding: 1rem;
  border-right: 1px solid #ddd;
}

.profile-header {
  text-align: center;
}

.profile-image {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  border: 3px solid #ddd;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  object-fit: cover;
  margin-bottom: 15px;
  transition: transform 0.3s ease;
}

.profile-image:hover {
  transform: scale(1.05);
}

.nav-item {
  padding: 0.5rem;
  cursor: pointer;
  transition: background 0.3s ease;
}

.nav-item:hover {
  background: linear-gradient(135deg, #00d1ff, #007bff);
  color: #ffffffc4;
  border-radius: 5px;
}

.profile-form {
  flex: 1;
  padding: 2rem;
  background: #eaeaea;
}

h1 {
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
  color: green;
  font-weight: bold;
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

#availabilitySection {
  margin-top: 2rem;
}

.review {
  background: #f9f9f9;
  padding: 1rem;
  margin-bottom: 1rem;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.review p {
  margin: 5px 0;
}

</style>
