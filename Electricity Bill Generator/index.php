<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Electricity Bill Calculator</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="card">

<h1> Electricity Bill Calculator</h1>

<form action="bill.php" method="POST">

<label>Consumer Name</label>
<input type="text" name="name" required>

<label>Units Consumed</label>
<input type="number" name="units" min="1" required>

<input type="submit" value="Calculate Bill">

</form>

</div>

</body>
</html>