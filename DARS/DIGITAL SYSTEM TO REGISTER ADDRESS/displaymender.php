<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap-5.3.0-dist/bootstrap-5.3.0-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <title>Display Menders</title>
  <style>
    
    
    .image-width {
      width: 50px;
      height: auto;
    }
    .container2 {
      margin-top: 40px;
      margin-bottom: 200px;
     
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
<?php include 'navbar.php'; ?>
<div class="col-md-6 left-side" style="margin-top: 100px; margin-left: 290px; display: flex; align-items: center; justify-content: center;">
    <p style="font-size: 24px; color: #180AE0; margin-right: 10px;">Your Personal Contribution</p>
    <a href="userscontribution.php" style="font-size: 48px; color: #0537A3; margin-right: 20px;"><i class="fas fa-eye"></i></a>
    <button type="button" class="contribute-button" style="font-size: 24px; background-color: #3B0CAA; color: white; border: none; padding: 10px 20px; border-radius: 5px;" data-toggle="modal" data-target="#contributeModal">Contribute</button>
</div>
    <div class="main">
      <div class="container2">
        <h1>Registered Menders</h1>
        <?php
        // Check if the kebela_id, worda_id, and region_id parameters are provided
        if (isset($_GET['kebela_id']) && isset($_GET['worda_id']) && isset($_GET['region_id'])) {
          $kebelaId = $_GET['kebela_id'];
          $wordaId = $_GET['worda_id'];
          $regionId = $_GET['region_id'];

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
          $kebelaSql = "SELECT * FROM kebela WHERE kebela_id = $kebelaId";
          $kebelaResult = $conn->query($kebelaSql);

          if ($kebelaResult->num_rows > 0) {
            $kebelaRow = $kebelaResult->fetch_assoc();

            // Fetch the worda data from the database
            $wordaSql = "SELECT * FROM worda WHERE worda_id = $wordaId";
            $wordaResult = $conn->query($wordaSql);

            if ($wordaResult->num_rows > 0) {
              $wordaRow = $wordaResult->fetch_assoc();
              $zoneId = $wordaRow["zone_id"];

              // Fetch the zone data from the database
              $zoneSql = "SELECT * FROM zone WHERE zone_id = $zoneId";
              $zoneResult = $conn->query($zoneSql);

             // Fetch the zone data from the database
$zoneSql = "SELECT * FROM zone WHERE zone_id = $zoneId";
$zoneResult = $conn->query($zoneSql);

if ($zoneResult->num_rows > 0) {
    $zoneRow = $zoneResult->fetch_assoc();

    // Fetch the region data from the database
    $regionId = $zoneRow["region_id"];
    $regionSql = "SELECT * FROM region WHERE region_id = $regionId";
    $regionResult = $conn->query($regionSql);

    if ($regionResult->num_rows > 0) {
        $regionRow = $regionResult->fetch_assoc();

        // Display the selected region, zone, worda, and kebela
        echo '<ul class="selected-region">';
        echo '<li>Region: ' . $regionRow["region_name"] . '</li>';
        echo '<li>Zone: ' . $zoneRow["zone_name"] . '</li>';
        echo '<li>Worda: ' . $wordaRow["worda_name"] . '</li>';
        echo '<li>Kebela: ' . $kebelaRow["kebela_name"] . '</li>';
        echo '</ul>';

        
                 $mendersSql = "SELECT mender.*, users.full_name AS recorded_by_full_name
        FROM mender
        LEFT JOIN users ON mender.recorded_by = users.email
        WHERE kebela_id = $kebelaId AND worda_id = $wordaId AND region_id = $regionId";
$mendersResult = $conn->query($mendersSql);
                if ($mendersResult->num_rows > 0) {
                  // Display the menders table
                  echo '<table class="table table-striped">
                          <thead>
                            <tr>
                              
                              <th>Mender Name</th>
                              <th>Mender Map</th>
                              <th>Description</th>
                              <th>Recorded By</th>
                              <th>Recorded Time</th>
                              
                            </tr>
                          </thead>
                          <tbody>';

                  while ($menderRow = $mendersResult->fetch_assoc()) {
                    echo '<tr>
                            
                            <td><a href="displayhouseno.php?mender_id='.$menderRow["mender_id"].'">'.$menderRow["mender_name"].'</a></td>
                            <td><img src="Admin/'.$menderRow["mender_map"].'" alt="Mender Map" class="image-width"></td>
                            <td>'.$menderRow["description"].'</td>
                            <td>'.$menderRow["recorded_by_full_name"].'</td>
                            <td>'.$menderRow["recorded_time"].'</td>
                            
                          </tr>';
                  }

                  echo '</tbody>
                        </table>';
                } else {
                  echo '<p>No menders found for this kebela, worda, and region.</p>';
                }
              } else {
                echo '<p>Zone not found.</p>';
              }
            } else {
              echo '<p>Worda not found.</p>';
            }
          } else {
            echo '<p>Kebela not found.</p>';
          }

          // Close the database connection
          $conn->close();
        } else {
          echo '<p>Kebela ID, Worda ID, or Region ID not provided.</p>';
        }
      }
        ?>
      </div>
    </div>
  </div>

  
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
