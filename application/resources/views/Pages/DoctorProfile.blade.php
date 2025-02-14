<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Profile</title>

  <link rel="stylesheet" href="styles.css"> <!-- Add your CSS file here -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <style>
    .hidden {
      display: none;
    }
  </style>
</head>
<body>
  <div class="profile-container">
    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="profile-header">
        <img  id="profileImage" src="{{ asset('storage/' . $doctor->image) }}" alt="Doctor Image" class="profile-image">

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
          <li class="nav-item" id="navPersonalInfo" onclick="showSection('personalInfoSection')">🧑‍💼 Personal Information</li>
          <li class="nav-item" id="navCertifications">📜 Certifications & Degrees</li>
          <li class="nav-item" id="navAvailability" onclick="showSection('availabilitySection')">📅 Availability</li>
          <li class="nav-item" id="navReviews" onclick="showSection('reviewsSection')">💬 Patient Reviews</li>
          <li class="nav-item" id="navLogout">
            <!-- Logout Form -->
            <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
              @method('POST')
            </form>
            <button type="submit" onclick="document.getElementById('logoutForm').submit();" style="background: none; border: none; color: #4f9eee; cursor: pointer;">
              🔐 Log Out
            </button>
          </li>
        </ul>
      </nav>
    </aside>

    <!-- Main Content -->
    <section class="profile-form">
      <h1><center>Doctor Panel</center></h1>

      <!-- Success/Failure Flash Message -->
      @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <!-- Personal Information Form Section -->
      <div id="personalInfoSection" class="hidden">
        <form id="personalInfoForm" action="{{ route('doctor.updateProfile') }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="form-group">
    <input id="firstName" type="text" name="firstName" value="{{ $doctor->nom }}" placeholder="First Name" />

  </div>
  <div class="form-group">
    <input id="email" type="email" name="email" value="{{ $doctorEmail }}" placeholder="Email" />
    <span class="verified">Verified</span>
  </div>
  <div class="form-group">
    <input id="phone" type="text" name="phone" value="{{ $doctor->phone }}" placeholder="Phone Number" />
    <select id="specialtySelect" name="specialty">
      <option disabled value="">Specialty</option>
      <option {{ $doctor->specialite == 'Cardiologist' ? 'selected' : '' }}>Cardiologist</option>
      <option {{ $doctor->specialite == 'Neurologist' ? 'selected' : '' }}>Neurologist</option>
      <option {{ $doctor->specialite == 'Dermatologist' ? 'selected' : '' }}>Dermatologist</option>
      <option {{ $doctor->specialite == 'Orthopedic' ? 'selected' : '' }}>Orthopedic</option>
    </select>
  </div>
  <div class="form-group">
    <input id="experience" type="date" name="date_debut" value="{{ $doctor->date_debut}}" placeholder="Years of Experience" />
  </div>
  <div class="form-group">
    <input id="address" type="text" name="location" value="{{ $doctor->location }}" placeholder="Address" />
</div>

  <div class="form-group">
    <label for="image">Profile Image</label>
    <input type="file" id="image" name="image"/>
    @if ($doctor->image)
        <img src="{{ asset('storage/' . $doctor->image) }}" alt="Profile Image" width="100">
    @endif
</div>
  <div class="form-actions">
    <button type="button" id="discardChanges">Discard Changes</button>
    <button type="submit" id="saveChanges">Save Changes</button>
  </div>
</form>


      </div>

      <!-- Availability Section -->
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
            <ul id="availabilities">
                @foreach ($availabilities as $availability)
                    <li>
                        {{ $availability->date }} - {{ $availability->start_time }} to {{ $availability->end_time }}
                        @if ($availability->is_available)
                            (Available)
                        @else
                            (Not Available)
                        @endif
                        <form method="POST" action="{{ route('availabilities.destroy', $availability) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">🗑️</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Availability Modal -->
        <div id="availabilityModal" class="modal-overlay" style="display: none;">
            <div class="modal">
                <h3>Add Availability</h3>
                <form method="POST" action="{{ route('availabilities.store') }}">
                    @csrf
                    <input type="hidden" name="id_doctor" value="{{ $doctor->id_doctor }}">
                    <label for="date">Date:</label>
                    <input type="date" name="date" id="availabilityDate" required />
                    <label for="startTime">Start Time:</label>
                    <input type="time" name="start_time" id="availabilityStartTime" required />
                    <label for="endTime">End Time:</label>
                    <input type="time" name="end_time" id="availabilityEndTime" required />
                    <label for="isAvailable">Is Available?</label>
                    <input type="checkbox" name="is_available" id="isAvailable" checked />
                    <div class="modal-buttons">
                        <button type="button" class="btn cancel" id="cancelModal">Cancel</button>
                        <button type="submit" class="btn save" id="saveAvailability">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


      <!-- Reviews Section -->
      <div id="reviewsSection" class="hidden">
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
    function showSection(sectionId) {
      // Hide all sections
      const sections = document.querySelectorAll('.profile-form > div');
      sections.forEach(function(section) {
        section.classList.add('hidden');
      });

      // Show the selected section
      const sectionToShow = document.getElementById(sectionId);
      if (sectionToShow) {
        sectionToShow.classList.remove('hidden');
      }
    }
       window.onload = function() {
      showSection('personalInfoSection');
    }

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
