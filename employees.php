<?php
include 'db.php';
$result = $conn->query("SELECT * FROM employees");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employees</title>
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this employee?');
        }

        function validateForm() {
            let name = document.forms["employeeForm"]["name"].value;
            let position = document.forms["employeeForm"]["position"].value;
            let salary = document.forms["employeeForm"]["salary"].value;
            if (name == "" || position == "" || salary == "") {
                alert("All fields are required!");
                return false;
            }
            return true;
        }
    </script>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; text-align: center;">

    <h1 style="color: #333;">Employees List</h1>

    <table border="1" style="width: 80%; margin: 20px auto; border-collapse: collapse; background: white; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
        <tr style="background-color: #007bff; color: white;">
            <th style="padding: 12px; border: 1px solid #ddd;">ID</th>
            <th style="padding: 12px; border: 1px solid #ddd;">Name</th>
            <th style="padding: 12px; border: 1px solid #ddd;">Position</th>
            <th style="padding: 12px; border: 1px solid #ddd;">Salary</th>
            <th style="padding: 12px; border: 1px solid #ddd;">Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr style="background-color: <?php echo ($row['employee_id'] % 2 == 0) ? '#f2f2f2' : 'white'; ?>;">
                <td style="padding: 12px; border: 1px solid #ddd;"><?php echo $row['employee_id']; ?></td>
                <td style="padding: 12px; border: 1px solid #ddd;"><?php echo $row['name']; ?></td>
                <td style="padding: 12px; border: 1px solid #ddd;"><?php echo $row['position']; ?></td>
                <td style="padding: 12px; border: 1px solid #ddd;"><?php echo $row['salary']; ?></td>
                <td style="padding: 12px; border: 1px solid #ddd;">
                    <a href="edit_employee.php?id=<?php echo $row['employee_id']; ?>" style="color: #007bff; text-decoration: none; font-weight: bold;">Edit</a> | 
                    <a href="delete_employee.php?id=<?php echo $row['employee_id']; ?>" onclick="return confirmDelete();" style="color: red; text-decoration: none; font-weight: bold;">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <h2 style="color: #333;">Add New Employee</h2>
    <form name="employeeForm" action="add_employee.php" method="POST" onsubmit="return validateForm();" style="background: white; width: 50%; margin: 20px auto; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); text-align: left;">
        <input type="text" name="name" placeholder="Name" required style="width: 95%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px;">
        <input type="text" name="position" placeholder="Position" required style="width: 95%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px;">
        <input type="number" step="0.01" name="salary" placeholder="Salary" required style="width: 95%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px;">
        <button type="submit" style="background-color: blue; color: white; border: none; padding: 10px 15px; cursor: pointer; font-size: 14px; border-radius: 4px;">Add Employee</button>
    </form>

</body>
</html>
