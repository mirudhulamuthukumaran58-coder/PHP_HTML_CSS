<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Patient Registration System</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="box">

<h1>🏥 Patient Registration</h1>

<form action="report.php" method="POST">

<label>Patient Name</label>
<input type="text" name="name" required>

<label>Age</label>
<input type="number" name="age" min="1" max="120" required>

<label>Gender</label>
<select name="gender" required>
<option value="">Select Gender</option>
<option>Male</option>
<option>Female</option>
<option>Other</option>
</select>

<label>Mobile Number</label>
<input type="tel" name="mobile"
pattern="[0-9]{10}"
placeholder="10-digit Mobile Number"
required>

<label>Blood Group</label>
<select name="blood" required>
<option value="">Select Blood Group</option>
<option>A+</option>
<option>A-</option>
<option>B+</option>
<option>B-</option>
<option>AB+</option>
<option>AB-</option>
<option>O+</option>
<option>O-</option>
</select>

<label>Address</label>
<textarea name="address" rows="4" required></textarea>

<input type="submit" value="Register Patient">

</form>

</div>

</body>
</html>