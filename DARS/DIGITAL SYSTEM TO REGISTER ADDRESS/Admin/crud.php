<!-- index.php -->
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
      width: 100px;
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
      <h1>Registered REGIONS</h1>
        <table class="table table-striped">
          <thead>
            <tr>
              
              <th>Region Name</th>
              <th>Region Flag</th>
              <th>Region Map</th>
              <th>Capital</th>
              <th>Recorded By</th>
              <th>Recorded Time</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Database credentials
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

            // Fetch data from the region table with recorded_by and recorded_time columns
            $sql = "SELECT region.*, users.full_name AS recorded_by_full_name
            FROM region
            LEFT JOIN users ON region.recorded_by = users.email"; // Use 'email' column instead of 'id'
            $result = $conn->query($sql);
            
            // Display the data in HTML table rows
            //<td>'.$row["region_id"].'</td>
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>
                          
                            <td><a href="displayzones.php?region_id='.$row["region_id"].'">'.$row["region_name"].'</a></td>
                            <td><img src="'.$row["region_flag"].'" alt="Region Flag" class="image-width"></td>
                            <td><img src="'.$row["region_map"].'" alt="Region Map" class="image-width"></td>
                            <td>'.$row["description"].'</td>
                            <td>'.$row["recorded_by_full_name"].'</td> <!-- Use recorded_by_full_name instead of recorded_by -->
                            <td>'.$row["recorded_time"].'</td>
                            <td>
                                <a href="editregion.php?region_id='.$row["region_id"].'" class="edit-btn" title="Edit"><i class="fas fa-edit"></i></a>
                                <a href="delete/deleteregion.php?region_id='.$row["region_id"].'" class="delete-btn" name="delete" onclick="return confirmAction(\'delete\')" title="Delete"><i class="fas fa-trash"></i></a>
                              
                            </td>
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

  <div class="footer">
    <?php include 'Footer.php'; ?>
  </div>
  <script>
  function confirmAction(action) {
    var confirmationMessage;
    if (action === 'delete') {
      confirmationMessage = 'Are you sure you want to delete this region?';
    } 

    return confirm(confirmationMessage);
  }
</script>
  <script src="bootstrap-5.3.0-dist/bootstrap-5.3.0-dist/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
