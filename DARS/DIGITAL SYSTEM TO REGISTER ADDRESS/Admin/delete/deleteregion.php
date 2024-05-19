<?php
// Check if the region_id parameter is provided
if (isset($_GET['region_id'])) {
    $regionId = $_GET['region_id'];

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

    // Delete the row from the region table
    $sql = "DELETE FROM region WHERE region_id = $regionId";
    $result = $conn->query($sql);

    // Check if the deletion was successful
    if ($result === true) {
        // Redirect to the CRUD page
        header("Location: /DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/crud.php");
        exit();
    } else {
        // Handle the case when the deletion fails
        echo "Error deleting row: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle the case when the region_id parameter is not provided
    echo "Invalid region ID.";
}
?>
