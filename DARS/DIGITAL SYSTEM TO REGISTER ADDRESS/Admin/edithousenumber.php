<?php
// Check if the house number ID is provided
if (isset($_GET['house_no_id'])) {
    $houseNoId = $_GET['house_no_id'];

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

    // Fetch the house number data from the database
    $sql = "SELECT * FROM house_no WHERE house_no_id = $houseNoId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $houseNo = $row['house_no'];
        $houseMap = $row['house_map'];
        $description = $row['description'];
    } else {
        echo "House number not found";
        exit;
    }

    // Process the form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $updatedHouseNo = $_POST['house_no'];
        $updatedHouseMap = $_FILES['house_map']['name'];
        $updatedDescription = $_POST['description'];

        // Check if a new house map is uploaded
        if (!empty($updatedHouseMap)) {
            $tempFile = $_FILES['house_map']['tmp_name'];
            $targetPath = 'uploads/';
            $targetFile = $targetPath . $_FILES['house_map']['name'];

            // Move the uploaded file to the target location
            if (move_uploaded_file($tempFile, $targetFile)) {
                // Update the house number with the new data including the house map
                $sql = "UPDATE house_no SET house_no = '$updatedHouseNo', house_map = '$targetFile', description = '$updatedDescription' WHERE house_no_id = $houseNoId";
            } else {
                echo "Error uploading house map";
                exit;
            }
        } else {
            // Update the house number with the new data excluding the house map
            $sql = "UPDATE house_no SET house_no = '$updatedHouseNo', description = '$updatedDescription' WHERE house_no_id = $houseNoId";
        }

        if ($conn->query($sql) === TRUE) {
            header("Location: /DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/displayhouseno.php?mender_id=" . $row['mender_id']); // Redirect to displayhouseno.php
            exit;
        } else {
            echo "Error updating house number: " . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
} else {
    echo "House Number ID not provided";
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

    <title>Edit House Number</title>
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
                <h1>Edit House Number</h1>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?house_no_id=' . $houseNoId; ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="house_no" class="form-label">House Number</label>
                        <input type="text" class="form-control" id="house_no" name="house_no" value="<?php echo $houseNo; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="house_map" class="form-label">House Map</label>
                        <input type="file" class="form-control" id="house_map" name="house_map">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"><?php echo $description; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update House Number</button>
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
