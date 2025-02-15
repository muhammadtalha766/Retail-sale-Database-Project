<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM customers WHERE customer_id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: customers.php");
        exit();
    } else {
        echo "Error deleting record.";
    }

    $stmt->close();
}
?>
