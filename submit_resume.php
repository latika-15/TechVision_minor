<?php
// Database connection
$host = 'localhost';
$db = 'resume_db';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert form data into the database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $linkedin = $_POST['linkedin'];
    $career_objective = $_POST['career_objective'];
    $academic_record = $_POST['academic_record'];
    $skills = $_POST['skills'];
    $projects = $_POST['projects'];
    $extracurricular_activities = $_POST['extracurricular_activities'];
    $achievements = $_POST['achievements'];
    $strengths = $_POST['strengths'];
    $area_of_improvement = $_POST['area_of_improvement'];
    $hobbies = $_POST['hobbies'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $marital_status = $_POST['marital_status'];
    $languages_known = $_POST['languages_known'];
    $mother_tongue = $_POST['mother_tongue'];
    $fathers_name = $_POST['fathers_name'];
    $mothers_name = $_POST['mothers_name'];
    $passport_details = $_POST['passport_details'];
    $permanent_address = $_POST['permanent_address'];
    $references = $_POST['references'];
    $declaration = $_POST['declaration'];
    $date = $_POST['date'];
    $place = $_POST['place'];
    $signature = $_POST['signature'];

    // Handle file upload
    if (isset($_FILES['photo'])) {
        $photo = $_FILES['photo'];
        $photo_name = $photo['name'];
        $photo_tmp_name = $photo['tmp_name'];
        $photo_size = $photo['size'];
        $photo_error = $photo['error'];

        if ($photo_error === 0) {
            $photo_new_name = uniqid('', true) . '.' . pathinfo($photo_name, PATHINFO_EXTENSION);
            move_uploaded_file($photo_tmp_name, "uploads/$photo_new_name");
        }
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO resume_details (first_name, last_name, address, linkedin, photo_url, career_objective, academic_record, skills, projects, extracurricular_activities, achievements, strengths, area_of_improvement, hobbies, dob, gender, nationality, marital_status, languages_known, mother_tongue, fathers_name, mothers_name, passport_details, permanent_address, references, declaration, date, place, signature) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssssssssssssssssss", $first_name, $last_name, $address, $linkedin, $photo_new_name, $career_objective, $academic_record, $skills, $projects, $extracurricular_activities, $achievements, $strengths, $area_of_improvement, $hobbies, $dob, $gender, $nationality, $marital_status, $languages_known, $mother_tongue, $fathers_name, $mothers_name, $passport_details, $permanent_address, $references, $declaration, $date, $place, $signature);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
}
?>
