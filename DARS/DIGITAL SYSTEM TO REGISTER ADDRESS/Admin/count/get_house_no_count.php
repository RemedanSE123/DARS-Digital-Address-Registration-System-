<?php
// Database credentials
$hostname = 'localhost'; // or the IP address of your MySQL server
$username = 'root';
$password_db = '';
$database = 'registration';

// Establish the database connection
$connection = new mysqli($hostname, $username, $password_db, $database);

// Check the connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Query to get the count of house numbers
$sql = "SELECT COUNT(*) AS house_no_count FROM house_no";
$result = $connection->query($sql);

// Prepare the data array to store the fetched data
$data = array();

// Fetch the data and add it to the array
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $data['house_no_count'] = (int)$row['house_no_count'];
}

// Close the database connection
$connection->close();

// Convert the data to JSON format
header('Content-Type: application/json');
echo json_encode($data);
?>
