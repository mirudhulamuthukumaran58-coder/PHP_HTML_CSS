<!DOCTYPE html>
<html>
<head>
    <title>Student Details Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="form-box">
        <h2> Student Details Form</h2>

        <form action="display.php" method="POST">

            <label>Student Name</label>
            <input type="text" name="name" required>

            <label>Roll Number</label>
            <input type="text" name="rollno" required>

            <label>Department</label>
            <input type="text" name="department" required>

            <label>Year</label>
            <select name="year" required>
                <option>Select Year</option>
                <option>1st Year</option>
                <option>2nd Year</option>
                <option>3rd Year</option>
            </select>

            <label>Email</label>
            <input type="email" name="email" required>

            <input type="submit" value="Submit">

        </form>
    </div>
</div>

</body>
</html>