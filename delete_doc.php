<?php
// Include database connection
include 'db.php';

if (isset($_POST['delete_document'])) {
    // Get the document ID
    $doc_id = intval($_POST['doc_id']);

    // Step 1: Fetch the file path to delete the physical file
    $query = "SELECT file_path FROM documents WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $doc_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $file_path = $row['file_path'];

        // Step 2: Delete the document from the database
        $deleteQuery = "DELETE FROM documents WHERE id = ?";
        $deleteStmt = mysqli_prepare($conn, $deleteQuery);
        mysqli_stmt_bind_param($deleteStmt, "i", $doc_id);

        if (mysqli_stmt_execute($deleteStmt)) {
            // Step 3: Delete the physical file if it exists
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            // Redirect back to dashboard with success message
            header("Location: certify.php?msg=deleted successfully");
            exit();
        } else {
            echo "Error deleting document: " . mysqli_error($conn);
        }
    } else {
        echo "Document not found.";
    }
}

// Close connection
mysqli_close($conn);
?>
