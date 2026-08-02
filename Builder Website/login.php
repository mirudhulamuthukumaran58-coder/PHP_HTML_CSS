<?php
session_start();

// Demo Login Credentials (No Database)
$validEmail = "admin@buildpro.com";
$validPassword = "builder123";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if ($email == $validEmail && $password == $validPassword) {

        $_SESSION["username"] = "Administrator";
        $_SESSION["email"] = $email;

        header("Location: dashboard.php");
        exit();

    } else {

        $message = "Invalid Email or Password!";

    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>BuildPro Builders - Login</title>

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

    <h2 class="form-title">Login</h2>

    <?php
    if ($message != "") {
        echo "<h3 style='color:red;text-align:center;'>$message</h3>";
    }
    ?>

    <form method="post">

        <label>Email</label>

        <input
            type="email"
            name="email"
            required
            placeholder="Enter Email">

        <label>Password</label>

        <input
            type="password"
            id="password"
            name="password"
            required
            placeholder="Enter Password">

        <input
            type="checkbox"
            onclick="togglePassword()">

        Show Password

        <br><br>

        <input
            type="submit"
            value="Login">

        <input
            type="reset"
            value="Clear">

    </form>

    <br>

    <p style="text-align:center;">
        Don't have an account?
        <a href="register.php">Register Here</a>
    </p>

    <br>

    <div style="text-align:center;">

        <h3>Demo Login Credentials</h3>

        <p><strong>Email:</strong> admin@buildpro.com</p>
        <p><strong>Password:</strong> builder123</p>

    </div>

</section>

<footer>

    <p>&copy; 2026 BuildPro Builders. All Rights Reserved.</p>

</footer>

</body>

</html>