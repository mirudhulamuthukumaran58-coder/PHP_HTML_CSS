<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$result = false;
$error = "";

function calculatePremium($age, $term, $coverage)
{
    // Base premium: 2% of coverage
    $premium = $coverage * 0.02;

    // Age-based loading
    if ($age >= 50) {
        $premium = $premium * 1.30;
    }
    elseif ($age >= 35) {
        $premium = $premium * 1.15;
    }

    // Longer policy term
    if ($term >= 20) {
        $premium = $premium * 1.10;
    }

    return $premium;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $age = intval($_POST["age"]);
    $term = intval($_POST["term"]);
    $coverage = floatval($_POST["coverage"]);

    if ($age <= 0 || $age > 100) {

        $error = "Please enter a valid age.";

    }
    elseif ($term <= 0) {

        $error = "Policy term must be greater than 0.";

    }
    elseif ($coverage <= 0) {

        $error = "Coverage amount must be greater than 0.";

    }
    else {

        $premium = calculatePremium(
            $age,
            $term,
            $coverage
        );

        $result = true;
    }
}

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Insurance Premium Calculator</title>

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
        #ff512f,
        #dd2476
    );

}

.card {

    width: 100%;

    max-width: 520px;

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

    color: #c2185b;

    margin: 5px 0;

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

    color: #333;

}

input {

    width: 100%;

    padding: 13px;

    border: 2px solid #ddd;

    border-radius: 9px;

    font-size: 16px;

}

input:focus {

    outline: none;

    border-color: #dd2476;

}

button {

    width: 100%;

    margin-top: 25px;

    padding: 14px;

    border: none;

    border-radius: 9px;

    background: #c2185b;

    color: white;

    font-size: 17px;

    font-weight: bold;

    cursor: pointer;

}

button:hover {

    background: #a3154d;

}

.error {

    margin-top: 20px;

    padding: 12px;

    background: #ffe5e5;

    color: #b00020;

    border-radius: 8px;

    text-align: center;

    font-weight: bold;

}

.result {

    margin-top: 30px;

    padding: 22px;

    background: #fff0f6;

    border-radius: 14px;

    border: 2px solid #ffc4d9;

}

.result h2 {

    text-align: center;

    color: #c2185b;

}

.row {

    display: flex;

    justify-content: space-between;

    padding: 11px 0;

    border-bottom: 1px solid #ddd;

}

.premium {

    margin-top: 20px;

    padding: 18px;

    text-align: center;

    border-radius: 10px;

    background: #f8bbd0;

    color: #880e4f;

    font-size: 24px;

    font-weight: bold;

}

.note {

    text-align: center;

    color: #777;

    font-size: 13px;

    margin-top: 15px;

}

@media (max-width: 600px) {

    .card {
        padding: 25px;
    }

    .row {
        flex-direction: column;
        gap: 5px;
    }

}

</style>

</head>

<body>

<div class="card">

<div class="icon">🛡️</div>

<h1>Insurance Calculator</h1>

<p class="subtitle">
Calculate your estimated insurance premium
</p>

<form method="POST" action="">

<label>Age</label>

<input
type="number"
name="age"
min="1"
max="100"
placeholder="Enter your age"
required
>

<label>Policy Term (Years)</label>

<input
type="number"
name="term"
min="1"
placeholder="Enter policy term"
required
>

<label>Coverage Amount (₹)</label>

<input
type="number"
name="coverage"
min="1"
step="0.01"
placeholder="Enter coverage amount"
required
>

<button type="submit">
Calculate Premium
</button>

</form>


<?php if ($error != "") { ?>

<div class="error">

<?php echo $error; ?>

</div>

<?php } ?>


<?php if ($result == true) { ?>

<div class="result">

<h2>📋 Policy Summary</h2>

<div class="row">

<strong>Age</strong>

<span>
<?php echo $age; ?> years
</span>

</div>

<div class="row">

<strong>Policy Term</strong>

<span>
<?php echo $term; ?> years
</span>

</div>

<div class="row">

<strong>Coverage Amount</strong>

<span>
₹ <?php echo number_format($coverage, 2); ?>
</span>

</div>

<div class="premium">

Estimated Premium<br>

₹ <?php echo number_format($premium, 2); ?>

</div>

<div class="note">

Premium is an estimated amount for demonstration purposes.

</div>

</div>

<?php } ?>

</div>

</body>

</html>