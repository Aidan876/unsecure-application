<?php
session_start();

// Define admin credentials
$adminUsername = 'admin';
$adminPassword = password_hash('admin', PASSWORD_DEFAULT); // Hashed password for admin

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Sanitize inputs to prevent XSS attacks
    $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');

    // Check if the user is trying to log in as admin
    if ($username === $adminUsername && password_verify($password, $adminPassword)) {
        // Successful admin login, start a session and redirect to index.php
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';
        header('Location: index.php');
        exit;
    } else {
        // Set role as 'guest' for guest users
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'guest';
        $_SESSION['logged_in'] = true; // Set a flag to indicate user is logged in
        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <p>Login as Admin:</p>
    <p>For showcase the admin login is already created as it would be unsafe to allow admin logins to just be created like this. admin login information is Username:admin / Password:admin</p>
    <form action="login.php" method="POST">
        <label for="admin-username">Username:</label>
        <input type="text" id="admin-username" name="username" required><br>
        <label for="admin-password">Password:</label>
        <input type="password" id="admin-password" name="password" required><br>
        <input type="submit" value="Admin Login">
    </form>

    <p>Login as Guest:</p>
    <p>Login in or Create a guest role to view application. </p>
    <form action="login.php" method="POST"> <!-- Assuming login.php handles guest login -->
        <label for="guest-username">Username:</label>
        <input type="text" id="guest-username" name="username" required><br>
        <label for="guest-password">Password:</label>
        <input type="password" id="guest-password" name="password" required><br>
        <input type="submit" value="Guest Login">
    </form>

    <p><a href="create_guest.php">Create Guest Role</a></p>
</body>
</html>