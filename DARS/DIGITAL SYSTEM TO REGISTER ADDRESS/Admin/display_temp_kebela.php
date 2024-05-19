<?php
session_start();

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

// Handle approval and decline actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['approve'])) {
    $kebela_id = $_POST['kebela_id'];

    // Fetch the kebela data from temp_kebela table
    $sql = "SELECT * FROM temp_kebela WHERE kebela_id = $kebela_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();

      // Get the region, zone, and worda IDs
      $region_id = $row['region_id'];
      $zone_id = $row['zone_id'];
      $worda_id = $row['worda_id'];
      $kebela_name = $row['kebela_name'];
      $kebela_map = $row['kebela_map'];
      $description = $row['description'];
      $recorded_by = $row['recorded_by'];

      // Insert the kebela data into kebela table
      $sql_insert = "INSERT INTO kebela (region_id, zone_id, worda_id, kebela_name, kebela_map, description, recorded_by) 
                     VALUES ('$region_id', '$zone_id', '$worda_id', '$kebela_name', '$kebela_map', '$description', '$recorded_by')";

      if ($conn->query($sql_insert) === TRUE) {
        // Delete the kebela data from temp_kebela table
        $sql_delete = "DELETE FROM temp_kebela WHERE kebela_id = $kebela_id";
        if ($conn->query($sql_delete) === TRUE) {
          echo "Kebela approved and moved to the main Kebela table.";
        } else {
          echo "Error deleting approved kebela from temp_kebela table: " . $conn->error;
        }
      } else {
        echo "Error inserting kebela into Kebela table: " . $conn->error;
      }
    }
  } elseif (isset($_POST['decline'])) {
    $kebela_id = $_POST['kebela_id'];

    // Delete the mender data from temp_mender table
    $sql_delete = "DELETE FROM temp_kebela WHERE kebela_id = $kebela_id";
    if ($conn->query($sql_delete) === TRUE) {
      echo "kebela declined and removed from the temp mender table.";
    } else {
      echo "Error deleting kebela from temp_kebela table: " . $conn->error;
    }
  }
}
// Fetch data from the temp_kebela table
$sql = "SELECT * FROM temp_kebela";
$result = $conn->query($sql);
// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    .image-width {
      width: 50px;
      height: auto;
    }
    .container2 {
      margin-top: 50px;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      background-color: #f5f5f5;
      margin-left: 100px;
      max-width: 1250px;
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
    .selected-region {
      margin-top: 10px;
      font-size: 18px;
      list-style-type: none;
      font-weight: bold;
      font-family: Arial, sans-serif;
    }
    .selected-region li {
      padding-left: 20px;
      text-indent: -15px;
      font-family: Arial, sans-serif;
      background-color: darkgray;
    }
    .bullet {
      font-size: 18px;
    }
  </style>
  <!-- Head section code here -->
</head>
<body>
  <div class="navbar">
    <?php include 'ADMINH.php'; ?>
  </div>

  <div class="content">
    <div class="sidebar">
      <?php include 'Sidebar.php'; ?>
    </div>
    <div class="main">
      <div class="container2">
        <h1>Contributed Kebelas</h1>

        <!-- Contributed Kebelas Table -->
        <table class="table table-striped">
  <thead>
    <tr>
      
      <th>Worda ID</th>
      <th>Kebela Name</th>
      <th>Map</th>
      <th>Description</th>
      <th>recorded by</th>
      <th>recorded time</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>'.$row["worda_id"].'</td> <!-- Display Worda ID -->
                <td>'.$row["kebela_name"].'</td>
                <td><img src="'.$row["kebela_map"].'" alt="Map" class="image-width"></td>
                <td>'.$row["description"].'</td>
                <td>'.$row["recorded_by"].'</td>
                <td>'.$row["recorded_time"].'</td>
                
                
                <td>
                <form method="post">
                <input type="hidden" name="kebela_id" value="'.$row["kebela_id"].'">
                <input type="hidden" name="worda_id" value="'.$row["worda_id"].'"> <!-- Add Worda ID -->
                <button type="submit" class="btn btn-success" name="approve" onclick="return confirmAction(\'approve\')">Approve</button>
                <button type="submit" class="btn btn-danger" name="decline" onclick="return confirmAction(\'decline\')">Decline</button>
              </form>
                </td>
              </tr>';
      }
    } else {
      echo '<tr>
              <td colspan="8">No contributed kebelas found.</td>
            </tr>';
    }
    ?>
  </tbody>
</table>
      </div>
    </div>
  </div>
  
  <div class="footer">
    <?php include 'Footer.php'; ?>
  </div>
  <script>
  function confirmAction(action) {
    var confirmationMessage;
    if (action === 'approve') {
      confirmationMessage = 'Are you sure you want to approve this Kebela?';
    } else if (action === 'decline') {
      confirmationMessage = 'Are you sure you want to decline this Kebela?';
    } else {
      return false;
    }

    return confirm(confirmationMessage);
  }
</script>
</body>
</html>
