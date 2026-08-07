<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = "";
$customerName = "";
$accountNumber = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    // Demo login credentials
    $correctUsername = "customer";
    $correctPassword = "12345";

    if ($username === $correctUsername && $password === $correctPassword) {

        $customerName = "Mirudhula";
        $accountNumber = "XXXX XXXX 4589";

        $message = "Login Successful";

    } else {

        $message = "Invalid username or password";

    }
}

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Online Banking Login</title>

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

    background:
        linear-gradient(
            135deg,
            #0f2027,
            #203a43,
            #2c5364
        );

    padding: 20px;
}

.container {

    width: 100%;

    max-width: 450px;

}

.card {

    background: white;

    padding: 35px;

    border-radius: 20px;

    box-shadow: 0 15px 40px rgba(0,0,0,0.35);

}

.logo {

    text-align: center;

    font-size: 50px;

    margin-bottom: 5px;

}

h1 {

    text-align: center;

    color: #173f5f;

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

    border-color: #168aad;

}

button {

    width: 100%;

    margin-top: 25px;

    padding: 14px;

    border: none;

    border-radius: 9px;

    background: #168aad;

    color: white;

    font-size: 17px;

    font-weight: bold;

    cursor: pointer;

}

button:hover {

    background: #0b7285;

}

.success {

    margin-top: 25px;

    padding: 20px;

    border-radius: 12px;

    background: #e7f8ef;

    border-left: 5px solid #2a9d8f;

}

.success h2 {

    color: #16805c;

    margin-top: 0;

}

.error {

    margin-top: 20px;

    padding: 14px;

    border-radius: 10px;

    background: #ffe8e8;

    color: #c1121f;

    text-align: center;

    font-weight: bold;

}

.info {

    margin-top: 12px;

    padding: 12px;

    background: white;

    border-radius: 8px;

}

.demo {

    margin-top: 20px;

    text-align: center;

    font-size: 13px;

    color: #777;

}

@media (max-width: 600px) {

    .card {

        padding: 25px;

    }

}

</style>

</head>

<body>

<div class="container">

<div class="card">

<div class="logo">🏦</div>

<h1>Online Banking</h1>

<p class="subtitle">
Secure Customer Login
</p>

<form method="POST" action="">

<label>Customer Username</label>

<input
type="text"
name="username"
placeholder="Enter username"
required
>

<label>Password</label>

<input
type="password"
name="password"
placeholder="Enter password"
required
>

<button type="submit">
Login Securely
</button>

</form>

<?php

if ($message == "Login Successful") {

?>

<div class="success">

<h2>✓ Login Successful</h2>

<p>Welcome, <strong><?php echo $customerName; ?></strong>!</p>

<div class="info">

<strong>Customer Name:</strong>
<?php echo $customerName; ?>

<br><br>

<strong>Account Number:</strong>
<?php echo $accountNumber; ?>

<br><br>

<strong>Account Status:</strong>
Active

</div>

</div>

<?php

} elseif ($message != "") {

?>

<div class="error">

<?php echo $message; ?>

</div>

<?php

}

?>

<div class="demo">

<strong>Demo Login</strong><br>
Username: customer<br>
Password: 12345

</div>

</div>

</div>

</body>

</html>