<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MediCare Appointment</title>
  <style>

.steps {
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: relative;
  margin-bottom: 20px;
}

.step {
  background: #ccc;
  padding: 10px;
  border-radius: 50%;
  width: 30px;
  height: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  position: relative;
  z-index: 2;
}

.active-step {
  background: #3579c3;
  color: white;
}

.line {
  flex-grow: 1;
  height: 3px;
  background: #ccc;
  position: relative;
  z-index: 1;
}

.active-line {
  background: #3579c3;
}

    body {
      background-image: url('https://images.unsplash.com/photo-1586773860418-d37222d8fce3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2073&q=80');
      background-size: cover;
      background-position: center;
      min-height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
    }
    .overlay {
      background: rgba(0, 0, 0, 0.5);
      min-height: 100vh;
      padding: 20px;
    }
    header {
      background: rgba(26, 59, 93, 0.9);
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      color: white;
    }
    .container {
      max-width: 600px;
      background: rgba(255, 255, 255, 0.95);
      padding: 20px;
      margin: 20px auto;
      border-radius: 10px;
    }
    h1 {
      color: #3579c3;
    }
    input, select, button {
      width: 100%;
      padding: 8px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      background: #3579c3;
      color: white;
      border: none;
      cursor: pointer;
      width: auto;
      padding: 8px 16px;
    }
    button:hover {
      background: #3579c3;
    }
    .steps {
      display: flex;
      justify-content: space-around;
      margin-bottom: 20px;
    }
    .step {
      background: #ccc;
      padding: 10px;
      border-radius: 50%;
      width: 30px;
      height: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .active-step {
      background: #3579c3;
      color: white;
    }
    .button-container {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }
    .details-form .row {
      display: flex;
      gap: 20px;
      margin-bottom: 15px;
    }
    .details-form .row > div {
      flex: 1;
    }
    .details-form input {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <div class="overlay">
    <header>
      <div>DocPlanner</div>
      
    </header>
    <div class="container">
      <h1>Book Appointment</h1>
     <div class="steps">
  <div class="step" id="step-1">1</div>
  <div class="line" id="line-1"></div>
  <div class="step" id="step-2">2</div>
  <div class="line" id="line-2"></div>
  <div class="step" id="step-3">3</div>
  <div class="line" id="line-3"></div>
  <div class="step" id="step-4">4</div>
</div>

      <div id="form-step">
        <!-- Dynamic Form Content -->
      </div>
      <div class="button-container">
        <button id="back-btn" onclick="handleBack()">Back</button>
        <button onclick="handleNext()">Next</button>
      </div>
    </div>
  </div>

  <script>
    async function fetchTreatments() {
  const response = await fetch('/api/treatments');
  const treatments = await response.json();

  const treatmentSelect = document.querySelector('select[name="treatment"]');
  treatments.forEach((treatment) => {
    const option = document.createElement('option');
    option.value = treatment;
    option.textContent = treatment;
    treatmentSelect.appendChild(option);
  });
}

async function fetchDoctors(treatment) {
  const response = await fetch(`/api/doctors?treatment=${treatment}`);
  const doctors = await response.json();

  const doctorSelect = document.querySelector('select[name="doctor"]');
  doctorSelect.innerHTML = '<option value="">Select doctor</option>'; // Clear previous options
  doctors.forEach((doctor) => {
    const option = document.createElement('option');
    option.value = doctor.id_doctor;
    option.textContent = `${doctor.nom} - ${doctor.specialite}`;
    doctorSelect.appendChild(option);
  });
}

async function fetchAvailableTimes(doctorId, date) {
  const response = await fetch(`/api/available-times?doctor_id=${doctorId}&date=${date}`);
  const times = await response.json();

  const timeSelect = document.querySelector('select[name="time"]');
  timeSelect.innerHTML = '<option value="">Select time</option>'; // Clear previous options
  times.forEach((time) => {
    const option = document.createElement('option');
    option.value = time.start_time;
    option.textContent = `${time.start_time} - ${time.end_time}`;
    timeSelect.appendChild(option);
  });
}

async function bookAppointment() {
  const appointmentData = {
    id_doctor: formData.doctor,
    id_dispo: formData.time, // Adjust this to map the availability ID
    firstName: formData.firstName,
    lastName: formData.lastName,
    phone: formData.phone,
    email: formData.email,
  };

  const response = await fetch('/api/book-appointment', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(appointmentData),
  });

  const result = await response.json();
  alert(result.message);
}

  </script>
</body>
</html>
