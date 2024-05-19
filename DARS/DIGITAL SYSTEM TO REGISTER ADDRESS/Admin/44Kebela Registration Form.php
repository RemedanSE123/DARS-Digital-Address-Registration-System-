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

// Fetch regions from the database
$regions = [];
$sql = "SELECT * FROM region";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $regions[] = $row;
  }
}

// Fetch zones based on the selected region
$zones = [];
if (isset($_POST['region'])) {
  $regionId = $_POST['region'];

  $sql = "SELECT * FROM zone WHERE region_id = '$regionId'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $zones[] = $row;
    }
  }
}

// Fetch wordas based on the selected zone
$wordas = [];
if (isset($_POST['zone'])) {
  $zoneId = $_POST['zone'];

  $sql = "SELECT * FROM worda WHERE zone_id = '$zoneId'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $wordas[] = $row;
    }
  }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $region = $_POST['region'];
  $zone = $_POST['zone'];
  $worda = $_POST['worda'];
  $kebela = $_POST['kebela'];
  $map = $_FILES['map']['name'];
  $description = $_POST['description'];
  $userEmail = $_SESSION['loginEmail'];

  $mapPath = '';
  if (!empty($_FILES['map']['tmp_name'])) {
    $mapPath = 'uploads/' . basename($map);
    move_uploaded_file($_FILES['map']['tmp_name'], $mapPath);
  }

  // Insert kebela data into the database
  $sql = "INSERT INTO temp_kebela (region_id, zone_id, worda_id, kebela_name, kebela_map, description, recorded_by)
           VALUES ('$region', '$zone', '$worda', '$kebela', '$mapPath', '$description', '$userEmail')";
  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Kebele registered successfully.');</script>";
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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  
  <title>Kebela Registration</title>
  <style>
    /* Your CSS styles here */
    
    

    .container2{
      margin-top: 80px;
      margin-bottom: 120px;
    }

    .content {
      flex: 1;
      display: flex;
      margin-top: 20px; /* Adjust the margin value as per your requirement */
    }

    .main {
      flex: 1;
      
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
  
<!-- Include the navbar -->
<?php include '../navbar2.php'; ?>
  <div class="content">
    
    <div class="main">
      <div class="container2">
        <div class="form-container">
          <h2 class="form-title">Kebela Registration Form</h2>
          <form method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="region">Region:</label>
                  <select class="form-control" id="region" name="region" required>
                    <option value="">Select Region</option>
                    <?php foreach ($regions as $region): ?>
                      <option value="<?php echo $region['region_id']; ?>"><?php echo $region['region_name']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="zone">Zone:</label>
                  <select class="form-control" id="zone" name="zone" required>
                    <option value="">Select Zone</option>
                    <?php foreach ($zones as $zone): ?>
                      <option value="<?php echo $zone['zone_id']; ?>"><?php echo $zone['zone_name']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="worda">Worda:</label>
                  <select class="form-control" id="worda" name="worda" required>
                    <option value="">Select Worda</option>
                    <?php foreach ($wordas as $worda): ?>
                      <option value="<?php echo $worda['worda_id']; ?>"><?php echo $worda['worda_name']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="kebela">Kebela:</label>
                  <input type="text" class="form-control" id="kebela" name="kebela" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="map">Map of Kebela:</label>
                  <input type="file" class="form-control-file" id="map" name="map" accept=".png,.jpg,.jpeg" >
                </div>
                <div class="form-group">
                  <label for="description">Description:</label>
                  <textarea class="form-control description" id="description" name="description" rows="5" required></textarea>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
</form>
        </div>
      </div>
    </div>
  </div>

  <?php include 'footer.php'; ?>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#region').change(function() {
      var regionId = $(this).val();
      $.ajax({
        url: '../fetch_zones.php',
        method: 'POST',
        data: { regionId: regionId },
        success: function(data) {
          $('#zone').html(data);
        }
      });
    });
  
    $('#zone').change(function() {
      var zoneId = $(this).val();
      $.ajax({
        url: '../fetch_wordas.php',
        method: 'POST',
        data: { zoneId: zoneId },
        success: function(data) {
          $('#worda').html(data);
        }
      });
    });
  });
  </script>
</body>
</html>
