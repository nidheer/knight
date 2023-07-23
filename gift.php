
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portfolio Details - Knight Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Knight - v4.3.0
  * Template URL: https://bootstrapmade.com/knight-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <style>
    body {
      font-family: Arial, sans-serif;
          background: url('1.jpg');
      background-size: cover;
        background-repeat: no-repeat;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #fffbfb;
    }

    form {
      max-width: 600px;
      margin: 0 auto;
      background-color: #d9cee7;
      border-radius: 5px;
      padding: 30px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    label {
      font-weight: bold;
    }

    .input_box {
      margin-bottom: 30px;
    }

    input[type="text"],
    select {
      width: 100%;
      padding: 10px;
      border: 1px solid #e7c6ee;
      border-radius: 10px;
      box-sizing: border-box;
      font-size: 13px;
    }

    select {
      height: 40px;
    }

    input[type="submit"] {
      background-color: #f5caf1;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      cursor: pointer;
      font-size: 14px;
      display: block;
      margin: 0 auto;
      text-align: center;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
      
    }
    
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="index.html#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="index.html#about">About</a></li>
          <li><a class="nav-link scrollto" href="index.html#services">Services</a></li>
          <li><a class="nav-link scrollto " href="index.html#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="index.html#team">Team</a></li>
          <li><a class="nav-link scrollto" href="index.html#pricing">Pricing</a></li>
       
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main" data-aos="fade-up">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Gift card</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li> Gift Card</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper-container">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="assets/img/pay.jpg" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/pay1.jpg" alt="">
                </div>

             
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Assuming you have already established a database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "portal";

// Create a new MySQLi object
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
function generateRandomNumber() {
    $min = 1000; // Minimum 4-digit number
    $max = 9999; // Maximum 4-digit number
    return str_pad(mt_rand($min, $max), 4, '0', STR_PAD_LEFT);
}

$uniqueNumber = generateRandomNumber();

$query = "SELECT * FROM giftcard WHERE code = '$uniqueNumber'";
$result = mysqli_query($conn, $query);
if (!$result) {
    die('Error executing query: ' . mysqli_error($conn));
}
if (mysqli_num_rows($result) > 0) {
    $uniqueNumber = generateRandomNumber();
}

// Get the user inputs from the HTML form
$id = $_POST['id'];
$amount = $_POST['amount'];

// Query the database to check the account balance
$query = "SELECT amount FROM accountbal WHERE uid = '$id'";
$result = $conn->query($query);

if ($result) {
  $row = $result->fetch_assoc();
  $accountBalance = $row['amount'];

  // Check if the requested amount is available
  if ($accountBalance >= $amount) {
    // Calculate the new account balance
    $newBalance = $accountBalance - $amount;

    // Begin a transaction
    $conn->begin_transaction();

    // Update the cards table with the new account balance
    $updateQuery = "UPDATE accountbal SET amount = '$newBalance' WHERE uid = '$id'";
    $updateResult = $conn->query($updateQuery);

    // Update the accountbal table with the deducted amount
    $sql="INSERT INTO giftcard (uid,code,amount) VALUES ('$id','$uniqueNumber','$amount')";
    $result=$conn->query($sql);
    if ($updateResult && $result) {
      // Commit the transaction
      $conn->commit();
      echo '<div class="col-lg-4">';
      echo '  <div class="portfolio-info">';
      echo '<div class="success-message">';
      echo "Amount deducted successfully. New balance: $newBalance";
      echo '</div>';
      echo '<div class="success-message">';
      echo "Your gift card code is $uniqueNumber . <br>
      Please remember your code to be able to redeem the gift card <br> <br>
      ";
      echo '</div>';
    } else {
      // Rollback the transaction
      $conn->rollback();
      echo '<div class="col-lg-4">';
      echo '  <div class="portfolio-info">';
      echo '<div class="error-message">';
      echo "Failed to update the account balance. <br>
      An error has occured while updating your balance. <br>
      Please try re purchase your gift card <a href=\"gift.html\">here</a>.  <br>
      Or you can check your Account Balance <a href=\"account.html\">here</a>. ";
      // Display MySQL error message
      echo "MySQL Error: " . $conn->error;
      echo '</div>';
    }
  } else {
    echo '<div class="col-lg-4">';
    echo '  <div class="portfolio-info">';
    echo '<div class="error-message">';
    echo "Insufficient funds.<br><br> Please ensure that you have enough credit on your account to continue <br> <br>
    You can proceed by Top Up your account  <br> <a href=\"topup.html\">here</a>. ";
    echo '</div>';
  }
} else {
  echo '<div class="col-lg-4">';
  echo '  <div class="portfolio-info">';
  echo '<div class="error-message">';
  echo "Failed to retrieve the account balance.";
  // Display MySQL error message
  echo "MySQL Error: " . $conn->error;
  echo '</div>';
}

// Close the database connection
$conn->close();
?>


     
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">

      <div class="container">

        <div class="row justify-content-center">
         
        </div>

        <div class="row footer-newsletter justify-content-center">
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email" placeholder="Enter your Email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>

        <div class="social-links">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>

      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Knight</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/knight-free-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
      <div class="credits">
        Distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>




