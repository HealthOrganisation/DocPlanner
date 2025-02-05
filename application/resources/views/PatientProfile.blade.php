<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Patient</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Header -->
    <header class="bg-blue-600 text-white p-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Espace Patient</h1>
            <div class="flex items-center space-x-4">
                <button class="notification-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 cursor-pointer hover:text-gold-400">
                        <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path>
                        <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path>
                    </svg>
                </button>
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span>Marie Dupont</span>
                </div>
            </div>
        </div>
    </header>

    

    <!-- Edit Profile Modal -->
    <div id="editProfileModal" class="modal">
        <div class="modal-content">
            <button class="modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            <h2 class="text-xl font-semibold mb-6">Modifier le profil</h2>
            <form id="editProfileForm" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600">Nom complet</label>
                    <input type="text" name="name" class="form-input" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Date de naissance</label>
                    <input type="date" name="dateOfBirth" class="form-input" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Email</label>
                    <input type="email" name="email" class="form-input" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Téléphone</label>
                    <input type="tel" name="phone" class="form-input" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Adresse</label>
                    <textarea name="address" class="form-input" rows="2" required></textarea>
                </div>
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" class="px-4 py-2 text-gray-600 hover:text-gray-800" onclick="closeEditProfileModal()">
                        Annuler
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto p-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Sidebar -->
            <div class="md:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex flex-col items-center mb-6">
                        <div class="w-32 h-32 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <h2 class="text-xl font-semibold">Marie Dupont</h2>
                        <button class="mt-4 flex items-center text-blue-600 hover:text-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"></path>
                            </svg>
                            Modifier le profil
                        </button>
                    </div>

                    <nav class="space-y-2">
                        <button data-tab="profile" class="tab-btn active w-full text-left px-4 py-2 rounded-md flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Profil</span>
                        </button>
                        <button data-tab="appointments" class="tab-btn w-full text-left px-4 py-2 rounded-md flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
                                <line x1="16" x2="16" y1="2" y2="6"></line>
                                <line x1="8" x2="8" y1="2" y2="6"></line>
                                <line x1="3" x2="21" y1="10" y2="10"></line>
                            </svg>
                            <span>Rendez-vous</span>
                        </button>
                        <button data-tab="records" class="tab-btn w-full text-left px-4 py-2 rounded-md flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                            </svg>
                            <span>Dossier médical</span>
                        </button>
                        <button data-tab="messages" class="tab-btn w-full text-left px-4 py-2 rounded-md flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                            <span>Messages</span>
                        </button>
                    </nav>
                </div>
            </div>

            <!-- Content Area -->
            <div class="md:col-span-3">
                <!-- Profile Tab -->
                <div id="profile" class="tab-content active bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-6">Informations personnelles</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Nom complet</label>
                            <p class="mt-1">Marie Dupont</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Date de naissance</label>
                            <p class="mt-1">15/03/1985</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Email</label>
                            <p class="mt-1">marie.dupont@email.com</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Téléphone</label>
                            <p class="mt-1">+33 6 12 34 56 78</p>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-600">Adresse</label>
                            <p class="mt-1">123 Rue de la Santé, Paris</p>
                        </div>
                    </div>
                </div>

                <!-- Appointments Tab -->
                <div id="appointments" class="tab-content hidden space-y-6">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-semibold mb-6">Prochain rendez-vous</h3>
                        <div class="flex items-center space-x-4 p-4 bg-blue-50 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600">
                                <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
                                <line x1="16" x2="16" y1="2" y2="6"></line>
                                <line x1="8" x2="8" y1="2" y2="6"></line>
                                <line x1="3" x2="21" y1="10" y2="10"></line>
                            </svg>
                            <div>
                                <p class="font-semibold">Dr. Smith</p>
                                <p class="text-sm text-gray-600">25/03/2024 à 14:30</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-semibold mb-6">Rendez-vous à venir</h3>
                        <div class="space-y-4" id="upcoming-appointments">
                            <!-- Appointments will be inserted here by JavaScript -->
                        </div>
                    </div>
                </div>

                <!-- Medical Records Tab -->
                <div id="records" class="tab-content hidden bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-6">Dossier médical</h3>
                    <div class="space-y-4" id="medical-records">
                        <!-- Medical records will be inserted here by JavaScript -->
                    </div>
                </div>

                <!-- Messages Tab -->
                <div id="messages" class="tab-content hidden bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-6">Messages et notifications</h3>
                    <div class="space-y-4" id="notifications">
                        <!-- Notifications will be inserted here by JavaScript -->
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script >// Patient data
const patientData = {
    name: "Marie Dupont",
    dateOfBirth: "1985-03-15", // Format changed for input date compatibility
    email: "marie.dupont@email.com",
    phone: "+33 6 12 34 56 78",
    address: "123 Rue de la Santé, Paris",
    nextAppointment: {
        doctor: "Dr. Smith",
        date: "25/03/2024",
        time: "14:30"
    },
    upcomingAppointments: [
        {
            doctor: "Dr. Smith",
            specialty: "Cardiologie",
            date: "25/03/2024",
            time: "14:30",
            status: "Confirmé"
        },
        {
            doctor: "Dr. Martin",
            specialty: "Dermatologie",
            date: "02/04/2024",
            time: "10:00",
            status: "En attente"
        }
    ],
    medicalRecords: [
        {
            date: "10/02/2024",
            doctor: "Dr. Smith",
            diagnosis: "Consultation de routine",
            treatment: "Aucun traitement prescrit"
        }
    ],
    notifications: [
        {
            message: "Rappel: Rendez-vous avec Dr. Smith demain à 14:30",
            date: "24/03/2024"
        }
    ]
};

// Edit Profile Modal Functions
function openEditProfileModal() {
    const modal = document.getElementById('editProfileModal');
    const form = document.getElementById('editProfileForm');
    
    // Pre-fill form with current data
    form.elements.name.value = patientData.name;
    form.elements.dateOfBirth.value = patientData.dateOfBirth;
    form.elements.email.value = patientData.email;
    form.elements.phone.value = patientData.phone;
    form.elements.address.value = patientData.address;
    
    modal.classList.add('active');
}

function closeEditProfileModal() {
    const modal = document.getElementById('editProfileModal');
    modal.classList.remove('active');
}

function updateProfile(formData) {
    // Update patientData object
    patientData.name = formData.name;
    patientData.dateOfBirth = formData.dateOfBirth;
    patientData.email = formData.email;
    patientData.phone = formData.phone;
    patientData.address = formData.address;

    // Update UI
    document.querySelectorAll('.patient-name').forEach(el => {
        el.textContent = formData.name;
    });

    // Update profile information in the profile tab
    const profileTab = document.getElementById('profile');
    const labels = profileTab.querySelectorAll('label');
    labels.forEach(label => {
        const field = label.textContent.toLowerCase();
        const value = label.nextElementSibling;
        if (field.includes('nom')) {
            value.textContent = formData.name;
        } else if (field.includes('naissance')) {
            // Convert date to French format
            const date = new Date(formData.dateOfBirth);
            value.textContent = date.toLocaleDateString('fr-FR');
        } else if (field.includes('email')) {
            value.textContent = formData.email;
        } else if (field.includes('téléphone')) {
            value.textContent = formData.phone;
        } else if (field.includes('adresse')) {
            value.textContent = formData.address;
        }
    });
}

// Tab switching functionality
document.addEventListener('DOMContentLoaded', function() {
    // Edit Profile Form Submission
    const editProfileForm = document.getElementById('editProfileForm');
    editProfileForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = {
            name: this.elements.name.value,
            dateOfBirth: this.elements.dateOfBirth.value,
            email: this.elements.email.value,
            phone: this.elements.phone.value,
            address: this.elements.address.value
        };

        updateProfile(formData);
        closeEditProfileModal();
    });

    // Modal close button
    const modalClose = document.querySelector('.modal-close');
    modalClose.addEventListener('click', closeEditProfileModal);

    // Edit profile button
    const editProfileBtn = document.querySelector('button.mt-4');
    editProfileBtn.addEventListener('click', openEditProfileModal);

    // Close modal when clicking outside
    const modal = document.getElementById('editProfileModal');
    modal.addEventListener('click', function(e) {
        if (e.target === this) {
            closeEditProfileModal();
        }
    });

    // Tab switching
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));

            button.classList.add('active');
            const tabId = button.getAttribute('data-tab');
            document.getElementById(tabId).classList.add('active');
        });
    });

    // Populate upcoming appointments
    const upcomingAppointmentsContainer = document.getElementById('upcoming-appointments');
    patientData.upcomingAppointments.forEach(appointment => {
        const appointmentElement = document.createElement('div');
        appointmentElement.className = 'border-b last:border-0 pb-4 last:pb-0';
        appointmentElement.innerHTML = `
            <div class="flex justify-between items-start">
                <div>
                    <p class="font-semibold">${appointment.doctor}</p>
                    <p class="text-sm text-gray-600">${appointment.specialty}</p>
                    <p class="text-sm text-gray-600">${appointment.date} à ${appointment.time}</p>
                </div>
                <span class="px-3 py-1 rounded-full text-sm ${
                    appointment.status === 'Confirmé' 
                        ? 'bg-green-100 text-green-800' 
                        : 'bg-yellow-100 text-yellow-800'
                }">
                    ${appointment.status}
                </span>
            </div>
        `;
        upcomingAppointmentsContainer.appendChild(appointmentElement);
    });

    // Populate medical records
    const medicalRecordsContainer = document.getElementById('medical-records');
    patientData.medicalRecords.forEach(record => {
        const recordElement = document.createElement('div');
        recordElement.className = 'border-b last:border-0 pb-4 last:pb-0';
        recordElement.innerHTML = `
            <div class="flex justify-between items-start mb-2">
                <p class="font-semibold">${record.doctor}</p>
                <p class="text-sm text-gray-600">${record.date}</p>
            </div>
            <p class="text-sm text-gray-800 mb-1">
                <span class="font-medium">Diagnostic:</span> ${record.diagnosis}
            </p>
            <p class="text-sm text-gray-800">
                <span class="font-medium">Traitement:</span> ${record.treatment}
            </p>
        `;
        medicalRecordsContainer.appendChild(recordElement);
    });

    // Populate notifications
    const notificationsContainer = document.getElementById('notifications');
    patientData.notifications.forEach(notification => {
        const notificationElement = document.createElement('div');
        notificationElement.className = 'flex items-start space-x-4 p-4 bg-blue-50 rounded-lg';
        notificationElement.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-blue-600 flex-shrink-0">
                <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path>
                <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path>
            </svg>
            <div>
                <p class="text-sm text-gray-800">${notification.message}</p>
                <p class="text-xs text-gray-600 mt-1">${notification.date}</p>
            </div>
        `;
        notificationsContainer.appendChild(notificationElement);
    });
});</script>

<style>/* Custom styles to complement Tailwind */
.tab-btn.active {
    background-color: #EBF5FF;
    color: #2563EB;
}

.tab-content {
    display: none;
}

.tab-content.active {
    display: block;
}

/* Hover effects */
.tab-btn:hover:not(.active) {
    background-color: #F3F4F6;
}

/* Transitions */
.tab-btn {
    transition: all 0.2s ease-in-out;
}

/* Modal styles */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1000;
}

.modal.active {
    display: flex;
    align-items: center;
    justify-content: center;
}

.modal-content {
    background-color: white;
    padding: 2rem;
    border-radius: 0.5rem;
    width: 100%;
    max-width: 32rem;
    position: relative;
}

.modal-close {
    position: absolute;
    top: 1rem;
    right: 1rem;
    cursor: pointer;
}

/* Form styles */
.form-input {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #E5E7EB;
    border-radius: 0.375rem;
    margin-top: 0.25rem;
}

.form-input:focus {
    outline: none;
    border-color: #2563EB;
    ring: 2px solid #2563EB;
}

/* Additional responsive styles */
@media (max-width: 768px) {
    .grid {
        gap: 1rem;
    }
    
    .modal-content {
        margin: 1rem;
        max-height: calc(100vh - 2rem);
        overflow-y: auto;
    }
}</style>
</body>
</html>