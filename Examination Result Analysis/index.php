<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$result = false;
$error = "";

function calculatePercentage($total, $subjects)
{
    return ($total / ($subjects * 100)) * 100;
}

function determineClass($percentage)
{
    if ($percentage >= 75) {
        return "Distinction";
    } elseif ($percentage >= 60) {
        return "First Class";
    } elseif ($percentage >= 50) {
        return "Second Class";
    } elseif ($percentage >= 40) {
        return "Pass Class";
    } else {
        return "Fail";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $english = floatval($_POST["english"]);
    $maths = floatval($_POST["maths"]);
    $science = floatval($_POST["science"]);
    $computer = floatval($_POST["computer"]);
    $social = floatval($_POST["social"]);

    if ($name == "") {

        $error = "Please enter student name.";

    } elseif (
        $english < 0 || $english > 100 ||
        $maths < 0 || $maths > 100 ||
        $science < 0 || $science > 100 ||
        $computer < 0 || $computer > 100 ||
        $social < 0 || $social > 100
    ) {

        $error = "All marks must be between 0 and 100.";

    } else {

        $total = $english + $maths + $science + $computer + $social;

        $percentage = calculatePercentage($total, 5);

        $percentage = round($percentage, 2);

        $class = determineClass($percentage);

        $result = true;
    }
}

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Examination Result Analysis</title>

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
        #ff9966,
        #ff5e62
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
    color: #e65100;
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

input {
    width: 100%;
    padding: 13px;

    border: 2px solid #ddd;
    border-radius: 9px;

    font-size: 16px;
}

input:focus {
    outline: none;
    border-color: #ff7043;
}

button {
    width: 100%;

    margin-top: 25px;
    padding: 14px;

    border: none;
    border-radius: 9px;

    background: #e65100;
    color: white;

    font-size: 17px;
    font-weight: bold;

    cursor: pointer;
}

button:hover {
    background: #bf360c;
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

.result {
    margin-top: 30px;
    padding: 22px;

    background: #fff8f2;

    border: 2px solid #ffccbc;

    border-radius: 15px;
}

.result h2 {
    text-align: center;
    color: #e65100;
    margin-top: 0;
}

.row {
    display: flex;
    justify-content: space-between;

    padding: 10px 0;

    border-bottom: 1px solid #ddd;
}

.total {
    text-align: center;

    margin-top: 20px;

    font-size: 24px;
    font-weight: bold;

    color: #e65100;
}

.percentage {
    text-align: center;

    margin: 10px 0;

    font-size: 40px;
    font-weight: bold;

    color: #ff5722;
}

.class-result {
    margin-top: 15px;
    padding: 15px;

    text-align: center;

    border-radius: 10px;

    background: #ffe0b2;
    color: #e65100;

    font-size: 21px;
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

}

</style>

</head>

<body>

<div class="card">

<div class="icon">🎓</div>

<h1>Examination Result</h1>

<p class="subtitle">
Enter marks to calculate percentage and class
</p>

<form method="POST" action="">

<label>Student Name</label>

<input
    type="text"
    name="name"
    placeholder="Enter student name"
    required
>

<label>English</label>

<input
    type="number"
    name="english"
    min="0"
    max="100"
    placeholder="Marks out of 100"
    required
>

<label>Mathematics</label>

<input
    type="number"
    name="maths"
    min="0"
    max="100"
    placeholder="Marks out of 100"
    required
>

<label>Science</label>

<input
    type="number"
    name="science"
    min="0"
    max="100"
    placeholder="Marks out of 100"
    required
>

<label>Computer Science</label>

<input
    type="number"
    name="computer"
    min="0"
    max="100"
    placeholder="Marks out of 100"
    required
>

<label>Social Science</label>

<input
    type="number"
    name="social"
    min="0"
    max="100"
    placeholder="Marks out of 100"
    required
>

<button type="submit">
Calculate Result
</button>

</form>

<?php if ($error != "") { ?>

<div class="error">

⚠️ <?php echo $error; ?>

</div>

<?php } ?>


<?php if ($result == true) { ?>

<div class="result">

<h2>📋 Result Analysis</h2>

<div class="row">
<strong>Student Name</strong>
<span><?php echo htmlspecialchars($name); ?></span>
</div>

<div class="row">
<strong>English</strong>
<span><?php echo $english; ?>/100</span>
</div>

<div class="row">
<strong>Mathematics</strong>
<span><?php echo $maths; ?>/100</span>
</div>

<div class="row">
<strong>Science</strong>
<span><?php echo $science; ?>/100</span>
</div>

<div class="row">
<strong>Computer Science</strong>
<span><?php echo $computer; ?>/100</span>
</div>

<div class="row">
<strong>Social Science</strong>
<span><?php echo $social; ?>/100</span>
</div>

<div class="total">

Total: <?php echo $total; ?> / 500

</div>

<div class="percentage">

<?php echo $percentage; ?>%

</div>

<p style="text-align:center;">
Percentage
</p>

<div class="class-result">

🏆 <?php echo $class; ?>

</div>

</div>

<?php } ?>

</div>

</body>

</html>