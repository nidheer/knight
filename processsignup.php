<!DOCTYPE html>

<html lang="en">



<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Landing PAGE Html5 Template">

    <meta name="keywords" content="landing,startup,flat">

    <meta name="author" content="Made By GN DESIGNS">



    <title>Vortex - Startup Landing Page</title>



    <!-- // PLUGINS (css files) // -->

    <link href="assets/js/plugins/bootsnav_files/skins/color.css" rel="stylesheet">

    <link href="assets/js/plugins/bootsnav_files/css/animate.css" rel="stylesheet">

    <link href="assets/js/plugins/bootsnav_files/css/bootsnav.css" rel="stylesheet">

    <link href="assets/js/plugins/bootsnav_files/css/overwrite.css" rel="stylesheet">

    <link href="assets/js/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

    <link href="assets/js/plugins/owl-carousel/owl.theme.css" rel="stylesheet">

    <link href="assets/js/plugins/owl-carousel/owl.transitions.css" rel="stylesheet">

    <link href="assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">

    <!--// ICONS //-->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--// BOOTSTRAP & Main //-->

    <link href="assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/main.css" rel="stylesheet">

</head>



<body>



    <!--======================================== 

           Preloader

    ========================================-->

    <div class="page-preloader">

        <div class="spinner">

            <div class="rect1"></div>

            <div class="rect2"></div>

            <div class="rect3"></div>

            <div class="rect4"></div>

            <div class="rect5"></div>

        </div>

    </div>

    <!--======================================== 

           Header

    ========================================-->



    <!--//** Navigation**//-->

    <nav class="navbar navbar-default navbar-fixed white no-background bootsnav navbar-scrollspy" data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">



        <div class="container">

            <!-- Start Header Navigation -->

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">

                    <i class="fa fa-bars"></i>

                </button>

                <a class="navbar-brand" href="#brand">

                    <img src="assets/img/logo.png" class="logo" alt="logo">

                </a>

            </div>

            <!-- End Header Navigation -->



            <!-- Collect the nav links, forms, and other content for toggling -->

            <!-- /.navbar-collapse -->

        </div>

    </nav>



    <!--//** Banner**//-->

    <section id="home">

        <div class="container">

            <div class="row">

                <!-- Introduction -->

                <div class="col-md-6 caption">

                    <h1>Welcome To EasyPay</h1>

                    <p></p>
                
                </div>
                <!-- Sign Up -->
                <div class="col-md-5 col-md-offset-1">
                <form class="signup-form" >
                <?php

//$conn = mysqli_connect('localhost', 'root', '', 'portal');
include('db.php');
function generateRandomNumber() {
    $min = 100000; // Minimum 6-digit number
    $max = 999999; // Maximum 6-digit number
    return str_pad(mt_rand($min, $max), 6, '0', STR_PAD_LEFT);
}

$uniqueNumber = generateRandomNumber();

$query = "SELECT * FROM reg WHERE uid = '$uniqueNumber'";
$result = mysqli_query($conn, $query);
if (!$result) {
    die('Error executing query: ' . mysqli_error($conn));
}
if (mysqli_num_rows($result) > 0) {
    $uniqueNumber = generateRandomNumber();
}

if(isset($_POST['save']))
{	 
	$name = $_POST['name'];
	 $username = $_POST['username'];
	 $email = $_POST['email'];
	 $password = $_POST['password'];
	

 $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
	 
	 $sql1 = "INSERT INTO reg (uname,name,email,password,cpassword,uid)
	 VALUES ('$username','$name','$email','$hashedPassword','$uniqueNumber')";

$sql2 = "INSERT INTO accountbal(uid)
VALUES ('$uniqueNumber')";

if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
    echo "Registration Succesfull <br> Your Unique ID is $uniqueNumber <br> 
    Please remember you ID to be able to authenticate your transactions <br>
     You can now log In to your account  <a href=\"login.html\">here</a>. " ;
  
   
} else {
    echo "Error: " . mysqli_error($conn);
    echo" Failed to sign up. please sign Up again <a href=\"index1.html\">here</a>.";
}
}

	 mysqli_close($conn);

?>
                   
    
</form>
    
                       
                </div>

            </div>

        </div>

    </section>

 




    <!-- Modal -->

    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

    <script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>

    <script src="assets/js/plugins/bootsnav_files/js/bootsnav.js"></script>

    <script src="assets/js/plugins/typed.js-master/typed.js-master/dist/typed.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js"></script>

    <script src="assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/jquery.magnific-popup.js"></script>

    <script src="assets/js/main.js"></script>

</body>



</html>

