<?php
// db_connection.php

// Database credentials
$host = 'localhost';    // Usually 'localhost' if you're running it on your own server
$dbname = 'skill_navigator';  // The name of your database
$username = 'root';    // Your MySQL username
$password = '';    // Your MySQL password

// Create a new MySQLi object for database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
?>