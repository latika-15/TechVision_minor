<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Include the database connection
include 'db.php';

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['document'])) {
    $user_id = $_SESSION['user_id'];
    $target_dir = "uploads/";
    $document = $_FILES['document'];

    // Check for upload errors
    if ($document['error'] !== UPLOAD_ERR_OK) {
        $_SESSION['error'] = "File upload error. Please try again.";
        header("Location: dashboard.php");
        exit();
    }

    // Validate file size (10MB max)
    $max_file_size = 10 * 1024 * 1024; // 10MB
    if ($document['size'] > $max_file_size) {
        $_SESSION['error'] = "File size exceeds the 10MB limit.";
        header("Location: dashboard.php");
        exit();
    }

    // Validate file type
    $allowed_types = ['application/pdf', 'image/jpeg', 'image/png', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
    $file_mime = mime_content_type($document['tmp_name']);
    if (!in_array($file_mime, $allowed_types)) {
        $_SESSION['error'] = "Invalid file type. Only PDF, JPG, PNG, and DOCX files are allowed.";
        header("Location: dashboard.php");
        exit();
    }

    // Ensure the uploads directory exists
    if (!file_exists($target_dir) && !mkdir($target_dir, 0755, true)) {
        $_SESSION['error'] = "Failed to create uploads directory.";
        header("Location: dashboard.php");
        exit();
    }

    // Generate a unique name for the file
    $file_name = time() . "_" . basename($document['name']);
    $target_file = $target_dir . $file_name;

    // Move the uploaded file
    if (!move_uploaded_file($document['tmp_name'], $target_file)) {
        $_SESSION['error'] = "Failed to upload the document.";
        header("Location: dashboard.php");
        exit();
    }

    // Store file information in the database
    $sql = "INSERT INTO documents (user_id, file_name, file_path) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "iss", $user_id, $file_name, $target_file);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['success'] = "Document uploaded successfully!";
    } else {
        $_SESSION['error'] = "Database error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    header("Location: dashboard.php");
    exit();
}
?>
