<?php
// db_connection.php - Database configuration file

// Database credentials
$host = 'localhost'; // Change to your database host (e.g., '127.0.0.1')
$db_name = 'BusTicketManagement'; // Ensure this matches your database name
$username = 'root'; // Your database username
$password = ''; // Your database password

// Create database connection
$conn = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
