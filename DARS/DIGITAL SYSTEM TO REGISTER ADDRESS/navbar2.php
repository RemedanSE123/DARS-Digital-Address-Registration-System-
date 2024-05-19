<?php
// Assuming you have established a database connection
// and retrieved the email in $_SESSION['loginEmail']

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

// Step 1: Retrieve the email from the session
$userEmail = $_SESSION['loginEmail'];

// Step 2: Fetch the user's full name from the database
$query = "SELECT full_name FROM users WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Step 3: Display the full name in the navigation bar
if ($row) {
    $userFullName = $row['full_name'];
} else {
    // Default name or error handling
    $userFullName = "User";
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>DARS System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Add this CSS to change the list items' color to white */
        .navbar-nav .nav-item .nav-link {
            color: #fff;
        }

        /* Add this CSS to change the list items' color on hover */
        .navbar-nav .nav-item .nav-link:hover {
            color: #adb5bd;
        }
    </style>
</head>
<body>

<!-- Main Navbar -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Digital Address Registration System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/about_us.php">About Us</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/map/test.php">Map</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://forms.gle/p9S3ZbiNShPjsiM58">Contact</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/login.php">Sign In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/logout.php">Log out</a>
                </li>
            </ul>
     
 



    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item mr-3">
                <img src="<?php echo $_SESSION['userImage']; ?>" alt="User Image" class="nav-link rounded-circle user-image" width="40" height="40">
            </li>
            <li class="nav-item">
            <span class="nav-link"><?php echo $userFullName; ?></span>
        </li>
        </ul>
    </div>
    </div>
    </div>
</nav>

</body>
</html>
