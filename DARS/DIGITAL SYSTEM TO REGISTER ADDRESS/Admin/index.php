<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate and sanitize form data
  $loginEmail = $_POST['loginEmail'];
  $loginPassword = $_POST['loginPassword'];

  // Database credentials
  $hostname = 'localhost'; // or the IP address of your MySQL server
  $username = 'root';
  $password_db = '';
  $database = 'registration';

  // Create a new database connection
  $conn = new mysqli($hostname, $username, $password_db, $database);

  // Check the connection
  if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
  }

  // Prepare and execute the SQL query to fetch the user record by email
  $stmt = $conn->prepare("SELECT id, email, password, is_super_admin FROM users WHERE email = ?");
  $stmt->bind_param("s", $loginEmail);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    // User found, verify the password
    $row = $result->fetch_assoc();
    $hashedPassword = $row['password'];
    if (password_verify($loginPassword, $hashedPassword)) {
      // Inside the if statement where the user is authenticated
      $_SESSION['loginEmail'] = $loginEmail;
      $_SESSION['isSuperAdmin'] = $row['is_super_admin'];

      if ($row['is_super_admin'] === 0) {
        $_SESSION['loginEmail'] = $loginEmail;
        header("Location: ../crud.php"); // Redirect to user contribution page
        exit;
      } elseif ($row['is_super_admin'] === 1 || $row['is_super_admin'] === 2) {
        $_SESSION['loginEmail'] = $loginEmail;

        header("Location: index2.php"); // Redirect to admin dashboard
        exit;
      }
    } else {
      // Incorrect password or user not found
      echo "Invalid email or password.";
    }
  } else {
    // User not found
    echo "Invalid email or password.";
  }

  // Close the database connection
  $stmt->close();
  $conn->close();
}
?>

















<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Add FontAwesome stylesheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
 <style>
    body {
      background-image: url("image/bg1.avif");
      background-size: cover;
      background-repeat: no-repeat;
    }

    .login-form {
      border-radius: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 40px;
      margin-top: 150px;
      background-color: rgba(255, 255, 255, 0.9);
      margin-bottom: 150px;
    }

    .form-group label {
      font-weight: bold;
      color: #444;
    }

    .form-control:focus {
      box-shadow: none;
    }

    .submit-btn {
      width: 100%;
    }

    .error-msg {
      color: #dc3545;
      font-size: 14px;
      margin-top: -8px;
    }

    .login-title {
      text-align: center;
      font-size: 24px;
      font-weight: bold;
      color: #007bff;
      margin-bottom: 30px;
    }
  </style>
</head>
<body>
   <!-- Include the navbar -->
   <?php include '../navbar.php'; ?>
  <div class="container">
    <div class="row justify-content-center">
      <!-- Login Form Column -->
      <div class="col-lg-5">
        <div class="login-form">
          <h2 class="login-title">Sign In</h2>
          <form action="login_process2.php" method="POST" >
          <div class="form-group">
  <label for="loginEmail">Email:</label>
  <div class="input-group">
    <div class="input-group-prepend">
      <!-- Use the FontAwesome envelope icon -->
      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
    </div>
    <input type="email" class="form-control" id="loginEmail" name="loginEmail" required>
  </div>
  <div class="error-msg" id="loginEmailError"></div>
</div>
            
<div class="form-group">
  <label for="loginPassword">Password:</label>
  <div class="input-group">
    <div class="input-group-prepend">
      <!-- Use the FontAwesome lock icon -->
      <span class="input-group-text"><i class="fas fa-lock"></i></span>
    </div>
    <input type="password" class="form-control" id="loginPassword" name="loginPassword" required>
  </div>
  <div class="error-msg" id="loginPasswordError"></div>
</div>

            <button type="submit" class="btn btn-primary submit-btn">Login</button>
            <p class="text-center">Don't have an account? <a href="registeration.php">Sign Up</a></p>
  
          </form>
        </div>
      </div>
      
      <!-- End Login Form Column -->
    </div>
  </div>
   
   <?php include 'footer.php'; ?>

  <script>
    function validateLoginForm() {
      var loginEmail = document.getElementById('loginEmail').value;
      var loginPassword = document.getElementById('loginPassword').value;

      // Validate Login Email (Format)
      var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!loginEmail.match(emailPattern)) {
        document.getElementById('loginEmailError').innerHTML = 'Please enter a valid email address.';
        return false;
      } else {
        document.getElementById('loginEmailError').innerHTML = '';
      }

      // Validate Login Password (Not empty)
      if (loginPassword.trim() === '') {
        document.getElementById('loginPasswordError').innerHTML = 'Please enter your password.';
        return false;
      } else {
        document.getElementById('loginPasswordError').innerHTML = '';
      }

      // Other field validations can be added here if needed

      return true;
    }
  </script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.25.0/dist/bootstrap-icons.min.js"></script>
</body>
</html>
