<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$bmi = "";
$status = "";
$recommendation = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $height = floatval($_POST["height"]);
    $weight = floatval($_POST["weight"]);

    if ($height > 0 && $weight > 0) {

        $heightMeter = $height / 100;

        $bmi = $weight / ($heightMeter * $heightMeter);

        $bmi = round($bmi, 2);

        if ($bmi < 18.5) {

            $status = "Underweight";
            $recommendation = "Maintain a nutritious and balanced diet.";

        } elseif ($bmi < 25) {

            $status = "Normal Weight";
            $recommendation = "Keep maintaining a balanced diet and regular physical activity.";

        } elseif ($bmi < 30) {

            $status = "Overweight";
            $recommendation = "Regular exercise and a balanced diet are recommended.";

        } else {

            $status = "Obesity";
            $recommendation = "Consider healthy lifestyle changes and consult a healthcare professional.";

        }

    } else {

        $status = "Invalid Input";
        $recommendation = "Please enter valid height and weight.";

    }
}
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>BMI Calculator</title>

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

    font-family: Arial, sans-serif;

    background: linear-gradient(
        135deg,
        #ff9966,
        #ff5e62,
        #ffcc70
    );

    padding: 20px;
}

.card {

    width: 100%;

    max-width: 480px;

    background: white;

    padding: 35px;

    border-radius: 25px;

    box-shadow: 0 15px 40px rgba(0,0,0,0.25);

}

h1 {

    text-align: center;

    color: #e85d04;

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

    color: #444;

}

input {

    width: 100%;

    padding: 13px;

    border: 2px solid #ddd;

    border-radius: 10px;

    font-size: 16px;

}

input:focus {

    outline: none;

    border-color: #ff7b00;

}

button {

    width: 100%;

    margin-top: 25px;

    padding: 14px;

    border: none;

    border-radius: 10px;

    background: #e85d04;

    color: white;

    font-size: 17px;

    font-weight: bold;

    cursor: pointer;

}

button:hover {

    background: #d94801;

}

.result {

    margin-top: 25px;

    padding: 20px;

    text-align: center;

    border-radius: 15px;

    background: #fff3e6;

}

.result h2 {

    color: #e85d04;

}

.bmi {

    font-size: 40px;

    font-weight: bold;

    color: #d94801;

}

.recommendation {

    margin-top: 15px;

    padding: 15px;

    border-radius: 10px;

    background: #ffe0c2;

    color: #555;

}

@media(max-width:600px) {

    .card {

        padding: 25px;

    }

}

</style>

</head>

<body>

<div class="card">

<h1>⚖️ BMI Calculator</h1>

<p class="subtitle">
Calculate your Body Mass Index
</p>

<form method="POST" action="">

<label>Height (cm)</label>

<input
type="number"
name="height"
step="0.1"
min="1"
placeholder="Enter height in cm"
required
>

<label>Weight (kg)</label>

<input
type="number"
name="weight"
step="0.1"
min="1"
placeholder="Enter weight in kg"
required
>

<button type="submit">
Calculate BMI
</button>

</form>

<?php

if ($bmi != "") {

?>

<div class="result">

<h2>Your BMI Result</h2>

<div class="bmi">
<?php echo $bmi; ?>
</div>

<p>
<strong>Health Status:</strong>
<?php echo $status; ?>
</p>

<div class="recommendation">

<strong>💡 Health Recommendation</strong>

<p>
<?php echo $recommendation; ?>
</p>

</div>

</div>

<?php

}

?>

</div>

</body>

</html>