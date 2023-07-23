<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
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
include('db.php');
$uid = $_POST['uid'];
$name = $_POST['name'];

$uidQuery = "SELECT amount FROM accountbal WHERE uid = ?";
$stmt1 = $mysqli->prepare($uidQuery);
$stmt1->bind_param("s", $uid);
$stmt1->execute();
$result1 = $stmt1->get_result();
$invoiceId = rand(1000, 9999);

if ($result1->num_rows === 0) {
    echo "UID not found. Please retry entering a correct <a href=\"creditcardpay1.html\">UID</a>.";
} else {
    $row = $result1->fetch_assoc();
    $currentAmount = $row['amount'];
    $amount = 35000; // Set the amount directly to 1000

    // Retrieve the form values

    // Update the creditcard table

    // Insert into the creditcard table
    $insertQuery = "INSERT INTO creditcard (name, uid, amount, invoiceid) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($insertQuery);
    $stmt->bind_param("ssii", $name, $uid, $amount, $invoiceId);
    
    $stmt->execute();

    if ($stmt->affected_rows === 0) {
        $errorOccurred = true;
        echo "Failed to update the creditcard table.";
    } else {
        // Insert invoice ID and UID into the 'invoice' table
        $invoiceDate = date("Y-m-d"); // Assuming the current date as the invoice date
        $insertInvoiceQuery = "INSERT INTO invoice (invoiceid, uid, invoicedate) VALUES (?, ?, ?)";
        $stmt5 = $mysqli->prepare($insertInvoiceQuery);
        $stmt5->bind_param("iss", $invoiceId, $uid, $invoiceDate);
        $stmt5->execute();

        // Check Merchant ID against 'merchant' table
        $merchantId = 100; // Set the merchant ID directly to 100

        // Update the 'sales' table with merchant ID, sales date, and amount
        $salesDate = date("Y-m-d"); // Assuming the current date as the sales date

        $insertQuery = "INSERT INTO sales (invoiceid, merchantid, amount, salesdate) VALUES (?, ?, ?, ?)";
        $stmt4 = $mysqli->prepare($insertQuery);
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

$mysqli->close();

if (isset($errorOccurred) && $errorOccurred) {
    die(); // Terminate the script execution if an error occurred
}
?>
