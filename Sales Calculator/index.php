<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Sales Calculator</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="card">

<h1>🛒 Sales Calculator</h1>

<form action="result.php" method="POST">

<label>Product Name</label>
<input type="text" name="product" required>

<label>Quantity</label>
<input type="number" name="quantity" min="1" required>

<label>Price (₹)</label>
<input type="number" name="price" min="1" required>

<input type="submit" value="Calculate Sales">

</form>

</div>

</body>
</html>