<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $length = intval($_POST["length"]);

    if ($length < 8) {
        $length = 8;
    }

    $uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $lowercase = "abcdefghijklmnopqrstuvwxyz";
    $digits = "0123456789";
    $special = "!@#$%^&*";

    // Make sure the password contains all required types
    $password =
        $uppercase[random_int(0, strlen($uppercase) - 1)] .
        $lowercase[random_int(0, strlen($lowercase) - 1)] .
        $digits[random_int(0, strlen($digits) - 1)] .
        $special[random_int(0, strlen($special) - 1)];

    $allCharacters = $uppercase . $lowercase . $digits . $special;

    // Fill the remaining characters
    while (strlen($password) < $length) {
        $password .= $allCharacters[
            random_int(0, strlen($allCharacters) - 1)
        ];
    }

    // Shuffle the generated password
    $password = str_shuffle($password);
}

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Password Generator</title>

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
        #42275a,
        #734b6d,
        #b06ab3
    );

}

.card {

    width: 100%;

    max-width: 500px;

    background: white;

    padding: 35px;

    border-radius: 24px;

    box-shadow: 0 18px 45px rgba(0,0,0,0.35);

}

.lock {

    text-align: center;

    font-size: 50px;

}

h1 {

    text-align: center;

    color: #42275a;

    margin: 5px 0 8px;

}

.subtitle {

    text-align: center;

    color: #777;

    margin-bottom: 25px;

}

label {

    display: block;

    margin-bottom: 8px;

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

    border-color: #734b6d;

}

button {

    width: 100%;

    margin-top: 20px;

    padding: 14px;

    border: none;

    border-radius: 10px;

    background: #734b6d;

    color: white;

    font-size: 17px;

    font-weight: bold;

    cursor: pointer;

}

button:hover {

    background: #42275a;

}

.password-box {

    margin-top: 25px;

    padding: 20px;

    border-radius: 15px;

    background: #f7eff8;

}

.password-box h2 {

    text-align: center;

    color: #42275a;

    font-size: 20px;

}

.password {

    padding: 15px;

    background: white;

    border: 2px dashed #734b6d;

    border-radius: 10px;

    text-align: center;

    word-break: break-all;

    font-size: 20px;

    font-weight: bold;

    color: #42275a;

}

.info {

    margin-top: 15px;

    text-align: center;

    color: #666;

    font-size: 14px;

}

@media (max-width: 600px) {

    .card {

        padding: 25px;

    }

    .password {

        font-size: 17px;

    }

}

</style>

</head>

<body>

<div class="card">

<div class="lock">🔐</div>

<h1>Password Generator</h1>

<p class="subtitle">
Create a strong and secure password
</p>

<form method="POST" action="">

<label>Password Length</label>

<input
type="number"
name="length"
min="8"
max="50"
value="12"
required
>

<button type="submit">
Generate Password
</button>

</form>

<?php if ($password != "") { ?>

<div class="password-box">

<h2>Generated Password</h2>

<div class="password">
<?php echo htmlspecialchars($password); ?>
</div>

<div class="info">

✓ Uppercase letters<br>
✓ Lowercase letters<br>
✓ Digits<br>
✓ Special characters

</div>

</div>

<?php } ?>

</div>

</body>

</html>