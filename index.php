<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retail Sales Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(237, 236, 240);
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007bff;
        }
        .subheading {
            color: #555;
            font-size: 16px;
            margin-bottom: 20px;
        }
        .menu {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }
        .button {
            text-decoration: none;
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 16px;
            transition: 0.3s;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .info-box {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            border-left: 5px solidrgb(28, 68, 110);
            text-align: left;
        }
        .info-box h2 {
            margin-top: 0;
            color: #333;
        }
        .info-box p {
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Retail Sales Analysis</h1>
        <p class="subheading">Analyze and manage your sales efficiently!</p>
        
        <div class="menu">
            <a href="customers.php" class="button">Customers</a>
            <a href="products.php" class="button">Products</a>
            <a href="suppliers.php" class="button">Suppliers</a>
            <a href="employees.php" class="button">Employees</a>
            <a href="sales.php" class="button">Sales</a>
            <a href="sales_details.php" class="button">Sales Details</a>
        </div>

        <div class="info-box">
            <h2>Welcome to Retail Sales Dashboard</h2>
            <p>Manage your customers, products, sales records, suppliers, and employees efficiently with this simple and interactive dashboard.</p>
        </div>
    </div>

</body>
</html>
