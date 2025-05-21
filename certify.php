<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';
$user_id = $_SESSION['user_id'];

// Handle delete request
if (isset($_POST['delete_document'])) {
    $doc_id = $_POST['doc_id'];
    $sql = "DELETE FROM documents WHERE id = ? AND user_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $doc_id, $user_id);
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['success'] = "Document deleted successfully.";
    } else {
        $_SESSION['error'] = "Error deleting document.";
    }
    header("Location: certificates.php");
    exit();
}

// Fetch all documents
$sql = "SELECT * FROM documents WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>
<?php
// Display success message if it exists
if (isset($_GET['msg']) && $_GET['msg'] == 'deleted') {
    echo "<p style='color: green;'>File has been deleted successfully.</p>";
}

// Fetch documents
$query = "SELECT * FROM documents";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Documents</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Your Uploaded Documents</h1>
    </header>
    <a href="dashboard.php" id="dash">Go Back to Dashboard</a>
    <div class="container">
        <?php if (isset($_SESSION['success'])): ?>
            <p class="success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
        <?php endif; ?>
        <?php if (isset($_SESSION['error'])): ?>
            <p class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>
    <h2>Uploaded Documents</h2>
    <table>
        <thead>
            <tr>
                <th>File Name</th>
                <th>View</th>
                <th>Upload Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['file_name']); ?></td>
                    <td><a href="<?php echo htmlspecialchars($row['file_path']); ?>" target="_blank">View</a></td>
                    <td><?php echo $row['upload_time']; ?></td>
                    <td>
                        <!-- Delete Button -->
                        <form method="POST" action="delete_doc.php" style="display:inline;">
                            <input type="hidden" name="doc_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="delete_document" onclick="return confirm('Are you sure you want to delete this document?');">Delete</button>
                        </form>
                        
                        <!-- Download Link -->
                        <a href="download.php?file_id=<?php echo $row['id']; ?>">Download</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f9; }
        header { text-align: center; padding: 20px; background-color: #278aab; color: white; }
        .container { width: 80%; margin: 20px auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table th, table td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        table th { background-color: #278aab; color: white; }
        .success { color: green; }
        .error { color: red; }
        /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}
#dash{
    margin-left: 85%;
}
/* Body Styling */
body {
    background-color: #f4f4f9;
    color: #333;
    font-size: 16px;
    line-height: 1.6;
    margin: 0;
}

/* Header Styling */
header {
    background-color: #278aab;
    color: #fff;
    text-align: center;
    padding: 20px 0;
    font-size: 1.8rem;
}

/* Container */
.container {
    width: 90%;
    max-width: 1200px;
    margin: 20px auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    overflow-x: auto; /* For responsiveness */
}

/* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
}

table th, table td {
    padding: 12px 15px;
    border: 1px solid #ddd;
    text-align: left;
}

table th {
    background-color: #278aab;
    color: white;
    text-transform: uppercase;
    font-size: 0.9rem;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #e3f2fd;
    transition: background-color 0.3s ease-in-out;
}

/* Action Buttons */
button {
    background-color: #e74c3c;
    color: white;
    border: none;
    padding: 8px 12px;
    cursor: pointer;
    border-radius: 4px;
    font-size: 0.9rem;
}

button:hover {
    background-color: #c0392b;
    transition: background-color 0.3s ease;
}

/* Links */
a {
    text-decoration: none;
    color: #278aab;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
}

/* Success and Error Messages */
.success {
    color: green;
    font-weight: bold;
    margin: 10px 0;
}

.error {
    color: red;
    font-weight: bold;
    margin: 10px 0;
}

/* Responsive Table */
@media (max-width: 768px) {
    table {
        font-size: 0.9rem;
    }

    table th, table td {
        padding: 10px;
    }

    header {
        font-size: 1.4rem;
    }
}

@media (max-width: 480px) {
    header {
        font-size: 1.2rem;
        padding: 15px 0;
    }

    .container {
        padding: 10px;
    }

    table {
        font-size: 0.8rem;
    }
}

    </style>
</body>
</html>
