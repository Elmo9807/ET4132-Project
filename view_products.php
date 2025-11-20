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
    
    <!-- Sidebar with Filters -->
    <div class="sidebar">
        <h3 style="color: #FFD700; text-align: center; margin-bottom: 15px;">Filter Products</h3>
        
        <form method="GET" action="">
            
            <!-- Material Filter -->
            <label style="color: #FFD700; font-weight: bold;">Material:</label>
            <select name="material" style="width: 100%; padding: 8px; margin: 5px 0 15px 0; border: 2px solid #FFD700; border-radius: 4px; background: white;">
                <option value="">All Materials</option>
                <option value="Plastic" <?php if(isset($_GET['material']) && $_GET['material']=='Plastic') echo 'selected'; ?>>Plastic</option>
                <option value="Metal" <?php if(isset($_GET['material']) && $_GET['material']=='Metal') echo 'selected'; ?>>Metal</option>
                <option value="Wood" <?php if(isset($_GET['material']) && $_GET['material']=='Wood') echo 'selected'; ?>>Wood</option>
                <option value="Resin" <?php if(isset($_GET['material']) && $_GET['material']=='Resin') echo 'selected'; ?>>Resin</option>
            </select>
            
            <!-- Dice Type Filter -->
            <label style="color: #FFD700; font-weight: bold;">Dice Type:</label>
            <select name="dice_sides" style="width: 100%; padding: 8px; margin: 5px 0 15px 0; border: 2px solid #FFD700; border-radius: 4px; background: white;">
                <option value="">All Types</option>
                <option value="4" <?php if(isset($_GET['dice_sides']) && $_GET['dice_sides']=='4') echo 'selected'; ?>>D4</option>
                <option value="6" <?php if(isset($_GET['dice_sides']) && $_GET['dice_sides']=='6') echo 'selected'; ?>>D6</option>
                <option value="8" <?php if(isset($_GET['dice_sides']) && $_GET['dice_sides']=='8') echo 'selected'; ?>>D8</option>
                <option value="10" <?php if(isset($_GET['dice_sides']) && $_GET['dice_sides']=='10') echo 'selected'; ?>>D10</option>
                <option value="12" <?php if(isset($_GET['dice_sides']) && $_GET['dice_sides']=='12') echo 'selected'; ?>>D12</option>
                <option value="20" <?php if(isset($_GET['dice_sides']) && $_GET['dice_sides']=='20') echo 'selected'; ?>>D20</option>
            </select>
            
            <!-- Max Price Filter -->
            <label style="color: #FFD700; font-weight: bold;">Max Price (€):</label>
            <input type="number" 
                   name="max_price" 
                   step="0.01" 
                   placeholder="20.00" 
                   style="width: 100%; padding: 8px; margin: 5px 0 15px 0; border: 2px solid #FFD700; border-radius: 4px;"
                   value="<?php if(isset($_GET['max_price'])) echo $_GET['max_price']; ?>">
            
            <!-- Buttons -->
            <button type="submit" 
                    style="width: 100%; padding: 10px; background: #FFD700; color: #000; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; margin-bottom: 10px;">
                Apply Filters
            </button>
            
            <a href="view_products.php" 
               style="display: block; text-align: center; color: #FFD700; text-decoration: underline;">
                Clear Filters
            </a>
        </form>
    </div>
    
    <!-- Product Grid [populated from DB] -->
    <div class="container">
        <?php
        // Connect to database
        include 'db_connect.php';
        
        // Start building SQL query
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
        
        // Run query
        $result = $conn->query($sql);
        
        // Display products
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="box">';
                
                // Product Name
                echo '<div class="productname">' . $row['product_name'] . '</div>';
                
                // Product Image - Same default image for all products
                echo '<div class="productimage">';
                echo '<img src="Images/products/default.png" alt="' . $row['product_name'] . '" style="width: 100%; height: 100%; object-fit: contain;">';
                echo '</div>';
                
                // Price
                echo '<div class="productprice">€' . number_format($row['price'], 2) . '</div>';
                
                echo '</div>';
            }
        } else {
            echo '<p style="color: white; text-align: center; width: 100%; padding: 40px;">No products found matching your filters.</p>';
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