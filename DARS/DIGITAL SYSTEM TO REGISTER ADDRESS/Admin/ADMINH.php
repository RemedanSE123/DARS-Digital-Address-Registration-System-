


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
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
    
    .navbar-nav .nav-item {
      margin-right: 2px; /* Add some space between list items */
      margin-left: 2px;
    }
    
    .dropdown {
      position: relative;
    }

    .dropbtn {
      background-color: transparent;
      color: white;
      border: none;
      cursor: pointer;
      padding-top: 8px;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 120px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
    
    
  </style>
</head>
<body>
  
  <!-- navbar.php -->
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Digital Address Registration System</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          
          <li class="nav-item">
            <a class="nav-link" href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/index2.php">Overview</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/crud.php">Data</a>
          </li>
          <li class="nav-item dropdown">
            <div class="dropdown">
              <button class="dropbtn">Registration Form</button>
              <div class="dropdown-content">
                <a class="dropdown-item" href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/1Region Registration Form.php">1 Region Registration</a>
                <a class="dropdown-item" href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/2Zone Registration form.php">2 Zone Registration</a>
                <a class="dropdown-item" href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/3Worda Registration Form.php">3 Worda Registration</a>
                <a class="dropdown-item" href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/4Kebela Registration Form.php">4 Kebela Registration</a>
                <a class="dropdown-item" href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/5Mender Registration Form.php">5 Mender Registration</a>
                <a class="dropdown-item" href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/6House Registration Form.php">6 House Registration</a>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <div class="dropdown">
              <button class="dropbtn">User Contributions</button>
              <div class="dropdown-content">
                <a class="dropdown-item" href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/display_temp_region.php">Contributed Region </a>
                <a class="dropdown-item" href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/display_temp_zone.php">Contributed Zone </a>
                <a class="dropdown-item" href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/display_temp_worda.php">Contributed Worda </a>
                <a class="dropdown-item" href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/display_temp_kebela.php">Contributed Kebela </a>
                <a class="dropdown-item" href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/display_temp_mender.php">Contributed Mender </a>
                <a class="dropdown-item" href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/display_temp_house_no.php">Contributed House No </a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/super_user_control.php">Super Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Log out</a>
          </li>
         
          
          
        </ul>
      </div>
    </div>
  </nav>

  <!-- Add this line to include jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
