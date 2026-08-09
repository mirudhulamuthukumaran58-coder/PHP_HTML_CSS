<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$bill = false;

$customer = "";
$plan = "";
$calls = 0;
$data = 0;
$callCharge = 0;
$dataCharge = 0;
$planCharge = 0;
$total = 0;

function calculateCallCharge($minutes)
{
    if ($minutes <= 100) {
        return 0;
    } elseif ($minutes <= 300) {
        return ($minutes - 100) * 1.00;
    } else {
        return (200 * 1.00) + (($minutes - 300) * 1.50);
    }
}

function calculateDataCharge($gb)
{
    if ($gb <= 2) {
        return 0;
    } elseif ($gb <= 5) {
        return ($gb - 2) * 50;
    } else {
        return (3 * 50) + (($gb - 5) * 75);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $customer = trim($_POST["customer"]);
    $plan = $_POST["plan"];
    $calls = floatval($_POST["calls"]);
    $data = floatval($_POST["data"]);

    if ($plan == "Basic") {
        $planCharge = 199;
    } elseif ($plan == "Standard") {
        $planCharge = 399;
    } else {
        $planCharge = 599;
    }

    $callCharge = calculateCallCharge($calls);
    $dataCharge = calculateDataCharge($data);

    $total = $planCharge + $callCharge + $dataCharge;

    $bill = true;
}

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Mobile Bill Generator</title>

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

    padding: 20px;

    font-family: Arial, sans-serif;

    background: linear-gradient(
        135deg,
        #141e30,
        #243b55,
        #4776e6
    );

}

.card {

    width: 100%;

    max-width: 520px;

    background: white;

    padding: 35px;

    border-radius: 22px;

    box-shadow: 0 18px 45px rgba(0,0,0,0.35);

}

h1 {

    text-align: center;

    color: #243b55;

    margin-bottom: 8px;

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

input,
select {

    width: 100%;

    padding: 13px;

    border: 2px solid #ddd;

    border-radius: 9px;

    font-size: 16px;

}

input:focus,
select:focus {

    outline: none;

    border-color: #4776e6;

}

button {

    width: 100%;

    margin-top: 25px;

    padding: 14px;

    border: none;

    border-radius: 9px;

    background: #4776e6;

    color: white;

    font-size: 17px;

    font-weight: bold;

    cursor: pointer;

}

button:hover {

    background: #315dcc;

}

.bill {

    margin-top: 30px;

    padding: 22px;

    border-radius: 15px;

    background: #f1f5ff;

    border: 1px solid #d7e0ff;

}

.bill h2 {

    text-align: center;

    color: #243b55;

    margin-top: 0;

}

.bill-row {

    display: flex;

    justify-content: space-between;

    padding: 10px 0;

    border-bottom: 1px solid #ddd;

}

.total {

    margin-top: 15px;

    padding: 15px;

    border-radius: 10px;

    background: #4776e6;

    color: white;

    display: flex;

    justify-content: space-between;

    font-size: 20px;

    font-weight: bold;

}

@media (max-width: 600px) {

    .card {

        padding: 25px;

    }

}

</style>

</head>

<body>

<div class="card">

<h1>📱 Mobile Bill Generator</h1>

<p class="subtitle">
Calculate your monthly mobile bill
</p>

<form method="POST" action="">

<label>Customer Name</label>

<input
type="text"
name="customer"
placeholder="Enter customer name"
required
>

<label>Tariff Plan</label>

<select name="plan" required>

<option value="">Select a plan</option>

<option value="Basic">Basic - ₹199</option>

<option value="Standard">Standard - ₹399</option>

<option value="Premium">Premium - ₹599</option>

</select>

<label>Call Usage (Minutes)</label>

<input
type="number"
name="calls"
min="0"
step="1"
placeholder="Enter call minutes"
required
>

<label>Data Usage (GB)</label>

<input
type="number"
name="data"
min="0"
step="0.1"
placeholder="Enter data usage"
required
>

<button type="submit">
Generate Bill
</button>

</form>

<?php if ($bill) { ?>

<div class="bill">

<h2>📄 Bill Summary</h2>

<div class="bill-row">

<span>Customer</span>

<strong>
<?php echo htmlspecialchars($customer); ?>
</strong>

</div>

<div class="bill-row">

<span>Tariff Plan</span>

<strong>
<?php echo htmlspecialchars($plan); ?>
</strong>

</div>

<div class="bill-row">

<span>Plan Charge</span>

<span>
₹ <?php echo number_format($planCharge, 2); ?>
</span>

</div>

<div class="bill-row">

<span>Call Charge</span>

<span>
₹ <?php echo number_format($callCharge, 2); ?>
</span>

</div>

<div class="bill-row">

<span>Data Charge</span>

<span>
₹ <?php echo number_format($dataCharge, 2); ?>
</span>

</div>

<div class="total">

<span>Total Bill</span>

<span>
₹ <?php echo number_format($total, 2); ?>
</span>

</div>

</div>

<?php } ?>

</div>

</body>

</html>