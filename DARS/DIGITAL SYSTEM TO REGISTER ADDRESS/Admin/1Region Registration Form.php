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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  

  $region = $_POST['region'];
  $regionFlag = $_FILES['regionFlag']['name'];
  $regionMap = $_FILES['regionMap']['name'];
  $description = $_POST['description'];
  $userEmail = $_SESSION['loginEmail'];

  // Upload region flag file
  $regionFlagPath = '';
  if (!empty($_FILES['regionFlag']['tmp_name'])) {
    $regionFlagPath = 'uploads/' . basename($regionFlag);
    move_uploaded_file($_FILES['regionFlag']['tmp_name'], $regionFlagPath);
  }

  // Upload region map file
  $regionMapPath = '';
  if (!empty($_FILES['regionMap']['tmp_name'])) {
    $regionMapPath = 'uploads/' . basename($regionMap);
    move_uploaded_file($_FILES['regionMap']['tmp_name'], $regionMapPath);
  }

  // Insert region data into the database
  $sql = "INSERT INTO region (region_name, region_flag, region_map, description, recorded_by)
           VALUES ('$region', '$regionFlagPath', '$regionMapPath', '$description', '$userEmail')";
  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Region registered successfully.');</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Head section code here -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  
  <title>Document</title>
  <style>

    .container2 {
      margin-top: 100px;
    }
    .form-container {
      margin-top: 50px;
      max-width: 600px;
      border: 1px solid #ddd;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      background-color: #f9f9f9;
      margin: 0 auto;
    }

    .form-title {
      text-align: center;
      font-size: 28px;
      margin-bottom: 30px;
      color: #333;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .description {
      height: calc(100% - 100px);
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 10px;
    }

    .submit-btn {
      width: 100%;
    }


  </style>
</head>
<body>
  <!-- Navbar code here -->
  <!-- Content code here -->
  <div class="navbar">
    <?php include 'Admin_headerold.php'; ?>
  </div>

  <div class="content">
    <div class="sidebar">
      <?php include 'Sidebar.php'; ?>
    </div>
    <div class="main">
     

  <div class="container2">
    <div class="form-container">
      <h2 class="form-title">Region Registration Form</h2>
      <form method="POST" enctype="multipart/form-data">
        <!-- Form fields -->
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="region">Region:</label>
              <input type="text" class="form-control" id="region" name="region" required>
            </div>
            <div class="form-group">
              <label for="regionFlag">Region Flag:</label>
              <input type="file" class="form-control-file" id="regionFlag" name="regionFlag" accept=".png,.jpg,.jpeg" required>
            </div>
            <div class="form-group">
              <label for="regionMap">Region Map:</label>
              <input type="file" class="form-control-file" id="regionMap" name="regionMap" accept=".png,.jpg,.jpeg" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="description">Description:</label>
              <textarea class="form-control description" id="description" name="description" rows="5" required></textarea>
            </div>
          </div>
        </div>
        <input type="hidden" id="userEmail" name="userEmail" value="<?php echo isset($_SESSION['user_email']) ? $_SESSION['user_email'] : ''; ?>">

        <button type="submit" class="btn btn-primary submit-btn" >Submit</button>
</form>
    </div>
  </div>
  <!-- Footer code here -->
  
  <!-- JavaScript code here -->
  <div class="footer">
    <?php include 'Footer.php'; ?>
  </div>

   <!-- Bootstrap JS -->
 

   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
