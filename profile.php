<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

// Fetch user profile data
$user_id = $_SESSION['user_id'];
$sql = "SELECT first_name, last_name, email, phone, school_or_college, year_or_class, course_summary, interests FROM userinfo WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

// Convert interests into an array for easy checking in the dropdown
$selected_interests = explode(", ", $user['interests']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the inputs
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $school_or_college = mysqli_real_escape_string($conn, $_POST['school_or_college']);
    $year_or_class = mysqli_real_escape_string($conn, $_POST['year_or_class']);
    $course_summary = mysqli_real_escape_string($conn, $_POST['course_summary']);
    
   
    $interests = implode(', ', array_map(function($interest) {
        return str_replace(' ', '_', $interest);
    }, $_POST['interests']));

    // Update user data in the database
    $sql = "UPDATE userinfo SET first_name = ?, last_name = ?, email = ?, phone = ?, school_or_college = ?, year_or_class = ?, course_summary = ?, interests = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssi", $first_name, $last_name, $email, $phone, $school_or_college, $year_or_class, $course_summary, $interests, $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Set success message
    $_SESSION['update_success'] = "Profile updated successfully!";
    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .input-group {
            margin-bottom: 15px;
        }
        label {
            font-size: 14px;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="email"], textarea, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
        }
        select {
            font-size: 14px;
            color: #333;
        }
        textarea {
            font-size: 14px;
            height: 100px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #278aab;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #278aab;
        }
        .selected-interests {
            margin-top: 15px;
            padding: 10px;
            background-color: #e7f7e7;
            border-radius: 5px;
            font-size: 14px;
        }
        .selected-interests span {
            display: inline-block;
            margin-right: 10px;
            background-color: #278aab;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Profile Page</h1>
        <a href="dashboard.php">Go Back to Dashboard</a>
        <form method="POST" action="profile.php">
            <div class="input-group">
                <label>First Name:</label>
                <input type="text" name="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>" required>
            </div>
            <div class="input-group">
                <label>Last Name:</label>
                <input type="text" name="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>" required>
            </div>
            <div class="input-group">
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
            </div>
            <div class="input-group">
                <label>Phone:</label>
                <input type="text" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>">
            </div>
            <div class="input-group">
                <label>School/College:</label>
                <input type="text" name="school_or_college" value="<?php echo htmlspecialchars($user['school_or_college']); ?>">
            </div>
            <div class="input-group">
                <label>Year/Class:</label>
                <input type="text" name="year_or_class" value="<?php echo htmlspecialchars($user['year_or_class']); ?>">
            </div>
            <div class="input-group">
                <label>Course Summary:</label>
                <textarea name="course_summary"><?php echo htmlspecialchars($user['course_summary']); ?></textarea>
            </div>

            <!-- Interests Section -->
            <div class="input-group" id="interest-container">
                <label>Choose Your Interest 1:</label>
                <select name="interests[]" id="interest-select">
                    <option value="Web_Development_Beginner" <?php echo in_array('Web_Development_Beginner', $selected_interests) ? 'selected' : ''; ?>>Web Development, Beginner</option>
                    <option value="Web_Development_Intermediate" <?php echo in_array('Web_Development_Intermediate', $selected_interests) ? 'selected' : ''; ?>>Web Development, Intermediate</option>
                    <option value="Web_Development_Advanced" <?php echo in_array('Web_Development_Advanced', $selected_interests) ? 'selected' : ''; ?>>Web Development, Advanced</option>
                    <option value="Machine_Learning_Beginner" <?php echo in_array('Machine_Learning_Beginner', $selected_interests) ? 'selected' : ''; ?>>Machine Learning, Beginner</option>
                    <option value="Machine_Learning_Intermediate" <?php echo in_array('Machine_Learning_Intermediate', $selected_interests) ? 'selected' : ''; ?>>Machine Learning, Intermediate</option>
                    <option value="Machine_Learning_Advanced" <?php echo in_array('Machine_Learning_Advanced', $selected_interests) ? 'selected' : ''; ?>>Machine Learning, Advanced</option>
                    <option value="Cloud_Computing_Beginner" <?php echo in_array('Cloud_Computing_Beginner', $selected_interests) ? 'selected' : ''; ?>>Cloud Computing, Beginner</option>
                    <option value="Cloud_Computing_Intermediate" <?php echo in_array('Cloud_Computing_Intermediate', $selected_interests) ? 'selected' : ''; ?>>Cloud Computing, Intermediate</option>
                    <option value="Cloud_Computing_Advanced" <?php echo in_array('Cloud_Computing_Advanced', $selected_interests) ? 'selected' : ''; ?>>Cloud Computing, Advanced</option>
                    <option value="Cyber_Security_Beginner" <?php echo in_array('Cyber_Security_Beginner', $selected_interests) ? 'selected' : ''; ?>>Cyber Security, Beginner</option>
                    <option value="Cyber_Security_Intermediate" <?php echo in_array('Cyber_Security_Intermediate', $selected_interests) ? 'selected' : ''; ?>>Cyber Security, Intermediate</option>
                    <option value="Cyber_Security_Advanced" <?php echo in_array('Cyber_Security_Advanced', $selected_interests) ? 'selected' : ''; ?>>Cyber Security, Advanced</option>
                </select>
            </div>

            <button type="button" class="btn" id="add-interest">Add Another Interest</button>

            <!-- Display selected interests -->
            <div class="selected-interests" id="selected-interests">
                <?php
                if (!empty($selected_interests)) {
                    $counter = 1;
                    foreach ($selected_interests as $interest) {
                        // Display in the desired format with spaces
                        $interest_display = str_replace('_', ' ', $interest);
                        echo '<span>Interest ' . $counter . ': ' . htmlspecialchars($interest_display) . '</span>';
                        $counter++;
                    }
                }
                ?>
            </div>

            <input type="submit" value="Update Profile" class="btn">
        </form>

        
    </div>

    <script>
        // Add interest functionality
        let interestCounter = 1;

        document.getElementById("add-interest").addEventListener("click", function() {
            interestCounter++;
            const interestContainer = document.getElementById("interest-container");

            // Create new interest select
            const newSelect = document.createElement("select");
            newSelect.name = "interests[]";
            newSelect.innerHTML = `
                <option value="Web_Development_Beginner">Web Development, Beginner</option>
                <option value="Web_Development_Intermediate">Web Development, Intermediate</option>
                <option value="Web_Development_Advanced">Web Development, Advanced</option>
                <option value="Machine_Learning_Beginner">Machine Learning, Beginner</option>
                <option value="Machine_Learning_Intermediate">Machine Learning, Intermediate</option>
                <option value="Machine_Learning_Advanced">Machine Learning, Advanced</option>
                <option value="Cloud_Computing_Beginner">Cloud Computing, Beginner</option>
                <option value="Cloud_Computing_Intermediate">Cloud Computing, Intermediate</option>
                <option value="Cloud_Computing_Advanced">Cloud Computing, Advanced</option>
                <option value="Cyber_Security_Beginner">Cyber Security, Beginner</option>
                <option value="Cyber_Security_Intermediate">Cyber Security, Intermediate</option>
                <option value="Cyber_Security_Advanced">Cyber Security, Advanced</option>
            `;
            interestContainer.appendChild(newSelect);
        });
    </script>
</body>
</html>
