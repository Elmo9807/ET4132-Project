<?php

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_et4132_group1";

// Create connection using mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if connection was successful
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Set character encoding to UTF-8 for intl. characters
$conn->set_charset("utf8");
?>