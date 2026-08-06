<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Email ID Generator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<div class="card">

<h1> Employee Email ID Generator</h1>

<form action="generate.php" method="POST">

<label>First Name</label>
<input type="text" name="fname" required>

<label>Last Name</label>
<input type="text" name="lname" required>

<label>Company Name</label>
<input type="text" name="company" required>

<input type="submit" value="Generate Email">

</form>

</div>

</div>

</body>
</html>