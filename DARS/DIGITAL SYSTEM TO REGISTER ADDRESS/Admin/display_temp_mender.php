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
    $mender_id = $_POST['mender_id'];

    // Fetch the mender data from temp_mender table
    $sql = "SELECT * FROM temp_mender WHERE mender_id = $mender_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();

      // Get the necessary data from the temp_mender table
      $region_id = $row['region_id'];
      $zone_id = $row['zone_id'];
      $worda_id = $row['worda_id'];
      $kebela_id = $row['kebela_id'];
      $mender_name = $row['mender_name'];
      $mender_map = $row['mender_map'];
      $description = $row['description'];
      $recorded_by = $row['recorded_by'];

      // Insert the mender data into mender table
      $sql_insert = "INSERT INTO mender (region_id, zone_id, worda_id, kebela_id, mender_name, mender_map, description, recorded_by) 
      VALUES ('$region_id', '$zone_id', '$worda_id', '$kebela_id', '$mender_name', '$mender_map', '$description', '$recorded_by')";

      if ($conn->query($sql_insert) === TRUE) {
        // Delete the mender data from temp_mender table
        $sql_delete = "DELETE FROM temp_mender WHERE mender_id = $mender_id";
        $conn->query($sql_delete); // No need to check the return value

        echo "Mender approved and moved to the main Mender table.";
      } else {
        echo "Error inserting mender into Mender table: " . $conn->error;
      }
    }
  } elseif (isset($_POST['decline'])) {
    $mender_id = $_POST['mender_id'];

    // Delete the mender data from temp_mender table
    $sql_delete = "DELETE FROM temp_mender WHERE mender_id = $mender_id";
    if ($conn->query($sql_delete) === TRUE) {
      echo "Mender declined and removed from the temp mender table.";
    } else {
      echo "Error deleting mender from temp_mender table: " . $conn->error;
    }
  }
}
// Fetch data from the temp_kebela table
$sql = "SELECT * FROM temp_mender";
$result = $conn->query($sql);
// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    /* Add your custom styles here */
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
        <h1>Contributed Menders</h1>

        <!-- Contributed Menders Table -->
        <table class="table table-striped">
          <thead>
            <tr>
              <th>kebela ID</th>
              <th>Mender Name</th>
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
                        <td>' . $row["kebela_id"] . '</td> <!-- Display Kebela ID -->
                        <td>' . $row["mender_name"] . '</td>
                        <td><img src="' . $row["mender_map"] . '" alt="Map" class="image-width"></td>
                        <td>' . $row["description"] . '</td>
                        <td>'.$row["recorded_by"].'</td>
                        <td>'.$row["recorded_time"].'</td>
                        <td>
                        <form method="post">
                        <input type="hidden" name="worda_id" value="'.$row["worda_id"].'">
                        <input type="hidden" name="mender_id" value="'.$row["mender_id"].'">
                        <button type="submit" class="btn btn-success" name="approve" onclick="return confirmAction(\'approve\')">Approve</button>
                        <button type="submit" class="btn btn-danger" name="decline" onclick="return confirmAction(\'decline\')">Decline</button>
                      </form>
                        </td>
                      </tr>';
              }
            } else {
              echo '<tr>
                      <td colspan="5">No contributed menders found.</td>
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
      confirmationMessage = 'Are you sure you want to approve this Worda?';
    } else if (action === 'decline') {
      confirmationMessage = 'Are you sure you want to decline this Worda?';
    } else {
      return false;
    }

    return confirm(confirmationMessage);
  }
</script>
</body>
</html>
