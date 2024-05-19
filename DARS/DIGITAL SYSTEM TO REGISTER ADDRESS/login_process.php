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
  $stmt = $conn->prepare("SELECT id, email, password, is_super_admin, full_name, userimage FROM users WHERE email = ?");
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
      $_SESSION['userImage'] = $row['userimage'];
      $_SESSION['fullName'] = $row['full_name'];

      if ($row['is_super_admin'] === 0) {
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

        // Retrieve the user's image path from the users table
        $email = $_SESSION['loginEmail'];
        $query = "SELECT userimage FROM users WHERE email = '$email'";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $_SESSION['userImage'] = $row['userimage'];
        } else {
          // Handle error if user's image path is not found
          $_SESSION['userImage'] = 'default_image.jpg'; // Set a default image path if needed
        }

        $conn->close();

        header("Location: crud.php"); // Redirect to user contribution page
        exit;
      }
      elseif ($row['is_super_admin'] === 1 || $row['is_super_admin'] === 2) {
        $_SESSION['loginEmail'] = $loginEmail;

        header("Location: Admin/index2.php"); // Redirect to admin dashboard
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
