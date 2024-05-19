<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>About Us</title>
    <style>
body {
    font-family: 'Arial', sans-serif;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
}

/* Sections */
section {
    padding: 60px 0;
}

.section-title1 {
    font-size: 32px;
    font-weight: bold;
    margin-bottom: 30px;
    color: #333;
}

.section-description {
    font-size: 18px;
    line-height: 1.6;
    color: #666;
}

/* Images */
.img-fluid {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
}

.rounded-circle {
    border-radius: 50%;
}

/* Team Members and Reviews */
.team-member, .client-review {
    text-align: center;
    margin-bottom: 30px;
}

.team-member h4, .client-review h4 {
    margin-top: 5px;
    font-size: 24px;
    color: #333;
}

.team-member p, .client-review p {
    font-size: 18px;
    color: #666;
}

  
.choose-us {
            background-color: #f8f9fa;
            padding: 60px 0;
        }

        .choose-us-title {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #333;
            text-align: center; /* Center the title */
        }

        .choose-us-description {
            font-size: 18px;
            line-height: 1.6;
            color: #666;
            text-align: center; /* Center the description */
        }

        .choose-us-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            display: block;
            margin: 0 auto; /* Center the image */
            margin-top: 20px;
        }




        

    </style>
</head>
<body>
<?php include 'navbar3.php'; ?>

  <br><br><br><br>



    <!-- Mission Section -->
    <section class="bg-light py-5">
    <br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                <h2 style="font-size: 38px; color: #180AE0; margin-bottom: 20px; text-align: center;">Our Mission</h2>
                    <p style="font-size: 18px; line-height: 1.6; color: #666; text-align: justify;">Build the best product that creates the most value for our customers, use business
                       to inspire and implement
                       environmentally friendly solutions while their business is thriving. </p>
                </div>
                <div class="col-md-6">
                    <img src="image/om.png" alt="Mission" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Section -->
    <section class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <img src="image/ov.jpg" alt="Vision" class="img-fluid">
            </div>
            <div class="col-md-6">
            <h2 style="font-size: 38px; color: #180AE0; margin-bottom: 20px; text-align: center;">Our Vission</h2>
                    <p style="font-size: 18px; line-height: 1.6; color: #666; text-align: justify;">We strive to go above and beyond for our clients no matter the challenge. 
                  We aim to deliver our very best work every single day across our services.</p>
            </div>
        </div>
    </section>

    <section class="choose-us">
    <div class="container">
        <h2 class="choose-us-title">Why Choose Us</h2>
        <ul class="choose-us-list" style="text-align: center; font-size: 18px; line-height: 1.6; color: #666; text-align: justify;">
             <li style="font-size: 18px; color: #333; margin-bottom: 10px;">Clear and understandable software solutions</li>
            <li style="font-size: 18px; color: #333; margin-bottom: 10px;">Expert team focused on your success</li>
            <li style="font-size: 18px; color: #333; margin-bottom: 10px;">Proven results that deliver value</li>
            <li style="font-size: 18px; color: #333; margin-bottom: 10px;">Innovative technology for growth</li>
            <li style="font-size: 18px; color: #333; margin-bottom: 10px;">Friendly and responsive customer support</li>
            <li style="font-size: 18px; color: #333; margin-bottom: 10px;">Continual improvement and fresh ideas</li>
        </ul>
    </div>
</section>

  <!-- Our Team Section -->
  <section class="container my-5">
        <div class="container">
        <h2 class="text-center mb-4" style="font-size: 36px; color: #180AE0; font-weight: bold;">Our Team</h2>

            <div class="row">
                <!-- Team member 1 -->
                <div class="col-md-4">
                    <div class="text-center">
                    <img src="image/120627579.jpg" alt="Team Member 1" class="img-fluid rounded-circle" style="max-width: 150px; height: auto; margin-top: 5px;">
                        <h4>Redwan Mudesir</h4>
                        <p>Project Manager and Prepare Document</p>
                    </div>
                </div>
                <!-- Team member 2 -->
                <div class="col-md-4">
                    <div class="text-center">
                    <img src="image/129153741.png" alt="Team Member 1" class="img-fluid rounded-circle" style="max-width: 150px; height: auto; margin-top: 5px;">
                        <h4>Berket Bamlak</h4>
                        <p>Designer  and software Tester</p>
                    </div>
                </div>
                <!-- Team member 3 -->
                <div class="col-md-4">
                    <div class="text-center">
                    <img src="image/photo_2024-05-18_19-43-00.jpg" alt="Team Member 1" class="img-fluid rounded-circle" style="max-width: auto; height: 160px; margin-top: 5px;">
                        <h4>Salhadin Hamid</h4>
                        <p>Frontend Developer</p>
                    </div>
                </div>
                <!-- Team member 4 -->
                <div class="col-md-4"   style="margin-left: 380px;">
                        <div class="text-center">
                            <img src="image/photo_2024-05-18_15-28-28.jpg" alt="Team Member 1" class="img-fluid rounded-circle" style="max-width: 150px; height: auto; margin-top: 5px; ">
                            <h4>Remedan Hyeredin</h4>
                            <p>Backend Developer</p>
                         </div>
                    </div>

               
            </div>
        </div>
    </section>

    <!-- Client Reviews Section -->
    <section class="container my-5">
        <h2 class="text-center mb-4">Client Reviews</h2>
        <div class="row">
            <!-- Review 1 -->
            <div class="col-md-4">
                <div class="text-center">
                <img src="image/user.webp" alt="Team Member 1" class="img-fluid rounded-circle" style="max-width: 150px; height: auto; margin-top: 20px;">
                    <h4>Client Name</h4>
                    <p>Review description...</p>
                </div>
            </div>
            <!-- Review 2 -->
            <div class="col-md-4">
                <div class="text-center">
                <img src="image/user.webp" alt="Team Member 1" class="img-fluid rounded-circle" style="max-width: 150px; height: auto; margin-top: 20px;">
                    <h4>Client Name</h4>
                    <p>Review description...</p>
                </div>
            </div>
            <!-- Review 3 -->
            <div class="col-md-4">
                <div class="text-center">
                <img src="image/user.webp" alt="Team Member 1" class="img-fluid rounded-circle" style="max-width: 150px; height: auto; margin-top: 20px;">
                    <h4>Client Name</h4>
                    <p>Review description...</p>
                </div>
            </div>
        </div>
    </section>
 
    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
