<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db__et4132_group1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>