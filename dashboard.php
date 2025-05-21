<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';  // Make sure this file contains the connection to the database
$user_id = $_SESSION['user_id'];

// STEP 1: Fetch basic user info (name + is_new_user)
$stmt = $conn->prepare("SELECT first_name, last_name, email, phone, school_or_college, year_or_class, course_summary, interests FROM userinfo WHERE id = ?");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user_basic = $result->fetch_assoc();

// STEP 2: Redirect new user to onboarding
if (isset($user_basic) && isset($user_basic['is_new_user']) && (int)$user_basic['is_new_user'] === 1) {
    header("Location: onboard.php");
    exit();
} else {
    // Handle the case where $user_basic is null or doesn't have 'is_new_user'
    echo "User data is missing or invalid!";
}

// STEP 3: Fetch user profile details
$sql = "SELECT first_name, last_name, email, phone, school_or_college, year_or_class, course_summary, interests FROM userinfo WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$profile_result = mysqli_stmt_get_result($stmt);

if (!$profile_result || mysqli_num_rows($profile_result) === 0) {
    echo "Profile not found.";
    exit();
}
$user = mysqli_fetch_assoc($profile_result); // Store detailed profile

// STEP 4: Fetch user documents
$sql = "SELECT id, file_name, file_path, upload_time FROM documents WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$docs_result = mysqli_stmt_get_result($stmt);




// Fetch interests as a CSV
$stmt = $conn->prepare("SELECT interests FROM userinfo WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user_basic = $result->fetch_assoc();
$interests = explode(',', $user_basic['interests']); // Split into array

// Prepare queries for each interest
$resources_sql = "
    SELECT course_name, resource_type, resource_link 
    FROM resources 
    WHERE interest LIKE ?
";
// Assuming $interests array holds the user interests
$resources_sql = "
    SELECT interest, course_name, resources, project_ideas 
    FROM recommendations 
    WHERE interest LIKE ? 
";

// Prepare statement for fetching recommendations
$resources_stmt = mysqli_prepare($conn, $resources_sql);

$resources = [];

foreach ($interests as $interest) {
    $search_interest = "%" . trim($interest) . "%";  // Add wildcards to match the interest
    mysqli_stmt_bind_param($resources_stmt, "s", $search_interest);
    mysqli_stmt_execute($resources_stmt);
    $resources_result = mysqli_stmt_get_result($resources_stmt);
    
    while ($res = mysqli_fetch_assoc($resources_result)) {
        $resources[$interest][] = $res;
    }
}

mysqli_stmt_close($resources_stmt);


// STEP 5: Fetch user projects based on interests
$projects = [];  // Initialize as an empty array
$projects_sql = "
    SELECT project_difficulty, project_idea 
    FROM projects 
    WHERE interest LIKE ?
";
$projects_stmt = mysqli_prepare($conn, $projects_sql);

// Fetch projects for each interest
foreach ($interests as $interest) {
    $search_interest = "%" . trim($interest) . "%";
    mysqli_stmt_bind_param($projects_stmt, "s", $search_interest);
    mysqli_stmt_execute($projects_stmt);
    $projects_result = mysqli_stmt_get_result($projects_stmt);

    while ($proj = mysqli_fetch_assoc($projects_result)) {
        $projects[$proj['project_difficulty']][] = $proj;
    }
}

mysqli_stmt_close($projects_stmt);

// Display Projects
if (count($projects) > 0): ?>
    <?php foreach ($projects as $difficulty => $difficulty_projects): ?>
        <h4><?php echo ucfirst(str_replace('_', ' ', $difficulty)); ?> Projects</h4>
        <ul>
            <?php foreach ($difficulty_projects as $project): ?>
                <li>
                    <?php echo htmlspecialchars($project['project_idea']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
<?php else: ?>
    <div class="no-resources">
    <p>No project ideas available for your interests.</p>
    </div>
<?php endif; 


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="dashboard.css" rel="stylesheet">
    


    <script>
  
    // Load dynamic data for courses and certifications
    document.getElementById("semester-courses").innerHTML = `
        <li>Course 1</li>
        <li>Course 2</li>
        <li>Course 3</li>
    `;

    document.getElementById("certifications-list").innerHTML = `
        <li>Certification 1</li>
        <li>Certification 2</li>
    `;

    document.getElementById("recommendations-list").innerHTML = `
        <li>Recommendation 1</li>
        <li>Recommendation 2</li>
    `;
});
function toggleDropdown(id) {
        const dropdown = document.getElementById(id);
        const arrow = document.getElementById('arrow-' + id);

        if (dropdown.style.display === "block") {
            dropdown.style.display = "none";
            arrow.classList.remove("rotate");
        } else {
            dropdown.style.display = "block";
            arrow.classList.add("rotate");
        }
    }
   
document.addEventListener("DOMContentLoaded", () => {
    const onboarding = document.getElementById("onboarding-section");
    if (onboarding) {
        onboarding.scrollIntoView({ behavior: "smooth" });
    }
 

    </script>
</head>
<body>
<aside class="sidebar">
        <div class="logo-container">
            <a href="#" class="logo">
                <img src="final_logo.png" alt="LOGO">
            </a>
        </div>
        <nav class="navigation">
            <a href="#profile-section">Profile</a>
            <a href="#certifications-section">Certifications</a>
           
            <a href="#resume">Create Resume </a>
            <a href ="recommendations-section">Recommendations</a>
            
        </div>

    </div>
            
            <a href="logout.php" class="logout-button">Logout</a>
        </nav>
    </aside>
    <main class="main-content">
    <?php
// Sample logic to determine new user — replace this with actual backend logic.
$isNewUser = empty($user['course_summary']) || empty($user['interests']);
?>

<?php if ($isNewUser): ?>
<section id="onboarding-section" style="background-color: #fff; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
    <h2>Let's Build Your Profile</h2>
    <p>Welcome! Start by completing your profile so we can personalize your dashboard experience.</p>
    <a href="build.php"><button style="background: #278aab; color: white; padding: 10px 20px; border: none; border-radius: 5px; font-size: 1em;">Build Your Profile</button></a>
</section>
<?php endif; ?> 
    <header class="sticky-header">
        <h1>Welcome, <?php echo htmlspecialchars($user['first_name'] . " " . $user['last_name']); ?></h1>
    </header>
    
    <div class="dashboard-container">
        <!-- Profile Section -->
        <section id="profile-section">
            <h2>Your Profile</h2>
            <div id="profile-details">
                <p><strong>Name:</strong> <?php echo htmlspecialchars($user['first_name'] . " " . $user['last_name']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
                <p><strong>School/College:</strong> <?php echo htmlspecialchars($user['school_or_college']); ?></p>
                <p><strong>Year/Class:</strong> <?php echo htmlspecialchars($user['year_or_class']); ?></p>
                <p><strong>Course Summary:</strong> <?php echo htmlspecialchars($user['course_summary']); ?></p>
                <p><strong>Interests:</strong> <?php echo htmlspecialchars($user['interests']); ?></p>
            </div>
            <div class="profile-link">
        <a href="profile.php">View/Update Profile</a>
    </div>
        </section>

       


        <!-- Semester-Wise Courses -->
        <!-- <section id="courses-section">
            <h2>Semester-Wise Courses</h2>
            <ul id="semester-courses">
                 Dynamic content will be loaded via JS
            </ul>
        </section> -->

       <!-- Certifications Section -->
       <section id="certifications-section">
            <h2>Your Certifications</h2>
         
            <?php if (isset($_SESSION['success'])): ?>
        <p style="color: green;"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
    <?php endif; ?>
    <?php if (isset($_SESSION['error'])): ?>
        <p style="color: red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>

    <h3>Upload a Document</h3>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="document">Choose a file:</label>
        <input type="file" name="document" id="document" required>
        <button type="submit">Upload</button>
    </form>
    <div class="profile-link">
        <a href="certify.php">Download/Update documents</a>
    </div>
    



        <section id="resume">
            <h2>Create your Resume</h2>
            <a href="resume_generator.php"><button>View</button></a>
        </section>


        <section id="recommendations-section">
    <h2>Recommendations for You</h2>

    <?php foreach ($interests as $interest): ?>
        <div class="resources-section">
            <h3>Resources for <?php echo htmlspecialchars($interest); ?></h3>

            <?php
            if (isset($resources[$interest]) && count($resources[$interest]) > 0): ?>
                <div class="recommendations-list">
                    <?php foreach ($resources[$interest] as $recommendation): ?>
                        <div class="recommendation-item">
                            <h4><?php echo htmlspecialchars($recommendation['course_name']); ?></h4>
                            <p><strong>Resources:</strong> <?php echo formatLinks(htmlspecialchars($recommendation['resources'])); ?></p>
                            <p><strong>Project Ideas:</strong> <?php echo formatLinks(htmlspecialchars($recommendation['project_ideas'])); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php else: ?>
    <div class="no-resources">
        <p>No resources available for this interest.</p>
    </div>
<?php endif; ?>

        </div>
    <?php endforeach; ?>

   

    <?php
   

    // Function to format the resource and project ideas as clickable links
    function formatLinks($text) {
        // Regex to find internal or external URLs and convert them into clickable links
        $pattern = '/(https?:\/\/[^\s]+|\/[^\s]+)/'; 
        // Matches both external and relative URLs
        $replacement = '<a href="$1" target="_blank">$1</a>';
        return preg_replace($pattern, $replacement, $text);
    }
    ?>
</section>

</div>


    </div>

    <footer>
        <p>&copy; 2024 TechVision Dashboard. All rights reserved.</p>
    </footer>
</main>
    <script src="dashboard.js"></script>
</body>
</html>