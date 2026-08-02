/* ===================================
   BuildPro Builders - script.js
   =================================== */

// Welcome message
window.onload = function () {
    alert("Welcome to BuildPro Builders!");
    showDateTime();
};

// ------------------------------
// Registration Form Validation
// ------------------------------
function validateForm() {

    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let age = document.getElementById("age").value;
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirmPassword").value;
    let terms = document.getElementById("terms");

    // Name Validation
    if (name.length < 3) {
        alert("Name must contain at least 3 characters.");
        return false;
    }

    // Phone Validation
    if (phone.length != 10 || isNaN(phone)) {
        alert("Enter a valid 10-digit mobile number.");
        return false;
    }

    // Age Validation
    if (age < 18) {
        alert("You must be at least 18 years old.");
        return false;
    }

    // Password Validation
    if (password.length < 6) {
        alert("Password should contain at least 6 characters.");
        return false;
    }

    // Confirm Password
    if (password != confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }

    // Terms & Conditions
    if (!terms.checked) {
        alert("Please accept the Terms and Conditions.");
        return false;
    }

    alert("Registration Successful!");
    return true;
}

// ------------------------------
// Show / Hide Password
// ------------------------------
function togglePassword() {

    let pass = document.getElementById("password");

    if (pass.type === "password")
        pass.type = "text";
    else
        pass.type = "password";
}

// ------------------------------
// Character Counter
// ------------------------------
function countCharacters() {

    let text = document.getElementById("message").value;
    document.getElementById("count").innerHTML =
        text.length + " Characters";
}

// ------------------------------
// Live Date & Time
// ------------------------------
function showDateTime() {

    setInterval(function () {

        let now = new Date();

        let date =
            now.toLocaleDateString() +
            " | " +
            now.toLocaleTimeString();

        let clock = document.getElementById("clock");

        if (clock != null)
            clock.innerHTML = date;

    }, 1000);
}

// ------------------------------
// Confirm Logout
// ------------------------------
function confirmLogout() {

    return confirm("Are you sure you want to logout?");
}

// ------------------------------
// Scroll To Top
// ------------------------------
function topFunction() {

    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });

}

// ------------------------------
// Greeting
// ------------------------------
function greeting() {

    let hour = new Date().getHours();

    if (hour < 12)
        return "Good Morning!";
    else if (hour < 17)
        return "Good Afternoon!";
    else
        return "Good Evening!";
}

// ------------------------------
// Display Greeting
// ------------------------------
function displayGreeting() {

    let greet = document.getElementById("greeting");

    if (greet != null)
        greet.innerHTML = greeting();

}

displayGreeting();

// ------------------------------
// Contact Form Message
// ------------------------------
function contactMessage() {

    alert("Thank you for contacting BuildPro Builders. We will get back to you soon!");

    return true;
}

// ------------------------------
// Smooth Scroll
// ------------------------------
document.querySelectorAll('a[href^="#"]').forEach(anchor => {

    anchor.addEventListener('click', function (e) {

        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({

            behavior: 'smooth'

        });

    });

});