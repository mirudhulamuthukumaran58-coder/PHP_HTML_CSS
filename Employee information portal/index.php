<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$result = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $employeeId = trim($_POST["employeeId"]);
    $department = trim($_POST["department"]);
    $designation = trim($_POST["designation"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);

    if ($name == "") {
        $error = "Please enter employee name.";
    }
    elseif ($employeeId == "") {
        $error = "Please enter employee ID.";
    }
    elseif ($department == "") {
        $error = "Please select a department.";
    }
    elseif ($designation == "") {
        $error = "Please enter designation.";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    }
    elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
        $error = "Phone number must contain exactly 10 digits.";
    }
    else {
        $result = true;
    }
}

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Employee Information Portal</title>

<style>

* {
    box-sizing: border-box;
}

body {
    margin: 0;
    min-height: 100vh;
    padding: 25px;

    display: flex;
    justify-content: center;
    align-items: center;

    font-family: Arial, sans-serif;

    background: linear-gradient(
        135deg,
        #ee0979,
        #ff6a00
    );
}

.card {
    width: 100%;
    max-width: 560px;

    background: white;

    padding: 35px;

    border-radius: 22px;

    box-shadow: 0 18px 45px rgba(0,0,0,0.3);
}

.icon {
    text-align: center;
    font-size: 50px;
}

h1 {
    text-align: center;
    color: #d6336c;
    margin: 5px 0;
}

.subtitle {
    text-align: center;
    color: #777;
    margin-bottom: 25px;
}

label {
    display: block;

    margin-top: 14px;
    margin-bottom: 7px;

    font-weight: bold;
    color: #333;
}

input,
select {
    width: 100%;

    padding: 13px;

    border: 2px solid #ddd;

    border-radius: 9px;

    font-size: 16px;

    background: white;
}

input:focus,
select:focus {
    outline: none;
    border-color: #ee0979;
}

button {
    width: 100%;

    margin-top: 25px;

    padding: 14px;

    border: none;

    border-radius: 9px;

    background: #d6336c;

    color: white;

    font-size: 17px;

    font-weight: bold;

    cursor: pointer;
}

button:hover {
    background: #b82b5b;
}

.error {
    margin-top: 20px;

    padding: 13px;

    background: #ffe5e5;

    color: #b00020;

    border-radius: 8px;

    text-align: center;

    font-weight: bold;
}

.profile {
    margin-top: 30px;

    padding: 22px;

    background: #fff5f7;

    border: 2px solid #ffd1dc;

    border-radius: 15px;
}

.profile h2 {
    text-align: center;

    color: #d6336c;

    margin-top: 0;
}

.row {
    display: flex;

    justify-content: space-between;

    padding: 12px 0;

    border-bottom: 1px solid #ddd;

    gap: 20px;
}

.row strong {
    color: #444;
}

.row span {
    text-align: right;
    color: #222;
}

.success {
    margin-top: 18px;

    padding: 13px;

    text-align: center;

    background: #d3f9d8;

    color: #087f23;

    border-radius: 8px;

    font-weight: bold;
}

@media (max-width: 600px) {

    .card {
        padding: 25px;
    }

    .row {
        flex-direction: column;
        gap: 5px;
    }

    .row span {
        text-align: left;
    }

}

</style>

</head>

<body>

<div class="card">

<div class="icon">👨‍💼</div>

<h1>Employee Portal</h1>

<p class="subtitle">
Enter employee information
</p>

<form method="POST" action="">

<label>Employee Name</label>

<input
    type="text"
    name="name"
    placeholder="Enter employee name"
    required
>

<label>Employee ID</label>

<input
    type="text"
    name="employeeId"
    placeholder="Enter employee ID"
    required
>

<label>Department</label>

<select name="department" required>

<option value="">Select Department</option>

<option value="Human Resources">Human Resources</option>

<option value="Information Technology">Information Technology</option>

<option value="Finance">Finance</option>

<option value="Marketing">Marketing</option>

<option value="Sales">Sales</option>

</select>

<label>Designation</label>

<input
    type="text"
    name="designation"
    placeholder="Enter designation"
    required
>

<label>Email Address</label>

<input
    type="email"
    name="email"
    placeholder="example@gmail.com"
    required
>

<label>Mobile Number</label>

<input
    type="tel"
    name="phone"
    placeholder="10 digit mobile number"
    pattern="[0-9]{10}"
    maxlength="10"
    required
>

<button type="submit">
Create Employee Profile
</button>

</form>


<?php if ($error != "") { ?>

<div class="error">

<?php echo $error; ?>

</div>

<?php } ?>


<?php if ($result == true) { ?>

<div class="profile">

<h2>📋 Employee Profile</h2>

<div class="row">

<strong>Employee Name</strong>

<span>
<?php echo htmlspecialchars($name); ?>
</span>

</div>

<div class="row">

<strong>Employee ID</strong>

<span>
<?php echo htmlspecialchars($employeeId); ?>
</span>

</div>

<div class="row">

<strong>Department</strong>

<span>
<?php echo htmlspecialchars($department); ?>
</span>

</div>

<div class="row">

<strong>Designation</strong>

<span>
<?php echo htmlspecialchars($designation); ?>
</span>

</div>

<div class="row">

<strong>Email</strong>

<span>
<?php echo htmlspecialchars($email); ?>
</span>

</div>

<div class="row">

<strong>Mobile</strong>

<span>
<?php echo htmlspecialchars($phone); ?>
</span>

</div>

<div class="success">
✅ Employee information submitted successfully!
</div>

</div>

<?php } ?>

</div>

</body>

</html>