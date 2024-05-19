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
    $zone_id = $_POST['zone_id'];

    // Fetch the zone data from temp_zone table
    $sql = "SELECT * FROM temp_zone WHERE zone_id = $zone_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();

      // Insert the zone data into zone table
      $zone_name = $row['zone_name'];
      $region_id = $row['region_id'];
      $zone_map = $row['zone_map'];
      $description = $row['description'];
      $recorded_by = $row['recorded_by'];

      $sql_insert = "INSERT INTO zone (zone_name, region_id, zone_map, description, recorded_by)
      VALUES ('$zone_name', '$region_id', '$zone_map', '$description', '$recorded_by')";
      if ($conn->query($sql_insert) === TRUE) {
        // Delete the zone data from temp_zone table
        $sql_delete = "DELETE FROM temp_zone WHERE zone_id = $zone_id";
        $conn->query($sql_delete);
        echo "Zone approved and moved to the main Zone table.";
      } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
      }
    }
  } elseif (isset($_POST['decline'])) {
    $zone_id = $_POST['zone_id'];

    // Delete the zone data from temp_zone table
    $sql_delete = "DELETE FROM temp_zone WHERE zone_id = $zone_id";
    if ($conn->query($sql_delete) === TRUE) {
      echo "Zone declined and removed from the temp Zone table.";
    } else {
      echo "Error: " . $sql_delete . "<br>" . $conn->error;
    }
  }
}

// Fetch data from the temp_zone table
$sql = "SELECT * FROM temp_zone";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!-- The rest of the HTML code remains the same -->

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Head section code here -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  
  <title>Display Temp Zones</title>
  <style>
    /* Add your custom CSS styles here */
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
    <h1>Temp Zones</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Zone Name</th>
          <th>Region ID</th>
          <th>Zone Map</th>
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
                    <td>'.$row["zone_name"].'</td>
                    <td>'.$row["region_id"].'</td>
                    <td><img src="'.$row["zone_map"].'" alt="Zone Map" class="image-width"></td>
                    <td>'.$row["description"].'</td>
                    <td>'.$row["recorded_by"].'</td>
                        <td>'.$row["recorded_time"].'</td>
                    <td>
                    <form method="post">
                    <input type="hidden" name="zone_id" value="'.$row["zone_id"].'">
                    <button type="submit" class="btn btn-success" name="approve" onclick="return confirmAction(\'approve\')">Approve</button>
                    <button type="submit" class="btn btn-danger" name="decline" onclick="return confirmAction(\'decline\')">Decline</button>
                  </form>
                    </td>
                  </tr>';
          }
        } else {
          echo '<tr>
                  <td colspan="5">No temp zones found.</td>
                </tr>';
        }
        ?>
      </tbody>
    </table>
      </div>
    </div>
  </div>
  
  </div><div class="footer">
    <?php include 'Footer.php'; ?>
  </div>
  <script>
  function confirmAction(action) {
    var confirmationMessage;
    if (action === 'approve') {
      confirmationMessage = 'Are you sure you want to approve this zone?';
    } else if (action === 'decline') {
      confirmationMessage = 'Are you sure you want to decline this zone?';
    } else {
      return false;
    }

    return confirm(confirmationMessage);
  }
</script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
