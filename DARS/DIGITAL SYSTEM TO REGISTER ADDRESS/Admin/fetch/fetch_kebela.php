<?php
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

if (isset($_POST['wordaId'])) {
  $wordaId = $_POST['wordaId'];

  $kebelas = [];
  $sql = "SELECT * FROM kebela WHERE worda_id = '$wordaId'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $kebelas[] = $row;
    }
  }

  // Generate HTML options for the kebelas
  $html = '<option value="" disabled selected>Nou u can select kebela</option>';
  foreach ($kebelas as $kebela) {
    $html .= '<option value="' . $kebela['kebela_id'] . '">' . $kebela['kebela_name'] . '</option>';
  }

  echo $html;
}

// Close the database connection
$conn->close();
?>
