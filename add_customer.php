
<?php
include 'db_connect.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['customer_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "INSERT INTO customers (customer_name, email, phone, address) 
            VALUES ('$name', '$email', '$phone', '$address')";

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

<h2>Add New Customer</h2>

<?php if ($message != "") echo "<p><strong>$message</strong></p>"; ?>

<form action="" method="POST">
    <label>Name:</label><br>
    <input type="text" name="customer_name" required><br><br>

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
