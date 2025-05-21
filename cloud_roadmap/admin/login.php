<?php
// Start session
session_start();

// Check if admin already logged in
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: dashboard.php");
    exit();
}

// Connect to database
$conn = new mysqli("localhost", "root", "", "cloud_roadmap");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login form submission
$error = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    if ($admin) {
        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "Invalid username!";
    }
}

$conn->close();
?>

<!-- HTML Part -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - Cloud Roadmap</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

    <div class="login-container">
        <h2>Admin Login</h2>
        
        <?php if ($error != "") { echo "<p style='color:red;'>$error</p>"; } ?>
        
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <button type="submit">Login</button>
        </form>

        <p>Default Admin: <b>admin / admin123</b></p>
    </div>

</body>
</html>