<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup Form</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    .signup-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f2f2f2;
    }

    .wrapper {
      width: 380px;
      background: #fff;
      border-radius: 15px;
      box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1);
    }

    .wrapper .title {
      font-size: 35px;
      font-weight: 600;
      text-align: center;
      line-height: 100px;
      color: #fff;
      user-select: none;
      border-radius: 15px 15px 0 0;
      background: linear-gradient(135deg, #3579c3, #5aa1e3);
    }

    .wrapper form {
      padding: 10px 30px 50px 30px;
    }

    .wrapper form .field {
      height: 50px;
      width: 100%;
      margin-top: 20px;
      position: relative;
    }

    .wrapper form .field input {
      height: 100%;
      width: 100%;
      outline: none;
      font-size: 17px;
      padding-left: 20px;
      border: 1px solid lightgrey;
      border-radius: 25px;
      transition: all 0.3s ease;
    }

    .wrapper form .field input:focus,
    form .field input:valid {
      border-color: #3579c3;
    }

    .wrapper form .field label {
      position: absolute;
      top: 50%;
      left: 20px;
      color: #999999;
      font-weight: 400;
      font-size: 17px;
      pointer-events: none;
      transform: translateY(-50%);
      transition: all 0.3s ease;
    }

    form .field input:focus ~ label,
    form .field input:valid ~ label {
      top: 0%;
      font-size: 16px;
      color: #3579c3;
      background: #fff;
      transform: translateY(-50%);
    }

    form .field input[type="submit"] {
      color: #fff;
      border: none;
      padding-left: 0;
      margin-top: -10px;
      font-size: 20px;
      font-weight: 500;
      cursor: pointer;
      background: linear-gradient(135deg, #3579c3, #5aa1e3);
      transition: all 0.3s ease;
    }

    form .field input[type="submit"]:hover {
      background: linear-gradient(135deg, #2e6aaf, #4d92d6);
    }

    form .field input[type="submit"]:active {
      transform: scale(0.95);
    }

    .wrapper form .login-link {
      color: #262626;
      margin-top: 20px;
      text-align: center;
    }

    form .login-link a {
      color: #3579c3;
      text-decoration: none;
    }

    form .login-link a:hover {
      text-decoration: underline;
    }

    .error {
      color: red;
      font-size: 14px;
      margin-bottom: 15px;
    }
    .wrapper form .field select {
  height: 100%;
  width: 100%;
  outline: none;
  font-size: 17px;
  padding-left: 20px;
  border: 1px solid lightgrey;
  border-radius: 25px;
  background: white;
  transition: all 0.3s ease;
  -webkit-appearance: none; /* For Safari */
  -moz-appearance: none; /* For Firefox */
  appearance: none; /* For other browsers */
}

.wrapper form .field select:focus,
.wrapper form .field select:valid {
  border-color: #3579c3;
}

.wrapper form .field label {
  position: absolute;
  top: 50%;
  left: 20px;
  color: #999999;
  font-weight: 400;
  font-size: 17px;
  pointer-events: none;
  transform: translateY(-50%);
  transition: all 0.3s ease;
  background: white;
  padding: 0 5px;
}

form .field select:focus ~ label,
form .field select:valid ~ label {
  top: -10px;
  font-size: 16px;
  color: #3579c3;
}

  </style>
</head>
<body>
  <div class="signup-container">
    <div class="wrapper">
      <div class="title">Signup Form</div>

      <!-- Affichage des erreurs -->
      @if ($errors->any())
        <div class="error">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form id="signupForm" method="POST" action="{{ route('user.store') }}">
      <input type="hidden" name="${_csrf.parameterName}" value="${_csrf.token}" />

        @csrf
        <div class="field">
          <input 
            type="text" 
            id="fullName" 
            name="name" 
            value="{{ old('name') }}" 
            required 
          />
          <label for="fullName">Full Name</label>
        </div>
        <div class="field">
          <input 
            type="email" 
            id="email" 
            name="email" 
            value="{{ old('email') }}" 
            required 
          />
          <label for="email">Email Address</label>
        </div>
        <div class="field">
          <select id="role" name="role" required>
            <option value="" disabled selected></option>
            <option value="doctor">Doctor</option>
            <option value="patient">Patient</option>
          </select>
          <label for="role">Role</label>
        </div>
        <div class="field">
          <input 
            type="password" 
            id="password" 
            name="password" 
            required 
          />
          <label for="password">Password</label>
        </div>
        <div class="field">
          <input 
            type="password" 
            id="confirmPassword" 
            name="password_confirmation" 
            required 
          />
          <label for="confirmPassword">Confirm Password</label>
        </div>
        <div class="field">
          <input type="submit" value="Signup" />
        </div>
        <div class="login-link">
          Already a member? <a href="/login">Login now</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
