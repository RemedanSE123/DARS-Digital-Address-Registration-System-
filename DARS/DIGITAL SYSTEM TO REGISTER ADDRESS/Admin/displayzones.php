<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap-5.3.0-dist/bootstrap-5.3.0-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <title>Display Zones</title>
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
      
            if ($result->num_rows > 0) {
                echo '<table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Zone ID</th>
                            <th>Zone Name</th>
                            <th>Zone Map</th>
                            <th>Description</th>
                            <th>recorded by</th>
              <th>recorded time</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>';

                while ($row = $result->fetch_assoc()) {
                    echo '<tr>
                            <td>'.$row["zone_id"].'</td>
                            <td><a href="displayworda.php?zone_id='.$row["zone_id"].'">'.$row["zone_name"].'</a></td>
                            <td><img src="'.$row["zone_map"].'" alt="Zone Map" class="image-width"></td>
                            <td>'.$row["description"].'</td>
                            <td>'.$row["recorded_by_full_name"].'</td>
                        <td>'.$row["recorded_time"].'</td>
                            <td>
                                <a href="editzone.php?zone_id='.$row["zone_id"].'" class="edit-btn" title="Edit"><i class="fas fa-edit"></i></a>
                                <a href="delete/deletezone.php?zone_id='.$row["zone_id"].'&region_id='.$regionId.'" class="delete-btn" name="delete" onclick="return confirmAction(\'delete\')" title="Delete"><i class="fas fa-trash"></i></a>
                            </td>
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

  <div class="footer">
    <?php include 'Footer.php'; ?>
  </div>
  <script>
  function confirmAction(action) {
    var confirmationMessage;
    if (action === 'delete') {
      confirmationMessage = 'Are you sure you want to delete this zone?';
    } 

    return confirm(confirmationMessage);
  }
</script>
  <script src="bootstrap-5.3.0-dist/bootstrap-5.3.0-dist/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
