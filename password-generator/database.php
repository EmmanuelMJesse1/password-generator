<?php
$host = "localhost"; // Change if using a remote database
$user = "root"; // Default XAMPP MySQL user
$password = ""; // Default is empty in XAMPP
$database = "password_generator"; // Database name

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
