<?php
session_start();

// Database credentials
$hostname = 'localhost'; // or the IP address of your MySQL server
$username = 'root';
$password_db = '';
$database = 'registration';

// Create a connection to the database
$conn = new mysqli($hostname, $username, $password_db, $database);

// Check if the connection was successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle approval and decline actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['approve'])) {
    $region_id = $_POST['region_id'];

    // Fetch the region data from temp_region table
    $sql = "SELECT * FROM temp_region WHERE region_id = $region_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();

      // Insert the region data into region table with recorded_by
      $region_name = $row['region_name'];
      $region_flag = $row['region_flag'];
      $region_map = $row['region_map'];
      $description = $row['description'];
      $recorded_by = $row['recorded_by'];

      $sql_insert = "INSERT INTO region (region_name, region_flag, region_map, description, recorded_by) 
                     VALUES ('$region_name', '$region_flag', '$region_map', '$description', '$recorded_by')";

      if ($conn->query($sql_insert) === TRUE) {
        // Delete the region data from temp_region table
        $sql_delete = "DELETE FROM temp_region WHERE region_id = $region_id";
        if ($conn->query($sql_delete) === TRUE) {
          echo "Region approved and moved to the main region table.";
        } else {
          echo "Error deleting approved region from temp_region table: " . $conn->error;
        }
      } else {
        echo "Error inserting region into region table: " . $conn->error;
      }
    }
  }  elseif (isset($_POST['decline'])) {
    $region_id = $_POST['region_id'];

    // Delete the region data from temp_region table
    $sql_delete = "DELETE FROM temp_region WHERE region_id = $region_id";
    if ($conn->query($sql_delete) === TRUE) {
      echo "Region declined and removed from the temporary region table.";
    } else {
      echo "Error declining region: " . $conn->error;
    }
  }
}

// Fetch data from the temp_region table with recorded_by and recorded_time columns
$sql = "SELECT temp_region.*, users.email AS recorded_by_email
        FROM temp_region
        LEFT JOIN users ON temp_region.recorded_by = users.id";
$result = $conn->query($sql);


// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>Contributed REGIONS</title>
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
  
<?php include 'ADMINH.php'; ?>
  <div class="content">
    <div class="sidebar">
      <?php include 'Sidebar.php'; ?>
    </div>
    
    <div class="main">
      <div class="container2">
        <h1>CONTRIBUTED REGIONS</h1>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Region ID</th>
              <th>Region Name</th>
              <th>Region Flag</th>
              <th>Region Map</th>
              <th>Description</th>
              <th>Recorded By</th>
              <th>Recorded Time</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '<tr>
                        <td>' . $row["region_id"] . '</td>
                        <td>' . $row["region_name"] . '</td>
                        <td><img src="' . $row["region_flag"] . '" alt="Region Flag" class="image-width"></td>
                        <td><img src="' . $row["region_map"] . '" alt="Region Map" class="image-width"></td>
                        <td>' . $row["description"] . '</td>
                        <td>' . $row["recorded_by"] . '</td>
                        <td>' . $row["recorded_time"] . '</td>
                        <td>
                        <form method="post">
                  <input type="hidden" name="region_id" value="' . $row["region_id"] . '">
                  <button type="submit" class="btn btn-success" name="approve" onclick="return confirmAction(\'approve\')">Approve</button>
                  <button type="submit" class="btn btn-danger" name="decline" onclick="return confirmAction(\'decline\')">Decline</button>
                </form>
                        </td>
                      </tr>';
              }
            } else {
              echo '<tr>
                      <td colspan="6">No regions found.</td>
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
      confirmationMessage = 'Are you sure you want to approve this region?';
    } else if (action === 'decline') {
      confirmationMessage = 'Are you sure you want to decline this region?';
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
