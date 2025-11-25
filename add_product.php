<?php
include("db_connect.php");

//Declare variables
$product_nameError = $dice_sidesError = $priceError = $GenError = $successMessage = "";
$product_name = $description = $price = $material = $dice_sides = $colour = $stock_quantity = "";

//Make data suitable for insertion
function modifydata($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

//Retrieve data from the form, check required fields are filled and insert data into variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Required fields
    if (empty($_POST["name"])) {
        $product_nameError = "* Product name is required";
    } else {
        $product_name = modifydata($_POST["name"]);
    }

    if (empty($_POST["price"])) {
        $priceError = "* Price is required";
    } else {
        $price = modifydata($_POST["price"]);
    }

    if (empty($_POST["dice_sides"])) {
        $dice_sidesError = "* Number of sides is required";
    } else {
        $dice_sides = modifydata($_POST["dice_sides"]);
    }


    //Optional fields
    $description = modifydata($_POST["description"]);
    $material = modifydata($_POST["material"]);
    $colour = modifydata($_POST["colour"]);
    $stock_quantity = modifydata($_POST["stock_quantity"]);

    //check all required fields are filled before insertion into table
    if (empty($_POST["name"]) || empty($_POST["price"]) || empty($_POST["dice_sides"])) {
        $GenError = "* Please fill in all the required fields";
    } else {
        $sql = "INSERT INTO products (product_name, description, price, material, dice_sides, colour, stock_quantity) 
            VALUES ('$product_name', '$description', '$price', '$material', '$dice_sides', '$colour', '$stock_quantity')";
        mysqli_query($conn, $sql);
        $successMessage = "Product added successfully!";
    }
}


mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="unifiedsheet.css">
    <title>Add Product - Fantasy Dice Company</title>
</head>

<body>
    <!--Add product form-->
    <div class="form-container">

        <h1>Forge your die!</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

            <p><span style="color:var(--color-gold)">* required field</span></p><br>
            <div class="form-group">
                <label>Product Name: <span>*</span></label>
                <input type="text" name="name" value="<?php echo $product_name; ?>">
                <span class="error"><?php echo $product_nameError; ?></span>
            </div>

            <div class="form-group">
                <label>Product Description:</label>
                <textarea name="description" rows="5" cols="40" value="<?php echo $description; ?>"></textarea>
            </div>

            <div class="form-group">
                <label>Product Price: <span>*</span></label>
                <input type="number" name="price" min="0" step="0.01" value="<?php echo $price; ?>">
                <span class="error"><?php echo $priceError; ?></span>
            </div>

            <div class="form-group">
                <label>Product Material:</label>
                <input type="text" name="material" value="<?php echo $material; ?>">
            </div>

            <div class="form-group">
                <label>Number of Sides: <span>*</span></label>
                <input type="number" max="20" name="dice_sides" value="<?php echo $dice_sides; ?>">
                <span class="error"><?php echo $dice_sidesError; ?></span>
            </div>

            <div class="form-group">
                <label>Dice Colour:</label>
                <input type="text" name="colour" value="<?php echo $colour; ?>">
            </div>

            <div class="form-group">
                <label>Stock Quantity:</label>
                <input type="number" name="stock_quantity"  step="1" value="<?php echo $stock_quantity; ?>"><br>
            </div>
            <input class="submit-btn" type="submit" name="submit" value="Add Product"><br>

            <div class="error">
                <?php echo $GenError; ?>
            </div>
            <div class="success">
                <?php echo $successMessage; ?>
            </div>

        </form>
       <br><br>
       <span class="return"><a href="admin_dashboard.php">&#8678; Return to the dashboard</a></span>


    </div>

   





</body>

</html>