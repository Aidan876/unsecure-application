<?php
session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    // Redirect unauthorized users back to the login page
    header('Location: login.php');
    exit;
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $newGuestUsername = trim(htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8'));
    $newGuestPassword = trim(htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8'));

    // Perform any necessary validation on the input data

    // Store the new guest credentials in a database or other storage mechanism
    // Example: you can insert the new guest into a table named "guests"
    // Note: This is just a basic example, you should replace it with your actual implementation
    // $sql = "INSERT INTO guests (username, password) VALUES ('$newGuestUsername', '$newGuestPassword')";
    // Execute the SQL statement

    // Redirect back to login page after creating the new guest role
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Create Guest Role</title>
</head>
<body>
    <h2>Create Guest Role</h2>
    <form action="create_guest.php" method="POST">
        <label for="new-guest-username">Username:</label>
        <input type="text" id="new-guest-username" name="username" required><br>
        <label for="new-guest-password">Password:</label>
        <input type="password" id="new-guest-password" name="password" required><br>
        <input type="submit" value="Create Guest Role">
    </form>
</body>
</html>
