<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "forensic_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Echo success (for testing only, remove in production)
echo "Database connected successfully";
?>
