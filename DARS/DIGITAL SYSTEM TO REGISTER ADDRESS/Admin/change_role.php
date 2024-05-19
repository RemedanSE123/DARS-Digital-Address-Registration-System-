<?php
// change_role.php

// Start the session and check if the user is logged in
session_start();


// Include the database connection code
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

// Check if the user ID is provided in the URL
if (isset($_GET["user_id"])) {
  $userId = $_GET["user_id"];

  // Fetch the user record from the database based on the user ID
  $sql = "SELECT * FROM users WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $userId);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    // User record found, update the is_super_admin status to 1 (promote to Admin)
    $sqlUpdate = "UPDATE users SET is_super_admin = 1 WHERE id = ?";
    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bind_param("i", $userId);

    if ($stmtUpdate->execute()) {
      // Role changed successfully, redirect back to the super_user_control.php page
      $_SESSION['successMessage'] = "Successfully promoted to Admin.";
      header("Location: super_user_control.php");
      exit;
    } else {
      // Handle the error if the role change fails
      echo "Error updating role: " . $stmtUpdate->error;
    }
  } else {
    // User record not found, show an error message
    echo "User not found.";
  }
}

// If user ID is not provided or the update fails, redirect back to the super_user_control.php page with an error message
header("Location: super_user_control.php?error=1");
exit;
?>
