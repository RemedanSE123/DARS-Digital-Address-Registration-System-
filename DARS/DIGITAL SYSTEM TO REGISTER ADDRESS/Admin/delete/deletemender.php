<?php
// Check if the mender ID, kebela ID, worda ID, and region ID parameters are provided
if (isset($_GET['mender_id']) && isset($_GET['kebela_id']) && isset($_GET['worda_id']) && isset($_GET['region_id'])) {
    $menderId = $_GET['mender_id'];
    $kebelaId = $_GET['kebela_id'];
    $wordaId = $_GET['worda_id'];
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

    // Delete the row from the mender table
    $sql = "DELETE FROM mender WHERE mender_id = $menderId";
    $result = $conn->query($sql);

    // Check if the deletion was successful
    if ($result === true) {
        // Redirect to the displaymender.php page
        header("Location: /DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/displaymender.php?kebela_id=$kebelaId&worda_id=$wordaId&region_id=$regionId");
        exit();
    } else {
        // Handle the case when the deletion fails
        echo "Error deleting mender: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle the case when the mender_id, kebela_id, worda_id, or region_id parameters are not provided
    echo "Invalid mender ID, kebela ID, worda ID, or region ID.";
}
?>
