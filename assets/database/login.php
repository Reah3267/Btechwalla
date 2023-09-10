<?php
session_start(); // Start a PHP session (if not already started)

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the submitted username and password
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Replace these values with your actual user data retrieval from the database
    $validUsername = "your_username"; // Replace with a valid username from your database
    $validPasswordHash = password_hash("your_password", PASSWORD_DEFAULT); // Replace with a hashed password from your database

    if ($username === $validUsername && password_verify($password, $validPasswordHash)) {
        // Authentication successful
        $_SESSION["username"] = $username; // Store the username in a session variable
        header("Location: dashboard.php"); // Redirect to a dashboard or welcome page
        exit;
    } else {
        // Authentication failed
        $error_message = "Login failed. Please check your credentials."; // Error message to display on the login page
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="assets/css/styles1.css">
</head>
<body>
    <div class="wrap">
        <div class="avatar">
            <img src="assets/img/home.png" alt="Home Icon">
        </div>
        <form action="your_login_processing_script.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="password" name="password" placeholder="Password" required>
            <a href="#" class="forgot_link">Forgot?</a>
            <button type="submit">Sign in</button>
            <p><?php if(isset($error_message)) { echo $error_message; } ?></p>
            <p>New here? <a href="signup.html">Register here</a></p>
        </form>
    </div>
</body>
</html>
