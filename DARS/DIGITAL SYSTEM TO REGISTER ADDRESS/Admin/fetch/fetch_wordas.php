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

if (isset($_POST['zoneId'])) {
  $zoneId = $_POST['zoneId'];

  $wordas = [];
  $sql = "SELECT * FROM worda WHERE zone_id = '$zoneId'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $wordas[] = $row;
    }
  }

  // Generate HTML options for the wordas
  $html = '<option value="" disabled selected>Nou u can select Worda</option>';
  foreach ($wordas as $worda) {
    $html .= '<option value="' . $worda['worda_id'] . '">' . $worda['worda_name'] . '</option>';
  }

  echo $html;
}

// Close the database connection
$conn->close();
?>
