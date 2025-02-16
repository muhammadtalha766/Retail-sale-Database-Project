<?php
$host = "localhost";
$username = "root";  // Agar password nahi hai to blank chhoro
$password = "mrtalha033"; // write here your Mysql password
$database = "retailsalesdb"; // write your database name here

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Connection success message (optional)
echo "Database connected successfully!";
?>
