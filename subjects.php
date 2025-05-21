<?php
// Connect to the database
include('db.php');

// Get the selected semester from GET request
$semester = isset($_GET['semester']) ? (int)$_GET['semester'] : 0;

// Fetch the subjects for the selected semester
$subject_query = "SELECT * FROM subjects WHERE semester = ?";
$stmt1 = $conn->prepare($subject_query);
$stmt1->bind_param("i", $semester);
$stmt1->execute();
$subjects_result = $stmt1->get_result();

// Fetch resources for the selected semester
$resources_query = "SELECT * FROM sem_resources WHERE semester = ?";
$stmt2 = $conn->prepare($resources_query);
$stmt2->bind_param("i", $semester);
$stmt2->execute();
$resources_result = $stmt2->get_result();

// Fetch books for the selected semester
$books_query = "SELECT * FROM books_sem WHERE semester = ?";
$stmt3 = $conn->prepare($books_query);
$stmt3->bind_param("i", $semester);
$stmt3->execute();
$books_result = $stmt3->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semester <?php echo $semester; ?> Resources</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f0f2f5;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        section {
            background: white;
            padding: 20px;
            margin: 20px auto;
            max-width: 900px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
        }
        h2 {
            border-bottom: 2px solid #007BFF;
            padding-bottom: 5px;
            color: #007BFF;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin: 10px 0;
            font-size: 1.1em;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .book-card {
            background: #fafafa;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            text-align: center;
            transition: 0.3s;
        }
        .book-card:hover {
            background: #e9f5ff;
            transform: scale(1.02);
        }
        .book-card h3 {
            font-size: 1.2em;
            margin-bottom: 10px;
        }
        .view-btn {
            display: inline-block;
            padding: 8px 15px;
            background: #007BFF;
            color: white;
            border-radius: 5px;
            margin-top: 10px;
            transition: background 0.3s;
        }
        .view-btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<h1>Semester <?php echo $semester; ?> Subjects and Resources</h1>

<!-- Subjects Section -->
<section>
    <h2>Subjects</h2>
    <ul>
        <?php while ($subject = $subjects_result->fetch_assoc()) { ?>
            <li><?php echo htmlspecialchars($subject['subject_name']); ?></li>
        <?php } ?>
    </ul>
</section>

<!-- Resources Section -->
<section>
    <h2>Resources</h2>
    <ul>
        <?php while ($resource = $resources_result->fetch_assoc()) { ?>
            <li>
                <strong><?php echo htmlspecialchars($resource['resource_title']); ?> (<?php echo htmlspecialchars($resource['resource_type']); ?>)</strong><br>
                <a href="<?php echo htmlspecialchars($resource['resource_link']); ?>" target="_blank">View Resource</a>
            </li>
        <?php } ?>
    </ul>
</section>

<!-- Books Section -->
<section>
    <h2>Books</h2>
    <div class="book-grid">
        <?php while ($book = $books_result->fetch_assoc()) { 
            $bookTitle = htmlspecialchars($book['book_title']);
            $bookPDF = urlencode($book['book_pdf']); // URL encode for safety
        ?><div class="book-card">
        <h3><?php echo $bookTitle; ?></h3>
        <a href="view_book.php?book_id=<?php echo $bookID; ?>" class="view-btn" target="_blank">View Book</a>
    </div>
    
        <?php } ?>
    </div>
</section>

</body>
</html>

<?php
$conn->close();
?>
