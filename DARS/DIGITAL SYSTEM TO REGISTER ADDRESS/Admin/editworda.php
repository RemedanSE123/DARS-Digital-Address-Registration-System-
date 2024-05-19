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

// Check if the worda ID is provided
if (isset($_GET['worda_id'])) {
    $wordaId = $_GET['worda_id'];

    // Fetch the worda data from the database
    $sql = "SELECT * FROM worda WHERE worda_id = $wordaId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $wordaName = $row['worda_name'];
        $wordaMap = $row['map'];
        $description = $row['description'];
    } else {
        echo "Worda not found";
        exit;
    }
} else {
    echo "Worda ID not provided";
    exit;
}

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedWordaName = $_POST['worda_name'];
    $updatedWordaMap = $_FILES['worda_map']['name'];
    $updatedDescription = $_POST['description'];

    // Check if a new worda map is uploaded
    if (!empty($updatedWordaMap)) {
        $tempFile = $_FILES['worda_map']['tmp_name'];
        $targetPath = 'uploads/';
        $targetFile = $targetPath . $_FILES['worda_map']['name'];

        // Move the uploaded file to the target location
        if (move_uploaded_file($tempFile, $targetFile)) {
            // Update the worda with the new data including the worda map
            $sql = "UPDATE worda SET worda_name = '$updatedWordaName', map = '$targetFile', description = '$updatedDescription' WHERE worda_id = $wordaId";
        } else {
            echo "Error uploading worda map";
            exit;
        }
    } else {
        // Update the worda with the new data excluding the worda map
        $sql = "UPDATE worda SET worda_name = '$updatedWordaName', description = '$updatedDescription' WHERE worda_id = $wordaId";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: /DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/displayworda.php? worda_id=$wordaId&zone_id=" . $row['zone_id']); // Redirect to displaykebela.php
        exit;
    } else {
        echo "Error updating worda: " . $conn->error;
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

  <title>Edit Worda</title>
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
        <h1>Edit Worda</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?worda_id=' . $wordaId; ?>" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="worda_name" class="form-label">Worda Name</label>
            <input type="text" class="form-control" id="worda_name" name="worda_name" value="<?php echo $wordaName; ?>">
          </div>
          <div class="mb-3">
            <label for="worda_map" class="form-label">Worda Map</label>
            <input type="file" class="form-control" id="worda_map" name="worda_map">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"><?php echo $description; ?></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Update Worda</button>
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
