<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$registered = false;

$name = "";
$email = "";
$phone = "";
$age = "";
$gender = "";
$address = "";
$membership = "";

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $age = intval($_POST["age"]);
    $gender = $_POST["gender"];
    $address = trim($_POST["address"]);
    $membership = $_POST["membership"];

    /* Name validation */
    if ($name == "") {
        $errors[] = "Name is required.";
    }

    /* Email validation */
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    /* Mobile validation */
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "Mobile number must contain exactly 10 digits.";
    }

    /* Age validation */
    if ($age < 5 || $age > 100) {
        $errors[] = "Age must be between 5 and 100.";
    }

    /* Gender validation */
    if ($gender == "") {
        $errors[] = "Please select your gender.";
    }

    /* Address validation */
    if ($address == "") {
        $errors[] = "Address is required.";
    }

    /* Membership validation */
    if ($membership == "") {
        $errors[] = "Please select a membership type.";
    }

    /* Generate membership information */
    if (count($errors) == 0) {

        $membershipID = "LIB" . rand(10000, 99999);

        $registered = true;
    }
}

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Library Membership Registration</title>

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
        #134e5e,
        #2c7744,
        #76b852
    );

}

.container {

    width: 100%;

    max-width: 600px;

}

.card {

    background: #fffdf5;

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

    color: #245501;

    margin: 5px 0 8px;

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

    padding: 12px;

    border: 2px solid #d8dfd3;

    border-radius: 9px;

    font-size: 15px;

    font-family: Arial, sans-serif;

}

input:focus,
select:focus,
textarea:focus {

    outline: none;

    border-color: #4c956c;

}

textarea {

    resize: vertical;

    min-height: 80px;

}

button {

    width: 100%;

    margin-top: 25px;

    padding: 14px;

    border: none;

    border-radius: 9px;

    background: #2c7744;

    color: white;

    font-size: 17px;

    font-weight: bold;

    cursor: pointer;

}

button:hover {

    background: #245c36;

}

.errors {

    margin-bottom: 20px;

    padding: 15px;

    border-radius: 10px;

    background: #ffe8e8;

    color: #b42318;

}

.errors p {

    margin: 5px 0;

}

.success {

    margin-top: 30px;

    padding: 22px;

    border-radius: 15px;

    background: #edf8ee;

    border: 2px solid #8bc48b;

}

.success h2 {

    text-align: center;

    color: #287233;

    margin-top: 0;

}

.member-id {

    text-align: center;

    margin: 15px 0;

    padding: 15px;

    background: #2c7744;

    color: white;

    border-radius: 10px;

    font-size: 22px;

    font-weight: bold;

}

.detail {

    display: flex;

    justify-content: space-between;

    gap: 15px;

    padding: 9px 0;

    border-bottom: 1px solid #ddd;

}

@media (max-width: 600px) {

    .card {

        padding: 25px;

    }

    .detail {

        flex-direction: column;

        gap: 3px;

    }

}

</style>

</head>

<body>

<div class="container">

<div class="card">

<div class="icon">📚</div>

<h1>Library Membership</h1>

<p class="subtitle">
Register for your library membership
</p>

<?php if (count($errors) > 0) { ?>

<div class="errors">

<strong>⚠ Please correct the following:</strong>

<?php

foreach ($errors as $error) {

    echo "<p>• " . htmlspecialchars($error) . "</p>";

}

?>

</div>

<?php } ?>

<form method="POST" action="">

<label>Full Name</label>

<input
type="text"
name="name"
value="<?php echo htmlspecialchars($name); ?>"
placeholder="Enter your full name"
required
>

<label>Email Address</label>

<input
type="email"
name="email"
value="<?php echo htmlspecialchars($email); ?>"
placeholder="Enter your email"
required
>

<label>Mobile Number</label>

<input
type="text"
name="phone"
value="<?php echo htmlspecialchars($phone); ?>"
maxlength="10"
pattern="[0-9]{10}"
placeholder="Enter 10-digit mobile number"
required
>

<label>Age</label>

<input
type="number"
name="age"
value="<?php echo $age; ?>"
min="5"
max="100"
placeholder="Enter your age"
required
>

<label>Gender</label>

<select name="gender" required>

<option value="">Select Gender</option>

<option value="Male">Male</option>

<option value="Female">Female</option>

<option value="Other">Other</option>

</select>

<label>Address</label>

<textarea
name="address"
placeholder="Enter your address"
required
><?php echo htmlspecialchars($address); ?></textarea>

<label>Membership Type</label>

<select name="membership" required>

<option value="">Select Membership</option>

<option value="Monthly">Monthly - ₹100</option>

<option value="Quarterly">Quarterly - ₹250</option>

<option value="Yearly">Yearly - ₹800</option>

</select>

<button type="submit">
Register for Membership
</button>

</form>

<?php if ($registered) { ?>

<div class="success">

<h2>✅ Registration Successful!</h2>

<div class="member-id">

Membership ID:<br>

<?php echo $membershipID; ?>

</div>

<div class="detail">

<strong>Name</strong>

<span>
<?php echo htmlspecialchars($name); ?>
</span>

</div>

<div class="detail">

<strong>Email</strong>

<span>
<?php echo htmlspecialchars($email); ?>
</span>

</div>

<div class="detail">

<strong>Mobile</strong>

<span>
<?php echo htmlspecialchars($phone); ?>
</span>

</div>

<div class="detail">

<strong>Age</strong>

<span>
<?php echo $age; ?>
</span>

</div>

<div class="detail">

<strong>Gender</strong>

<span>
<?php echo htmlspecialchars($gender); ?>
</span>

</div>

<div class="detail">

<strong>Membership</strong>

<span>
<?php echo htmlspecialchars($membership); ?>
</span>

</div>

</div>

<?php } ?>

</div>

</div>

</body>

</html>