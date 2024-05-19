<div class="sidebar">
  <style>
    /* Custom CSS styles for the sidebar */
    .sidebar {
      background-color: #1C1B23;
      padding: 20px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      position: fixed;
      top: 50px;
      left: 0;
      bottom: 46px;
      width: 220px;
      z-index: 1;
      overflow-y: auto;
    }

    .sidebar-heading {
      font-size: 18px;
      margin-bottom: 20px;
      color: #ffffff; /* Change text color to white */
    }

    .sidebar-menu {
      list-style: none;
      padding-left: 0;
    }

    .sidebar-menu-item {
      margin-bottom: 10px;
    }

    .sidebar-menu-link {
      color: #ffffff; /* Change link text color to white */
    }

    .sidebar-menu-link:hover {
      color: #007bff;
    }

    .content {
      margin-left: 220px;
      padding: 20px;
    }
  </style>

  <h5 class="sidebar-heading">Menu</h5>
  <ul class="sidebar-menu list-unstyled">
    <!-- First Section -->
    <li class="sidebar-menu-item">
      <a class="sidebar-menu-link" href="index.php">Overview</a>
    </li>
    <li class="sidebar-menu-item">
      <a class="sidebar-menu-link" href="crud.php">CRUD</a>
    </li>
    <!-- Second Section -->
    <li class="sidebar-menu-item">
      <h6 class="sidebar-heading">Address Registration</h6>
      <ul class="sidebar-submenu list-unstyled">
        <li class="sidebar-menu-item">
          <a class="sidebar-menu-link" href="1Region Registration Form.php">Region Registration</a>
        </li>
        <li class="sidebar-menu-item">
          <a class="sidebar-menu-link" href="2Zone Registration form.php">Zone Registration</a>
        </li>
        <li class="sidebar-menu-item">
          <a class="sidebar-menu-link" href="3Worda Registration Form.php">Woreda Registration</a>
        </li>
        <li class="sidebar-menu-item">
          <a class="sidebar-menu-link" href="4Kebela Registration Form.php">Kebele Registration</a>
        </li>
        <li class="sidebar-menu-item">
          <a class="sidebar-menu-link" href="5Mender Registration Form.php">Mender Registration</a>
        </li>
        <li class="sidebar-menu-item">
          <a class="sidebar-menu-link" href="6House Registration Form.php">House No</a>
        </li>
      </ul>
    </li>
    <!-- Third Section -->
    <li class="sidebar-menu-item">
      <h6 class="sidebar-heading">Other</h6>
      <ul class="sidebar-submenu list-unstyled">
        <li class="sidebar-menu-item">
          <a class="sidebar-menu-link" href="display_temp_zone.php">Contact Admin</a>
        </li>
        <!-- Sidebar Menu -->
<ul class="sidebar-menu">
  <li class="sidebar-menu-item">
    <a class="sidebar-menu-link" href="display_temp_region.php">Contributed Regions</a>
  </li>
  <li class="sidebar-menu-item">
    <a class="sidebar-menu-link" href="display_temp_zone.php">Contributed Zones</a>
  </li>
  <li class="sidebar-menu-item">
    <a class="sidebar-menu-link" href="display_temp_worda.php">Contributed Wordas</a>
  </li>
  <li class="sidebar-menu-item">
    <a class="sidebar-menu-link" href="display_temp_kebela.php">Contributed Kebelas</a>
  </li>
  <li class="sidebar-menu-item">
    <a class="sidebar-menu-link" href="display_temp_mender.php">Contributed Menders</a>
  </li>
  <li class="sidebar-menu-item">
    <a class="sidebar-menu-link" href="display_temp_house_no.php">Contributed House Numbers</a>
  </li>
</ul>

      </ul>
    </li>
  </ul>
</div>
