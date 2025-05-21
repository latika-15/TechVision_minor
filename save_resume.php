<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

include 'db.php';
$user_id = $_SESSION['user_id'];

// Handle file upload
$profile_photo = null;
if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] == UPLOAD_ERR_OK) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["profile_photo"]["name"]);
    if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $target_file)) {
        $profile_photo = $target_file;
    }
}

// Get form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$career_objective = $_POST['career_objective'];
$skills = $_POST['skills'];

// More fields here

// Update userinfo table
$sql_userinfo = "UPDATE userinfo SET first_name = ?, last_name = ?, email = ?, phone = ? WHERE id = ?";
$stmt_userinfo = mysqli_prepare($conn, $sql_userinfo);
mysqli_stmt_bind_param($stmt_userinfo, "ssssi", $first_name, $last_name, $email, $phone, $user_id);
mysqli_stmt_execute($stmt_userinfo);

// Check if resume_details already exists for this user
$sql_check = "SELECT id FROM resume_details WHERE user_id = ?";
$stmt_check = mysqli_prepare($conn, $sql_check);
mysqli_stmt_bind_param($stmt_check, "i", $user_id);
mysqli_stmt_execute($stmt_check);
$result_check = mysqli_stmt_get_result($stmt_check);

if (mysqli_num_rows($result_check) > 0) {
    // Update resume_details
    $sql_resume = "UPDATE resume_details SET profile_photo = ?, career_objective = ?, skills = ?, dob = ?, gender = ? WHERE user_id = ?";
    $stmt_resume = mysqli_prepare($conn, $sql_resume);
    mysqli_stmt_bind_param($stmt_resume, "sssssi", $profile_photo, $career_objective, $skills, $dob, $gender, $user_id);
} else {
    // Insert into resume_details
    $sql_resume = "INSERT INTO resume_details (user_id, profile_photo, career_objective, skills, dob, gender) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt_resume = mysqli_prepare($conn, $sql_resume);
    mysqli_stmt_bind_param($stmt_resume, "isssss", $user_id, $profile_photo, $career_objective, $skills, $dob, $gender);
}
mysqli_stmt_execute($stmt_resume);

mysqli_close($conn);
header("Location: dashboard.php");
exit();
?>
