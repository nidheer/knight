<?php
// Fetch card numbers from the database based on the provided ID

// Assuming you have a MySQL database connection, replace the placeholders with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portal";
// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the ID from the query parameter
$id = $_GET['id'];

// Prepare the SQL query to retrieve card numbers associated with the ID
$sql = "SELECT num FROM cards WHERE uid = '$id'";

// Execute the query
$result = $conn->query($sql);

// Check if any results were returned
if ($result->num_rows > 0) {
  $cards = array();

  while ($row = $result->fetch_assoc()) {
    $cards[] = $row['num'];
  }

  // Return the card numbers in JSON format
  echo json_encode($cards);
} else {
  echo json_encode([]);
}

// Close the database connection
$conn->close();
?>