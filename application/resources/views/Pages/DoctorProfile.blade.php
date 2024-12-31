<template>
  <div class="profile-container">
    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="profile-header">
        <img :src="profileImage" alt="Profile Image" class="profile-image" />
        <h2>{{ fullName }}</h2>
        <p>{{ specialty }}</p>
        <div class="actions">
          <button class="edit-btn">✏️</button>
          <button class="delete-btn">🗑️</button>
        </div>
      </div>

      <!-- Sidebar Navigation -->
      <nav>
        <ul>
          <li :class="{ active: activeItem === 'Personal Information' }" @click="selectItem('Personal Information')">🧑‍💼 Personal Information</li>
          <li :class="{ active: activeItem === 'Availability' }" @click="selectItem('Availability')">📅 Availability</li>
          <li :class="{ active: activeItem === 'Statistics' }" @click="selectItem('Statistics')">📊 Statistics</li>
          <li :class="{ active: activeItem === 'Patient Reviews' }" @click="selectItem('Patient Reviews')">💬 Patient Reviews</li>
          <li :class="{ active: activeItem === 'Settings' }" @click="selectItem('Settings')">⚙️ Settings</li>
          <li :class="{ active: activeItem === 'Log Out' }" @click="selectItem('Log Out')">🔐 Log Out</li>
        </ul>
      </nav>
    </aside>

    <!-- Main Content -->
    <section class="profile-form">
      <h1>Doctor Profile</h1>
      <h3>{{ activeItem }}</h3>

      <!-- Personal Information Form -->
      <form v-if="activeItem === 'Personal Information'" @submit.prevent="saveProfile">
        <div class="form-group">
          <input v-model="profile.firstName" placeholder="First Name" />
          <input v-model="profile.lastName" placeholder="Last Name" />
        </div>
        <div class="form-group">
          <input v-model="profile.email" placeholder="Email" />
          <span class="verified">Verified</span>
        </div>
        <div class="form-group">
          <input v-model="profile.phone" placeholder="Phone Number" />
          <select v-model="profile.specialty">
            <option disabled value="">Specialty</option>
            <option>Cardiologist</option>
            <option>Neurologist</option>
            <option>Dermatologist</option>
            <option>Orthopedic</option>
          </select>
        </div>
        <div class="form-group">
          <input v-model="profile.degrees" placeholder="Degrees/Certifications" />
          <input v-model="profile.experience" placeholder="Years of Experience" />
        </div>
        <div>
          <label>Select Languages:</label>
          <div class="language-options">
            <label><input type="checkbox" v-model="languages" value="Français" /> Français</label>
            <label><input type="checkbox" v-model="languages" value="Espagnol" /> Espagnol</label>
            <label><input type="checkbox" v-model="languages" value="Anglais" /> Anglais</label>
            <label><input type="checkbox" v-model="languages" value="Arabe" /> Arabe</label>
            <label><input type="checkbox" v-model="languages" value="Allemand" /> Allemand</label>
          </div>
        </div>
        <div class="form-group">
          <input v-model="profile.address" placeholder="Address" />
        </div>
        <div class="form-actions">
          <button type="button" @click="discardChanges">Discard Changes</button>
          <button type="submit">Save Changes</button>
        </div>
      </form>

      <!-- Availability Section -->
<div v-else-if="activeItem === 'Availability'">
  <div class="main-container">
    <!-- Header -->
    <div class="header">Doctor Availability Management</div>

    <!-- Add Availability Button -->
    <button id="addAvailabilityBtn" @click="showModal = true">+ Add Availability</button>

    <!-- Calendar -->
    <div class="calendar-container">
      <div class="calendar-header">
        <div class="arrow" @click="prevMonth">&lt;</div>
        <div>{{ currentMonth }} {{ currentYear }}</div>
        <div class="arrow" @click="nextMonth">&gt;</div>
      </div>
      <div class="days">
        <div v-for="day in daysOfWeek" :key="day">{{ day }}</div>
      </div>
      <div class="calendar-grid">
        <div v-for="(cell, index) in calendarCells" :key="index" class="calendar-cell" @click="openDateModal(cell)">
          {{ cell }}
        </div>
      </div>
    </div>

    <!-- Saved Availabilities -->
    <div id="availabilityList">
      <h3>Saved Availabilities</h3>
      <ul>
        <li v-for="(availability, index) in availabilities" :key="index" class="availability-item">
          {{ availability.date }} | {{ availability.startTime }} - {{ availability.endTime }}
          <div class="actions">
            <button class="btn edit" @click="editAvailability(index)">Edit</button>
            <button class="btn delete" @click="deleteAvailability(index)">Delete</button>
          </div>
        </li>
      </ul>
    </div>

    <!-- Availability Modal -->
    <div v-if="showModal" class="modal-overlay">
      <div class="modal">
        <h3>Add Availability</h3>
        <label for="date">Date:</label>
        <input type="date" v-model="newAvailability.date" />
        <label for="startTime">Start Time:</label>
        <input type="time" v-model="newAvailability.startTime" />
        <label for="endTime">End Time:</label>
        <input type="time" v-model="newAvailability.endTime" />
        <div class="modal-buttons">
          <button class="btn cancel" @click="showModal = false">Cancel</button>
          <button class="btn save" @click="saveAvailability">Save</button>
        </div>
      </div>
    </div>
  </div>
</div>


      <!-- Statistics Section -->
      <div v-if="activeItem === 'Statistics'" class="statistics-section">
  <h2>Statistics Overview</h2>

  <div class="stat-badges">
    <div class="stat-badge">
      <i class="fas fa-calendar-alt"></i>
      <p>Total Appointments</p>
      <span>{{ statistics.totalAppointments }}</span>
    </div>
    <div class="stat-badge">
      <i class="fas fa-user"></i>
      <p>Total Patients</p>
      <span>{{ statistics.totalPatients }}</span>
    </div>
    <div class="stat-badge">
      <i class="fas fa-times-circle"></i>
      <p>Cancelled Appointments</p>
      <span>{{ statistics.cancelledAppointments }}</span>
    </div>
    <div class="stat-badge">
      <i class="fas fa-star"></i>
      <p>Average Rating</p>
      <span>{{ statistics.averageRating }} ⭐</span>
    </div>
  </div>
</div>





      <!-- Patient Reviews Section -->
<div v-else-if="activeItem === 'Patient Reviews'" class="reviews-section">
  <div class="review-container">
    <img :src="reviews[currentReview].image" alt="Review" class="review-image" />

    <div class="review-details">
      <h3>{{ reviews[currentReview].name }}</h3>
      <p>{{ reviews[currentReview].comment }}</p>
      <div class="stars">
        <span v-for="n in reviews[currentReview].stars" :key="n">⭐</span>
      </div>
    </div>

    <div class="review-navigation">
      <button @click="prevReview" :disabled="currentReview === 0">Previous</button>
      <button @click="nextReview" :disabled="currentReview === reviews.length - 1">Next</button>
    </div>
  </div>
</div>


      <!-- Settings Section -->
      <div v-else-if="activeItem === 'Settings'">
        <p>In this section, you can update your settings like notifications and preferences.</p>
      </div>
      

      <!-- Log Out Section -->
      <div v-if="activeItem === 'Log Out'" class="logout-section">
  <h3>Are you sure you want to log out?</h3>
  <button @click="logoutUser">Log Out</button>
</div>

    </section>
  </div>
</template>

<script>

export default {
  name: "DoctorProfile",
  data() {
    return {
      // Données générales pour le profil
      profileImage: "/doc1.jpeg", // Placeholder image URL
      fullName: "Roland Donald",
      specialty: "Cardiologist",
      profile: {
        firstName: "",
        lastName: "",
        email: "",
        phone: "",
        specialty: "",
        degrees: "",
        experience: "",
        address: "",
      },
      languages: [],
      activeItem: 'Personal Information', // Default active item

      // Données pour le calendrier interactif
      daysOfWeek: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
      calendarCells: [],
      currentDate: new Date(),
      currentMonth: '',
      currentYear: '',
      availabilities: [],
      showModal: false,
      newAvailability: {
        date: '',
        startTime: '',
        endTime: '',
      },
      ///statics
      
       statistics: {
      totalAppointments: 120, // Exemple de données
      totalPatients: 75,
      cancelledAppointments: 10,
      averageRating: 4.5,
    },




      // Données pour les reviews
      
      currentReview: 0, // Indice de la revue actuellement affichée
      reviews: [
        {
          name: "Nina Holloway",
          comment: "Leaf viewing is a great way to spend a fall vacation...",
          stars: 4,
          image: "/pat2.png", // Image partagée
          
        },
        {
          name: "Steve Fletcher",
          comment: "Big tour business and plenty of options for everyone.",
          stars: 4,
          image: "/pat3.jpg",
          
        },
        {
          name: "Oscar Rogers",
          comment: "Hot apple cider on a crisp afternoon is a dream!",
          stars: 3,
          image: "/pat3.jpg",
        
        },

        {
          name: "Asmae Rogers",
          comment: "Hot apple cider on a crisp afternoon is a dream!",
          stars: 3,
          image: "/pat2.jpg",
        
        },
      ],
    
    };
  },
    
  
  created() {
    this.updateCalendar();
  },
  methods: {
    // Gestion de la navigation dans la sidebar
    selectItem(item) {
      this.activeItem = item;
    },
    saveProfile() {
      console.log("Saving profile:", this.profile);
    },
    discardChanges() {
      this.profile = {
        firstName: "",
        lastName: "",
        email: "",
        phone: "",
        specialty: "",
        degrees: "",
        experience: "",
        address: "",
      };
      this.languages = [];
    },
    logoutUser() {
    console.log("User logged out."); // Vous pouvez remplacer ceci par une logique réelle de déconnexion
    // Par exemple : rediriger vers la page de connexion ou effacer le token utilisateur
    this.$router.push(''); // Si vous utilisez Vue Router
  },
    

    // Méthodes pour le calendrier interactif
    updateCalendar() {
      const totalDays = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() + 1, 0).getDate();
      this.currentMonth = this.currentDate.toLocaleString('default', { month: 'long' });
      this.currentYear = this.currentDate.getFullYear();
      this.calendarCells = Array.from({ length: totalDays }, (_, i) => i + 1);
    },
    prevMonth() {
      this.currentDate.setMonth(this.currentDate.getMonth() - 1);
      this.updateCalendar();
    },
    nextMonth() {
      this.currentDate.setMonth(this.currentDate.getMonth() + 1);
      this.updateCalendar();
    },
    openDateModal(day) {
      this.newAvailability.date = `${this.currentYear}-${String(this.currentDate.getMonth() + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
      this.showModal = true;
    },
    saveAvailability() {
      const { date, startTime, endTime } = this.newAvailability;
      if (date && startTime && endTime) {
        this.availabilities.push(`${date} | ${startTime} - ${endTime}`);
        this.showModal = false;
        this.newAvailability = { date: '', startTime: '', endTime: '' };
      } else {
        alert("Please fill all fields!");
      }
    },

    // Méthodes pour les reviews
    
    nextReview() {
      if (this.currentReview < this.reviews.length - 1) this.currentReview++;
    },
    prevReview() {
      if (this.currentReview > 0) this.currentReview--;
    },
  },
};
///log out 





</script>

<style scoped>
/* General Styles */
body {
  font-family: 'Arial', sans-serif;
  margin: 0;
  padding: 0;
  background: #f4f4f4;
  color: #621c1c;
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

/* Modal */
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

/* Modal Buttons */
.modal-buttons {
  display: flex;
  justify-content: flex-end;
  gap: 10px;
}

.btn {
  padding: 8px 15px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.btn.save {
  background: #00d1ff;
  color: white;
}

.btn.save:hover {
  background: #007bff;
}

.btn.cancel {
  background: #f44336;
  color: white;
}

.btn.cancel:hover {
  background: #d32f2f;
}

/* Add Availability Button */
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
}

#addAvailabilityBtn:hover {
  background: #007bff;
  transform: translateY(-2px);
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

.profile-image {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  object-fit: cover;
  margin-bottom: 1rem;
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
  padding: 14px;
  border: 1px solid #646363;
  border-radius: 8px;
  background-color: #f8f8f8;
}

.review-image {
  width: 10%;
  height: auto;
  border-radius: 2px;
}

.review-details h3 {
  margin: 10px 0;
  color: #1466da;
}

.stars {
  color: #f5a623;
  font-size: 1.2rem;
}

.review-navigation button {
  margin: 5px;
  padding: 8px 12px;
  background-color: #1466da;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.review-navigation button:disabled {
  background-color: #cccccc;
  cursor: not-allowed;
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
  font-size: 2em;
  color: #007bff;
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



.logout-section {
  text-align: center;
  margin-top: 20px;
}

.logout-section button {
  padding: 10px 20px;
  color: #fff;
  background: #dc3545;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 1rem;
  transition: background 0.3s ease;
}

.logout-section button:hover {
  background: #b02a37;
}
</style>
