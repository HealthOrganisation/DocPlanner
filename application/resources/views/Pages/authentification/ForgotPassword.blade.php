<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    .forgot-password-container {
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
      margin-top: 10px;
      font-size: 20px;
      font-weight: 500;
      cursor: pointer;
      background: linear-gradient(135deg, #1272da, #9cc1d8);
      transition: all 0.3s ease;
    }

    form .field input[type="submit"]:hover {
      background: linear-gradient(135deg, #2e6aaf, #4d92d6);
    }

    form .field input[type="submit"]:active {
      transform: scale(0.95);
    }
  </style>
</head>
<body>
  <div class="forgot-password-container">
    <div class="wrapper">
      <div class="title">Forgot Password</div>
      <form id="forgotPasswordForm">
        <div class="field">
          <input type="email" id="email" required />
          <label for="email">Email Address</label>
        </div>
        <div class="field">
          <input type="password" id="newPassword" required />
          <label for="newPassword">New Password</label>
        </div>
        <div class="field">
          <input type="password" id="confirmPassword" required />
          <label for="confirmPassword">Confirm Password</label>
        </div>
        <div class="field">
          <input type="submit" value="Reset Password" />
        </div>
      </form>
    </div>
  </div>

  <script>
    document.getElementById('forgotPasswordForm').addEventListener('submit', function(event) {
      event.preventDefault();

      const email = document.getElementById('email').value;
      const newPassword = document.getElementById('newPassword').value;
      const confirmPassword = document.getElementById('confirmPassword').value;

      if (newPassword !== confirmPassword) {
        alert("Passwords do not match.");
        return;
      }

      console.log("Reset Password Request:", email, newPassword);
      // Ajouter ici l'appel API pour réinitialiser le mot de passe
    });
  </script>
</body>
</html>
