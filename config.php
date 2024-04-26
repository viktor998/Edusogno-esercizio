<?php
// Database connection details
$servername = "localhost"; // Change this to your database host if different
$username = "root"; // Your database username
$password = "FranzJames@12345"; // Your database password
$dbname = "edusongo"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
