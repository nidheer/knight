
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
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
         
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
          <h2>pay</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>pay</li>
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

          <div class="col-lg-4">
            <div class="portfolio-info">
            <?phpini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
$host = "localhost";
$username = "root";
$password = "";
$database = "portal";

// Create a MySQLi object and establish the database connection
$conn = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}*/
include('db.php');

$uid = $_POST['uid'];
$name = $_POST['name'];

$uidQuery = "SELECT amount FROM accountbal WHERE uid = ?";
$stmt1 = $conn->prepare($uidQuery);
$stmt1->bind_param("s", $uid);
$stmt1->execute();
$result1 = $stmt1->get_result();
$invoiceId = rand(1000, 9999);

if ($result1->num_rows === 0) {
    echo "UID not found. Please retry entering a correct <a href=\"creditcardpay2.html\">UID</a>.";
} else {
    $row = $result1->fetch_assoc();
    $currentAmount = $row['amount'];
    $amount = 35000; // Set the amount directly to 1000

    

    // Insert into the creditcard table
    $insertQuery = "INSERT INTO creditcard (name, uid, amount, invoiceid) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ssii", $name, $uid, $amount, $invoiceId);

    $stmt->execute();

    if ($stmt->affected_rows === 0) {
        $errorOccurred = true;
        echo "Failed to update the creditcard table.";
    } else {
        // Insert invoice ID and UID into the 'invoice' table
        $invoiceDate = date("Y-m-d"); // Assuming the current date as the invoice date
        $insertInvoiceQuery = "INSERT INTO invoice (invoiceid, uid, invoicedate) VALUES (?, ?, ?)";
        $stmt5 = $conn->prepare($insertInvoiceQuery);
        $stmt5->bind_param("iss", $invoiceId, $uid, $invoiceDate);
        $stmt5->execute();

        // Check Merchant ID against 'merchant' table
        $merchantId = 100; // Set the merchant ID directly to 100

        // Update the 'sales' table with merchant ID, sales date, and amount
        $salesDate = date("Y-m-d"); // Assuming the current date as the sales date

        $insertQuery = "INSERT INTO sales (invoiceid, merchantid, amount, salesdate) VALUES (?, ?, ?, ?)";
        $stmt4 = $conn->prepare($insertQuery);
        $stmt4->bind_param("iids", $invoiceId, $merchantId, $amount, $salesDate);
        $stmt4->execute();

        if ($stmt4->affected_rows === 0) {
            $errorOccurred = true;
            echo '<div class="col-lg-4">';
            echo '  <div class="portfolio-info">';
            echo '    <div class="error-message">';
            echo "Failed to update the sales table.";
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
        }
        echo "Payment effected successfully.  ";
        echo "Here is a summary of the transaction recently processed. <br> ";
        echo "Merchant ID: $merchantId, <br> UID: $uid, <br> Amount: $amount. <br> Your Invoice Number: $invoiceId <br>";
       
    }
}

$stmt1->close();

// Close the statement if it's set
if (isset($stmt)) {
    $stmt->close();
}

if (isset($stmt5)) {
    $stmt5->close();
}

if (isset($stmt4)) {
    $stmt4->close();
}

$conn->close();

if (isset($errorOccurred) && $errorOccurred) {
    die(); // Terminate the script execution if an error occurred
}

?>

            </div>
            
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
          