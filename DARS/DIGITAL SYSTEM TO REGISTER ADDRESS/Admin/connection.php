


<?php


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



echo "Connected successfully";




  // Close the database connection
  $conn->close();

?>
