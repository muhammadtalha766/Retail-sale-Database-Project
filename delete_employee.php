<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM employees WHERE employee_id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: employees.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
