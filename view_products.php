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
		<a href="register.php" class="nav-link">
            <span class="icon"></span> Register
        </a>
        <a href="admin_dashboard.php" class="nav-link">
            <span class="icon"></span> Admin
        </a>
    </nav>
</div>

<div class="page-row">
    
    <!-- Sidebar with Filters -->
    <div class="sidebar">
        <h3>Filter Products</h3>
        
        <form method="GET" action="">
            
            <!-- Material Filter -->
            <label>Material:</label>
            <select name="material">
                <option value="">All Materials</option>
                <option value="Plastic" <?php if(isset($_GET['material']) && $_GET['material']=='Plastic') echo 'selected'; ?>>Plastic</option>
                <option value="Metal" <?php if(isset($_GET['material']) && $_GET['material']=='Metal') echo 'selected'; ?>>Metal</option>
                <option value="Wood" <?php if(isset($_GET['material']) && $_GET['material']=='Wood') echo 'selected'; ?>>Wood</option>
                <option value="Resin" <?php if(isset($_GET['material']) && $_GET['material']=='Resin') echo 'selected'; ?>>Resin</option>
            </select>
            
            <!-- Dice Type Filter -->
            <label>Dice Type:</label>
            <select name="dice_sides">
                <option value="">All Types</option>
                <option value="4" <?php if(isset($_GET['dice_sides']) && $_GET['dice_sides']=='4') echo 'selected'; ?>>D4</option>
                <option value="6" <?php if(isset($_GET['dice_sides']) && $_GET['dice_sides']=='6') echo 'selected'; ?>>D6</option>
                <option value="8" <?php if(isset($_GET['dice_sides']) && $_GET['dice_sides']=='8') echo 'selected'; ?>>D8</option>
                <option value="10" <?php if(isset($_GET['dice_sides']) && $_GET['dice_sides']=='10') echo 'selected'; ?>>D10</option>
                <option value="12" <?php if(isset($_GET['dice_sides']) && $_GET['dice_sides']=='12') echo 'selected'; ?>>D12</option>
                <option value="20" <?php if(isset($_GET['dice_sides']) && $_GET['dice_sides']=='20') echo 'selected'; ?>>D20</option>
            </select>
            
            <!-- Max Price Filter -->
            <label>Max Price (€):</label>
            <input type="number" 
                   name="max_price" 
                   step="0.01" 
                   placeholder="20.00"
                   value="<?php if(isset($_GET['max_price'])) echo $_GET['max_price']; ?>">
            
            <!-- Buttons -->
            <button type="submit">Apply Filters</button>
            
            <a href="view_products.php">Clear Filters</a>
        </form>
    </div>
    
    <!-- Product Grid [populated from DB] -->
    <div class="container">
        <?php
        // Connect to DB
        include 'db_connect.php';
        
        // SQL query
        $sql = "SELECT product_id, product_name, price, material, dice_sides, colour, stock_quantity 
                FROM products 
                WHERE 1=1";
        
        // Add filters if user selected them
        if (isset($_GET['material']) && $_GET['material'] != '') {
            $material = $_GET['material'];
            $sql .= " AND material = '$material'";
        }
        
        if (isset($_GET['dice_sides']) && $_GET['dice_sides'] != '') {
            $dice_sides = $_GET['dice_sides'];
            $sql .= " AND dice_sides = $dice_sides";
        }
        
        if (isset($_GET['max_price']) && $_GET['max_price'] != '') {
            $max_price = $_GET['max_price'];
            $sql .= " AND price <= $max_price";
        }
        
        $sql .= " ORDER BY product_name";
        
        $result = $conn->query($sql);
        
        // Display products
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="box">';
                
                // Product Name
                echo '<div class="productname">' . $row['product_name'] . '</div>';
                
                // Product Image - Same default image for all products
                echo '<div class="productimage">';
                echo '<img src="Images/products/default.png" alt="' . $row['product_name'] . '">';
                echo '</div>';
                
                // Price
                echo '<div class="productprice">€' . number_format($row['price'], 2) . '</div>';
                
                echo '</div>';
            }
        } else {
            echo '<p class="no-products">No products found matching your filters.</p>';
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