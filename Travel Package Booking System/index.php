<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$submitted = false;

$name = "";
$email = "";
$phone = "";
$package = "";
$persons = "";
$travelDate = "";
$total = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $package = $_POST["package"];
    $persons = intval($_POST["persons"]);
    $travelDate = $_POST["travelDate"];

    // Package prices per person
    if ($package == "Goa") {

        $price = 12000;

    } elseif ($package == "Manali") {

        $price = 15000;

    } elseif ($package == "Kerala") {

        $price = 10000;

    } else {

        $price = 18000;
    }

    $total = $price * $persons;

    $submitted = true;
}

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Travel Package Booking</title>

<style>

* {
    box-sizing: border-box;
}

body {

    margin: 0;

    min-height: 100vh;

    display: flex;

    justify-content: center;

    align-items: center;

    padding: 25px;

    font-family: Arial, sans-serif;

    background: linear-gradient(
        135deg,
        #f7971e,
        #ffd200,
        #f857a6
    );

}

.container {

    width: 100%;

    max-width: 550px;

}

.card {

    background: white;

    padding: 35px;

    border-radius: 25px;

    box-shadow: 0 18px 45px rgba(0,0,0,0.3);

}

.travel-icon {

    text-align: center;

    font-size: 50px;

}

h1 {

    text-align: center;

    color: #e85d04;

    margin: 5px 0 8px;

}

.subtitle {

    text-align: center;

    color: #777;

    margin-bottom: 25px;

}

label {

    display: block;

    margin-top: 15px;

    margin-bottom: 7px;

    font-weight: bold;

    color: #444;

}

input,
select {

    width: 100%;

    padding: 13px;

    border: 2px solid #ddd;

    border-radius: 10px;

    font-size: 16px;

}

input:focus,
select:focus {

    outline: none;

    border-color: #f7971e;

}

button {

    width: 100%;

    margin-top: 25px;

    padding: 14px;

    border: none;

    border-radius: 10px;

    background: linear-gradient(
        90deg,
        #f7971e,
        #f857a6
    );

    color: white;

    font-size: 17px;

    font-weight: bold;

    cursor: pointer;

}

button:hover {

    opacity: 0.9;

}

.confirmation {

    margin-top: 30px;

    padding: 22px;

    border-radius: 15px;

    background: #fff7e6;

    border: 2px solid #ffd166;

}

.confirmation h2 {

    text-align: center;

    color: #e85d04;

    margin-top: 0;

}

.detail {

    display: flex;

    justify-content: space-between;

    gap: 15px;

    padding: 10px 0;

    border-bottom: 1px solid #ddd;

}

.total {

    margin-top: 18px;

    padding: 15px;

    border-radius: 10px;

    background: #f857a6;

    color: white;

    display: flex;

    justify-content: space-between;

    font-size: 20px;

    font-weight: bold;

}

.success {

    text-align: center;

    color: #198754;

    font-weight: bold;

    margin-bottom: 15px;

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

<div class="travel-icon">✈️</div>

<h1>Travel Package Booking</h1>

<p class="subtitle">
Plan your next unforgettable journey
</p>

<form method="POST" action="">

<label>Customer Name</label>

<input
type="text"
name="name"
placeholder="Enter your name"
required
>

<label>Email Address</label>

<input
type="email"
name="email"
placeholder="Enter your email"
required
>

<label>Phone Number</label>

<input
type="tel"
name="phone"
pattern="[0-9]{10}"
placeholder="10-digit mobile number"
required
>

<label>Select Travel Package</label>

<select name="package" required>

<option value="">Choose a destination</option>

<option value="Goa">
Goa - ₹12,000/person
</option>

<option value="Manali">
Manali - ₹15,000/person
</option>

<option value="Kerala">
Kerala - ₹10,000/person
</option>

<option value="Rajasthan">
Rajasthan - ₹18,000/person
</option>

</select>

<label>Number of Persons</label>

<input
type="number"
name="persons"
min="1"
max="20"
placeholder="Enter number of persons"
required
>

<label>Travel Date</label>

<input
type="date"
name="travelDate"
required
>

<button type="submit">
Book Package
</button>

</form>

<?php if ($submitted) { ?>

<div class="confirmation">

<div class="success">
✓ Booking Successful!
</div>

<h2>🎫 Booking Confirmation</h2>

<div class="detail">

<strong>Customer</strong>

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

<strong>Phone</strong>

<span>
<?php echo htmlspecialchars($phone); ?>
</span>

</div>

<div class="detail">

<strong>Package</strong>

<span>
<?php echo htmlspecialchars($package); ?>
</span>

</div>

<div class="detail">

<strong>Persons</strong>

<span>
<?php echo $persons; ?>
</span>

</div>

<div class="detail">

<strong>Travel Date</strong>

<span>
<?php echo htmlspecialchars($travelDate); ?>
</span>

</div>

<div class="total">

<span>Total Amount</span>

<span>
₹ <?php echo number_format($total, 2); ?>
</span>

</div>

</div>

<?php } ?>

</div>

</div>

</body>

</html>