<?php
$host = "127.0.0.1";
$user = "root";
$password = "";
$database = "portal";

// Create a new mysqli instance
$con = new mysqli($host, $user, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Problem to connect: " . $con->connect_error);
}

$uname = $_POST['username'];

// Prepare the SQL statement with a parameterized query
$sql = "SELECT * FROM reg WHERE uname = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $uname);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Username already exists, pick another one!";
} else {
    echo "Username is valid - not registered yet!";
}

$stmt->close();
$con->close();
?>
