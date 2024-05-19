<?php
// registration_process.php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate and sanitize form data
  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $userimage = $_FILES['userimage']['name']; 
  $dob = $_POST['dob'];
  $sex = $_POST['sex'];
  $occupation = $_POST['occupation'];
  $educationLevel = $_POST['educationLevel'];
  


 

    // File Upload Handling
    $userimagePath = '';
    if (!empty($_FILES['userimage']['tmp_name'])) {
      $userimagePath = 'Admin/uploads/' . basename($userimage);
      move_uploaded_file($_FILES['userimage']['tmp_name'], $userimagePath);
    }
  
  // Set default is_super_admin to 0 for all new users
  $isSuperAdmin = 0;

  // Check if the user is being promoted to admin or super admin
  if (isset($_POST['isSuperAdmin'])) {
    $isSuperAdminValue = intval($_POST['isSuperAdmin']);
    if ($isSuperAdminValue === 1 || $isSuperAdminValue === 2) {
      $isSuperAdmin = $isSuperAdminValue;
    }
  }

  // Hash the password for security
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

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

  // Prepare and execute the SQL query
  $stmt = $conn->prepare("INSERT INTO users (full_name, email, password, userimage, date_of_birth, sex, occupation, education_level, is_super_admin) 
  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

  $stmt->bind_param("ssssssssi", $fullName, $email, $hashedPassword, $userimagePath, $dob, $sex, $occupation, $educationLevel, $isSuperAdmin);

  if ($stmt->execute()) {
    // Registration successful, redirect to login.php
    header("Location: login.php");
    exit;
  } else {
    // Registration failed, handle the error as needed
    echo "Error: " . $stmt->error;
  }

  // Close the database connection
  $stmt->close();
  $conn->close();
}
?>
