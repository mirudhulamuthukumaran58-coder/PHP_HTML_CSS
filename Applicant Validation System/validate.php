<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$email = $_POST['email'];
$password = $_POST['password'];
$mobile = $_POST['mobile'];

$emailValid = filter_var($email, FILTER_VALIDATE_EMAIL);
$passwordValid = strlen($password) >= 8;
$mobileValid = preg_match('/^[0-9]{10}$/', $mobile);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Validation Result</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<div class="card">

<h1>Validation Result</h1>

<table>

<tr>
<th>Validation</th>
<th>Result</th>
</tr>

<tr>
<td>Email</td>
<td><?php echo $emailValid ? "Valid ✅" : "Invalid ❌"; ?></td>
</tr>

<tr>
<td>Password</td>
<td><?php echo $passwordValid ? "Valid ✅" : "Minimum 8 characters ❌"; ?></td>
</tr>

<tr>
<td>Mobile</td>
<td><?php echo $mobileValid ? "Valid ✅" : "Invalid ❌"; ?></td>
</tr>

</table>

</div>
</div>

</body>
</html>