<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - Cloud Roadmap</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<nav class="admin-navbar">
    <a href="dashboard.php">Dashboard</a> |
    <a href="add_roadmap.php">Add Roadmap</a> |
    <a href="add_semester.php">Add Semester</a> |
    <a href="add_job.php">Add Job</a> |
    <a href="logout.php">Logout</a>
</nav>

<div class="dashboard-content">
    <h1>Welcome, <?php echo $_SESSION['admin_username']; ?>!</h1>
    <p>Select an action from the menu above.</p>
</div>

</body>
</html>