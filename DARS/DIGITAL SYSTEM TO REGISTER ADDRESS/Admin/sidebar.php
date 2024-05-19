<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sidebar Example</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
  <style>
  body {
    margin: 0;
    padding: 0;
  }
  
  .sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 70px;
    background-color: #333;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-top: 20px;
  }
  
  .sidebar a {
    color: #fff;
    text-decoration: none;
    font-size: 24px;
    margin-bottom: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 50px;
  }
  
  /* Add additional styles for icon hover effects, if desired */
  .sidebar a:hover {
    background-color: #444;
  }
</style>
</head>
<body>
  <div class="sidebar">
    
    <a href="#"><i class="fas fa-eye"></i></a>
    <a href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/index2.php"><i class="fas fa-home"></i></a>
    <a href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/crud.php"><i class="fas fa-database"></i></a>
    <a href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/1Region Registration Form.php"><i class="fas fa-registered"></i></a>
    <a href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/display_temp_region.php"><i class="fas fa-users"></i></a>
    <a href="#"><i class="fas fa-lock"></i></a>
    <a href="/DARS/DIGITAL SYSTEM TO REGISTER ADDRESS/Admin/super_user_control.php"><i class="fas fa-user-cog"></i></a>
  </div>
</body>
</html>
