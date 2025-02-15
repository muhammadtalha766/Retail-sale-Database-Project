CREATE DATABASE RetailSalesDB;
USE RetailSalesDB;
-- Customers Table
CREATE TABLE Customers (
    customer_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    phone VARCHAR(15),
    city VARCHAR(50)
);
-- Products Table
CREATE TABLE Products (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    category VARCHAR(50),
    price DECIMAL(10,2) NOT NULL,
    stock_quantity INT NOT NULL
);

-- Suppliers Table
CREATE TABLE Suppliers (
    supplier_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    contact_email VARCHAR(100),
    phone VARCHAR(15)
);
-- Employees Table
CREATE TABLE Employees (
    employee_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    position VARCHAR(50),
    salary DECIMAL(10,2)
);

-- Sales Table
CREATE TABLE Sales (
    sale_id INT PRIMARY KEY AUTO_INCREMENT,
    customer_id INT,
    employee_id INT,
    sale_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(10,2),
    FOREIGN KEY (customer_id) REFERENCES Customers(customer_id),
    FOREIGN KEY (employee_id) REFERENCES Employees(employee_id)
);
-- Sales Details Table
CREATE TABLE Sales_Details (
    sale_detail_id INT PRIMARY KEY AUTO_INCREMENT,
    sale_id INT,
    product_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (sale_id) REFERENCES Sales(sale_id),
    FOREIGN KEY (product_id) REFERENCES Products(product_id)
);

INSERT INTO Customers (name, email, phone, city) VALUES 
('Ali Khan', 'ali@example.com', '1234567890', 'Karachi'),
('Sara Ahmed', 'sara@example.com', '9876543210', 'Lahore'),
('Bilal Hussain', 'bilal@example.com', '1122334455', 'Islamabad'),
('Ayesha Malik', 'ayesha@example.com', '5566778899', 'Peshawar'),
('Usman Tariq', 'usman@example.com', '9988776655', 'Quetta');

INSERT INTO Products (name, category, price, stock_quantity) VALUES 
('Laptop', 'Electronics', 80000.00, 10),
('Smartphone', 'Electronics', 50000.00, 15),
('Headphones', 'Accessories', 5000.00, 20),
('Smartwatch', 'Accessories', 15000.00, 12),
('Keyboard', 'Accessories', 3000.00, 25);

INSERT INTO Employees (name, position, salary) VALUES 
('Sara Ahmed', 'Sales Manager', 50000.00),
('Ali Raza', 'Cashier', 30000.00),
('Hina Noor', 'Store Manager', 60000.00),
('Danish Khan', 'Sales Associate', 25000.00),
('Rida Farooq', 'Customer Support', 28000.00);

INSERT INTO Sales (customer_id, employee_id, total_amount) VALUES 
(1, 1, 80000.00),
(2, 2, 50000.00),
(3, 3, 10000.00),
(4, 4, 15000.00),
(5, 5, 9000.00);

INSERT INTO Sales_Details (sale_id, product_id, quantity, price) VALUES 
(1, 1, 1, 80000.00),
(2, 2, 1, 50000.00),
(3, 3, 2, 5000.00),
(4, 4, 1, 15000.00),
(5, 5, 3, 3000.00);

SELECT * FROM Customers;

INSERT INTO Customers (name, email, phone, city) 
VALUES ('Zain Ali', 'zain@example.com', '3344556677', 'Multan');

SET SQL_SAFE_UPDATES = 0;
UPDATE Customers SET phone = '1231231234' WHERE name = 'Zain Ali';
SET SQL_SAFE_UPDATES = 1;

DELETE FROM Customers WHERE email = 'zain@example.com';

SELECT * FROM Customers WHERE city = 'Lahore'; 

SELECT * FROM Products WHERE name LIKE 'S%';  

SELECT * FROM Sales WHERE total_amount BETWEEN 10000 AND 50000;  

SELECT * FROM Employees WHERE position IN ('Sales Manager', 'Cashier'); 

SELECT city, COUNT(*) FROM Customers GROUP BY city; 

SELECT category, AVG(price) FROM Products GROUP BY category HAVING AVG(price) > 10000; 

-- joins
SELECT Customers.name, Sales.total_amount 
FROM Customers 
INNER JOIN Sales ON Customers.customer_id = Sales.customer_id;

SELECT Employees.name, Sales.total_amount 
FROM Employees 
LEFT JOIN Sales ON Employees.employee_id = Sales.employee_id;

SELECT Products.name, Sales_Details.quantity 
FROM Products 
RIGHT JOIN Sales_Details ON Products.product_id = Sales_Details.product_id;

-- views
CREATE VIEW TopSellingProducts AS
SELECT Products.name, SUM(Sales_Details.quantity) AS TotalSold
FROM Sales_Details
JOIN Products ON Sales_Details.product_id = Products.product_id
GROUP BY Products.name
ORDER BY TotalSold DESC;
SELECT * FROM TopSellingProducts;


CREATE VIEW EmployeeSales AS
SELECT Employees.name, SUM(Sales.total_amount) AS TotalSales
FROM Sales
JOIN Employees ON Sales.employee_id = Employees.employee_id
GROUP BY Employees.name;
SELECT * FROM EmployeeSales;

-- Procedures
DELIMITER //
CREATE PROCEDURE AddCustomer(IN c_name VARCHAR(100), IN c_email VARCHAR(100), IN c_phone VARCHAR(15), IN c_city VARCHAR(50))
BEGIN
    INSERT INTO Customers (name, email, phone, city) 
    VALUES (c_name, c_email, c_phone, c_city);
END //
DELIMITER ;
CALL AddCustomer('Muhammad Talha', 'talha@gmail.com', '987653210', 'Kasur');
SELECT * FROM Customers;

-- 2
DELIMITER //
CREATE PROCEDURE GetSalesReport()
BEGIN
    SELECT * FROM Sales;
END //
DELIMITER ;

CALL GetSalesReport();
SHOW PROCEDURE STATUS WHERE Db = 'RetailSalesDB';

-- trigger
DELIMITER //
CREATE TRIGGER UpdateStockAfterSale 
AFTER INSERT ON Sales_Details
FOR EACH ROW
BEGIN
    UPDATE Products 
    SET stock_quantity = stock_quantity - NEW.quantity 
    WHERE product_id = NEW.product_id;
END //
DELIMITER ;

INSERT INTO Sales_Details (sale_id, product_id, quantity, price) 
VALUES (1, 2, 2, 300.00);

SELECT * FROM Products;

SHOW CREATE TRIGGER UpdateStockAfterSale;

-- commit and rollback

START TRANSACTION;
UPDATE Products 
SET stock_quantity = stock_quantity - 2 
WHERE product_id = 1;
COMMIT;

START TRANSACTION;
UPDATE Products 
SET stock_quantity = stock_quantity - 2 
WHERE product_id = 1;
ROLLBACK;

