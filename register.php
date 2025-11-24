<?php
include 'db_connect.php';

// Store feedback
$message = "";


// Check if form was submitted via POST
// Retrieve form data from POST array
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
	
	// Prepare SQL INSERT
    $sql = "INSERT INTO customers (first_name, last_name, email, phone, address)
            VALUES ('$first', '$last', '$email', '$phone', '$address')";
	
	// Execute and provide feedback to user
    if ($conn->query($sql) === TRUE) {
        $message = "Registration successful! Welcome to Premium Dice Maker!";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Registration - Premium Dice Maker</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="unifiedsheet.css">
</head>
<body>

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
        <a href="register.php" class="nav-link active">
            <span class="icon"></span> Register
        </a>
        <a href="admin_dashboard.php" class="nav-link">
            <span class="icon"></span> Admin
        </a>
    </nav>
</div>

<div class="form-container">
    <h1>Join Our Community</h1>
    
    <?php if ($message != ""): ?>
        <div class="success-message">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="form-group">
            <label>First Name: *</label>
            <input type="text" name="first_name" required>
        </div>

        <div class="form-group">
            <label>Last Name: *</label>
            <input type="text" name="last_name" required>
        </div>

        <div class="form-group">
            <label>Email Address: *</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Phone Number:</label>
            <input type="text" name="phone">
        </div>

        <div class="form-group">
            <label>Shipping Address:</label>
            <textarea name="address" rows="4"></textarea>
        </div>

        <button type="submit" class="submit-btn">Register Now</button>
    </form>
</div>

<footer>
    <a href="#"><span class="footer-icon"></span> Contact Us</a>
    <a href="#"><span class="footer-icon"></span> Watch Us Make Dice!</a>
    <a href="#"><span class="footer-icon"></span> Social Media</a>
</footer>

</body>
</html>