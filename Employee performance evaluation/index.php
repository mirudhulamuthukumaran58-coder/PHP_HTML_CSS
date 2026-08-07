<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$result = false;
$error = "";

function calculateAverage($technical, $communication, $teamwork, $productivity)
{
    return ($technical + $communication + $teamwork + $productivity) / 4;
}

function getRating($average)
{
    if ($average >= 90) {
        return "Excellent";
    }
    elseif ($average >= 75) {
        return "Very Good";
    }
    elseif ($average >= 60) {
        return "Good";
    }
    elseif ($average >= 50) {
        return "Average";
    }
    else {
        return "Needs Improvement";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $technical = floatval($_POST["technical"]);
    $communication = floatval($_POST["communication"]);
    $teamwork = floatval($_POST["teamwork"]);
    $productivity = floatval($_POST["productivity"]);

    if ($name == "") {

        $error = "Please enter employee name.";

    }
    elseif (
        $technical < 0 || $technical > 100 ||
        $communication < 0 || $communication > 100 ||
        $teamwork < 0 || $teamwork > 100 ||
        $productivity < 0 || $productivity > 100
    ) {

        $error = "All performance scores must be between 0 and 100.";

    }
    else {

        $average = calculateAverage(
            $technical,
            $communication,
            $teamwork,
            $productivity
        );

        $average = round($average, 2);

        $rating = getRating($average);

        $result = true;
    }
}

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Employee Performance Evaluation</title>

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
        #8e2de2,
        #4a00e0
    );

}

.card {

    width: 100%;

    max-width: 560px;

    background: white;

    padding: 35px;

    border-radius: 22px;

    box-shadow: 0 18px 45px rgba(0,0,0,0.35);

}

.icon {

    text-align: center;

    font-size: 50px;

}

h1 {

    text-align: center;

    color: #6a1b9a;

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

    border-color: #8e2de2;

}

button {

    width: 100%;

    margin-top: 25px;

    padding: 14px;

    border: none;

    border-radius: 9px;

    background: #6a1b9a;

    color: white;

    font-size: 17px;

    font-weight: bold;

    cursor: pointer;

}

button:hover {

    background: #4a148c;

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

    background: #f7f0ff;

    border: 2px solid #dfc8ff;

    border-radius: 15px;

}

.result h2 {

    text-align: center;

    color: #6a1b9a;

    margin-top: 0;

}

.row {

    display: flex;

    justify-content: space-between;

    padding: 10px 0;

    border-bottom: 1px solid #ddd;

}

.average {

    text-align: center;

    margin: 20px 0;

    font-size: 40px;

    font-weight: bold;

    color: #8e2de2;

}

.rating {

    padding: 15px;

    text-align: center;

    border-radius: 10px;

    background: #e9d5ff;

    color: #581c87;

    font-size: 22px;

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

<div class="icon">🏆</div>

<h1>Performance Evaluation</h1>

<p class="subtitle">
Evaluate employee performance and rating
</p>

<form method="POST" action="">

<label>Employee Name</label>

<input
type="text"
name="name"
placeholder="Enter employee name"
required
>

<label>Technical Skills Score</label>

<input
type="number"
name="technical"
min="0"
max="100"
placeholder="Enter score (0-100)"
required
>

<label>Communication Score</label>

<input
type="number"
name="communication"
min="0"
max="100"
placeholder="Enter score (0-100)"
required
>

<label>Teamwork Score</label>

<input
type="number"
name="teamwork"
min="0"
max="100"
placeholder="Enter score (0-100)"
required
>

<label>Productivity Score</label>

<input
type="number"
name="productivity"
min="0"
max="100"
placeholder="Enter score (0-100)"
required
>

<button type="submit">
Evaluate Performance
</button>

</form>


<?php if ($error != "") { ?>

<div class="error">

<?php echo $error; ?>

</div>

<?php } ?>


<?php if ($result == true) { ?>

<div class="result">

<h2>📋 Evaluation Result</h2>

<div class="row">

<strong>Employee Name</strong>

<span>
<?php echo htmlspecialchars($name); ?>
</span>

</div>

<div class="row">

<strong>Technical Skills</strong>

<span>
<?php echo $technical; ?>
</span>

</div>

<div class="row">

<strong>Communication</strong>

<span>
<?php echo $communication; ?>
</span>

</div>

<div class="row">

<strong>Teamwork</strong>

<span>
<?php echo $teamwork; ?>
</span>

</div>

<div class="row">

<strong>Productivity</strong>

<span>
<?php echo $productivity; ?>
</span>

</div>

<div class="average">

<?php echo $average; ?>%

</div>

<p style="text-align:center;">
Overall Performance Score
</p>

<div class="rating">

⭐ <?php echo $rating; ?>

</div>

<div class="note">

Rating is calculated based on the average performance score.

</div>

</div>

<?php } ?>

</div>

</body>

</html>