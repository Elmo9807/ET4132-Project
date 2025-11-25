ET4132 Project - Fantasy Dice Company
Project Description
Web application for fantasy-themed dice manufacturing company with MySQL database backend.
Team Members

Dylan O'Halloran: Products pages, Database Design, Homepage, Registration
Conor Hurley: Customers pages, About Us, Navigation
Patrick Durack: Orders pages, Add Product, Navigation

Setup Instructions
Prerequisites

XAMPP installed (Apache + MySQL)
Git Bash installed

Initial Setup

Clone the repository

bash   cd C:\xampp\htdocs
   git clone https://github.com/YOUR_USERNAME/ET4132_Project.git

Start XAMPP

Start Apache
Start MySQL


Import the database

Open phpMyAdmin: http://localhost/phpmyadmin
Click "Import"
Select db_et4132_group1.sql
Click "Go"


Test it works

Open: http://localhost/ET4132_Project/index.html
Should load without errors



Project Structure
project_ET4132_Group1/
│
├── index.html
├── about_us.html
├── register.php
├── view_products.php
├── view_customers.php
├── view_orders.php
│
├── admin_dashboard.php
├── add_product.php
├── add_customer.php
│
├── unifiedsheet.css
├── db_connect.php
├── db_et4132_group1.sql
├── README.md
│
└── Images/
    ├── dicelogo.png
    ├── dicelogo2.jpg
    ├── dnd.png
    ├── dnd2.jpg
    ├── fantasy-castle.jpg
    └── products/
        └── default.png
Features Implemented
Public Pages

Homepage: Hero section, featured products, responsive navigation
About Us: Company story, values, and statistics
View Products: Dynamic product catalog with filtering by material, dice type, and price
Registration: Customer account creation with form validation

Admin Dashboard

Product Management: View all products, add new products
Customer Management: View all customers, add new customers
Order Management: View all orders with customer details

Database

4 normalized tables (customers, orders, order_items, products)
Foreign key relationships maintaining referential integrity
Sample data for testing

Daily Workflow
Before you start working:
bashcd C:/xampp/htdocs/ET4132_Project
git pull origin main
After you finish working:
bashgit add .
git commit -m "Descriptive message about what you did"
git push origin main
If you update the database structure:

Export from phpMyAdmin
Replace db_et4132_group1.sql
Commit with message: "Database updated - team please re-import!"
Notify team in group chat

Critical Rules

Always git pull before starting work
Only edit YOUR assigned files
Don't modify shared files (unifiedsheet.css, db_connect.php) without coordinating
Use clear commit messages
If you change database structure, tell everyone immediately

Technology Stack

Frontend: HTML5, CSS3
Backend: PHP 8.2+
Database: MySQL/MariaDB
Server: Apache (via XAMPP)
Version Control: Git/GitHub