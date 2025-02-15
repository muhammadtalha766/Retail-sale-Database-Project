<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO employees (name, position, salary) VALUES ('$name', '$position', '$salary')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: employees.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
