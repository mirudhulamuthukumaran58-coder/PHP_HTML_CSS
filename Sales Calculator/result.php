<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


$product = $_POST["product"];
$quantity = $_POST["quantity"];
$price = $_POST["price"];

function calculateSales($qty, $rate)
{
    return $qty * $rate;
}

$total = calculateSales($quantity, $price);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Sales Report</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">

<h1>💰 Sales Report</h1>

<table>

<tr>
<th>Item</th>
<th>Value</th>
</tr>

<tr>
<td>Product</td>
<td><?php echo htmlspecialchars($product); ?></td>
</tr>

<tr>
<td>Quantity</td>
<td><?php echo $quantity; ?></td>
</tr>

<tr>
<td>Price</td>
<td>₹ <?php echo $price; ?></td>
</tr>

<tr>
<td>Total Sales</td>
<td>₹ <?php echo $total; ?></td>
</tr>

</table>

</div>

</body>
</html>