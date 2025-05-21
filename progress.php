<?php
// Start the session to access user data
session_start();

// Include the database connection file
include('db.php');  // Make sure this file contains your DB connection logic

// Check if the user is logged in, otherwise redirect to the login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch progress data from the progress table
$user_id = $_SESSION['user_id'];  // assuming user is logged in
$query = "SELECT milestone, progress_date, progress_value FROM progress WHERE user_id = $user_id ORDER BY progress_date";
$result = mysqli_query($conn, $query);

if ($result) {
    $progress_data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $progress_data[] = $row;
    }
} else {
    die("Error: " . mysqli_error($conn));  // Handle database errors
}

// Prepare data for the chart
$progress_dates = [];
$progress_values = [];
foreach ($progress_data as $data) {
    $progress_dates[] = $data['progress_date'];
    $progress_values[] = $data['progress_value'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="progress-section">
    <h3>Your Progress</h3>
    <canvas id="progressChart" width="400" height="200"></canvas>
</div>

<script>
    var ctx = document.getElementById('progressChart').getContext('2d');
    var progressChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($progress_dates); ?>,
            datasets: [{
                label: 'Progress',
                data: <?php echo json_encode($progress_values); ?>,
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                fill: false
            }]
        }
    });
</script>

</body>
</html>
