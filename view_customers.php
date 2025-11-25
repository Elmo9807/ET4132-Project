<?php
include 'db_connect.php';

$sql = "SELECT * FROM customers ORDER BY customer_id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Customers</title>
    <link rel="stylesheet" href="unifiedsheet.css">
</head>

<body>

<nav class="simple-nav">
    <a href="index.html">Home</a>
    <a href="admin_dashboard.php">Admin Dashboard</a>
</nav>

<div class="page-wrapper">
    <div class="fantasy-card">
        <h2>Customer List</h2>

        <a class="fantasy-button" href="add_customer.php">Add New Customer</a>

        <table class="fantasy-table">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['customer_id']}</td>
                            <td>{$row['first_name']}</td>
                            <td>{$row['last_name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['address']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No customers found.</td></tr>";
            }
            ?>
        </table>

        <a class="return-link" href="admin_dashboard.php">Return to Dashboard</a>
    </div>
</div>

</body>
</html>