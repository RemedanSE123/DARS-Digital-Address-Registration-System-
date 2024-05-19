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
    $house_no_id = $_POST['house_no_id'];

    // Fetch the house data from temp_house_no table
    $sql = "SELECT * FROM temp_house_no WHERE house_no_id = $house_no_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();

      // Get the necessary data from the temp_house_no table
      $worda_id = $row['worda_id'];
      $kebela_id = $row['kebela_id'];
      $mender_id = $row['mender_id'];
      $house_no = $row['house_no'];
      $description = $row['description'];
      $recorded_by = $row['recorded_by'];

      // Insert the house data into house_no table
      $sql_insert = "INSERT INTO house_no (worda_id, kebela_id, mender_id, house_no, description, recorded_by) 
                     VALUES ('$worda_id', '$kebela_id', '$mender_id', '$house_no', '$description', '$recorded_by')";

      if ($conn->query($sql_insert) === TRUE) {
        // Delete the house data from temp_house_no table
        $sql_delete = "DELETE FROM temp_house_no WHERE house_no_id = $house_no_id";
        if ($conn->query($sql_delete) === TRUE) {
          echo "House number approved and moved to the main house_no table.";
        } else {
          echo "Error deleting approved house number from temp_house_no table: " . $conn->error;
        }
      } else {
        echo "Error inserting house number into house_no table: " . $conn->error;
      }
    }
  } elseif (isset($_POST['decline'])) {
    $house_no_id = $_POST['house_no_id'];

    // Delete the house data from temp_house_no table
    $sql_delete = "DELETE FROM temp_house_no WHERE house_no_id = $house_no_id";
    if ($conn->query($sql_delete) === TRUE) {
      echo "House number declined and removed from the temporary table.";
    } else {
      echo "Error declining house number: " . $conn->error;
    }
  }
}

// Fetch data from the temp_house_no table
$sql = "SELECT * FROM temp_house_no WHERE 1";
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
        <h1>Contributed House Numbers</h1>

        <!-- Contributed House Numbers Table -->
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Mender ID</th>
              <th>House Number</th>
              <th>House Map</th>
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
                        <td>' . $row["mender_id"] . '</td>
                        <td>' . $row["house_no"] . '</td>
                        <td><img src="' . $row["map"] . '" alt="House Map" class="image-width"></td>
                        <td>' . $row["description"] . '</td>
                        <td>'.$row["recorded_by"].'</td>
                        <td>'.$row["recorded_time"].'</td>
                        <td>
                        <form method="post">
                        <input type="hidden" name="house_no_id" value="'.$row["house_no_id"].'">
                        <button type="submit" class="btn btn-success" name="approve" onclick="return confirmAction(\'approve\')">Approve</button>
                        <button type="submit" class="btn btn-danger" name="decline" onclick="return confirmAction(\'decline\')">Decline</button>
                      </form>
                        </td>
                      </tr>';
              }
            } else {
              echo '<tr>
                      <td colspan="5">No contributed house numbers found.</td>
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
      confirmationMessage = 'Are you sure you want to approve this House Number?';
    } else if (action === 'decline') {
      confirmationMessage = 'Are you sure you want to decline this House Number?';
    } else {
      return false;
    }

    return confirm(confirmationMessage);
  }
</script>
</body>
</html>
