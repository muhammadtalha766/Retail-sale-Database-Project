<?php
include 'db.php';

// Fetch customers from the database
$result = $conn->query("SELECT * FROM customers");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customers</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; text-align: center;">

    <h1 style="color: #333;">Customers List</h1>

    <table border="1" style="width: 80%; margin: 20px auto; border-collapse: collapse; background: white; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
        <tr style="background-color: #007bff; color: white;">
            <th style="padding: 12px; border: 1px solid #ddd;">ID</th>
            <th style="padding: 12px; border: 1px solid #ddd;">Name</th>
            <th style="padding: 12px; border: 1px solid #ddd;">Email</th>
            <th style="padding: 12px; border: 1px solid #ddd;">Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr style="background-color: <?php echo ($row['customer_id'] % 2 == 0) ? '#f2f2f2' : 'white'; ?>;">
                <td style="padding: 12px; border: 1px solid #ddd;"><?php echo $row['customer_id']; ?></td>
                <td style="padding: 12px; border: 1px solid #ddd;"><?php echo $row['name']; ?></td>
                <td style="padding: 12px; border: 1px solid #ddd;"><?php echo $row['email']; ?></td>
                <td style="padding: 12px; border: 1px solid #ddd;">
                    <a href="edit_customer.php?id=<?php echo $row['customer_id']; ?>" style="color: #007bff; text-decoration: none; font-weight: bold;">Edit</a> | 
                    <a href="delete_customer.php?id=<?php echo $row['customer_id']; ?>" onclick="return confirm('Are you sure?')" style="color: red; text-decoration: none; font-weight: bold;">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <h2 style="color: #333;">Add New Customer</h2>
    <form action="add_customer.php" method="post" style="background: white; width: 50%; margin: 20px auto; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); text-align: left;">
        <input type="text" name="name" placeholder="Customer Name" required style="width: 95%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px;">
        <input type="email" name="email" placeholder="Email" required style="width: 95%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px;">
        <button type="submit" style="background-color: blue; color: white; border: none; padding: 10px 15px; cursor: pointer; font-size: 14px; border-radius: 4px;">Add Customer</button>
    </form>

</body>
</html>
