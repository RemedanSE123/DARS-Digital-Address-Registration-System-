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

if (isset($_POST['regionId'])) {
  $regionId = $_POST['regionId'];

  $zones = [];
  $sql = "SELECT * FROM zone WHERE region_id = '$regionId'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $zones[] = $row;
    }
  }

  // Generate HTML options for the zones
  $html = '<option value="" disabled selected>Nou u can select Zone</option>';
  foreach ($zones as $zone) {
    $html .= '<option value="' . $zone['zone_id'] . '">' . $zone['zone_name'] . '</option>';
  }

  echo $html;
}

// Close the database connection
$conn->close();
?>
