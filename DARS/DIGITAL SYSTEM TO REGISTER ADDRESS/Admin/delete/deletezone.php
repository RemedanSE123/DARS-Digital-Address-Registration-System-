<?php
// Check if both zone_id and region_id parameters are provided
if (isset($_GET['zone_id']) && isset($_GET['region_id'])) {
    $zoneId = $_GET['zone_id'];
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

    // Delete the row from the zone table
    $sql = "DELETE FROM zone WHERE zone_id = $zoneId";
    $result = $conn->query($sql);

    // Check if the deletion was successful
    if ($result === true) {
        // Redirect to the displayzones.php page, passing the region_id along
        header("Location: /DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/displayzones.php?region_id=" . $regionId);
        exit();
    } else {
        // Handle the case when the deletion fails
        echo "Error deleting row: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle the case when either zone_id or region_id parameter is missing
    echo "Invalid zone ID or region ID.";
}
?>
