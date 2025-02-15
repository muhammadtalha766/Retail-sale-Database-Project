# Retail Sales Analysis - Setup Guide

## Project Overview
This project is a simple Retail Sales Analysis system built with PHP and MySQL. It allows users to manage customers, products, sales, suppliers, and employees.

## Prerequisites
Before running the project, make sure you have the following installed on your system:
- **XAMPP (v3.3.0)** (Includes Apache & MySQL)
- **VS Code (or any code editor)**
- **Web Browser** (Chrome, Firefox, etc.)

## Step-by-Step Installation & Setup

### Step 1: Setup MySQL Database
1. Open **XAMPP Control Panel** and start **MySQL** and **Apache**.
2. Open your browser and go to **[phpMyAdmin](http://localhost/phpmyadmin)**.
3. You can create the database in **MySQL Workbench** as well. If you have already created it there and inserted data, you can skip this following step.
4. Click on **Databases** tab and check if a database named **`RetailSalesDB`** already exists. If it does, you can proceed. Otherwise, create a new database with this name.
### Step 2: Setup Project Files
1. Navigate to `C:\xampp\htdocs\` directory.
2. Create a new folder named **`Retail-analysis-project`**.
3. Open VS Code and open the folder **Retail-analysis-project**.
4. Copy all project files (PHP, CSS, and database connection file from this repo.) into this folder.

### Step 3: Configure Environment Variables
1. Open **System Properties** and go to **Environment Variables**.
2. Add the XAMPP MySQL path (`C:\xampp\mysql\bin`) to the system `Path` variable.
3. Click OK and restart your system if necessary.

### Step 4: Run the Project
1. Open **XAMPP Control Panel** and ensure **Apache** and **MySQL** are running.
2. Open your browser and go to:
   ```
   http://localhost/Retail-analysis-project/index.php
   ```
3. You should now see the Retail Sales Analysis dashboard.

### Step 5: Access phpMyAdmin
- To check your database, open **[phpMyAdmin](http://localhost/phpmyadmin)** in your browser.
- Select **RetailSalesDB** to view and manage tables.

## Additional Notes
- If you face any issues, make sure MySQL and Apache are running in XAMPP.
- Ensure that the database connection details in `db.php` are correct.

## Contributing
If you want to contribute to this project, feel free to fork the repository and create a pull request.

---
Enjoy coding! 🚀

