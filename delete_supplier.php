<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM suppliers WHERE supplier_id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: suppliers.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
