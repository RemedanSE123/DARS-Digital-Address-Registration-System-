<?php
// Check if the house_no_id and mender_id parameters are provided
if (isset($_GET['house_no_id']) && isset($_GET['mender_id'])) {
    $houseNoId = $_GET['house_no_id'];
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

    // Sanitize the input to prevent SQL injection
    $houseNoId = $conn->real_escape_string($houseNoId);

    // Delete the row from the house_no table
    $sql = "DELETE FROM house_no WHERE house_no_id = '$houseNoId'";
    $result = $conn->query($sql);

    // Check if the deletion was successful
    if ($result === true) {
        // Redirect back to the displayhouse.php page with the mender_id parameter
        header("Location: /DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/displayhouseno.php?mender_id=" . $menderId);
        exit();
    } else {
        // Handle the case when the deletion fails
        echo "Error deleting row: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle the case when the house_no_id or mender_id parameter is not provided
    echo "Invalid house number ID or mender ID.";
}
?>
