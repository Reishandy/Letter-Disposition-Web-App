<?php
require_once '../connection.php';
session_start();

// Get data
$from = $_SESSION['user'];
$to = $_POST['to'];
$desc = $_POST['desc'];

if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileType = $file['type'];
    $fileSize = $file['size'];

    // Check if file is a PDF
    if ($fileType != 'application/pdf') {
        echo '<script>window.location.replace("new.php?error=type")</script>';
        exit();
    }

    // Check if file size is less than or equal to 5MB
    if ($fileSize > 5000000) {
        echo '<script>window.location.replace("new.php?error=size")</script>';
        exit();
    }

    // Define the directory to move the uploaded file to
    $uploadDir = '../letters/';

    // Create the directory if it doesn't exist
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Move the uploaded file to the upload directory
    $filePath = $uploadDir . hash('sha256', $fileName) . uniqid() . '.pdf';
    if (move_uploaded_file($fileTmpName, $filePath)) {
        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO letters (sender, receiver, letters.description, file_path, file_name) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $from, $to, $desc, $filePath, $fileName);

        // Execute the SQL statement
        if ($stmt->execute()) {
            echo '<script>window.location.replace("sent.php")</script>';
        } else {
            echo '<script>window.location.replace("new.php?error=sql")</script>';
        }
    } else {
        echo '<script>window.location.replace("new.php?error=upload")</script>';
    }
}