<!-- index.php -->
<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap-5.3.0-dist/bootstrap-5.3.0-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <title>Document</title>
  <style>
   
  
    .image-width {
      width: 50px;
      height: auto;
    }
    .container2 {
      margin-top: 40px;
      margin-bottom: 50px;
     
      border: 1px solid #ddd;
      border-radius: 5px;
      background-color: #f5f5f5;
      margin-left: 50px;
      max-width: 1250px;
      margin-right: 50px;
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
<?php include 'navbar2.php'; ?>



<div class="col-md-6 left-side" style="margin-top: 100px; margin-left: 290px; display: flex; align-items: center; justify-content: center;">
    <p style="font-size: 24px; color: #180AE0; margin-right: 10px;">Your Personal Contribution</p>
    <a href="userscontribution.php" style="font-size: 48px; color: #0537A3; margin-right: 20px;"><i class="fas fa-eye"></i></a>
    <button type="button" class="contribute-button" style="font-size: 24px; background-color: #3B0CAA; color: white; border: none; padding: 10px 20px; border-radius: 5px;" data-toggle="modal" data-target="#contributeModal">Contribute</button>
</div>




    
    <div class="main">
      <div class="container2">
      <h1>Registered REGIONS</h1>
        <table class="table table-striped">
          <thead>
            <tr>
              
              <th>Region Name</th>
              <th>Region Flag</th>
              <th>Region Map</th>
              <th>Description</th>
              <th>Recorded By</th>
              <th>Recorded Time</th>
              
            </tr>
          </thead>
          <tbody>
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
// Fetch data from the region table with recorded_by and recorded_time columns
$sql = "SELECT region.*, users.full_name AS recorded_by_full_name
FROM region
LEFT JOIN users ON region.recorded_by = users.email"; // Use 'email' column instead of 'id'
$result = $conn->query($sql);

// Display the data in HTML table rows
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
echo '<tr>
    
    <td><a href="displayzones.php?region_id='.$row["region_id"].'">'.$row["region_name"].'</a></td>
    <td><img src="Admin/'.$row["region_flag"].'" alt="Region Flag" class="image-width"></td>
    <td><img src="Admin/'.$row["region_map"].'" alt="Region Map" class="image-width"></td>
    <td>'.$row["description"].'</td>
    <td>'.$row["recorded_by_full_name"].'</td> <!-- Use recorded_by_email instead of recorded_by -->
    <td>'.$row["recorded_time"].'</td>
    
  </tr>';
}
} else {
echo '<tr>
<td colspan="6">No regions found.</td>
</tr>';
}

// Close the database connection
$conn->close();
?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<!-- Contribute Modal -->
<div class="modal fade" id="contributeModal" tabindex="-1" role="dialog" aria-labelledby="contributeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="contributeModalLabel">Choose Contribution Type</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul class="list-unstyled">
            <li><a href="Admin/11Region Registration Form.php" class="text-decoration-none">Region registration</a></li>
            <li><a href="Admin/22Zone Registration form.php" class="text-decoration-none">Zone registration</a></li>
            <li><a href="Admin/33Worda Registration Form.php" class="text-decoration-none">Woreda registration</a></li>
            <li><a href="Admin/44Kebela Registration Form.php" class="text-decoration-none">Kebele registration</a></li>
            <li><a href="Admin/55Mender Registration Form.php" class="text-decoration-none">Mender registration</a></li>
            <li><a href="Admin/66House Registration Form.php" class="text-decoration-none">House registration</a></li>
            </ul>
        </div>
      </div>
    </div>
  </div>

 
 
  <?php include 'footer.php'; ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/js/bootstrap.min.js"></script>

  <script src="bootstrap-5.3.0-dist/bootstrap-5.3.0-dist/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
