<!DOCTYPE html>
<html>
<head>
    <title>Products - Fantasy Dice Company</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="unifiedsheet.css">

</head>

<body class="body">

<!-- Navigation -->
<div class="navbar-wrapper">
    <nav class="navbar">
        <a href="index.html" class="nav-link">
            <span class="icon"></span> Home
        </a>
        <a href="view_products.php" class="nav-link active">
            <span class="icon"></span> Products
        </a>
        <a href="about_us.html" class="nav-link">
            <span class="icon"></span> About Us
        </a>
        <a href="admin_dashboard.php" class="nav-link">
            <span class="icon"></span> Admin
        </a>
    </nav>
</div>

<div class="page-row">
    
    <!-- Sidebar -->
    <div class="sidebar">
        <input type="text" class="searchbar" placeholder="What are you looking for?">
        
        <div class="filters">
            <label><input type="checkbox"> In Stock</label><br>
            <label><input type="checkbox"> On Sale</label><br>
            <label><input type="checkbox"> Themed Dice</label><br>
        </div>
    </div>
    
    <!-- Product Grid [populated from DB] -->
    <div class="container">
        <?php
        // Include database connection
        include 'db_connect.php';
        
        // Query to get products from database
        $sql = "SELECT product_id, product_name, price, material, dice_sides, colour, stock_quantity 
                FROM products 
                ORDER BY product_name";
        
        $result = $conn->query($sql);
        
        // Display each product
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="box" id="box1">';
                echo '<div class="productname">' . htmlspecialchars($row['product_name']) . '</div>';
                echo '<div class="productimage">';
                echo '<div style="color: #666; font-size: 12px;">';
                echo htmlspecialchars($row['material']) . '<br>';
                echo 'D' . $row['dice_sides'] . '<br>';
                echo $row['colour'];
                echo '</div>';
                echo '</div>';
                echo '<div class="productprice">€' . number_format($row['price'], 2) . '</div>';
                echo '</div>';
            }
        } else {
            echo '<p style="color: white;">No products available.</p>';
        }
        
        $conn->close();
        ?>
    </div>
</div>

<!-- Footer -->
<footer>
    <a href="#"><span class="footer-icon"></span> Contact Us</a>
    <a href="#"><span class="footer-icon"></span> Watch Us Make Dice!</a>
    <a href="#"><span class="footer-icon"></span> Social Media</a>
</footer>

</body>
</html>