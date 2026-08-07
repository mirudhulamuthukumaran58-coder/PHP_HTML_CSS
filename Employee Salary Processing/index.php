<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$result = false;
$error = "";

function calculateGrossSalary($basic, $allowance)
{
    return $basic + $allowance;
}

function calculateDeduction($gross, $deductionRate)
{
    return ($gross * $deductionRate) / 100;
}

function calculateNetSalary($gross, $deduction)
{
    return $gross - $deduction;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $basic = floatval($_POST["basic"]);
    $allowance = floatval($_POST["allowance"]);
    $deductionRate = floatval($_POST["deduction"]);

    if ($name == "") {
        $error = "Please enter employee name.";
    }
    elseif ($basic < 0 || $allowance < 0 || $deductionRate < 0) {
        $error = "Salary values cannot be negative.";
    }
    elseif ($deductionRate > 100) {
        $error = "Deduction percentage cannot exceed 100%.";
    }
    else {

        $gross = calculateGrossSalary($basic, $allowance);

        $deductionAmount = calculateDeduction(
            $gross,
            $deductionRate
        );

        $net = calculateNetSalary(
            $gross,
            $deductionAmount
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

<title>Employee Salary Processing</title>

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
        #6a11cb,
        #2575fc
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

    font-size: 48px;

}

h1 {

    text-align: center;

    color: #5b21b6;

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

    border-color: #6a11cb;

}

button {

    width: 100%;

    margin-top: 25px;

    padding: 14px;

    border: none;

    border-radius: 9px;

    background: #6a11cb;

    color: white;

    font-size: 17px;

    font-weight: bold;

    cursor: pointer;

}

button:hover {

    background: #4c0fa8;

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

    background: #f6f1ff;

    border-radius: 14px;

    border: 2px solid #ddd0ff;

}

.result h2 {

    text-align: center;

    color: #5b21b6;

}

.row {

    display: flex;

    justify-content: space-between;

    padding: 11px 0;

    border-bottom: 1px solid #ddd;

}

.net {

    margin-top: 20px;

    padding: 18px;

    text-align: center;

    border-radius: 10px;

    background: #e9d5ff;

    color: #4c1d95;

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

<div class="icon">💼</div>

<h1>Salary Processing</h1>

<p class="subtitle">
Calculate gross salary, deductions and net salary
</p>

<form method="POST" action="">

<label>Employee Name</label>

<input
type="text"
name="name"
placeholder="Enter employee name"
required
>

<label>Basic Salary (₹)</label>

<input
type="number"
name="basic"
min="0"
step="0.01"
placeholder="Enter basic salary"
required
>

<label>Allowances (₹)</label>

<input
type="number"
name="allowance"
min="0"
step="0.01"
placeholder="Enter allowances"
required
>

<label>Deduction (%)</label>

<input
type="number"
name="deduction"
min="0"
max="100"
step="0.01"
placeholder="Enter deduction percentage"
required
>

<button type="submit">
Process Salary
</button>

</form>


<?php if ($error != "") { ?>

<div class="error">
<?php echo $error; ?>
</div>

<?php } ?>


<?php if ($result == true) { ?>

<div class="result">

<h2>📋 Salary Report</h2>

<div class="row">

<strong>Employee Name</strong>

<span>
<?php echo htmlspecialchars($name); ?>
</span>

</div>

<div class="row">

<strong>Basic Salary</strong>

<span>
₹ <?php echo number_format($basic, 2); ?>
</span>

</div>

<div class="row">

<strong>Allowances</strong>

<span>
₹ <?php echo number_format($allowance, 2); ?>
</span>

</div>

<div class="row">

<strong>Gross Salary</strong>

<span>
₹ <?php echo number_format($gross, 2); ?>
</span>

</div>

<div class="row">

<strong>Deduction</strong>

<span>
₹ <?php echo number_format($deductionAmount, 2); ?>
</span>

</div>

<div class="net">

Net Salary<br>

₹ <?php echo number_format($net, 2); ?>

</div>

<div class="note">

Gross Salary = Basic Salary + Allowances

</div>

</div>

<?php } ?>

</div>

</body>

</html>