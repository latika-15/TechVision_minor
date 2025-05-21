<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';
$user_id = $_SESSION['user_id'];

if (isset($_GET['file_id'])) {
    $file_id = intval($_GET['file_id']);

    // Fetch the file information
    $sql = "SELECT file_name, file_path FROM documents WHERE id = ? AND user_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $file_id, $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $file = mysqli_fetch_assoc($result);

    if ($file && file_exists($file['file_path'])) {
        // Send the file to the browser
        header("Content-Description: File Transfer");
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"" . basename($file['file_name']) . "\"");
        header("Content-Length: " . filesize($file['file_path']));
        readfile($file['file_path']);
        exit();
    } else {
        $_SESSION['error'] = "File not found.";
    }

    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
header("Location: dashboard.php");
exit();
?>
