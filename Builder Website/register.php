<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $password = $_POST["password"];
    $gender = $_POST["gender"] ?? "";
    $dob = $_POST["dob"];
    $age = $_POST["age"];
    $address = trim($_POST["address"]);
    $city = trim($_POST["city"]);
    $state = trim($_POST["state"]);
    $country = $_POST["country"];
    $pincode = trim($_POST["pincode"]);

    if (
        empty($name) || empty($email) || empty($phone) ||
        empty($password) || empty($gender)
    ) {

        $message = "Please fill all required fields.";

    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $message = "Invalid Email Address.";

    }
    elseif (!preg_match("/^[0-9]{10}$/", $phone)) {

        $message = "Phone number must contain exactly 10 digits.";

    }
    elseif (strlen($password) < 6) {

        $message = "Password must contain at least 6 characters.";

    }
    else {

        $message = "Registration Successful! (Demo Only - No Database Used)";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Registration</title>

<link rel="stylesheet" href="style.css">

<script src="script.js"></script>

</head>

<body>

<header>

<h1>BuildPro Builders</h1>

</header>

<nav>

<a href="index.php">Home</a>

<a href="about.php">About</a>

<a href="services.php">Services</a>

<a href="register.php">Register</a>

<a href="login.php">Login</a>

<a href="contact.php">Contact</a>

</nav>

<section>

<h2 class="form-title">Builder Registration Form</h2>

<?php
if($message!="")
{
    echo "<h3 style='text-align:center;color:green;'>$message</h3>";
}
?>

<form method="post" onsubmit="return validateForm();">

<label>Full Name</label>

<input
type="text"
name="name"
id="name"
required
maxlength="30"
pattern="[A-Za-z ]+"
placeholder="Enter Full Name">

<label>Email</label>

<input
type="email"
name="email"
id="email"
required
placeholder="Enter Email">

<label>Password</label>

<input
type="password"
name="password"
id="password"
required
minlength="6"
placeholder="Password">

<input
type="checkbox"
onclick="togglePassword()">
Show Password

<label>Confirm Password</label>

<input
type="password"
id="confirmPassword"
required
placeholder="Confirm Password">

<label>Mobile Number</label>

<input
type="text"
name="phone"
id="phone"
maxlength="10"
pattern="[0-9]{10}"
required
placeholder="9876543210">

<label>Gender</label>

<input
type="radio"
name="gender"
value="Male"
required> Male

<input
type="radio"
name="gender"
value="Female"> Female

<input
type="radio"
name="gender"
value="Other"> Other

<br><br>

<label>Date of Birth</label>

<input
type="date"
name="dob"
id="dob"
required>

<label>Age</label>

<input
type="number"
name="age"
id="age"
min="18"
max="80"
required>

<label>Address</label>

<textarea
name="address"
rows="4"
required></textarea>

<label>City</label>

<input
type="text"
name="city"
required>

<label>State</label>

<input
type="text"
name="state"
required>

<label>Country</label>

<select
name="country"
required>

<option value="">Select Country</option>

<option>India</option>

<option>USA</option>

<option>Canada</option>

<option>Australia</option>

</select>

<label>Pincode</label>

<input
type="text"
name="pincode"
pattern="[0-9]{6}"
maxlength="6"
required>

<label>Experience</label>

<input
type="range"
min="0"
max="30">

<label>Preferred Project Type</label>

<select>

<option>Residential</option>

<option>Commercial</option>

<option>Villa</option>

<option>Apartment</option>

</select>

<label>Upload Resume</label>

<input
type="file">

<label>Your Message</label>

<textarea
id="message"
onkeyup="countCharacters()"></textarea>

<p id="count">0 Characters</p>

<input
type="checkbox"
id="terms">

I agree to the Terms and Conditions

<br><br>

<input
type="submit"
value="Register">

<input
type="reset"
value="Reset">

</form>

</section>

<footer>

<p>&copy; 2026 BuildPro Builders. All Rights Reserved.</p>

</footer>

</body>

</html>