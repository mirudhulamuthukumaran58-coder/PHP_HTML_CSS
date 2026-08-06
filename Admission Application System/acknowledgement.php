<!DOCTYPE html>
<html>
<head>
    <title>Admission Acknowledgement</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<div class="card">

<h1>Admission Acknowledgement</h1>

<p style="text-align:center;margin-top:10px;">
Your application has been submitted successfully.
</p>

<table>

<tr>
<th>Field</th>
<th>Details</th>
</tr>

<tr><td>Name</td><td><?php echo $_POST["name"]; ?></td></tr>
<tr><td>Email</td><td><?php echo $_POST["email"]; ?></td></tr>
<tr><td>Phone</td><td><?php echo $_POST["phone"]; ?></td></tr>
<tr><td>Date of Birth</td><td><?php echo $_POST["dob"]; ?></td></tr>
<tr><td>Gender</td><td><?php echo $_POST["gender"]; ?></td></tr>
<tr><td>Course</td><td><?php echo $_POST["course"]; ?></td></tr>
<tr><td>Address</td><td><?php echo $_POST["address"]; ?></td></tr>

</table>

</div>

</div>

</body>
</html>