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
    <title>Document</title>
     <style>

        body {
        background-color: #000; 
        font-family: Arial, sans-serif;
        color: #FFD700; 
    }

    .orders-container {
        max-width: 900px;
        margin: 50px auto;
        padding: 30px;
        background-color: #006666; 
        border: 4px solid #FFD700;
        border-radius: 10px;
        text-align: center;
    }

    .orders-container h1 {
        color: #FFD700;
        margin-bottom: 25px;
        font-size: 32px;
        font-weight: bold;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #1a5c54; 
        color: #FFD700; 
        border: 2px solid #FFD700;
        border-radius: 8px;
        overflow: hidden;
      
    }

    th {
        background-color: #145a32; 
        padding: 12px;
        border-bottom: 2px solid #FFD700;
        font-size: 18px;
    }

    td {
        padding: 12px;
        border-bottom: 1px solid #FFD700;
        font-size: 16px;
    }



    tr:hover {
        background-color: #1b8a6b; 
    }

    
    .status-pending {
        background-color: #ffeb3b;
        color: black;
        font-weight: bold;
        padding: 5px 10px;
        border-radius: 5px;
        display: inline-block;
    }

    .status-processing {
        background-color: #03a9f4;
        color: white;
        font-weight: bold;
        padding: 5px 10px;
        border-radius: 5px;
        display: inline-block;
    }

    .status-shipped {
        background-color: #9c27b0;
        color: white;
        font-weight: bold;
        padding: 5px 10px;
        border-radius: 5px;
        display: inline-block;
    }

    .status-delivered {
        background-color: #4caf50;
        color: white;
        font-weight: bold;
        padding: 5px 10px;
        border-radius: 5px;
        display: inline-block;
    }

    

       </style>

   


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
 <span class="return"><a href="admin_dashboard.php" style="color:#FFD700; font-size: 30px;">&#8678 Return to the dashboard</a></span>
     </div>

</body>
</html>