<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap-5.3.0-dist/bootstrap-5.3.0-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <title>Display House Numbers</title>
  <style>
    /* Your CSS styles here */
    .image-width {
      width: 50px;
      height: auto;
    }
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
  <div class="navbar">
    <?php include 'Admin_header.php'; ?>
  </div>

  <div class="content">
    <div class="sidebar">
      <?php include 'Sidebar.php'; ?>
    </div>
    <div class="main">
      <div class="container2">
        <h1>Registered House Numbers </h1>
        <?php
          // Check if the mender_id parameter is provided
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
            $menderSql = "SELECT * FROM mender WHERE mender_id = $menderId";
            $menderResult = $conn->query($menderSql);

            if ($menderResult->num_rows > 0) {
              $menderRow = $menderResult->fetch_assoc();
              $kebelaId = $menderRow['kebela_id'];
              $wordaId = $menderRow['worda_id'];
              $regionId = $menderRow['region_id'];

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

                  // Fetch the zone data from the database
                  $zoneId = $wordaRow['zone_id'];
                  $zoneSql = "SELECT * FROM zone WHERE zone_id = $zoneId";
                  $zoneResult = $conn->query($zoneSql);

                  if ($zoneResult->num_rows > 0) {
                    $zoneRow = $zoneResult->fetch_assoc();

                    // Fetch the region data from the database
                    $regionSql = "SELECT * FROM region WHERE region_id = $regionId";
                    $regionResult = $conn->query($regionSql);

                    if ($regionResult->num_rows > 0) {
                      $regionRow = $regionResult->fetch_assoc();

                      // Display the selected region, zone, worda, kebela, and mender
                      echo '<ul class="selected-region">';
                      echo '<li>Region: ' . $regionRow["region_name"] . '</li>';
                      echo '<li>Zone: ' . $zoneRow["zone_name"] . '</li>';
                      echo '<li>Worda: ' . $wordaRow["worda_name"] . '</li>';
                      echo '<li>Kebela: ' . $kebelaRow["kebela_name"] . '</li>';
                      echo '<li>Mender: ' . $menderRow["mender_name"] . '</li>';
                      echo '</ul>';
                      $houseNumbersSql = "SELECT house_no.*, users.full_name AS recorded_by_full_name
                      FROM house_no
                      LEFT JOIN users ON house_no.recorded_by = users.email
                      WHERE mender_id = $menderId";
  $houseNumbersResult = $conn->query($houseNumbersSql);
                      if ($houseNumbersResult->num_rows > 0) {
                        echo '<table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>House Number ID</th>
                                    <th>House Number</th>
                                    <th>House Map</th>
                                    <th>Description</th>
                                    <th>recorded by</th>
                                   <th>recorded time</th>
                                    <th>Actions</th>
                                  </tr>
                                </thead>
                                <tbody>';

                        while ($houseNumberRow = $houseNumbersResult->fetch_assoc()) {
                          echo '<tr>
                                  <td>'.$houseNumberRow["house_no_id"].'</td>
                                  <td>'.$houseNumberRow["house_no"].'</td>
                                  <td><img src="'.$houseNumberRow["house_map"].'" alt="House Map" class="image-width"></td>
                                  <td>'.$houseNumberRow["description"].'</td>
                                  <td>'.$houseNumberRow["recorded_by_full_name"].'</td>
                        <td>'.$houseNumberRow["recorded_time"].'</td>
                                  <td>
                                    <a href="edithousenumber.php?house_no_id='.$houseNumberRow["house_no_id"].'" class="edit-btn" title="Edit"><i class="fas fa-edit"></i></a>
                                    <!-- Assuming you are using the Font Awesome trash icon -->
                                    <a href="delete/deletehousenumber.php?house_no_id='.$houseNumberRow['house_no_id'].'&mender_id='.$menderId.'" class="delete-btn" name="delete" onclick="return confirmAction(\'delete\')" title="Delete"><i class="fas fa-trash"></i></a>
                                  </td>
                                </tr>';
                        }

                        echo '</tbody>
                              </table>';
                      } else {
                        echo '<p>No house numbers found for this mender.</p>';
                      }
                    } else {
                      echo '<p>Region not found.</p>';
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
            } else {
              echo '<p>Mender not found.</p>';
            }

            // Close the database connection
            $conn->close();
          } else {
            echo '<p>Mender ID not provided.</p>';
          }
        ?>
      </div>
    </div>
  </div>

  <div class="footer">
    <?php include 'Footer.php'; ?>
  </div>
  <script>
  function confirmAction(action) {
    var confirmationMessage;
    if (action === 'delete') {
      confirmationMessage = 'Are you sure you want to delete this House Number?';
    } 

    return confirm(confirmationMessage);
  }
</script>
  <script src="bootstrap-5.3.0-dist/bootstrap-5.3.0-dist/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
