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

<h2>Customer List</h2>

<a href="add_customer.php">Add New Customer</a><br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['customer_id'] . "</td>
                    <td>" . $row['customer_name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['phone'] . "</td>
                    <td>" . $row['address'] . "</td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No customers found.</td></tr>";
    }
    ?>
</table>

</body>
</html>
