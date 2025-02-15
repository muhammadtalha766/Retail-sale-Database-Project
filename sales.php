<?php
include 'db.php';
$result = $conn->query("SELECT * FROM sales");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sales Transactions</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; text-align: center; padding: 20px;">

    <h1 style="color: #333;">Sales Transactions</h1>

    <table border="1" style="width: 60%; margin: 20px auto; border-collapse: collapse; background: white; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
        <tr style="background-color: #007bff; color: white;">
            <th style="padding: 12px; border: 1px solid #ddd;">ID</th>
            <th style="padding: 12px; border: 1px solid #ddd;">Customer ID</th>
            <th style="padding: 12px; border: 1px solid #ddd;">Amount</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr style="background-color: <?php echo ($row['sale_id'] % 2 == 0) ? '#f2f2f2' : 'white'; ?>;">
                <td style="padding: 12px; border: 1px solid #ddd;"><?php echo $row['sale_id']; ?></td>
                <td style="padding: 12px; border: 1px solid #ddd;"><?php echo $row['customer_id']; ?></td>
                <td style="padding: 12px; border: 1px solid #ddd;">$<?php echo number_format($row['total_amount'], 2); ?></td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>
