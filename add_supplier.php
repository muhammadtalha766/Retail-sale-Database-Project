<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $contact_email = $_POST['contact_email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO suppliers (name, contact_email, phone) VALUES ('$name', '$contact_email', '$phone')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: suppliers.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
