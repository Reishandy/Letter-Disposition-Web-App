<?php
require_once '../connection.php';

// Get all the data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Check if username is already taken
$query = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();

if ($stmt->get_result()->num_rows > 0) {
    echo '<script>window.location.replace("register.php?error=taken") </script>';
    exit();
}

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Add the user to the database
$query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sss", $username, $email, $hashedPassword);
$stmt->execute();

// Redirect to login page
echo '<script>window.location.replace("login.php?success=true") </script>';
