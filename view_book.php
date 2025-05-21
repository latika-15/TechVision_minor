<?php
include('db.php');
session_start();

// Get user ID from session
$user_id = $_SESSION['user_id']; // Assuming you're using session for login
// Get book ID from the URL parameter
$book_id = $_GET['book_id'] ?? null;  // Default to null if no 'book_id' is provided

if ($book_id) {
    // Fetch the book details from the database using the book_id
    $book_query = "SELECT * FROM books_sem WHERE book_id = ?";
    $stmt = $conn->prepare($book_query);
    $stmt->bind_param("i", $book_id);  // Assuming 'book_id' is an integer
    $stmt->execute();
    $book_result = $stmt->get_result();

    // Check if the book exists
    if ($book_result->num_rows > 0) {
        $book = $book_result->fetch_assoc();
    } else {
        echo "Book not found.";
        exit;
    }
} else {
    echo "No book selected.";
    exit;
}


// Fetch existing progress (if any)
$progress_query = "SELECT * FROM book_progress WHERE user_id = ? AND book_id = ?";
$stmt = $conn->prepare($progress_query);
$stmt->bind_param("is", $user_id, $book_pdf);
$stmt->execute();
$progress_result = $stmt->get_result();
$progress = $progress_result->fetch_assoc();

// If no progress exists, initialize
$current_page = $progress ? $progress['current_page'] : 1;
$saved_notes = $progress ? $progress['notes_content'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reading: <?php echo htmlspecialchars($book['book_title']); ?></title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f5f7fb;
        }
        .container {
            display: flex;
            height: 100vh;
        }
        .pdf-viewer {
            width: 60%;
            background: white;
            padding: 20px;
            border-right: 2px solid #eee;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .notes-editor {
            width: 40%;
            background: #fafafa;
            padding: 20px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }
        h1 {
            font-size: 22px;
            color: #333;
            margin-bottom: 10px;
            text-align: center;
        }
        #editor {
            height: 80%;
            background: white;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-top: 10px;
        }
        .toolbar {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }
        button {
            padding: 8px 16px;
            background: #007bff;
            border: none;
            color: white;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
        }
        button:hover {
            background: #0056b3;
        }
        #pdf-canvas {
            width: 90%;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .page-controls {
            margin: 10px 0;
            display: flex;
            justify-content: space-between;
            width: 90%;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="pdf-viewer">
    <h1><?php echo htmlspecialchars($book['book_title']); ?></h1>
<canvas id="pdf-canvas"></canvas>

        <div class="page-controls">
            <button onclick="prevPage()">⬅ Previous</button>
            <span id="page-info"></span>
            <button onclick="nextPage()">Next ➡</button>
        </div>
        <canvas id="pdf-canvas"></canvas>
    </div>

    <div class="notes-editor">
        <h1>My Notes</h1>
        <div id="editor"></div>
        <div class="toolbar">
            <button onclick="saveProgress()">💾 Save Progress</button>
        </div>
    </div>
</div>

<!-- PDF.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.14.305/pdf.min.js"></script>

<!-- Quill.js -->
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

<script>
var url = '<?php echo $book['book_pdf']; ?>';  // Use the correct book_pdf field
pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
    pdfDoc = pdfDoc_;
    renderPage(1);  // Render first page by default
});

var scale = 1.2, canvas = document.getElementById('pdf-canvas'), ctx = canvas.getContext('2d');
var totalPages = 0;



// Render Page
function renderPage(num) {
    pageRendering = true;
    pdfDoc.getPage(num).then(function(page) {
        var viewport = page.getViewport({scale: scale});
        canvas.height = viewport.height;
        canvas.width = viewport.width;

        var renderContext = {
            canvasContext: ctx,
            viewport: viewport
        };
        page.render(renderContext).promise.then(function() {
            pageRendering = false;
            document.getElementById('page-info').textContent = "Page " + pageNum + " of " + totalPages;
        });
    });
}

// Prev page
function prevPage() {
    if (pageNum <= 1) return;
    pageNum--;
    renderPage(pageNum);
}

// Next page
function nextPage() {
    if (pageNum >= totalPages) return;
    pageNum++;
    renderPage(pageNum);
}

// Quill Editor Init
var quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
        toolbar: [
            [{ header: [1, 2, 3, false] }],
            ['bold', 'italic', 'underline', 'strike'],
            [{ list: 'ordered' }, { list: 'bullet' }, { list: 'check' }],
            ['link', 'image'],
            [{ color: [] }, { background: [] }],
            ['clean']
        ]
    }
});

// Load existing notes
window.onload = function () {
    let savedNotes = <?php echo json_encode($saved_notes); ?>;
    if (savedNotes) {
        quill.root.innerHTML = savedNotes;
    }
};

// Save Progress
function saveProgress() {
    const notesContent = quill.root.innerHTML;

    const formData = new FormData();
    formData.append('book_pdf', '<?php echo $book_pdf; ?>');
    formData.append('page_num', pageNum);
    formData.append('notes_content', notesContent);

    fetch('save_progress.php', {
        method: 'POST',
        body: formData
    }).then(res => res.text()).then(data => {
        alert('Progress Saved ✅');
    }).catch(err => {
        alert('Error saving progress!');
    });
}


// Highlight Selected Text
canvas.addEventListener('mouseup', function () {
    let selectedText = window.getSelection().toString().trim();
    if (selectedText.length > 0) {
        quill.insertText(quill.getLength() - 1, "\n📌 " + selectedText + "\n", { color: '#e91e63', bold: true });
    }
});
</script>

</body>
</html>

<?php
$conn->close();
?>
