<?php

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

// Database configuration
$host = "localhost";  
$username = "root"; 
$password = ""; //SEf1234;
$database = "Digital_Wallet"; 

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>