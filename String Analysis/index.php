<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>String Analysis System</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<div class="card">

<h1>String Analysis System</h1>

<form action="result.php" method="POST">

<label>Enter Title</label>

<input type="text" name="title" required>

<input type="submit" value="Analyze String">

</form>

</div>

</div>

</body>
</html>