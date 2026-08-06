<!DOCTYPE html>
<html>
<head>
<title>Customer Invoice</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<div class="card">

<h1>Customer Invoice</h1>

<?php

$customer=$_POST["customer"];
$product=$_POST["product"];
$price=$_POST["price"];
$qty=$_POST["quantity"];
$discount=$_POST["discount"];
$gst=$_POST["gst"];

$subtotal=$price*$qty;

$discountAmount=($subtotal*$discount)/100;

$afterDiscount=$subtotal-$discountAmount;

$tax=($afterDiscount*$gst)/100;

$total=$afterDiscount+$tax;

?>

<table>

<tr>
<th>Item</th>
<th>Value</th>
</tr>

<tr>
<td>Customer</td>
<td><?php echo $customer; ?></td>
</tr>

<tr>
<td>Product</td>
<td><?php echo $product; ?></td>
</tr>

<tr>
<td>Price</td>
<td>₹ <?php echo number_format($price,2); ?></td>
</tr>

<tr>
<td>Quantity</td>
<td><?php echo $qty; ?></td>
</tr>

<tr>
<td>Subtotal</td>
<td>₹ <?php echo number_format($subtotal,2); ?></td>
</tr>

<tr>
<td>Discount (<?php echo $discount; ?>%)</td>
<td>- ₹ <?php echo number_format($discountAmount,2); ?></td>
</tr>

<tr>
<td>GST (<?php echo $gst; ?>%)</td>
<td>₹ <?php echo number_format($tax,2); ?></td>
</tr>

<tr>
<td><strong>Total Amount</strong></td>
<td><strong>₹ <?php echo number_format($total,2); ?></strong></td>
</tr>

</table>

<p class="total">
Thank you for shopping! 
</p>

</div>

</div>

</body>
</html>