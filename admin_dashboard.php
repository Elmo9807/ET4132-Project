<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Fantasy Dice Company</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="unifiedsheet.css">
    <style>
	
	    .dashboard-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
        }
        
        .dashboard-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .dashboard-header h1 {
            color: #FFD700;
            font-size: 36px;
            margin-bottom: 10px;
        }
        
        .dashboard-subtitle {
            color: #FFD700;
            font-size: 14px;
            opacity: 0.8;
        }
        
        .admin-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        
        .admin-section {
            background-color: #1a5c54;
            border: 4px solid #FFD700;
            padding: 30px;
            border-radius: 8px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .admin-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(255, 215, 0, 0.4);
        }
        
        .admin-section h2 {
            color: #FFD700;
            font-size: 24px;
            margin-bottom: 15px;
            text-align: center;
            border-bottom: 2px solid #FFD700;
            padding-bottom: 10px;
        }
        
        .admin-section p {
            color: #ffffff;
            font-size: 14px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .admin-links {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        
        .admin-link {
            display: block;
            padding: 12px 20px;
            background-color: #000000;
            color: #FFD700;
            text-decoration: none;
            border: 2px solid #FFD700;
            border-radius: 4px;
            text-align: center;
            font-weight: bold;
            transition: 0.3s;
        }
        
        .admin-link:hover {
            background-color: #FFD700;
            color: #000000;
            text-decoration: none;
        }
        
        .admin-link.primary {
            background-color: #FFD700;
            color: #000000;
        }
        
        .admin-link.primary:hover {
            background-color: #FFA500;
        }
        
        .section-icon {
            font-size: 48px;
            text-align: center;
            margin-bottom: 15px;
        }
        
        .back-link {
            text-align: center;
            margin-top: 40px;
        }
        
        .back-link a {
            color: #FFD700;
            text-decoration: none;
            font-size: 16px;
        }
        
        .back-link a:hover {
            text-decoration: underline;
        }

    </style>
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
                <a href="view_order_details.php?order_id=1" class="admin-link">View Order Details (Sample)</a>
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