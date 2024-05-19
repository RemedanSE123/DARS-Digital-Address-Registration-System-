<?php
// Database credentials
$hostname = 'localhost';
$username = 'root';
$password_db = '';
$database = 'registration';

// Create a connection to the database
$conn = new mysqli($hostname, $username, $password_db, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the zone ID is provided
if (isset($_GET['zone_id'])) {
    $zoneId = $_GET['zone_id'];

    // Fetch the zone data from the database
    $sql = "SELECT * FROM zone WHERE zone_id = $zoneId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $zoneName = $row['zone_name'];
        $zoneMap = $row['zone_map'];
        $description = $row['description'];
    } else {
        echo "Zone not found";
        exit;
    }
} else {
    echo "Zone ID not provided";
    exit;
}

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedZoneName = $_POST['zone_name'];
    $updatedZoneMap = $_FILES['zone_map']['name'];
    $updatedDescription = $_POST['description'];

    // Check if a new zone map is uploaded
    if (!empty($updatedZoneMap)) {
        $tempFile = $_FILES['zone_map']['tmp_name'];
        $targetPath = 'uploads/';
        $targetFile = $targetPath . $_FILES['zone_map']['name'];

        // Move the uploaded file to the target location
        if (move_uploaded_file($tempFile, $targetFile)) {
            // Update the zone with the new data including the zone map
            $sql = "UPDATE zone SET zone_name = '$updatedZoneName', zone_map = '$targetFile', description = '$updatedDescription' WHERE zone_id = $zoneId";
        } else {
            echo "Error uploading zone map";
            exit;
        }
    } else {
        // Update the zone with the new data excluding the zone map
        $sql = "UPDATE zone SET zone_name = '$updatedZoneName', description = '$updatedDescription' WHERE zone_id = $zoneId";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: /DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/displayzones.php?region_id=" . $row['region_id']); // Redirect to displayzones.php
        exit;
    } else {
        echo "Error updating zone: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap-5.3.0-dist/bootstrap-5.3.0-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <title>Edit Zone</title>
  <style>
    /* Your CSS styles here */
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
  </style>
</head>
<body>
  <div class="navbar">
    <?php include 'Admin_header.php'; ?>
  </div>

  <div class="content">
    <div class="sidebar">
      <?php include 'Sidebar.php'; ?>
    </div>
    <div class="main">
      <div class="container2">
        <h1>Edit Zone</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?zone_id=' . $zoneId; ?>" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="zone_name" class="form-label">Zone Name</label>
            <input type="text" class="form-control" id="zone_name" name="zone_name" value="<?php echo $zoneName; ?>">
          </div>
          <div class="mb-3">
            <label for="zone_map" class="form-label">Zone Map</label>
            <input type="file" class="form-control" id="zone_map" name="zone_map">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"><?php echo $description; ?></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Update Zone</button>
        </form>
      </div>
    </div>
  </div>

  <div class="footer">
    <?php include 'Footer.php'; ?>
  </div>

  <script src="bootstrap-5.3.0-dist/bootstrap-5.3.0-dist/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
