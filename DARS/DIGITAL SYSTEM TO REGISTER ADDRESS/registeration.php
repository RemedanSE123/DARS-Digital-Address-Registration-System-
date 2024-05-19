<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Add FontAwesome stylesheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    /* Same CSS styles as before */
    body {
      background-image: url("image/bng1.avif");
      background-size: cover;
      background-repeat: no-repeat;
    }
    .registration-form {
  border-radius: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  padding: 20px;
  margin-top: 100px;
  background-color: #f5f5f5;
  margin-bottom: 50px;
}

.form-group {
  margin-bottom: 25px;
}

.form-group label {
  font-weight: bold;
  color: #333;
}

.form-control {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  width: 100%;
  transition: border-color 0.2s ease-in-out;
}

.form-control:focus {
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.7);
  border-color: #007bff;
}

.form-check-label {
  margin-right: 15px;
  color: #555;
}

.submit-btn {
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease-in-out;
}

.submit-btn:hover {
  background-color: #0056b3;
}

.error-msg {
  color: #dc3545;
  font-size: 14px;
  margin-top: 5px;
}
.signup{
  
      text-align: center;
      font-size: 34px;
      font-weight: bold;
      color: #007bff;
      margin-bottom: 30px;
    
}
  </style>
  <script>
    // JavaScript validation for the form
    function validateForm() {
      var fullName = document.getElementById('fullName').value;
      var email = document.getElementById('email').value;
      var password = document.getElementById('password').value;
      var confirmPassword = document.getElementById('confirmPassword').value;
      var dob = document.getElementById('dob').value;
      var educationLevel = document.getElementById('educationLevel').value;
      var occupation = document.getElementById('occupation').value;

      // Validate Full Name (Not empty)
      if (fullName.trim() === '') {
        document.getElementById('fullNameError').innerHTML = 'Please enter your Full Name.';
        return false;
      } else {
        document.getElementById('fullNameError').innerHTML = '';
      }

      // Validate Email (Format)
      var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!email.match(emailPattern)) {
        document.getElementById('emailError').innerHTML = 'Please enter a valid email address.';
        return false;
      } else {
        document.getElementById('emailError').innerHTML = '';
      }

      // Validate Password (At least 6 characters, at least one uppercase, one lowercase, one number, and one special character)
      var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
      if (!password.match(passwordPattern)) {
        document.getElementById('passwordError').innerHTML = 'Password must be at least 6 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.';
        return false;
      } else {
        document.getElementById('passwordError').innerHTML = '';
      }

      // Validate Confirm Password (Must match Password)
      if (password !== confirmPassword) {
        document.getElementById('confirmPasswordError').innerHTML = 'Passwords do not match.';
        return false;
      } else {
        document.getElementById('confirmPasswordError').innerHTML = '';
      }
      if (!userImageInput.value.match(allowedExtensions)) {
    alert("Please select a valid image file (.png, .jpg, .jpeg).");
    userImageInput.value = ""; // Clear the input field
    return false;
  }
      // Other field validations can be added here if needed

      return true;
    }
  </script>
</head>
<body>
   <!-- Include the navbar -->
   <?php include 'navbar.php'; ?>
  <div class="container">
    <div class="row justify-content-center">
      <!-- Form Column -->
      <div class="col-lg-8">
        <div class="registration-form">
          <h2 class="signup">Sign-UP</h2>
          <form action="registration_process.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm();">

            <!-- First Row -->
            <!-- Full Name field row -->
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="fullName"><i class="fas fa-user"></i> Full Name:</label>
                <input type="text" class="form-control" id="fullName" name="fullName" required>
                <div class="error-msg" id="fullNameError"></div>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <div class="error-msg" id="emailError"></div>
              </div>
            </div>

            <!-- Third Row -->
            <!-- Date of Birth field row -->
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="dob">Date of Birth:</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
                <div class="error-msg" id="dobError"></div>
              </div>
              <div class="form-group col-md-6">
                <label for="sex">Sex:</label>
                <select class="form-control" id="sex" name="sex" required>
                  <option value="">Select Sex</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>

            <!-- Fourth Row -->
            <!-- Occupation field row -->
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="occupation">Occupation:</label>
                <input type="text" class="form-control" id="occupation" name="occupation" required>
                <div class="error-msg" id="occupationError"></div>
              </div>

              <div class="form-group col-md-6">
                <label for="educationLevel">Education Level:</label>
                <select class="form-control" id="educationLevel" name="educationLevel" required>
                  <option value="">Select Education Level</option>
                  <option value="High School">High School</option>
                  <option value="College/University">College/University</option>
                  <option value="Postgraduate">Postgraduate</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <div class="error-msg" id="passwordError"></div>
              </div>

              <div class="form-group col-md-6">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                <div class="error-msg" id="confirmPasswordError"></div>
              </div>

              <div class="form-group">
    <label for="userimage">User Image:</label>
    <input type="file" class="form-control-file" id="userimage" name="userimage" accept=".png,.jpg,.jpeg" required>
  </div>
          
          </div>
            </div>

            <button type="submit" class="btn btn-primary submit-btn" id="submitBtn" onclick="return validateForm();">Register</button>
          </form>
        </div>
      </div>
      <!-- End Form Column -->
    </div>
  </div>
  
  <!-- Include the footer -->
  <?php include 'footer.php'; ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
