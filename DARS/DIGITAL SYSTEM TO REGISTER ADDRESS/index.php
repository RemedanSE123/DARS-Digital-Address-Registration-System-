<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DIGITAL ADDRESS REGISTER SYSTEM</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
 <style>
   /* Custom styles */
.bg-image {
  background-image: url('Image/bg1.avif');
  background-size: cover;
  background-position: center;
  height: 100vh; /* Added to make background image cover the full viewport height */
  
}

.title {
  font-size: 50px;
  font-weight: bold;
  color: #1660e7;
  margin-top: 100px; /* Added spacing between navbar and title */
}

.description {
  color: #ffffff;
  margin-bottom: 40px; /* Added spacing between title and description */
}


.notice-container {
  max-width: 50%;
  border: 2px solid #000;
  padding: 20px;
  border-radius: 10px;
  background-color: #fff;
}

.notice-container h2 {
  margin-bottom: 20px;
}

.left-side {
  position: relative;
}

.left-side img {
  width: 100%;
  border-radius: 10px;
  margin-bottom: 20px;
}



button {
  text-decoration: none;
  position: relative;
  border: none;
  font-size: 14px;
  font-family: inherit;
  color: #fff;
  width: 19em;
  height: 3em;
  line-height: 2em;
  text-align: center;
  background: linear-gradient(90deg,#03a9f4,#f441a5,#ffeb3b,#03a9f4);
  background-size: 300%;
  border-radius: 30px;
  z-index: 1;
}

button:hover {
  animation: ani 8s linear infinite;
  border: none;
}

@keyframes ani {
  0% {
    background-position: 0%;
  }

  100% {
    background-position: 400%;
  }
}

button:before {
  content: '';
  position: absolute;
  top: -5px;
  left: -5px;
  right: -5px;
  bottom: -5px;
  z-index: -1;
  background: linear-gradient(90deg,#03a9f4,#f441a5,#ffeb3b,#03a9f4);
  background-size: 400%;
  border-radius: 35px;
  transition: 1s;
}

button:hover::before {
  filter: blur(20px);
}

button:active {
  background: linear-gradient(32deg,#03a9f4,#f441a5,#ffeb3b,#03a9f4);
}





.box {
      padding: 20px;
      border: 1px solid #ddd;
      margin: 10px;
      background-color: #f8f9fa;
      text-align: center;
    }

    .box img {
      max-width: 400px;
      height: 300px;
      margin-bottom: 10px;
    }

    .box-title {
      font-weight: bold;
      color: #007bff;
      margin-bottom: 10px;
    }

    .box-content {
      color: #333;
    }





  </style>
</head>

<body>
  <!-- Include the navbar -->
  <?php include 'navbar3.php'; ?>

  
  <div class="jumbotron bg-image">
    <div class="container">
      <div class="row align-items-center"> <!-- Updated to align items vertically in the center -->
        <div class="col-md-6">
          <h2 class="title">Digital Address Registration System</h2>
          <p class="description">The Digital Address Management System for Ethiopia is an innovative solution designed to streamline and enhance the registration and management of addresses for different locations across the country. With the aim of improving address accuracy, consistency, and accessibility, this system provides a comprehensive platform for capturing, storing, and retrieving location data effectively.</p>
          
        </div>
        <div class="col-md-6 text-center"> <!-- Added 'text-center' class to center the image horizontally -->
          <img src="Image/rs1.jpg" alt="Image" class="img-fluid mt-4"> <!-- Added 'mt-4' class for top margin -->
        </div>
      </div>
    </div>
  </div>


  <div class="container region-form">
    <div class="row">
        <div class="col-md-6 left-side">
            <img src="Image/con1.jpg" alt="Image" />
            <button id="redirectButton">SURE: I want to contribute.</button>
        </div>

      <div class="col-md-6 notice-container">
        <h2>Notice: Contribution Guidelines</h2>
        <p>Thank you for using the DIGITAL ADDRESS REGISTRATION SYSTEM. To ensure accurate and reliable information, we have established the following guidelines for contributors:</p>
        <ul>
          <li>Only contribute if you have accurate information about the address.</li>
          <li>Provide proof of the address, such as a map or other supporting documentation.</li>
          <li>We do not recommend adding region and zone information. Instead, focus on providing the worda, kebele, mender, and house number.</li>
          <li>Every piece of information you add will be checked by the system administrator for accuracy.</li>
        </ul>
        <p>By following these guidelines, you help maintain the quality and reliability of our address registration system. Thank you for your cooperation.</p>
      </div>
    </div>
  </div>

  


  <h1 style="font-size: 54px; color: #007bff; margin-top: 60px; margin-bottom: 70px; text-align: center;">What Can You Do?</h1>


  <div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="box">
        <img src="image/cont.jpg" alt="Image 1">
        <div class="box-title">Address Contribution</div>
        <div class="box-content">
          Contribute valuable addresses to the comprehensive database of Ethiopian locations, including regions, zones, woredas, menders, kebeles, and precise house numbers. Your contributions play a crucial role in improving the accuracy and completeness of our address system, benefiting various sectors such as logistics, emergency services, and urban planning.
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="box">
        <img src="image/inte.png" alt="Image 3">
        <div class="box-title">Interactive Map</div>
        <div class="box-content">
          Navigate the rich information landscape using our interactive map. Discover the geographical context of addresses, explore nearby amenities, and visualize location data. With user-friendly controls and dynamic overlays, our map empowers you to make informed decisions based on the spatial relationships between addresses and their surroundings.
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="box">
        <img src="image/ac.png" alt="Image 2">
        <div class="box-title">Accurate Information</div>
        <div class="box-content">
          Obtain meticulously verified address details to support your research endeavors. Our data curation process ensures that each piece of information is up-to-date, reliable, and aligned with real-world locations. Whether you're conducting demographic studies, market analysis, or spatial modeling, our accurate address data provides a solid foundation for your insights.
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="box">
        <img src="image/system-integration.jpeg" alt="Image 4">
        <div class="box-title">Integration</div>
        <div class="box-content">
          Seamlessly integrate our address system into your existing infrastructure. Whether you're building applications, platforms, or services, our flexible integration options enable you to harness the power of accurate address information. Reach out to us to explore how our APIs, data feeds, and integration guidance can enhance your systems and workflows.
        </div>
      </div>
    </div>
  </div>
</div>







  


  <!-- Include the footer -->
  <?php include 'footer.php'; ?>
  <script>
document.getElementById("redirectButton").addEventListener("click", function() {
    window.location.href = "login.php";
});
</script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
