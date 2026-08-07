<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$success = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $parentName = trim($_POST["parentName"]);
    $studentName = trim($_POST["studentName"]);
    $class = trim($_POST["class"]);
    $phone = trim($_POST["phone"]);
    $date = trim($_POST["date"]);
    $slot = trim($_POST["slot"]);
    $purpose = trim($_POST["purpose"]);

    if ($parentName == "") {
        $error = "Please enter parent name.";
    }
    elseif ($studentName == "") {
        $error = "Please enter student name.";
    }
    elseif ($class == "") {
        $error = "Please enter student class.";
    }
    elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
        $error = "Phone number must contain exactly 10 digits.";
    }
    elseif ($date == "") {
        $error = "Please select a meeting date.";
    }
    elseif ($slot == "") {
        $error = "Please select a meeting slot.";
    }
    elseif ($purpose == "") {
        $error = "Please enter the purpose of the meeting.";
    }
    else {
        $success = true;
    }
}

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Parent Teacher Meeting Registration</title>

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
        #7f00ff,
        #e100ff
    );

}

.card {

    width: 100%;

    max-width: 580px;

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

    color: #7b1fa2;

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
select,
textarea {

    width: 100%;

    padding: 13px;

    border: 2px solid #ddd;

    border-radius: 9px;

    font-size: 16px;

    font-family: Arial, sans-serif;

}

textarea {

    min-height: 75px;

    resize: vertical;

}

input:focus,
select:focus,
textarea:focus {

    outline: none;

    border-color: #9c27b0;

}

button {

    width: 100%;

    margin-top: 25px;

    padding: 14px;

    border: none;

    border-radius: 9px;

    background: #8e24aa;

    color: white;

    font-size: 17px;

    font-weight: bold;

    cursor: pointer;

}

button:hover {

    background: #6a1b9a;

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

.success {

    margin-top: 30px;

    padding: 22px;

    background: #faf0ff;

    border: 2px solid #e1bee7;

    border-radius: 15px;

}

.success-icon {

    text-align: center;

    font-size: 45px;

}

.success h2 {

    text-align: center;

    color: #7b1fa2;

    margin-top: 5px;

}

.row {

    display: flex;

    justify-content: space-between;

    padding: 11px 0;

    border-bottom: 1px solid #ddd;

    gap: 20px;

}

.row span {

    text-align: right;

}

.confirmation {

    margin-top: 18px;

    padding: 14px;

    background: #e8f5e9;

    color: #2e7d32;

    border-radius: 9px;

    text-align: center;

    font-weight: bold;

}

@media (max-width: 600px) {

    .card {
        padding: 25px;
    }

    .row {
        flex-direction: column;
        gap: 4px;
    }

    .row span {
        text-align: left;
    }

}

</style>

</head>

<body>

<div class="card">

<div class="icon">👨‍👩‍👧‍👦</div>

<h1>Parent–Teacher Meeting</h1>

<p class="subtitle">
Register for your appointment
</p>

<form method="POST" action="">

<label>Parent Name</label>

<input
    type="text"
    name="parentName"
    placeholder="Enter parent name"
    required
>

<label>Student Name</label>

<input
    type="text"
    name="studentName"
    placeholder="Enter student name"
    required
>

<label>Student Class</label>

<input
    type="text"
    name="class"
    placeholder="Example: B.Sc CS - II Year"
    required
>

<label>Parent Mobile Number</label>

<input
    type="tel"
    name="phone"
    placeholder="Enter 10-digit mobile number"
    maxlength="10"
    pattern="[0-9]{10}"
    required
>

<label>Meeting Date</label>

<input
    type="date"
    name="date"
    required
>

<label>Meeting Slot</label>

<select name="slot" required>

<option value="">Select a time slot</option>

<option value="09:00 AM - 09:30 AM">
09:00 AM - 09:30 AM
</option>

<option value="10:00 AM - 10:30 AM">
10:00 AM - 10:30 AM
</option>

<option value="11:00 AM - 11:30 AM">
11:00 AM - 11:30 AM
</option>

<option value="02:00 PM - 02:30 PM">
02:00 PM - 02:30 PM
</option>

<option value="03:00 PM - 03:30 PM">
03:00 PM - 03:30 PM
</option>

</select>

<label>Purpose of Meeting</label>

<textarea
    name="purpose"
    placeholder="Enter reason for meeting"
    required
></textarea>

<button type="submit">
Book Appointment
</button>

</form>


<?php if ($error != "") { ?>

<div class="error">

⚠️ <?php echo $error; ?>

</div>

<?php } ?>


<?php if ($success == true) { ?>

<div class="success">

<div class="success-icon">
✅
</div>

<h2>Appointment Confirmed!</h2>

<div class="row">

<strong>Parent Name</strong>

<span>
<?php echo htmlspecialchars($parentName); ?>
</span>

</div>

<div class="row">

<strong>Student Name</strong>

<span>
<?php echo htmlspecialchars($studentName); ?>
</span>

</div>

<div class="row">

<strong>Class</strong>

<span>
<?php echo htmlspecialchars($class); ?>
</span>

</div>

<div class="row">

<strong>Mobile</strong>

<span>
<?php echo htmlspecialchars($phone); ?>
</span>

</div>

<div class="row">

<strong>Meeting Date</strong>

<span>
<?php echo htmlspecialchars($date); ?>
</span>

</div>

<div class="row">

<strong>Meeting Slot</strong>

<span>
<?php echo htmlspecialchars($slot); ?>
</span>

</div>

<div class="row">

<strong>Purpose</strong>

<span>
<?php echo htmlspecialchars($purpose); ?>
</span>

</div>

<div class="confirmation">

🎉 Your Parent–Teacher Meeting has been successfully booked!

</div>

</div>

<?php } ?>

</div>

</body>

</html>