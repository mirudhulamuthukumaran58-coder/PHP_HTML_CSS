<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Result Processing System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<div class="card">

<h1> Student Result Processing</h1>

<form action="result.php" method="POST">

<label>Student Name</label>
<input type="text" name="name" required>

<label>Register Number</label>
<input type="text" name="regno" required>

<label>HTML</label>
<input type="number" name="m1" min="0" max="100" required>

<label>CSS</label>
<input type="number" name="m2" min="0" max="100" required>

<label>PHP</label>
<input type="number" name="m3" min="0" max="100" required>

<label>JavaScript</label>
<input type="number" name="m4" min="0" max="100" required>

<label>MySQL</label>
<input type="number" name="m5" min="0" max="100" required>

<input type="submit" value="Calculate Result">

</form>

</div>

</div>

</body>
</html>