<?php
include 'db_connect.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "INSERT INTO customers (first_name, last_name, email, phone, address)
            VALUES ('$first', '$last', '$email', '$phone', '$address')";

    if ($conn->query($sql) === TRUE) {
        $message = "Customer added successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Customer</title>
    <link rel="stylesheet" href="unifiedsheet.css">
</head>
<body>

<nav class="simple-nav">
    <a href="index.html">Home</a>
    <a href="admin_dashboard.php">Admin Dashboard</a>
</nav>

<div class="page-wrapper">
    <div class="fantasy-card">
        <h2>Add New Customer</h2>

        <?php if ($message != ""): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>

        <form action="" method="POST">

            <label>First Name:</label>
            <input class="fantasy-input" type="text" name="first_name" required>

            <label>Last Name:</label>
            <input class="fantasy-input" type="text" name="last_name" required>

            <label>Email:</label>
            <input class="fantasy-input" type="email" name="email" required>

            <label>Phone:</label>
            <input class="fantasy-input" type="text" name="phone">

            <label>Address:</label>
            <textarea class="fantasy-textarea" name="address" rows="4"></textarea>

            <button type="submit" class="fantasy-button">Add Customer</button>
        </form>

        <a class="return-link" href="view_customers.php">Back to Customers</a>
    </div>
</div>

</body>
</html>