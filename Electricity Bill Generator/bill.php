<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

if($_SERVER["REQUEST_METHOD"]!="POST")
{
die("Invalid Request");
}

$name=$_POST["name"];
$units=$_POST["units"];

if($units<=100)
{
$bill=$units*2;
}

elseif($units<=200)
{
$bill=(100*2)+(($units-100)*3);
}

elseif($units<=300)
{
$bill=(100*2)+(100*3)+(($units-200)*5);
}

else
{
$bill=(100*2)+(100*3)+(100*5)+(($units-300)*7);
}

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Electricity Bill</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="card">

<h1>Electricity Bill</h1>

<table>

<tr>
<th>Details</th>
<th>Value</th>
</tr>

<tr>
<td>Consumer Name</td>
<td><?php echo htmlspecialchars($name); ?></td>
</tr>

<tr>
<td>Units Consumed</td>
<td><?php echo $units; ?></td>
</tr>

<tr>
<td>Total Bill</td>
<td><strong>₹ <?php echo number_format($bill,2); ?></strong></td>
</tr>

</table>

</div>

</body>

</html>