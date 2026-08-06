<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Course Registration System</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="glass">

<h1>Course Registration</h1>

<form action="register.php" method="POST">

<label>Full Name</label>
<input type="text" name="name" required>

<label>Email Address</label>
<input type="email" name="email" required>

<label>Mobile Number</label>
<input type="tel"
name="mobile"
pattern="[0-9]{10}"
placeholder="10-digit Mobile Number"
required>

<label>Select Course</label>
<select name="course" required>
<option value="">Choose Course</option>
<option>Web Development</option>
<option>Python Programming</option>
<option>Java Programming</option>
<option>Artificial Intelligence</option>
<option>Data Science</option>
</select>

<label>Qualification</label>
<input type="text" name="qualification" required>

<label>Gender</label>

<div class="radio-group">
<input type="radio" name="gender" value="Male" required> Male
<input type="radio" name="gender" value="Female"> Female
<input type="radio" name="gender" value="Other"> Other
</div>

<input type="submit" value="Register">

</form>

</div>

</body>
</html>