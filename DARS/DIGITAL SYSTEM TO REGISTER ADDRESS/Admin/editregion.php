<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the region_id from the form data
    $regionId = $_POST['region_id'];

    // Retrieve the updated values from the form data
    $regionName = $_POST['region_name'];
    $description = $_POST['description'];

    // Perform the necessary operations to update the row in the database
    // Replace the code below with your database update logic
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

    // Retrieve the existing image paths from the database
    $sql = "SELECT region_flag, region_map FROM region WHERE region_id=$regionId";
    $result = $conn->query($sql);

    // Check if the row exists
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $existingRegionFlag = $row['region_flag'];
        $existingRegionMap = $row['region_map'];

        // Move the uploaded files to the desired directory
        $uploadDirectory = 'uploads/';

        // Process the region_flag file upload
        if (!empty($_FILES['region_flag']['name'])) {
            $regionFlag = $uploadDirectory . basename($_FILES['region_flag']['name']);
            move_uploaded_file($_FILES['region_flag']['tmp_name'], $regionFlag);

            // Remove the existing region_flag file
            if ($existingRegionFlag != $regionFlag && file_exists($existingRegionFlag)) {
                unlink($existingRegionFlag);
            }
        } else {
            // Keep the existing region_flag file if no new file is uploaded
            $regionFlag = $existingRegionFlag;
        }

        // Process the region_map file upload
        if (!empty($_FILES['region_map']['name'])) {
            $regionMap = $uploadDirectory . basename($_FILES['region_map']['name']);
            move_uploaded_file($_FILES['region_map']['tmp_name'], $regionMap);

            // Remove the existing region_map file
            if ($existingRegionMap != $regionMap && file_exists($existingRegionMap)) {
                unlink($existingRegionMap);
            }
        } else {
            // Keep the existing region_map file if no new file is uploaded
            $regionMap = $existingRegionMap;
        }

        // Update the row in the region table
        $sql = "UPDATE region SET region_name='$regionName', region_flag='$regionFlag', region_map='$regionMap', description='$description' WHERE region_id=$regionId";
        $result = $conn->query($sql);

        // Check if the update was successful
        if ($result === true) {
            // Redirect to the CRUD page
            header("Location: /DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/crud.php");
            exit();
        } else {
            // Handle the case when the update fails
            echo "Error updating row: " . $conn->error;
        }
    } else {
        // Handle the case when the row does not exist
        echo "Row not found.";
        exit();
    }

    // Close the database connection
    $conn->close();
} else {
    // Retrieve the region_id from the URL parameter
    $regionId = $_GET['region_id'];

    // Retrieve the existing data for the row from the database
    // Replace the code below with your database retrieval logic
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

    // Fetch the existing data for the row from the region table
    $sql = "SELECT * FROM region WHERE region_id=$regionId";
    $result = $conn->query($sql);

    // Check if the row exists
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $regionName = $row['region_name'];
        $description = $row['description'];
    } else {
        // Handle the case when the row does not exist
        echo "Row not found.";
        exit();
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.0-dist/bootstrap-5.3.0-dist/css/bootstrap.min.css">
    <title>Edit Region</title>
</head>
<style>
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
<body>
<div class="navbar">
    <?php include 'Admin_header.php'; ?>
  </div>

  <div class="content2">
    <div class="sidebar">
      <?php include 'Sidebar.php'; ?>
    </div>
    <div class="main">
    <div class="container2">
        <h1>Edit Region</h1>
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="region_id" value="<?php echo $regionId; ?>">
            <div class="mb-3">
                <label for="region_name" class="form-label">Region Name</label>
                <input type="text" class="form-control" id="region_name" name="region_name" value="<?php echo $regionName; ?>">
            </div>
            <div class="mb-3">
                <label for="region_flag" class="form-label">Region Flag</label>
                <input type="file" class="form-control" id="region_flag" name="region_flag">
            </div>
            <div class="mb-3">
                <label for="region_map" class="form-label">Region Map</label>
                <input type="file" class="form-control" id="region_map" name="region_map">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description"><?php echo $description; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/Admin/display/crud.php" class="btn btn-secondary">Cancel</a>
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
