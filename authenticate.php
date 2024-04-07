<?php
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize username and password inputs
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Example: hard-coded credentials for demo purposes
    if ($username === 'admin' && $password === 'admin') {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';
        header('Location: index.php');
        exit;
    } elseif ($username === 'guest' && $password === 'guest') {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'guest';
        header('Location: index.php');
        exit;
    } else {
        // Invalid credentials, redirect back to login page
        header('Location: login.php');
        exit;
    }
}
?>