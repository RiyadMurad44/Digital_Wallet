<?php

// Database configuration
$host = "localhost";  
$username = "root"; 
$password = ""; 
$database = "your_database"; 

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Set character set to UTF-8 for proper encoding
$conn->set_charset("utf8");

?>