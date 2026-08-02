<!DOCTYPE html>
<html>

<head>

    <title>Contact Us - BuildPro Builders</title>

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

    <h2>Contact BuildPro Builders</h2>

    <p style="text-align:center;">
        We'd love to hear from you. Please fill out the form below and our team will contact you shortly.
    </p>

    <br>

    <form onsubmit="return contactMessage();">

        <label>Full Name</label>

        <input
            type="text"
            name="name"
            required
            placeholder="Enter your full name">

        <label>Email Address</label>

        <input
            type="email"
            name="email"
            required
            placeholder="Enter your email">

        <label>Phone Number</label>

        <input
            type="tel"
            name="phone"
            pattern="[0-9]{10}"
            maxlength="10"
            required
            placeholder="Enter your mobile number">

        <label>Subject</label>

        <input
            type="text"
            name="subject"
            required
            placeholder="Enter subject">

        <label>Your Message</label>

        <textarea
            id="message"
            rows="5"
            onkeyup="countCharacters()"
            placeholder="Write your message..."
            required></textarea>

        <p id="count">0 Characters</p>

        <input
            type="submit"
            value="Send Message">

        <input
            type="reset"
            value="Clear">

    </form>

</section>

<section>

    <h2>Company Information</h2>

    <table>

        <tr>
            <th>Company</th>
            <td>BuildPro Builders Pvt. Ltd.</td>
        </tr>

        <tr>
            <th>Address</th>
            <td>123 Construction Avenue, Coimbatore, Tamil Nadu</td>
        </tr>

        <tr>
            <th>Phone</th>
            <td>+91 98765 43210</td>
        </tr>

        <tr>
            <th>Email</th>
            <td>info@buildprobuilders.com</td>
        </tr>

        <tr>
            <th>Working Hours</th>
            <td>Monday - Saturday : 9:00 AM - 6:00 PM</td>
        </tr>

    </table>

</section>

<section style="text-align:center;">

    <h2>Find Us</h2>

    <p>
        Click the button below to view our office location on Google Maps.
    </p>

    <br>

    <a
        href="https://maps.google.com"
        target="_blank"
        class="btn">

        View Location

    </a>

</section>

<section>

    <h2>Connect With Us</h2>

    <ul>

        <li><a href="#">Facebook</a></li>

        <li><a href="#">Instagram</a></li>

        <li><a href="#">LinkedIn</a></li>

        <li><a href="#">YouTube</a></li>

    </ul>

</section>

<footer>

    <p>&copy; 2026 BuildPro Builders. All Rights Reserved.</p>

</footer>

</body>

</html>