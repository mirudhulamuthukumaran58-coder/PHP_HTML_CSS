<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Applicant Validation System</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<div class="card">

<h1> Applicant Validation</h1>

<form action="validate.php" method="POST">

<label>Applicant Name</label>
<input type="text" name="name" required>

<label>Email ID</label>
<input type="email" name="email" required>

<label>Password</label>
<input type="password" name="password" required>

<label>Mobile Number</label>
<input type="text" name="mobile" maxlength="10" required>

<input type="submit" value="Validate">

</form>

</div>

</div>

</body>
</html>