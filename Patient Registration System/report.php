<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Invalid Request");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Patient Report</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="box">

<h1> Registration Successful</h1>

<table>

<tr>
<th>Field</th>
<th>Details</th>
</tr>

<tr>
<td>Name</td>
<td><?php echo $_POST["name"]; ?></td>
</tr>

<tr>
<td>Age</td>
<td><?php echo $_POST["age"]; ?></td>
</tr>

<tr>
<td>Gender</td>
<td><?php echo $_POST["gender"]; ?></td>
</tr>

<tr>
<td>Mobile</td>
<td><?php echo $_POST["mobile"]; ?></td>
</tr>

<tr>
<td>Blood Group</td>
<td><?php echo $_POST["blood"]; ?></td>
</tr>

<tr>
<td>Address</td>
<td><?php echo $_POST["address"]; ?></td>
</tr>

</table>

<div class="success">
Patient registration completed successfully.
</div>

</div>

</body>
</html>