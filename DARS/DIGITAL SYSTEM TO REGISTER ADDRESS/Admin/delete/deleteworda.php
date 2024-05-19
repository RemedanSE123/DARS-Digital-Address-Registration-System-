<?php
// Check if the worda ID and zone ID parameters are provided
if (isset($_GET['worda_id']) && isset($_GET['zone_id'])) {
    $wordaId = $_GET['worda_id'];
    $zoneId = $_GET['zone_id'];

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

    // Delete the row from the worda table
    $sql = "DELETE FROM worda WHERE worda_id = $wordaId";
    $result = $conn->query($sql);

    // Check if the deletion was successful
    if ($result === true) {
        // Redirect to the displayworda.php page
        header("Location: /DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/displayworda.php?zone_id=" . $zoneId);
        exit();
    } else {
        // Handle the case when the deletion fails
        echo "Error deleting row: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle the case when the worda_id and zone_id parameters are not provided
    echo "Invalid worda ID or zone ID.";
}
?>
