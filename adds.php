<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Retrieve the selected month from the form
  $selectedMonth = $_POST["month"];

  // Database connection details
  /*
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
*/
include('db.php');

  if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $num = $_POST['num'];
    $year = $_POST['year'];
    $cvv = $_POST['cvv'];
    $uid = $_POST['uid'];
    $min = 100;
    $max = 10000000;
    $randomNumber = mt_rand($min, $max);

    $query = "SELECT * FROM reg WHERE uid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $uid);
    $stmt->execute();
    $result = $stmt->get_result();
    $registration = $result->fetch_assoc();

    if ($registration) {
      $sql = "INSERT INTO cards (name, num, year, cvv, month, amount, uid)
              VALUES (?, ?, ?, ?, ?, ?, ?)";

      $stmt = $conn->prepare($sql);
      $stmt->bind_param('sssssis', $name, $num, $year, $cvv, $selectedMonth, $randomNumber, $uid);
      if ($stmt->execute()) {
        // Insert successful
        $stmt->close();
        $conn->close();
        header("Location: success.html");
        exit();
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $stmt->close();
        $conn->close();
        exit();
      }
    } else {
      $stmt->close();
      $conn->close();
      echo 'Invalid UID. Registration not found.';
      header("Location: nosuccess.html");
      exit();
    }
  }
}
?>