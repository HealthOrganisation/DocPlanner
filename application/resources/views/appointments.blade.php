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
    let currentStep = 'service';
    const formData = {
      treatment: '',
      doctor: '',
      date: '',
      time: '',
      firstName: '',
      lastName: '',
      phone: '',
      email: '',
      address: ''
    };

    function renderForm() {
      const formStep = document.getElementById('form-step');
      formStep.innerHTML = '';

      document.querySelectorAll('.step').forEach((step, index) => {
    step.classList.toggle('active-step', index <= getStepIndex(currentStep));
  });

  document.querySelectorAll('.line').forEach((line, index) => {
    line.classList.toggle('active-line', index < getStepIndex(currentStep));
  });

      document.getElementById('back-btn').style.display = currentStep === 'service' ? 'none' : 'inline-block';

      if (currentStep === 'service') {
        formStep.innerHTML = `
          <label>Treatment</label>
          <select name="treatment" onchange="handleInputChange(event)">
            <option value="">Select treatment</option>
            <option value="Dentiste">Dentiste</option>
            <option value="Pédiatre">Pédiatre</option>
            <option value="Psychiatre">Psychiatre</option>
            <option value="Cardiologue">Cardiologuey</option>
          </select>
          <label>Doctor</label>
          <select name="doctor" onchange="handleInputChange(event)">
            <option value="">Select doctor</option>
            <option value="dr-smith">Dr. Smith - General Medicine</option>
            <option value="dr-jones">Dr. Jones - Dentist</option>
            <option value="dr-wilson">Dr. Wilson - Cardiologist</option>
          </select>
        `;
      } else if (currentStep === 'time') {
        formStep.innerHTML = `
          <label>Date</label>
          <input type="date" name="date" onchange="handleInputChange(event)">
          <label>Time</label>
          <select name="time" onchange="handleInputChange(event)">
            <option value="">Select time</option>
            <option value="09:00">09:00 AM</option>
            <option value="10:00">10:00 AM</option>
            <option value="11:00">11:00 AM</option>
            <option value="14:00">02:00 PM</option>
            <option value="15:00">03:00 PM</option>
          </select>
        `;
      } else if (currentStep === 'details') {
        formStep.innerHTML = `
          <form class="details-form">
            <div class="row">
              <div>
                <label>First Name</label>
                <input type="text" name="firstName" onchange="handleInputChange(event)">
              </div>
              <div>
                <label>Last Name</label>
                <input type="text" name="lastName" onchange="handleInputChange(event)">
              </div>
            </div>
            <div class="row">
              <div>
                <label>Phone</label>
                <input type="text" name="phone" onchange="handleInputChange(event)">
              </div>
              <div>
                <label>Email</label>
                <input type="email" name="email" onchange="handleInputChange(event)">
              </div>
            </div>
            <div>
              <label>Address</label>
              <input type="text" name="address" onchange="handleInputChange(event)">
            </div>
          </form>
        `;
      } else if (currentStep === 'done') {
        formStep.innerHTML = `<h2>Appointment Booked Successfully!</h2>`;
      }
    }

    function getStepIndex(step) {
      return ['service', 'time', 'details', 'done'].indexOf(step);
    }

    function handleInputChange(event) {
      formData[event.target.name] = event.target.value;
    }

    function handleNext() {
      if (currentStep === 'service') currentStep = 'time';
      else if (currentStep === 'time') currentStep = 'details';
      else if (currentStep === 'details') currentStep = 'done';
      renderForm();
    }

    function handleBack() {
      if (currentStep === 'time') currentStep = 'service';
      else if (currentStep === 'details') currentStep = 'time';
      else if (currentStep === 'done') currentStep = 'details';
      renderForm();
    }

    renderForm();
  </script>
</body>
</html>
