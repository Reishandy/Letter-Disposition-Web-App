<?php
require_once '../connection.php';

// Get all the data
$username = $_POST['username'];
$password = $_POST['password'];

// Check if username exists
$query = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();
if ($result->num_rows == 0) {
    echo '<script>window.location.replace("login.php?error=username") </script>';
    exit();
}

// Get the password
$hashedPassword = $result->fetch_assoc()['password'];

// Check if the password is correct
if (!password_verify($password, $hashedPassword)) {
    echo '<script>window.location.replace("login.php?error=password") </script>';
    exit();
}

// Start the session
session_start();
$_SESSION['user'] = $username;

// Redirect to the home page
echo '<script>window.location.replace("../app/app.php") </script>';