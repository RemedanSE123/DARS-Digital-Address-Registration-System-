<?php
// Check if the kebela_id parameter is provided
if (isset($_GET['kebela_id'])) {
    $kebelaId = $_GET['kebela_id'];

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

    // Fetch the kebela data from the database
    $kebelaSql = "SELECT * FROM kebela WHERE kebela_id = ?";
    $kebelaStmt = $conn->prepare($kebelaSql);
    $kebelaStmt->bind_param("i", $kebelaId);
    $kebelaStmt->execute();
    $kebelaResult = $kebelaStmt->get_result();

    if ($kebelaResult->num_rows === 1) {
        $kebelaRow = $kebelaResult->fetch_assoc();
        $wordaId = $kebelaRow['worda_id'];
        $regionId = $kebelaRow['region_id'];
        $kebelaName = $kebelaRow['kebela_name'];
        $kebelaMap = $kebelaRow['kebela_map'];
        $description = $kebelaRow['description'];
    } else {
        echo "Kebela not found";
        exit;
    }

    // Process the form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $updatedKebelaName = $_POST['kebela_name'];
        $updatedKebelaMap = $_FILES['kebela_map']['name'];
        $updatedDescription = $_POST['description'];

        // Check if a new kebela map is uploaded
        if (!empty($updatedKebelaMap)) {
            $tempFile = $_FILES['kebela_map']['tmp_name'];
            $targetPath = 'uploads/';
            $targetFile = $targetPath . $_FILES['kebela_map']['name'];

            // Move the uploaded file to the target location
            if (move_uploaded_file($tempFile, $targetFile)) {
                // Update the kebela with the new data including the kebela map
                $sql = "UPDATE kebela SET kebela_name = ?, kebela_map = ?, description = ? WHERE kebela_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssi", $updatedKebelaName, $targetFile, $updatedDescription, $kebelaId);
            } else {
                echo "Error uploading kebela map";
                exit;
            }
        } else {
            // Update the kebela with the new data excluding the kebela map
            $sql = "UPDATE kebela SET kebela_name = ?, description = ? WHERE kebela_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $updatedKebelaName, $updatedDescription, $kebelaId);
        }

        if ($stmt->execute()) {
            header("Location: /DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/displaykebela.php?worda_id=$wordaId&region_id=$regionId"); // Redirect to displaykebela.php
            exit;
        } else {
            echo "Error updating kebela: " . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Kebela ID not provided";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap-5.3.0-dist/bootstrap-5.3.0-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <title>Edit Kebela</title>
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
        <h1>Edit Kebela</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?kebela_id=' . $kebelaId; ?>" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="kebela_name" class="form-label">Kebela Name</label>
            <input type="text" class="form-control" id="kebela_name" name="kebela_name" value="<?php echo $kebelaName; ?>">
          </div>
          <div class="mb-3">
            <label for="kebela_map" class="form-label">Kebela Map</label>
            <input type="file" class="form-control" id="kebela_map" name="kebela_map">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"><?php echo $description; ?></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Update Kebela</button>
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
