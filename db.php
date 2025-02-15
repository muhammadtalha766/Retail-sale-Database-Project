<?php
$host = "localhost";
$username = "root";  // Agar password nahi hai to blank chhoro
$password = "mrtalha033";
$database = "retailsalesdb";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Connection success message (optional)
echo "Database connected successfully!";
?>
