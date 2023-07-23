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

<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Transactions</a></li>
          <li><a class="nav-link scrollto" href="#team">Merchant</a></li>
          <li><a class="nav-link scrollto" href="logout.php">LogOut</a></li>
         
         
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
          <h2>Gift Card</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Gift Card</li>
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
                  <img src="assets/img/giftcard.jpg" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/card3.jpg" alt="">
                </div>

               
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
/*
// Assuming you have the necessary database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "portal";

// Create a MySQLi object and establish the database connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
*/
include('db1.php');
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the gift card code and UID from the form
    $giftCardCode = $_POST["code"];
    $uid = $_POST["uid"];

    // Prepare a SQL query to fetch the gift card details from the database
    $sql = "SELECT amount FROM giftcard WHERE code = ?";
    $stmt = $mysqli->prepare($sql);

    // Check if the statement was prepared successfully
    if ($stmt) {
        $stmt->bind_param('s', $giftCardCode);
        $stmt->execute();

        // Bind the result
        $stmt->bind_result($amount);

        // Fetch the result
        $stmt->fetch();
        $stmt->close();

        // Check if the gift card code is valid
        if ($amount) {
            // Display the amount
            echo '<div class="col-lg-4">';
            echo '  <div class="portfolio-info">';
            echo "Amount of your gift card is: " . $amount;
            // Create a button to execute the account update query
            echo '<form action="" method="POST">';
            echo '<input type="hidden" name="uid" value="' . $uid . '">';
            echo '<input type="hidden" name="code" value="' . $giftCardCode . '">';
            echo '<input type="submit" name="redeem" value="Redeem">';
            echo '</form>';
            echo '</div>';
        } else {
            echo '<div class="col-lg-4">';
            echo '  <div class="portfolio-info">';
            echo '<div class="error-message">';
            echo "Invalid gift card code. Try re-entering a different code <a href=\"redeemgiftcard.html\">here</a>. <br> Or purchase a gift card <a href=\"gift.html\">here</a>.";
            echo '</div>';
        }
    } else {
        echo '<div class="col-lg-4">';
        echo '  <div class="portfolio-info">';
        echo '<div class="error-message">';
        echo "Error preparing the statement: " . $mysqli->error;
        echo '</div>';
    }
}

// Check if the redeem button was clicked
if (isset($_POST["redeem"])) {
    $uid = $_POST["uid"];
    $giftCardCode = $_POST["code"];

    // Begin a transaction
    $mysqli->begin_transaction();

    // Check if the gift card code and amount exist
    $checkSql = "SELECT amount FROM giftcard WHERE code = ?";
    $checkStmt = $mysqli->prepare($checkSql);

    if ($checkStmt) {
        $checkStmt->bind_param('s', $giftCardCode);
        $checkStmt->execute();

        // Bind the result
        $checkStmt->bind_result($checkAmount);

        // Fetch the result
        $checkStmt->fetch();
        $checkStmt->close();

        // Check if the gift card code is valid and amount is available
        if ($checkAmount > 0) {
            // Prepare a SQL query to update the account balance
            $accountUpdateQuery = "UPDATE accountbal SET amount = amount + ? WHERE uid = ?";
            $accountUpdateStmt = $mysqli->prepare($accountUpdateQuery);

            if ($accountUpdateStmt) {
                $accountUpdateStmt->bind_param('is', $checkAmount, $uid);
                $accountUpdateStmt->execute();

                // Check if the account balance was updated successfully
                if ($accountUpdateStmt->affected_rows > 0) {
                    // Prepare a SQL query to insert the values into the "redeem" table
                    $redeemSql = "INSERT INTO redeem (uid, code, amount) VALUES (?, ?, ?)";
                    $redeemStmt = $mysqli->prepare($redeemSql);

                    if ($redeemStmt) {
                        $redeemStmt->bind_param('ssi', $uid, $giftCardCode, $checkAmount);
                        $redeemStmt->execute();

                        // Check if the gift card was redeemed successfully
                        if ($redeemStmt->affected_rows > 0) {
                            // Prepare a SQL query to delete the redeemed gift card from the giftcard table
                            $deleteSql = "DELETE FROM giftcard WHERE code = ?";
                            $deleteStmt = $mysqli->prepare($deleteSql);

                            if ($deleteStmt) {
                                $deleteStmt->bind_param('s', $giftCardCode);
                                $deleteStmt->execute();
                                $deleteStmt->close();
                            } else {
                                // Rollback the transaction
                                $mysqli->rollback();

                                echo '<div class="col-lg-4">';
                                echo '  <div class="portfolio-info">';
                                echo '<div class="error-message">';
                                echo "Error preparing the delete statement: " . $mysqli->error;
                                echo '</div>';
                                exit();
                            }

                            // Commit the transaction
                            $mysqli->commit();

                            echo '<div class="col-lg-4">';
                            echo '  <div class="portfolio-info">';
                            echo '<div class="success-message">';
                            echo "Your gift card has been successfully redeemed.";
                            echo '</div>';
                        } else {
                            // Rollback the transaction
                            $mysqli->rollback();

                            echo '<div class="col-lg-4">';
                            echo '  <div class="portfolio-info">';
                            echo '<div class="error-message">';
                            echo "Failed to redeem the gift card. Please try again.";
                            echo '</div>';
                        }

                        $redeemStmt->close();
                    } else {
                        // Rollback the transaction
                        $mysqli->rollback();

                        echo '<div class="col-lg-4">';
                        echo '  <div class="portfolio-info">';
                        echo '<div class="error-message">';
                        echo "Error preparing the redeem statement: " . $mysqli->error;
                        echo '</div>';
                    }
                } else {
                    // Rollback the transaction
                    $mysqli->rollback();

                    echo '<div class="col-lg-4">';
                    echo '  <div class="portfolio-info">';
                    echo '<div class="error-message">';
                    echo "Failed to update the account balance. Please try again.";
                    echo '</div>';
                }

                $accountUpdateStmt->close();
            } else {
                // Rollback the transaction
                $mysqli->rollback();

                echo '<div class="col-lg-4">';
                echo '  <div class="portfolio-info">';
                echo '<div class="error-message">';
                echo "Error preparing the account update statement: " . $mysqli->error;
                echo '</div>';
            }
        } else {
            echo '<div class="col-lg-4">';
            echo '  <div class="portfolio-info">';
            echo '<div class="error-message">';
            echo "Invalid gift card code or no amount available.";
            echo '</div>';
        }
    } else {
        echo '<div class="col-lg-4">';
        echo '  <div class="portfolio-info">';
        echo '<div class="error-message">';
        echo "Error preparing the check statement: " . $mysqli->error;
        echo '</div>';
    }
}

// Close the database connection
$mysqli->close();
?>




          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->


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

