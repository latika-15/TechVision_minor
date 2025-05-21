<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

include 'db.php';
$user_id = $_SESSION['user_id'];

// Fetch user profile details from userinfo
$sql_userinfo = "SELECT first_name, last_name, email, phone, school_or_college, year_or_class, course_summary, interests FROM userinfo WHERE id = ?";
$stmt_userinfo = mysqli_prepare($conn, $sql_userinfo);
mysqli_stmt_bind_param($stmt_userinfo, "i", $user_id);
mysqli_stmt_execute($stmt_userinfo);
$result_userinfo = mysqli_stmt_get_result($stmt_userinfo);
$user = mysqli_fetch_assoc($result_userinfo);

// Fetch detailed resume information from resume_details
$sql_resumedetails = "SELECT * FROM resume_details WHERE user_id = ?";
$stmt_resumedetails = mysqli_prepare($conn, $sql_resumedetails);
mysqli_stmt_bind_param($stmt_resumedetails, "i", $user_id);
mysqli_stmt_execute($stmt_resumedetails);
$result_resumedetails = mysqli_stmt_get_result($stmt_resumedetails);
$resume = mysqli_fetch_assoc($result_resumedetails);

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .resume-container { margin: 20px auto; width: 80%; border: 1px solid #ddd; padding: 20px; }
        h1, h2 { color: #333; }
        .section { margin-bottom: 20px; }
        .edit-button { display: inline-block; margin-top: 10px; padding: 10px 15px; background: #007BFF; color: #fff; text-decoration: none; border-radius: 5px; }
        .edit-button:hover { background: #0056b3; }
    </style>
</head>
<body>
    <div class="resume-container">
        <!-- Personal Information -->
        <h1><?php echo $user['first_name'] . " " . $user['last_name']; ?></h1>
        <p>Email: <?php echo $user['email']; ?></p>
        <p>Phone: <?php echo $user['phone'] ?? 'N/A'; ?></p>
        <p>School/College: <?php echo $user['school_or_college'] ?? 'N/A'; ?></p>
        <p>Year/Class: <?php echo $user['year_or_class'] ?? 'N/A'; ?></p>
        <p>Course: <?php echo $user['course_summary'] ?? 'N/A'; ?></p>
        <p>Interests: <?php echo $user['interests'] ?? 'N/A'; ?></p>

        <!-- Career Objective -->
        <div class="section">
            <h2>Career Objective</h2>
            <p><?php echo $resume['career_objective'] ?? 'Not Provided'; ?></p>
        </div>

        <!-- Academic Record -->
        <div class="section">
            <h2>Academic Record</h2>
            <p><?php echo $resume['academic_record'] ?? 'Not Provided'; ?></p>
        </div>

        <!-- Skills -->
        <div class="section">
            <h2>Skills</h2>
            <p><?php echo $resume['skills'] ?? 'Not Provided'; ?></p>
        </div>

        <!-- Projects -->
        <div class="section">
            <h2>Projects</h2>
            <p><?php echo $resume['projects'] ?? 'Not Provided'; ?></p>
        </div>

        <!-- Extracurricular Activities -->
        <div class="section">
            <h2>Extracurricular Activities</h2>
            <p><?php echo $resume['extracurricular_activities'] ?? 'Not Provided'; ?></p>
        </div>

        <!-- Achievements -->
        <div class="section">
            <h2>Achievements</h2>
            <p><?php echo $resume['achievements'] ?? 'Not Provided'; ?></p>
        </div>

        <!-- Strengths -->
        <div class="section">
            <h2>Strengths</h2>
            <p><?php echo $resume['strengths'] ?? 'Not Provided'; ?></p>
        </div>

        <!-- Areas of Improvement -->
        <div class="section">
            <h2>Areas of Improvement</h2>
            <p><?php echo $resume['areas_of_improvement'] ?? 'Not Provided'; ?></p>
        </div>

        <!-- Hobbies -->
        <div class="section">
            <h2>Hobbies</h2>
            <p><?php echo $resume['hobbies'] ?? 'Not Provided'; ?></p>
        </div>

        <!-- Personal Details -->
        <div class="section">
            <h2>Personal Details</h2>
            <p>Date of Birth: <?php echo $resume['dob'] ?? 'N/A'; ?></p>
            <p>Gender: <?php echo $resume['gender'] ?? 'N/A'; ?></p>
            <p>Nationality: <?php echo $resume['nationality'] ?? 'N/A'; ?></p>
            <p>Marital Status: <?php echo $resume['marital_status'] ?? 'N/A'; ?></p>
            <p>Languages Known: <?php echo $resume['languages_known'] ?? 'N/A'; ?></p>
        </div>

        <!-- Declaration -->
        <div class="section">
            <h2>Declaration</h2>
            <p><?php echo $resume['declaration'] ?? 'Not Provided'; ?></p>
        </div>

        <!-- Edit Button -->
        <a href="resume_form.php" class="edit-button">Edit Resume</a>
    </div>
</body>
</html>
