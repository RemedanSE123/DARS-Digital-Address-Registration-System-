<?php
// super_user_control.php

// Start the session (make sure this is called before any output)
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

// Check if the user has clearance (is_super_admin = 2) to access this page
if ($_SESSION["isSuperAdmin"] !== 2) {
  echo "You don't have clearance to access this page.";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Head content (same as before) -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <style>

.container2 {
      margin-top: 80px;
      margin-bottom: 80px;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      background-color: #f5f5f5;
      margin-left: 100px;
      max-width: 1250px;
      margin-right: 50px;
    }
    .container2 h1 {
      text-align: center;
      color: firebrick;
      margin-bottom: 20px;
    }
    .container2 p {
      text-align: center;
      margin-bottom: 10px;
    }
   
    </style>
  
</head>
<body>
  <!-- Include the navbar (if you have one) -->
  <?php include 'Admin_headerold.php'; ?>
  <?php include 'sidebar.php'; ?>

  <div class="main">
      <div class="container2">
      <h1>User Management </h1>
        <table class="table table-striped">
            <thead>
              <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Date of Birth</th>
                <th>Sex</th>
                <th>Occupation</th>
                <th>Education Level</th>
                
                <th>Is  Admin</th>
                <th>Action</th> <!-- Column to allow Super Admin to change roles -->
              </tr>
            </thead>
            <tbody>
              <?php
              // Fetch data from the users table
              $sql = "SELECT * FROM users";
              $result = $conn->query($sql);

              // Fetch the currently logged-in user data separately
              $loggedInUserEmail = $_SESSION["loginEmail"];
              $sqlLoggedInUser = "SELECT * FROM users WHERE email = ?";
              $stmtLoggedInUser = $conn->prepare($sqlLoggedInUser);
              $stmtLoggedInUser->bind_param("s", $loggedInUserEmail);
              $stmtLoggedInUser->execute();
              $resultLoggedInUser = $stmtLoggedInUser->get_result();

              // Display the data in HTML table rows for the logged-in user
              if ($resultLoggedInUser->num_rows === 1) {
                $rowLoggedInUser = $resultLoggedInUser->fetch_assoc();
                echo '<tr>
                        <td>' . $rowLoggedInUser["full_name"] . '</td>
                        <td>' . $rowLoggedInUser["email"] . '</td>
                        <td>' . $rowLoggedInUser["date_of_birth"] . '</td>
                        <td>' . $rowLoggedInUser["sex"] . '</td>
                        <td>' . $rowLoggedInUser["occupation"] . '</td>
                        <td>' . $rowLoggedInUser["education_level"] . '</td>
                        
                        <td>' . ($rowLoggedInUser["is_super_admin"] ? "Yes" : "No") . '</td>
                        <td><a href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/change_role.php?user_id=' . $rowLoggedInUser["id"] . '">Change Role</a></td>
                      </tr>';
              }

              // Continue to fetch and display the data for other users
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  // Display all user data, except for the current logged-in user
                  if ($row["email"] !== $_SESSION["loginEmail"]) {
                    echo '<tr>
                            <td>' . $row["full_name"] . '</td>
                            <td>' . $row["email"] . '</td>
                            <td>' . $row["date_of_birth"] . '</td>
                            <td>' . $row["sex"] . '</td>
                            <td>' . $row["occupation"] . '</td>
                            <td>' . $row["education_level"] . '</td>
                            
                            <td>' . ($row["is_super_admin"] ? "Yes" : "No") . '</td>
                            <td><a href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/change_role.php?user_id=' . $row["id"] . '">Promot to Admin</a></td>
                          </tr>';
                  }
                }
              } else {
                echo '<tr>
                        <td colspan="9">No users found.</td>
                      </tr>';
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
   

  <!-- Include the footer (if you have one) -->
  <?php include 'footer.php'; ?>

</body>
</html>
