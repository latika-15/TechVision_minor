<?php
include('db.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "User not logged in.";
    exit;
}

$user_id = $_SESSION['user_id'];
$book_id = $_POST['book_id'] ?? null;
$page_num = $_POST['page_num'] ?? null;
$notes_content = $_POST['notes_content'] ?? '';

if (!$book_id || !$page_num) {
    echo "Invalid data.";
    exit;
}

// Check if progress exists
$check_query = "SELECT * FROM book_progress WHERE user_id = ? AND book_id = ?";
$stmt = $conn->prepare($check_query);
$stmt->bind_param("ii", $user_id, $book_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Update existing progress
    $update_query = "UPDATE book_progress SET current_page = ?, notes_content = ? WHERE user_id = ? AND book_id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("isii", $page_num, $notes_content, $user_id, $book_id);
    $stmt->execute();
} else {
    // Insert new progress
    $insert_query = "INSERT INTO book_progress (user_id, book_id, current_page, notes_content) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("iiis", $user_id, $book_id, $page_num, $notes_content);
    $stmt->execute();
}

echo "
::contentReference[oaicite:12]{index=12}
 
";