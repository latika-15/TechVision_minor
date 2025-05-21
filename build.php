<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Restart logic
if (isset($_GET['restart']) && $_GET['restart'] == 'true') {
    $_SESSION['step'] = 2;
    unset($_SESSION['current_activity'], $_SESSION['phone'], $_SESSION['phone_verification_code'],
          $_SESSION['interests'], $_SESSION['school_or_college'], $_SESSION['year_or_class'],
          $_SESSION['course_summary']);
    header("Location: build.php");
    exit();
}

// Default step initialization
if (!isset($_SESSION['step'])) {
    $_SESSION['step'] = 2;
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    switch ($_SESSION['step']) {
        case 2:
            $_SESSION['current_activity'] = $_POST['current_activity'];
            $_SESSION['step'] = 3;
            break;

        case 3:
            $_SESSION['phone'] = $_POST['phone'];
            $_SESSION['phone_verification_code'] = rand(100000, 999999);
            echo "<script>alert('Verification code sent: " . $_SESSION['phone_verification_code'] . "');</script>";
            $_SESSION['step'] = 4;
            break;

        case 4:
            if (isset($_POST['verification_code'])) {
                $entered_code = $_POST['verification_code'];
                if ($entered_code == $_SESSION['phone_verification_code']) {
                    echo "<script>alert('Successfully verified!');</script>";
                    $_SESSION['step'] = 5;
                } else {
                    echo "<script>alert('Incorrect verification code. Try again.');</script>";
                }
            }
            break;

        case 5:
            $_SESSION['school_or_college'] = $_POST['school_class'];
            $_SESSION['step'] = 6;
            break;

        case 6:
            $_SESSION['college_name'] = $_POST['college_name'];
            $_SESSION['year_or_class'] = $_POST['year_or_class'] . " - Semester " . $_POST['semester'];
            $_SESSION['course_summary'] = $_POST['school_class']; // Store the course selection
            $_SESSION['step'] = 7;
            break;

        case 7:
            $interest = $_POST['interest'];
            $expertise_level = $_POST['expertise_level'];
            $_SESSION['interests'][] = [
                'interest' => $interest,
                'expertise_level' => $expertise_level
            ];
            $_SESSION['step'] = 8;
            break;

        case 8:
            if (isset($_POST['add_interest']) && $_POST['add_interest'] == 'true') {
                $_SESSION['step'] = 7; // Go back to adding more interests and expertise levels
            } else {
                $_SESSION['step'] = 9;
            }
            break;

        case 9:
            $_SESSION['user_status'] = 'returning';

            // Insert into DB
            $interests_json = json_encode($_SESSION['interests']);
            $user_id = $_SESSION['user_id'];
            $sql = "INSERT INTO userinfo 
                        (id, first_name, last_name, email, phone, school_or_college, year_or_class, course_summary, interests)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
                    ON DUPLICATE KEY UPDATE
                        first_name=VALUES(first_name),
                        last_name=VALUES(last_name),
                        email=VALUES(email),
                        phone=VALUES(phone),
                        school_or_college=VALUES(school_or_college),
                        year_or_class=VALUES(year_or_class),
                        course_summary=VALUES(course_summary),
                        interests=VALUES(interests)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "issssssss",
                $user_id,
                $_SESSION['first_name'],
                $_SESSION['last_name'],
                $_SESSION['email'],
                $_SESSION['phone'],
                $_SESSION['college_name'],
                $_SESSION['year_or_class'],
                $_SESSION['course_summary'],
                $interests_json // Pass the JSON-encoded interests string here
            );
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            echo "<script>alert('Your profile is built successfully! Redirecting to dashboard...'); window.location.href = 'dashboard.php';</script>";
            exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Build Your Profile</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f4f8;
            padding: 40px;
        }
        .container {
            background: white;
            max-width: 600px;
            margin: auto;
            padding: 30px;
            box-shadow: 0px 0px 10px #ccc;
            border-radius: 10px;
        }
        .btn, .restart-btn {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 16px;
            width: 100%;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .restart-btn {
            background-color: #dc3545;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
        }
        .input-group {
            margin-bottom: 20px;
        }
        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            margin-top: 6px;
        }
        input[type="text"]:focus, select:focus {
            border-color: #007bff;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Build Your Profile</h2>
    <p style="text-align: center;">Welcome, <?= htmlspecialchars($_SESSION['first_name'] . ' ' . $_SESSION['last_name']) ?> (<?= htmlspecialchars($_SESSION['email']) ?>)</p>

    <form method="POST">
        <?php if ($_SESSION['step'] == 2): ?>
            <div class="input-group">
                <label>What are you currently doing?</label>
                <select name="current_activity" required>
                    <option value="">-- Select --</option>
                    <option value="school">School</option>
                    <option value="college">College</option>
                </select>
            </div>
        <?php elseif ($_SESSION['step'] == 3): ?>
            <div class="input-group">
                <label>Your Phone Number:</label>
                <input type="text" name="phone" pattern="[0-9]{10}" required>
            </div>
        <?php elseif ($_SESSION['step'] == 4): ?>
            <div class="input-group">
                <label>Enter the 6-digit code sent to your phone:</label>
                <input type="text" name="verification_code" pattern="[0-9]{6}" required>
            </div>
        <?php elseif ($_SESSION['step'] == 5): ?>
            <div class="input-group">
                <label>Your study course:</label>
                <select name="school_class" required>
                    <option value="">-- Select --</option>
                    <option value="bca">BCA</option>
                    <option value="btech">BTech</option>
                    <option value="other">Other</option>
                </select>
            </div>
        <?php elseif ($_SESSION['step'] == 6): ?>
            <div class="input-group">
                <label>College or School Name:</label>
                <input type="text" name="college_name" required>
            </div>
            <div class="input-group">
                <label>Year or Class:</label>
                <input type="text" name="year_or_class" required>
            </div>
            <div class="input-group">
                <label>Semester:</label>
                <input type="text" name="semester" required>
            </div>
        <?php elseif ($_SESSION['step'] == 7): ?>
            <div class="input-group">
                <label>Your Interest Area:</label>
                <input type="text" name="interest" required>
            </div>
            <div class="input-group">
                <label>Your Expertise Level (Beginner/Intermediate/Advanced):</label>
                <input type="text" name="expertise_level" required>
            </div>
            <input type="hidden" name="add_interest" value="true">
            <input type="submit" class="btn" value="Add Another Interest">
        <?php elseif ($_SESSION['step'] == 8): ?>
            <h3>Review Your Information</h3>
            <ul>
                <li><strong>Name:</strong> <?= $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?></li>
                <li><strong>Email:</strong> <?= $_SESSION['email'] ?></li>
                <li><strong>Phone:</strong> <?= $_SESSION['phone'] ?></li>
                <li><strong>Activity:</strong> <?= $_SESSION['current_activity'] ?></li>
                <li><strong>Class/College:</strong> <?= $_SESSION['course_summary'] ?></li>
                <li><strong>Year & Semester:</strong> <?= $_SESSION['year_or_class'] ?></li>
                <li><strong>Interests and Expertise:</strong>
                    <ul>
                        <?php foreach ($_SESSION['interests'] as $interest): ?>
                            <li><strong>Interest:</strong> <?= $interest['interest'] ?>, <strong>Expertise:</strong> <?= $interest['expertise_level'] ?></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>
            <p style="text-align:center; font-weight:bold;">Click "Submit" to finish or "Restart" to make changes.</p>
        <?php endif; ?>

        <input type="submit" class="btn" value="<?= $_SESSION['step'] == 9 ? 'Submit & Finish' : 'Next' ?>">
    </form>

    <form method="GET" action="build.php">
        <input type="hidden" name="restart" value="true">
        <input type="submit" class="restart-btn" value="Restart Profile">
    </form>
</div>
</body>
</html>
