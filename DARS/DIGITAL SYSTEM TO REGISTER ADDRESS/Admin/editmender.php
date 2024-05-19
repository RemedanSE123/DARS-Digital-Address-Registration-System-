<?php
// Check if the mender ID is provided
if (isset($_GET['mender_id'])) {
    $menderId = $_GET['mender_id'];

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

    // Fetch the mender data from the database
    $sql = "SELECT * FROM mender WHERE mender_id = $menderId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $menderName = $row['mender_name'];
        $menderMap = $row['mender_map'];
        $description = $row['description'];
    } else {
        echo "Mender not found";
        exit;
    }

    // Process the form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $updatedMenderName = $_POST['mender_name'];
        $updatedMenderMap = $_FILES['mender_map']['name'];
        $updatedDescription = $_POST['description'];

        // Check if a new mender map is uploaded
        if (!empty($updatedMenderMap)) {
            $tempFile = $_FILES['mender_map']['tmp_name'];
            $targetPath = 'uploads/';
            $targetFile = $targetPath . $_FILES['mender_map']['name'];

            // Move the uploaded file to the target location
            if (move_uploaded_file($tempFile, $targetFile)) {
                // Update the mender with the new data including the mender map
                $sql = "UPDATE mender SET mender_name = '$updatedMenderName', mender_map = '$targetFile', description = '$updatedDescription' WHERE mender_id = $menderId";
            } else {
                echo "Error uploading mender map";
                exit;
            }
        } else {
            // Update the mender with the new data excluding the mender map
            $sql = "UPDATE mender SET mender_name = '$updatedMenderName', description = '$updatedDescription' WHERE mender_id = $menderId";
        }

        if ($conn->query($sql) === TRUE) {
            header("Location: /DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/displaymender.php?kebela_id=" . $row['kebela_id'] . "&worda_id=" . $row['worda_id'] . "&region_id=" . $row['region_id']); // Redirect to displaymender.php
            exit;
        } else {
            echo "Error updating mender: " . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Mender ID not provided";
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

    <title>Edit Mender</title>
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
                <h1>Edit Mender</h1>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?mender_id=' . $menderId; ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="mender_name" class="form-label">Mender Name</label>
                        <input type="text" class="form-control" id="mender_name" name="mender_name" value="<?php echo $menderName; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="mender_map" class="form-label">Mender Map</label>
                        <input type="file" class="form-control" id="mender_map" name="mender_map">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"><?php echo $description; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Mender</button>
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
