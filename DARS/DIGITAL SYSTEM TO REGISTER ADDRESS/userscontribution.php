
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Add FontAwesome stylesheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
 <style>
.image-width {
      width: 50px;
      height: auto;
    }

    
/* Additional CSS for centering and line break */
.no-records {
    text-align: left; /* Center the content horizontally */
    margin-top: 20px;
    line-height: 2.5;
    /* Add line height for readability */
}

.container-fluid {
    background-color: #f2f2f2; /* Optional background color for the container */
    margin-top: 50px;
}

.card {
    width: 100%;
    max-width: 1200px;
    text-align: center; /* Center the content horizontally */
    padding: 20px;
    margin-left: 50px;
    
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.card p {
    margin: 10px 0; /* Add margin between each "echo" message */
}

  </style>
</head>
<body>

<?php include 'navbar3.php'; ?>

  <div class="container2">
    
<div class="container-fluid align-items-center justify-content-center">
        <div class="card p-4">
        <h3>personal Contribution Approved and Pending</h3>
        

        <?php
// Start the session
session_start();

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

if (isset($_SESSION['loginEmail'])) {
    // Retrieve the email from the session and assign it to a variable
    $loginEmail = $_SESSION['loginEmail'];

    // Prepare the SQL queries using prepared statements to prevent SQL injection
    $stmtRegion = $conn->prepare("SELECT * FROM region WHERE recorded_by = ?");
    $stmtRegion->bind_param("s", $loginEmail);
    $stmtRegion->execute();
    $resultRegion = $stmtRegion->get_result();


    // Query for "zone" table
    $stmtZone = $conn->prepare("SELECT * FROM zone WHERE recorded_by = ?");
    $stmtZone->bind_param("s", $loginEmail);
    $stmtZone->execute();
    $resultZone = $stmtZone->get_result();

    // Query for "words" table
    $stmtWords = $conn->prepare("SELECT * FROM worda WHERE recorded_by = ?");
    $stmtWords->bind_param("s", $loginEmail);
    $stmtWords->execute();
    $resultWords = $stmtWords->get_result();

    // Query for "mender" table
    $stmtMender = $conn->prepare("SELECT * FROM mender WHERE recorded_by = ?");
    $stmtMender->bind_param("s", $loginEmail);
    $stmtMender->execute();
    $resultMender = $stmtMender->get_result();

    // Query for "kebela" table
    $stmtKebela = $conn->prepare("SELECT * FROM kebela WHERE recorded_by = ?");
    $stmtKebela->bind_param("s", $loginEmail);
    $stmtKebela->execute();
    $resultKebela = $stmtKebela->get_result();

    // Query for "house_no" table
    $stmtHouseNo = $conn->prepare("SELECT * FROM house_no WHERE recorded_by = ?");
    $stmtHouseNo->bind_param("s", $loginEmail);
    $stmtHouseNo->execute();
    $resultHouseNo = $stmtHouseNo->get_result();






    echo '<p class="no-records"><h3>Approved</h3></p>';








    
 

    // ... Prepare and execute queries for other tables (zone, words, mender, house_no) using prepared statements
   
    // Display the data in a table
    // Example of displaying data from the "region" table
    if ($resultRegion->num_rows > 0) {
      echo '<div class="container mt-3">';
      echo '<table class="table table-striped table-bordered">';
      echo '<thead class="thead-dark">';
      echo '<tr>
          <th>Region Name</th>
          <th>Region Flag</th>
          <th>Region Map</th>
          <th>Description</th>
          <th>Recorded By</th>
          <th>Recorded Time</th>
          </tr>';
      echo '</thead>';
      echo '<tbody>';
      while ($row = $resultRegion->fetch_assoc()) {
          echo '<tr>
              <td>'.$row["region_name"].'</a></td>
              <td><img src="Admin/'.$row["region_flag"].'" alt="Region Flag" class="image-width"></td>
              <td><img src="Admin/'.$row["region_map"].'" alt="Region Map" class="image-width"></td>
              <td>'.$row["description"].'</td>
              <td>'.$row["recorded_by"].'</td> <!-- Use recorded_by_email instead of recorded_by -->
              <td>'.$row["recorded_time"].'</td>
              </tr>';
      }
      echo '</tbody>';
      echo '</table>';
      echo '</div>';
  } else {
    echo '<p class="no-records">No records found in the region.</p>';
  }























    
    // ... Repeat the above code blocks for the other tables (zone, words, mender, house_no)
    if ($resultZone->num_rows > 0) {
      echo '<div class="container mt-3">';
      echo '<table class="table table-striped table-bordered">';
      echo '<thead class="thead-dark">';
      echo '<tr>
      <th>Zone Name</th>
      <th>Zone Map</th>
      <th>Description</th>
      <th>recorded by</th>
      <th>recorded time</th>
          </tr>';
      echo '</thead>';
      echo '<tbody>';
      while ($row = $resultZone->fetch_assoc()) {
          echo '<tr>
          <td>'.$row["zone_name"].'</a></td>
          <td><img src="Admin/'.$row["zone_map"].'" alt="Zone Map" class="image-width"></td>
          <td>'.$row["description"].'</td>
          <td>'.$row["recorded_by"].'</td>
          <td>'.$row["recorded_time"].'</td>
              </tr>';
      }
      echo '</tbody>';
      echo '</table>';
      echo '</div>';
  } else {
    echo '<p class="no-records">No records found in the zone.</p>';
  }














   // ... Repeat the above code blocks for the other tables (zone, words, mender, house_no)
   if ($resultWords->num_rows > 0) {
    echo '<div class="container mt-3">';
    echo '<table class="table table-striped table-bordered">';
    echo '<thead class="thead-dark">';
    echo '<tr>
    <th>Worda Name</th>
                                <th>Worda Map</th>
                                <th>Description</th>
                                <th>recorded by</th>
                                <th>recorded time</th>
        </tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = $resultWords->fetch_assoc()) {
        echo '<tr>
        <td>'.$row["worda_name"].'</a></td>
                                <td><img src="Admin/'.$row["map"].'" alt="Map" class="image-width"></td>
                                <td>'.$row["description"].'</td>
                                <td>'.$row["recorded_by"].'</td>
                                <td>'.$row["recorded_time"].'</td>
            </tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
  echo '<p class="no-records">No records found in the worda.</p>';










    



       // ... Repeat the above code blocks for the other tables (zone, words, mender, house_no)
       if ($resultMender->num_rows > 0) {
        echo '<div class="container mt-3">';
        echo '<table class="table table-striped table-bordered">';
        echo '<thead class="thead-dark">';
        echo '<tr>
        <th>Mender Name</th>
                              <th>Mender Map</th>
                              <th>Description</th>
                              <th>recorded by</th>
                              <th>recorded time</th>
            </tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = $resultMender->fetch_assoc()) {
            echo '<tr>
                            <td>'.$row["mender_name"].'</a></td>
                            <td><img src="Admin/'.$row["mender_map"].'" alt="Mender Map" class="image-width"></td>
                            <td>'.$row["description"].'</td>
                            <td>'.$row["recorded_by"].'</td>
                            <td>'.$row["recorded_time"].'</td>
                </tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
      echo '<p class="no-records">No records found in the mender.</p>';
    }
  
}










if ($resultKebela->num_rows > 0) {
  echo '<div class="container mt-3">';
  echo '<table class="table table-striped table-bordered">';
  echo '<thead class="thead-dark">';
  echo '<tr>
  <th>Kebela Name</th>
  <th>Kebela Map</th>
  <th>Description</th>
  <th>recorded by</th>
  <th>recorded time</th>
      </tr>';
  echo '</thead>';
  echo '<tbody>';
  while ($row = $resultKebela->fetch_assoc()) {
      echo '<tr>
      <td>'.$row["kebela_name"].'</a></td>
      <td><img src="Admin/'.$row["kebela_map"].'" alt="Kebela Map" class="image-width"></td>
      <td>'.$row["description"].'</td>
      <td>'.$row["recorded_by"].'</td>
      <td>'.$row["recorded_time"].'</td>
          </tr>';
  }
  echo '</tbody>';
  echo '</table>';
  echo '</div>';
} else {
  echo '<p class="no-records">No records found in the kebela.</p>';
}














if ($resultHouseNo->num_rows > 0) {
  echo '<div class="container mt-3">';
  echo '<table class="table table-striped table-bordered">';
  echo '<thead class="thead-dark">';
  echo '<tr>
  <th>House Number</th>
  <th>House Map</th>
  <th>Description</th>
  <th>recorded by</th>
 <th>recorded time</th>
      </tr>';
  echo '</thead>';
  echo '<tbody>';
  while ($row = $resultHouseNo->fetch_assoc()) {
      echo '<tr>
      <td>'.$row["house_no"].'</td>
      <td><img src="Admin/'.$row["house_map"].'" alt="House Map" class="image-width"></td>
      <td>'.$row["description"].'</td>
      <td>'.$row["recorded_by"].'</td>
      <td>'.$row["recorded_time"].'</td>
          </tr>';
  }
  echo '</tbody>';
  echo '</table>';
  echo '</div>';
} else {
  echo '<p class="no-records">No records found in the House No.</p>';
}












echo '<p class="no-records"><h3>NOT Approved</h3></p>';
     // Prepare the SQL queries using prepared statements to prevent SQL injection
     $stmttemp_Region = $conn->prepare("SELECT * FROM temp_region WHERE recorded_by = ?");
     $stmttemp_Region->bind_param("s", $loginEmail);
     $stmttemp_Region->execute();
     $resulttemp_Region = $stmttemp_Region->get_result();



     if ($resulttemp_Region->num_rows > 0) {
      echo '<div class="container mt-3">';
      echo '<table class="table table-striped table-bordered">';
      echo '<thead class="thead-dark">';
      echo '<tr>
          <th>Region Name</th>
          <th>Region Flag</th>
          <th>Region Map</th>
          <th>Description</th>
          <th>Recorded By</th>
          <th>Recorded Time</th>
          <th>status</th>
          </tr>';
      echo '</thead>';
      echo '<tbody>';
      while ($row = $resulttemp_Region->fetch_assoc()) {
          echo '<tr>
              <td>'.$row["region_name"].'</a></td>
              <td><img src="Admin/'.$row["region_flag"].'" alt="Region Flag" class="image-width"></td>
              <td><img src="Admin/'.$row["region_map"].'" alt="Region Map" class="image-width"></td>
              <td>'.$row["description"].'</td>
              <td>'.$row["recorded_by"].'</td> <!-- Use recorded_by_email instead of recorded_by -->
              <td>'.$row["recorded_time"].'</td>
              <td><i class="fas fa-hourglass-half" style="color: orange;"></i></td>
              </tr>';
      }
      echo '</tbody>';
      echo '</table>';
      echo '</div>';
  } else {
    echo '<p class="no-records">No records found in the contributed region.</p>';
  }


// Query for "zone" table
$stmttemp_Zone = $conn->prepare("SELECT * FROM temp_zone WHERE recorded_by = ?");
$stmttemp_Zone->bind_param("s", $loginEmail);
$stmttemp_Zone->execute();
$resulttemp_Zone = $stmttemp_Zone->get_result();



    // ... Repeat the above code blocks for the other tables (zone, words, mender, house_no)
    if ($resulttemp_Zone->num_rows > 0) {
      echo '<div class="container mt-3">';
      echo '<table class="table table-striped table-bordered">';
      echo '<thead class="thead-dark">';
      echo '<tr>
      <th>Zone Name</th>
      <th>Zone Map</th>
      <th>Description</th>
      <th>recorded by</th>
      <th>recorded time</th>
      <th>status</th>
          </tr>';
      echo '</thead>';
      echo '<tbody>';
      while ($row = $resulttemp_Zone->fetch_assoc()) {
          echo '<tr>
          <td>'.$row["zone_name"].'</a></td>
          <td><img src="Admin/'.$row["zone_map"].'" alt="Zone Map" class="image-width"></td>
          <td>'.$row["description"].'</td>
          <td>'.$row["recorded_by"].'</td>
          <td>'.$row["recorded_time"].'</td>
          <td><i class="fas fa-hourglass-half" style="color: orange;"></i></td>
              </tr>';
      }
      echo '</tbody>';
      echo '</table>';
      echo '</div>';
  } else {
    echo '<p class="no-records">No records found in the contributed zone.</p>';
  }






  // Query for "words" table
  $stmttemp_Words = $conn->prepare("SELECT * FROM temp_worda WHERE recorded_by = ?");
  $stmttemp_Words->bind_param("s", $loginEmail);
  $stmttemp_Words->execute();
  $resulttemp_Words = $stmttemp_Words->get_result();






  
   // ... Repeat the above code blocks for the other tables (zone, words, mender, house_no)
   if ($resulttemp_Words->num_rows > 0) {
    echo '<div class="container mt-3">';
    echo '<table class="table table-striped table-bordered">';
    echo '<thead class="thead-dark">';
    echo '<tr>
    <th>Worda Name</th>
                                <th>Worda Map</th>
                                <th>Description</th>
                                <th>recorded by</th>
                                <th>recorded time</th>
                                <th>status</th>
        </tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = $resulttemp_Words->fetch_assoc()) {
        echo '<tr>
        <td>'.$row["worda_name"].'</a></td>
                                <td><img src="Admin/'.$row["map"].'" alt="Map" class="image-width"></td>
                                <td>'.$row["description"].'</td>
                                <td>'.$row["recorded_by"].'</td>
                                <td>'.$row["recorded_time"].'</td>
                                <td><i class="fas fa-hourglass-half" style="color: orange;"></i></td>
            </tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
  echo '<p class="no-records">No records found in the contributed worda.</p>';
}






// Query for "mender" table
$stmttemp_Mender = $conn->prepare("SELECT * FROM temp_mender WHERE recorded_by = ?");
$stmttemp_Mender->bind_param("s", $loginEmail);
$stmttemp_Mender->execute();
$resulttemp_Mender = $stmttemp_Mender->get_result();

// Query for "kebela" table
$stmttemp_Kebela = $conn->prepare("SELECT * FROM temp_kebela WHERE recorded_by = ?");
$stmttemp_Kebela->bind_param("s", $loginEmail);
$stmttemp_Kebela->execute();
$resulttemp_Kebela = $stmttemp_Kebela->get_result();

// Query for "house_no" table
$stmttemp_HouseNo = $conn->prepare("SELECT * FROM temp_house_no WHERE recorded_by = ?");
$stmttemp_HouseNo->bind_param("s", $loginEmail);
$stmttemp_HouseNo->execute();
$resulttemp_HouseNo = $stmttemp_HouseNo->get_result();






       // ... Repeat the above code blocks for the other tables (zone, words, mender, house_no)
       if ($resulttemp_Mender->num_rows > 0) {
        echo '<div class="container mt-3">';
        echo '<table class="table table-striped table-bordered">';
        echo '<thead class="thead-dark">';
        echo '<tr>
        <th>Mender Name</th>
                              <th>Mender Map</th>
                              <th>Description</th>
                              <th>recorded by</th>
                              <th>recorded time</th>
                              <th>status</th>
            </tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = $resulttemp_Mender->fetch_assoc()) {
            echo '<tr>
                            <td>'.$row["mender_name"].'</a></td>
                            <td><img src="Admin/'.$row["mender_map"].'" alt="Mender Map" class="image-width"></td>
                            <td>'.$row["description"].'</td>
                            <td>'.$row["recorded_by"].'</td>
                            <td>'.$row["recorded_time"].'</td>
                            <td><i class="fas fa-hourglass-half" style="color: orange;"></i></td>
                </tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
      echo '<p class="no-records">No records found in the contributed mender.</p>';
    }
  










if ($resulttemp_Kebela->num_rows > 0) {
  echo '<div class="container mt-3">';
  echo '<table class="table table-striped table-bordered">';
  echo '<thead class="thead-dark">';
  echo '<tr>
  <th>Kebela Name</th>
  <th>Kebela Map</th>
  <th>Description</th>
  <th>recorded by</th>
  <th>recorded time</th>
  <th>status</th>
      </tr>';
  echo '</thead>';
  echo '<tbody>';
  while ($row = $resulttemp_Kebela->fetch_assoc()) {
      echo '<tr>
      <td>'.$row["kebela_name"].'</a></td>
      <td><img src="Admin/'.$row["kebela_map"].'" alt="Kebela Map" class="image-width"></td>
      <td>'.$row["description"].'</td>
      <td>'.$row["recorded_by"].'</td>
      <td>'.$row["recorded_time"].'</td>
      <td><i class="fas fa-hourglass-half" style="color: orange;"></i></td>
          </tr>';
  }
  echo '</tbody>';
  echo '</table>';
  echo '</div>';
} else {
  echo '<p class="no-records">No records found in the contributed kebela.</p>';
}














if ($resulttemp_HouseNo->num_rows > 0) {
  echo '<div class="container mt-3">';
  echo '<table class="table table-striped table-bordered">';
  echo '<thead class="thead-dark">';
  echo '<tr>
  <th>House Number</th>
  <th>House Map</th>
  <th>Description</th>
  <th>recorded by</th>
 <th>recorded time</th>
 <th>status</th>
      </tr>';
  echo '</thead>';
  echo '<tbody>';
  while ($row = $resulttemp_HouseNo->fetch_assoc()) {
      echo '<tr>
      <td>'.$row["house_no"].'</td>
      <td><img src="Admin/'.$row["map"].'" alt="House Map" class="image-width"></td>
      <td>'.$row["description"].'</td>
      <td>'.$row["recorded_by"].'</td>
      <td>'.$row["recorded_time"].'</td>
      <td><i class="fas fa-hourglass-half" style="color: orange;"></i></td>
          </tr>';
  }
  echo '</tbody>';
  echo '</table>';
  echo '</div>';
} else {
  echo '<p class="no-records">No records found in the contributed House No.</p>';
}




    // Close the prepared statements

    $stmtRegion->close();
    $stmtZone->close();
    $stmtWords->close();
    $stmtMender->close();
    $stmtKebela->close();
    $stmtHouseNo->close();
    $stmttemp_Region->close();
    $stmttemp_Zone->close();
    $resulttemp_Words->close();
    $resulttemp_Mender->close();
    $resulttemp_Kebela->close();
    $resulttemp_HouseNo->close();
    
    // ... Close other prepared statements for other tables (zone, words, mender, house_no)



    
 
    // Close the database connection
    $conn->close();
} else {
    echo "User email not found in the session.";
}





?>



        </div></div></div>
  </div>
</div>
</body>
</html>
