<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<div class="form-box">

<h2> Submitted Student Details</h2>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
echo "<table width='100%' cellpadding='10' border='1' style='border-collapse:collapse;'>";

echo "<tr><th>Field</th><th>Details</th></tr>";

echo "<tr><td>Name</td><td>".$_POST['name']."</td></tr>";
echo "<tr><td>Roll Number</td><td>".$_POST['rollno']."</td></tr>";
echo "<tr><td>Department</td><td>".$_POST['department']."</td></tr>";
echo "<tr><td>Year</td><td>".$_POST['year']."</td></tr>";
echo "<tr><td>Email</td><td>".$_POST['email']."</td></tr>";

echo "</table>";
}
?>

</div>
</div>

</body>
</html>