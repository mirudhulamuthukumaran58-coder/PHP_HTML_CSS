<!DOCTYPE html>
<html>
<head>
    <title>Admission Application</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="card">

        <h1>Admission Application</h1>
        <p class="subtitle">Apply for the Academic Year 2026-2027</p>

        <form action="acknowledgement.php" method="POST">

            <label>Full Name</label>
            <input type="text" name="name" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Phone Number</label>
            <input type="tel" name="phone"
                   pattern="[0-9]{10}"
                   placeholder="10-digit mobile number"
                   required>

            <label>Date of Birth</label>
            <input type="date" name="dob" required>

            <label>Gender</label>
            <select name="gender" required>
                <option value="">Select</option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>

            <label>Course Applied</label>
            <select name="course" required>
                <option value="">Select Course</option>
                <option>B.Sc Computer Science</option>
                <option>BCA</option>
                <option>B.Com</option>
                <option>BBA</option>
            </select>

            <label>Address</label>
            <textarea name="address" rows="4" required></textarea>

            <input type="submit" value="Submit Application">

        </form>

    </div>
</div>

</body>
</html>