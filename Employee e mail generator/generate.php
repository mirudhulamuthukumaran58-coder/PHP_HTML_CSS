<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

if($_SERVER["REQUEST_METHOD"]=="POST"){

$fname = strtolower(trim($_POST["fname"]));
$lname = strtolower(trim($_POST["lname"]));
$company = strtolower(trim($_POST["company"]));

$email = $fname.".".$lname."@".str_replace(" ","",$company).".com";

?>
<!DOCTYPE html>
<html>
<head>
<title>Generated Email</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<div class="card">

<h1>Generated Employee Email</h1>

<table>

<tr>
<th>Field</th>
<th>Details</th>
</tr>

<tr>
<td>First Name</td>
<td><?php echo ucfirst($fname); ?></td>
</tr>

<tr>
<td>Last Name</td>
<td><?php echo ucfirst($lname); ?></td>
</tr>

<tr>
<td>Company</td>
<td><?php echo ucfirst($company); ?></td>
</tr>

<tr>
<td>Email ID</td>
<td><strong><?php echo $email; ?></strong></td>
</tr>

</table>

</div>
</div>

</body>
</html>

<?php
}
else{
echo "Invalid Request";
}
?>