
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .error-box {
            background-color: #4287f5;
            color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-box">
     
        <?php
        /*
$host = "localhost";
$user = "root";
$password = ""; 
$db = "portal";
$conn = mysqli_connect($host, $user, $password, $db);

if(!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
*/
include('db.php');
if(isset($_POST['save']))
{
  session_start();
  if(isset($_POST['username'])) {
    $uname = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM reg WHERE uname = '$uname' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      $hashedPassword = $row['password'];

      if(password_verify($password, $hashedPassword)) {
        $_SESSION['username'] = $uname;
        header("Location: ../knight/index.html");
        echo "Logged in";
        exit();
      } else {
        echo 'Incorrect username or password. <br> <a href="login.html">Log In again</a>.';
        exit();
      }
    } else {
      echo 'Incorrect username or password. <br> <a href="login.html">Log In again</a>.';
      exit();
    }
  }
}
?>

        </div>
    </div>
</body>
</html>

               
                
    
                  
    


                   


                       
 