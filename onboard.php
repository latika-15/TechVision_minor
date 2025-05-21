<?php
session_start();
if (isset($_SESSION['user_id'])) {
    include 'db.php';
    $user_id = $_SESSION['user_id'];

    // Check if user has completed onboarding
    $sql = "SELECT * FROM userinfo WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (!empty($user['first_name']) && !empty($user['interests'])) {
            // User has already completed onboarding, redirect to dashboard
            header("Location: dashboard.php");
            exit();
        }
    }

    // Process form data when submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $current_activity = mysqli_real_escape_string($conn, $_POST['current_activity']);
        $interests = mysqli_real_escape_string($conn, $_POST['interests']);
        $expertise = mysqli_real_escape_string($conn, $_POST['expertise']);
        
        // Update user profile with collected data
        $update_sql = "UPDATE userinfo SET first_name = ?, last_name = ?, current_activity = ?, interests = ?, expertise = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $update_sql);
        mysqli_stmt_bind_param($stmt, "sssssi", $first_name, $last_name, $current_activity, $interests, $expertise, $user_id);
        $update_result = mysqli_stmt_execute($stmt);

        if ($update_result) {
            // Redirect to dashboard after successful onboarding
            $_SESSION['success'] = "Profile setup complete!";
            header("Location: dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "Error updating your profile.";
        }
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Setup</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome to Profile Setup</h1>
            <p>Please fill out the information below to set up your profile.</p>
        </header>
        
        <?php if (isset($_SESSION['error'])): ?>
            <p class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <form action="onboard.php" method="POST">
            <label for="first_name">Full Name:</label>
            <input type="text" name="first_name" id="first_name" required>

            <label for="current_activity">What are you currently doing?</label>
            <input type="text" name="current_activity" id="current_activity" required>

            <label for="interests">Areas of Interest (comma-separated):</label>
            <input type="text" name="interests" id="interests" required>

            <label for="expertise">Your Expertise Level (Beginner/Intermediate/Expert):</label>
            <select name="expertise" id="expertise" required>
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Expert">Expert</option>
            </select>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
