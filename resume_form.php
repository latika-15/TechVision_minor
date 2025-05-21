<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: new.php");
    exit();
}

include 'db.php';
$user_id = $_SESSION['user_id'];

// Fetch existing data from resume_details
$sql_resumedetails = "SELECT * FROM resume_details WHERE user_id = ?";
$stmt_resumedetails = mysqli_prepare($conn, $sql_resumedetails);
mysqli_stmt_bind_param($stmt_resumedetails, "i", $user_id);
mysqli_stmt_execute($stmt_resumedetails);
$result_resumedetails = mysqli_stmt_get_result($stmt_resumedetails);
$resume = mysqli_fetch_assoc($result_resumedetails);

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $profile_photo = $_POST['profile_photo'];
    $career_objective = $_POST['career_objective'];
    $academic_record = $_POST['academic_record'];
    $skills = $_POST['skills'];
    $projects = $_POST['projects'];
    $extracurricular_activities = $_POST['extracurricular_activities'];
    $achievements = $_POST['achievements'];
    $strengths = $_POST['strengths'];
    $areas_of_improvement = $_POST['areas_of_improvement'];
    $hobbies = $_POST['hobbies'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $marital_status = $_POST['marital_status'];
    $languages_known = $_POST['languages_known'];
    $mother_tongue = $_POST['mother_tongue'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $passport_details = $_POST['passport_details'];
    $permanent_address = $_POST['permanent_address'];
    $references = $_POST['references'];
    $declaration = $_POST['declaration'];

    // Update or insert resume details
    if ($resume) {
        $sql_update = "UPDATE resume_details SET 
    profile_photo = ?, 
    career_objective = ?, 
    academic_record = ?, 
    skills = ?, 
    projects = ?, 
    extracurricular_activities = ?, 
    achievements = ?, 
    strengths = ?, 
    areas_of_improvement = ?, 
    hobbies = ?, 
    dob = ?, 
    gender = ?, 
    nationality = ?, 
    marital_status = ?, 
    languages_known = ?, 
    mother_tongue = ?, 
    father_name = ?, 
    mother_name = ?, 
    passport_details = ?, 
    permanent_address = ?, 
    `references_section` = ?, 
    declaration = ? 
WHERE user_id = ?";

        $stmt_update = mysqli_prepare($conn, $sql_update);
        mysqli_stmt_bind_param($stmt_update, "sssssssssssssssssssssi", 
            $profile_photo, $career_objective, $academic_record, $skills, $projects, 
            $extracurricular_activities, $achievements, $strengths, $areas_of_improvement, 
            $hobbies, $dob, $gender, $nationality, $marital_status, $languages_known, 
            $mother_tongue, $father_name, $mother_name, $passport_details, $permanent_address, 
            $references_section, $declaration, $user_id);
        mysqli_stmt_execute($stmt_update);
    } else {
        $sql_insert = "INSERT INTO resume_details (
            user_id, profile_photo, career_objective, academic_record, skills, projects, 
            extracurricular_activities, achievements, strengths, areas_of_improvement, hobbies, 
            dob, gender, nationality, marital_status, languages_known, mother_tongue, father_name, 
            mother_name, passport_details, permanent_address, `references`, declaration
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt_insert = mysqli_prepare($conn, $sql_insert);
     
        mysqli_stmt_bind_param($stmt_update, "sssssssssssssssssssssi", 
    $profile_photo, $career_objective, $academic_record, $skills, $projects, 
    $extracurricular_activities, $achievements, $strengths, $areas_of_improvement, 
    $hobbies, $dob, $gender, $nationality, $marital_status, $languages_known, 
    $mother_tongue, $father_name, $mother_name, $passport_details, $permanent_address, 
    $references_section, $declaration, $user_id);
    mysqli_stmt_execute($stmt_insert);
    }

    header("Location: resume_generator.php");
    exit();
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Resume</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 20px; }
        form { max-width: 800px; margin: auto; padding: 20px; border: 1px solid #ddd; }
        label { display: block; font-weight: bold; margin: 10px 0 5px; }
        input, textarea, select { width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ddd; border-radius: 5px; }
        button { background: #007BFF; color: #fff; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>
    <form method="post">
        <h2>Edit Resume</h2>
        <label>Profile Photo</label>
        <input type="file" name="profile_photo" value="<?php echo $resume['profile_photo'] ?? ''; ?>">

        <label>Career Objective</label>
        <textarea name="career_objective"><?php echo $resume['career_objective'] ?? ''; ?></textarea>

        <label>Academic Record</label>
        <textarea name="academic_record"><?php echo $resume['academic_record'] ?? ''; ?></textarea>

        <label>Skills</label>
        <textarea name="skills"><?php echo $resume['skills'] ?? ''; ?></textarea>

        <label>Projects</label>
        <textarea name="projects"><?php echo $resume['projects'] ?? ''; ?></textarea>

        <label>Extracurricular Activities</label>
        <textarea name="extracurricular_activities"><?php echo $resume['extracurricular_activities'] ?? ''; ?></textarea>

        <label>Achievements</label>
        <textarea name="achievements"><?php echo $resume['achievements'] ?? ''; ?></textarea>

        <label>Strengths</label>
        <textarea name="strengths"><?php echo $resume['strengths'] ?? ''; ?></textarea>

        <label>Areas of Improvement</label>
        <textarea name="areas_of_improvement"><?php echo $resume['areas_of_improvement'] ?? ''; ?></textarea>

        <label>Hobbies</label>
        <textarea name="hobbies"><?php echo $resume['hobbies'] ?? ''; ?></textarea>

        <label>Date of Birth</label>
        <input type="date" name="dob" value="<?php echo $resume['dob'] ?? ''; ?>">

        <label>Gender</label>
        <select name="gender">
            <option value="Male" <?php if (($resume['gender'] ?? '') === 'Male') echo 'selected'; ?>>Male</option>
            <option value="Female" <?php if (($resume['gender'] ?? '') === 'Female') echo 'selected'; ?>>Female</option>
            <option value="Other" <?php if (($resume['gender'] ?? '') === 'Other') echo 'selected'; ?>>Other</option>
        </select>

        <label>Nationality</label>
        <input type="text" name="nationality" value="<?php echo $resume['nationality'] ?? ''; ?>">

        <label>Marital Status</label>
        <input type="text" name="marital_status" value="<?php echo $resume['marital_status'] ?? ''; ?>">

        <label>Languages Known</label>
        <textarea name="languages_known"><?php echo $resume['languages_known'] ?? ''; ?></textarea>

        <label>Mother Tongue</label>
        <input type="text" name="mother_tongue" value="<?php echo $resume['mother_tongue'] ?? ''; ?>">

        <label>Father's Name</label>
        <input type="text" name="father_name" value="<?php echo $resume['father_name'] ?? ''; ?>">

        <label>Mother's Name</label>
        <input type="text" name="mother_name" value="<?php echo $resume['mother_name'] ?? ''; ?>">

        <label>Passport Details</label>
        <textarea name="passport_details"><?php echo $resume['passport_details'] ?? ''; ?></textarea>

        <label>Permanent Address</label>
        <textarea name="permanent_address"><?php echo $resume['permanent_address'] ?? ''; ?></textarea>

        <label>References</label>
        <textarea name="references"><?php echo $resume['references'] ?? ''; ?></textarea>

        <label>Declaration</label>
        <textarea name="declaration"><?php echo $resume['declaration'] ?? ''; ?></textarea>

        <button type="submit">Save</button>
    </form>
</body>
</html>
