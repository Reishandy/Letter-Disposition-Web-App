<?php
require_once '../connection.php';

// Get data
$id = $_GET['id'];

// Prepare the SQL statement
$stmt = $conn->prepare("UPDATE letters SET read_status = 1 WHERE id = ?");
$stmt->bind_param("i", $id);

// Execute the SQL statement
if ($stmt->execute()) {
    echo '<script>window.location.replace("app.php")</script>';
} else {
    echo '<script>window.location.replace("received.php?error=sql")</script>';
}