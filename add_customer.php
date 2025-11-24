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

<nav style="background:#222; padding:12px;">
    <a href="index.html" style="color:white; margin-right:20px;">Home</a>
    <a href="admin_dashboard.php" style="color:white; margin-right:20px;">Admin Dashboard</a>
</nav>

<h2>Add New Customer</h2>

<?php if ($message != "") echo "<p><strong>$message</strong></p>"; ?>

<form action="" method="POST">

    <label>First Name:</label><br>
    <input type="text" name="first_name" required><br><br>

    <label>Last Name:</label><br>
    <input type="text" name="last_name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Phone:</label><br>
    <input type="text" name="phone"><br><br>

    <label>Address:</label><br>
    <textarea name="address" rows="4"></textarea><br><br>

    <button type="submit">Add Customer</button>
</form>

<br>
<a href="view_customers.php">Back to Customers</a>

</body>
</html>
