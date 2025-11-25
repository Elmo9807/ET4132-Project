<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Fantasy Dice Company</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="unifiedsheet.css">
</head>
<body>

<!-- Navigation -->
<div class="navbar-wrapper">
    <nav class="navbar">
        <a href="index.html" class="nav-link">
            <span class="icon"></span> Home
        </a>
        <a href="view_products.php" class="nav-link">
            <span class="icon"></span> Products
        </a>
        <a href="about_us.html" class="nav-link">
            <span class="icon"></span> About Us
        </a>
        <a href="admin_dashboard.php" class="nav-link active">
            <span class="icon"></span> Admin
        </a>
    </nav>
</div>

<div class="dashboard-container">
    
    <!-- Header -->
    <div class="dashboard-header">
        <h1>Admin Dashboard</h1>
        <p class="dashboard-subtitle">Manage products, customers, and orders</p>
    </div>
    
    <!-- Admin Sections Grid -->
    <div class="admin-grid">
        
        <!-- Product Management Section -->
        <div class="admin-section">
            <h2>Product Management</h2>
            <p>Manage dice inventory and catalog</p>
            <div class="admin-links">
                <a href="view_products.php" class="admin-link">View All Products</a>
                <a href="add_product.php" class="admin-link primary">+ Add New Product</a>
            </div>
        </div>
        
        <!-- Customer Management Section -->
        <div class="admin-section">
            <h2>Customer Management</h2>
            <p>View and manage customer records</p>
            <div class="admin-links">
                <a href="view_customers.php" class="admin-link">View All Customers</a>
                <a href="add_customer.php" class="admin-link primary">+ Add New Customer</a>
            </div>
        </div>
        
        <!-- Order Management Section -->
        <div class="admin-section">
            <h2>Order Management</h2>
            <p>Track and process customer orders</p>
            <div class="admin-links">
                <a href="view_orders.php" class="admin-link">View All Orders</a>
            </div>
        </div>
        
    </div>
    
    <!-- Back to Public Site -->
    <div class="back-link">
        <a href="index.html">← Back to Public Website</a>
    </div>
</div>

<footer>
    <a href="#"><span class="footer-icon"></span> Contact Us</a>
    <a href="#"><span class="footer-icon"></span> Watch Us Make Dice!</a>
    <a href="#"><span class="footer-icon"></span> Social Media</a>
</footer>

</body>
</html>