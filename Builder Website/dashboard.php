<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>BuildPro Builders - Dashboard</title>

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
    <a href="contact.php">Contact</a>
    <a href="logout.php" onclick="return confirmLogout();">Logout</a>

</nav>

<section>

    <h2>Welcome, <?php echo $_SESSION["username"]; ?>!</h2>

    <p style="text-align:center;">
        You have successfully logged in to the BuildPro Builders portal.
    </p>

    <br>

    <h3 style="text-align:center;">Current Date & Time</h3>

    <p id="clock" style="text-align:center;font-size:18px;font-weight:bold;"></p>

    <br>

    <h3>Company News</h3>

    <p>
        BuildPro Builders is committed to delivering high-quality residential,
        commercial, and infrastructure projects. Our experienced team focuses
        on innovation, quality, and customer satisfaction in every project.
    </p>

    <br>

    <h3>Construction Tips</h3>

    <ul>
        <li>Choose quality construction materials.</li>
        <li>Plan your budget before starting the project.</li>
        <li>Ensure proper site inspection.</li>
        <li>Hire experienced professionals.</li>
        <li>Follow safety standards at every stage.</li>
    </ul>

    <br>

    <h3>Quick Links</h3>

    <ul>
        <li><a href="about.php">About Our Company</a></li>
        <li><a href="services.php">View Our Services</a></li>
        <li><a href="contact.php">Contact Us</a></li>
    </ul>

    <br>

    <div style="text-align:center;">

        <button onclick="topFunction()">
            Back to Top
        </button>

    </div>

</section>

<footer>

    <p>&copy; 2026 BuildPro Builders. All Rights Reserved.</p>

</footer>

</body>

</html>