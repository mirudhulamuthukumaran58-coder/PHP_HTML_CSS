<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$success = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $age = trim($_POST["age"]);
    $city = trim($_POST["city"]);
    $address = trim($_POST["address"]);

    if ($name == "") {
        $error = "Please enter customer name.";
    }
    elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $error = "Name should contain only letters.";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    }
    elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
        $error = "Mobile number must contain exactly 10 digits.";
    }
    elseif ($age == "" || $age < 18 || $age > 100) {
        $error = "Age must be between 18 and 100.";
    }
    elseif ($city == "") {
        $error = "Please enter city.";
    }
    elseif ($address == "") {
        $error = "Please enter address.";
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

<title>Customer Registration System</title>

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
        #11998e,
        #38ef7d
    );

}

.card {

    width: 100%;

    max-width: 560px;

    background: #ffffff;

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

    color: #087f5b;

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
textarea {

    width: 100%;

    padding: 13px;

    border: 2px solid #ddd;

    border-radius: 9px;

    font-size: 16px;

    font-family: Arial, sans-serif;

}

textarea {

    resize: vertical;

    min-height: 80px;

}

input:focus,
textarea:focus {

    outline: none;

    border-color: #11998e;

}

button {

    width: 100%;

    margin-top: 25px;

    padding: 14px;

    border: none;

    border-radius: 9px;

    background: #087f5b;

    color: white;

    font-size: 17px;

    font-weight: bold;

    cursor: pointer;

}

button:hover {

    background: #066b4d;

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

    margin-top: 25px;

    padding: 25px;

    background: #effcf6;

    border: 2px solid #b7e4c7;

    border-radius: 15px;

}

.success-icon {

    text-align: center;

    font-size: 45px;

}

.success h2 {

    text-align: center;

    color: #087f5b;

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

<div class="icon">👤</div>

<h1>Customer Registration</h1>

<p class="subtitle">
Create your customer account
</p>


<form method="POST" action="">

<label>Full Name</label>

<input
    type="text"
    name="name"
    placeholder="Enter your full name"
    required
>

<label>Email Address</label>

<input
    type="email"
    name="email"
    placeholder="Enter your email"
    required
>

<label>Mobile Number</label>

<input
    type="tel"
    name="phone"
    placeholder="Enter 10-digit mobile number"
    maxlength="10"
    pattern="[0-9]{10}"
    required
>

<label>Age</label>

<input
    type="number"
    name="age"
    min="18"
    max="100"
    placeholder="Enter your age"
    required
>

<label>City</label>

<input
    type="text"
    name="city"
    placeholder="Enter your city"
    required
>

<label>Address</label>

<textarea
    name="address"
    placeholder="Enter your complete address"
    required
></textarea>

<button type="submit">
Register Customer
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

<h2>Registration Successful!</h2>

<div class="row">

<strong>Name</strong>

<span>
<?php echo htmlspecialchars($name); ?>
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

<div class="row">

<strong>Age</strong>

<span>
<?php echo htmlspecialchars($age); ?>
</span>

</div>

<div class="row">

<strong>City</strong>

<span>
<?php echo htmlspecialchars($city); ?>
</span>

</div>

<div class="row">

<strong>Address</strong>

<span>
<?php echo htmlspecialchars($address); ?>
</span>

</div>

</div>

<?php } ?>

</div>

</body>

</html>