<?php
if (!defined('DB_SERVER')) {
    define('DB_SERVER', 'localhost');
}

if (!defined('DB_USERNAME')) {
    define('DB_USERNAME', 'nidhee');
}

if (!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', 'nidhee');
}

if (!defined('DB_NAME')) {
    define('DB_NAME', 'portal');
}

// Create a new database connection
$mysqli= new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the database connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

?>
