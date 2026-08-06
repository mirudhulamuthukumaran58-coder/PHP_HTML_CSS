<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Registration Successful</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="glass">

<h1> Registration Successful</h1>

<?php

$name=$_POST["name"];
$email=$_POST["email"];
$mobile=$_POST["mobile"];
$course=$_POST["course"];
$qualification=$_POST["qualification"];
$gender=$_POST["gender"];

echo "<table>";

echo "<tr><th>Field</th><th>Details</th></tr>";

echo "<tr><td>Name</td><td>$name</td></tr>";
echo "<tr><td>Email</td><td>$email</td></tr>";
echo "<tr><td>Mobile</td><td>$mobile</td></tr>";
echo "<tr><td>Course</td><td>$course</td></tr>";
echo "<tr><td>Qualification</td><td>$qualification</td></tr>";
echo "<tr><td>Gender</td><td>$gender</td></tr>";

echo "</table>";

echo "<div class='success'>";
echo " Your registration has been completed successfully!";
echo "</div>";

?>

</div>

</body>
</html>