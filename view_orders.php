<?php
include("db_connect.php");

$sql = "SELECT orders.order_id, CONCAT(customers.first_name,' ',customers.last_name) AS customer_name,
        orders.order_date, orders.total_amount, orders.status FROM orders JOIN customers ON orders.customer_id = customers.customer_id
        ORDER BY orders.order_id DESC";



$result = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="unifiedsheet.css">
    <title>View Orders</title>
</head>
<body>

    <div class="orders-container">
<h1>Orders</h1>


<table>
    <tr>
        <th>Order ID</th>
        <th>Customer</th>
        <th>Date</th>
        <th>Total (€)</th>
        <th>Status</th>
    </tr>

     <?php while ($row = mysqli_fetch_assoc($result)) { 
        // assign CSS class based on status
        $statusClass = "status-" . strtolower($row['status']);
    ?>

     <tr>
            <td><?php echo $row['order_id']; ?></td>
            <td><?php echo $row['customer_name']; ?></td>
            <td><?php echo $row['order_date']; ?></td>
            <td><?php echo number_format($row['total_amount'], 2); ?></td>
            <td class="<?php echo $statusClass; ?>"><?php echo $row['status']; ?></td>
        </tr>
    <?php } ?>

</table>
<br>
 <span class="return"><a href="admin_dashboard.php">&#8678; Return to the dashboard</a></span>
     </div>

</body>
</html>