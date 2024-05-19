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

if (isset($_POST['kebelaId'])) {
  $kebelaId = $_POST['kebelaId'];

  $menders = [];
  $sql = "SELECT * FROM mender WHERE kebela_id = '$kebelaId'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $menders[] = $row;
    }
  }

  // Generate HTML options for the menders
  $html = '<option value="" disabled selected>Nou u can select mender</option>';
  foreach ($menders as $mender) {
    $html .= '<option value="' . $mender['mender_id'] . '">' . $mender['mender_name'] . '</option>';
  }

  echo $html;
}

// Close the database connection
$conn->close();
?>
