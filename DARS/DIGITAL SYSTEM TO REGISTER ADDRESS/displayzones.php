<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap-5.3.0-dist/bootstrap-5.3.0-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <title>Display Zones</title>
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

        // Fetch the selected region name
        if (isset($_GET['region_id'])) {
            $regionId = $_GET['region_id'];
            $regionSql = "SELECT region_name FROM region WHERE region_id = $regionId";
            $regionResult = $conn->query($regionSql);

            if ($regionResult->num_rows > 0) {
                $regionRow = $regionResult->fetch_assoc();
                echo '<h1>Registered Zones</h1>';
                echo '<ul class="selected-region">';
                echo '<li class="bullet">REGION => ' . $regionRow["region_name"] . '</li>';
                echo '</ul>';
            } else {
                echo '<h1>Registered Zones</h1>';
            }
        } else {
            echo '<h1>Registered Zones</h1>';
        }

        if (isset($_GET['region_id'])) {
          $regionId = $_GET['region_id'];
          $sql = "SELECT zone.*, users.full_name AS recorded_by_full_name
                  FROM zone
                  LEFT JOIN users ON zone.recorded_by = users.email
                  WHERE zone.region_id = $regionId";
          $result = $conn->query($sql);

            // Display the data in HTML table rows
            if ($result->num_rows > 0) {
                echo '<table class="table table-striped">
                        <thead>
                          <tr>
                            
                            <th>Zone Name</th>
                            <th>Zone Map</th>
                            <th>Description</th>
                            <th>Recorded By</th>
                            <th>Recorded Time</th>
                            
                          </tr>
                        </thead>
                        <tbody>';

                while ($row = $result->fetch_assoc()) {
                    echo '<tr>
                            
                            <td><a href="displayworda.php?zone_id='.$row["zone_id"].'">'.$row["zone_name"].'</a></td>
                            <td><img src="Admin/'.$row["zone_map"].'" alt="Zone Map" class="image-width"></td>
                            <td>'.$row["description"].'</td>
                            <td>'.$row["recorded_by_full_name"].'</td>
                            <td>'.$row["recorded_time"].'</td>
                            
                        </tr>';
                }

                echo '</tbody>
                      </table>';
            } else {
                echo '<p>No zones found for this region.</p>';
            }
        } else {
            echo '<p>Region ID not provided.</p>';
        }

        // Close the database connection
        $conn->close();
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
