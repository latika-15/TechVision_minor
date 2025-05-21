
<?php
session_start();
include 'db.php'; // your DB connection
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get POST data
  
    // Connect to DB
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
  
    // Collect form data safely
    $fullName = $_POST['fullName'];
    $mobile = $_POST['mobile'];
    $linkedin = $_POST['linkedin'];
    $careerObjective = $_POST['careerObjective'];
    $education = $_POST['education'];
    $skills = $_POST['skills'];
    $projects = $_POST['projects'];
    $certifications = $_POST['certifications'];
    $achievements = $_POST['achievements'];
    $extracurricular = $_POST['extracurricular'];
    $strengths = $_POST['strengths'];
    $weakness = $_POST['weakness'];
    $hobbies = $_POST['hobbies'];
    $personalDetails = $_POST['personalDetails'];
    $familyDetails = $_POST['familyDetails'];
    $passport = $_POST['passport'];
    $address = $_POST['address'];
    $reference = $_POST['reference'];
    $declaration = $_POST['declaration'];
  
    // Insert using prepared statement
    $stmt = $conn->prepare("INSERT INTO resume_info
    (full_name, mobile, linkedin, career_objective, education, skills, projects, certifications, achievements, extracurricular, strengths, weaknesses, hobbies, personal_details, family_details, passport_details, address, reference, declaration) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  
    $stmt->bind_param("sssssssssssssssssss", $fullName, $mobile, $linkedin, $careerObjective, $education, $skills, $projects, $certifications, $achievements, $extracurricular, $strengths, $weakness, $hobbies, $personalDetails, $familyDetails, $passport, $address, $reference, $declaration);
  
    if ($stmt->execute()) {
      echo "<script>alert('Resume data saved successfully!');</script>";
    } else {
      echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }
  
    $stmt->close();
    $conn->close();
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Resume Generator</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
      body { font-family: Arial; margin: 0; padding: 0; background: #f4f4f4; }
      .container { display: flex; padding: 20px; }
      .form-container { width: 30%; padding: 20px; background: #fff; border-right: 2px solid #ccc; }
      .resume-preview { width: 70%; padding: 20px; background: #fff; }
      .resume { display: flex; width: 210mm; height: 297mm; margin: auto; background: white; box-shadow: 0 0 5px rgba(0,0,0,0.1); }
      .template1 .left { width: 35%; background: #0f2e47; color: white; padding: 20px; text-align: center; }
      .template1 .left img { width: 120px; height: 120px; border-radius: 50%; object-fit: cover; margin-bottom: 20px; }
      .template1 .right { width: 65%; padding: 30px; }
      .template2 .left { width: 40%; background: #2b3d45; color: white; padding: 20px; }
      .template2 .left img { width: 100px; height: 100px; border-radius: 50%; object-fit: cover; margin-bottom: 20px; }
      .template2 .right { width: 60%; padding: 30px; }
      .form-container input, .form-container textarea, .form-container select, .form-container button { width: 100%; margin-bottom: 10px; padding: 8px; }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="form-container">
        <h2>Enter Resume Details</h2>
        <form method="POST" enctype="multipart/form-data">
          <input type="file" id="photo"><br>
          <input type="text" name="fullName" id="fullName" placeholder="Full Name" required>
          <input type="text" name="mobile" id="mobile" placeholder="Mobile Number">
          <input type="text" name="linkedin" id="linkedin" placeholder="LinkedIn URL">
          <textarea name="careerObjective" id="careerObjective" placeholder="Career Objective"></textarea>
          <textarea name="education" id="education" placeholder="Education"></textarea>
          <textarea name="skills" id="skills" placeholder="IT Skills"></textarea>
          <textarea name="projects" id="projects" placeholder="Projects"></textarea>
          <textarea name="certifications" id="certifications" placeholder="Certifications"></textarea>
          <textarea name="achievements" id="achievements" placeholder="Achievements"></textarea>
          <textarea name="extracurricular" id="extracurricular" placeholder="Extracurricular"></textarea>
          <textarea name="strengths" id="strengths" placeholder="Strengths"></textarea>
          <textarea name="weakness" id="weakness" placeholder="Weaknesses"></textarea>
          <textarea name="hobbies" id="hobbies" placeholder="Hobbies"></textarea>
          <textarea name="personalDetails" id="personalDetails" placeholder="Personal Details"></textarea>
          <textarea name="familyDetails" id="familyDetails" placeholder="Family Details"></textarea>
          <textarea name="passport" id="passport" placeholder="Passport Details"></textarea>
          <textarea name="address" id="address" placeholder="Address"></textarea>
          <textarea name="reference" id="reference" placeholder="Reference"></textarea>
          <textarea name="declaration" id="declaration" placeholder="Declaration"></textarea>
          <button type="button" onclick="generateResume()">Generate Resume</button>
          <button type="submit">Save to Database</button>
          <button type="button" onclick="downloadPDF()">Download as PDF</button>
          <br><br>
          <label for="templateSelector">Select Template:</label>
          <select id="templateSelector">
            <option value="template1">Template 1</option>
            <option value="template2">Template 2</option>
          </select>
        </form>
      </div>
      <div class="resume-preview">
        <div id="resume" class="resume template1">
          <div class="left">
            <img id="userPhoto" src="" alt="Profile Picture">
            <h2 id="userName"></h2>
            <p id="userContact"></p>
            <p id="userLinkedIn"></p>
            <div class="section"><h3>Education</h3><p id="userEducation"></p></div>
            <div class="section"><h3>Skills</h3><p id="userSkills"></p></div>
          </div>
          <div class="right">
            <h1 id="nameHeader"></h1>
            <div class="section"><h3>Career Objective</h3><p id="userObjective"></p></div>
            <div class="section"><h3>Projects</h3><p id="userProjects"></p></div>
            <div class="section"><h3>Certifications</h3><p id="userCertifications"></p></div>
            <div class="section"><h3>Achievements</h3><p id="userAchievements"></p></div>
            <div class="section"><h3>Extracurricular</h3><p id="userExtra"></p></div>
            <div class="section"><h3>Strengths & Improvements</h3><p id="userStrengths"></p><p id="userWeakness"></p></div>
            <div class="section"><h3>Hobbies</h3><p id="userHobbies"></p></div>
            <div class="section"><h3>Personal Details</h3><p id="userPersonal"></p><p id="userFamily"></p><p id="userPassport"></p><p id="userAddress"></p></div>
            <div class="section"><h3>Reference</h3><p id="userReference"></p></div>
            <div class="section"><h3>Declaration</h3><p id="userDeclaration"></p></div>
          </div>
        </div>
      </div>
    </div>
  
    <script>
      document.getElementById("templateSelector").addEventListener("change", function() {
        const resume = document.getElementById("resume");
        resume.classList.remove("template1", "template2");
        resume.classList.add(this.value);
      });
  
      function generateResume() {
        const read = id => document.getElementById(id).value;
        document.getElementById("userName").innerText = read("fullName");
        document.getElementById("nameHeader").innerText = read("fullName");
        document.getElementById("userContact").innerText = read("mobile");
        document.getElementById("userLinkedIn").innerText = read("linkedin");
        document.getElementById("userObjective").innerText = read("careerObjective");
        document.getElementById("userEducation").innerText = read("education");
        document.getElementById("userSkills").innerText = read("skills");
        document.getElementById("userProjects").innerText = read("projects");
        document.getElementById("userCertifications").innerText = read("certifications");
        document.getElementById("userAchievements").innerText = read("achievements");
        document.getElementById("userExtra").innerText = read("extracurricular");
        document.getElementById("userStrengths").innerText = read("strengths");
        document.getElementById("userWeakness").innerText = read("weakness");
        document.getElementById("userHobbies").innerText = read("hobbies");
        document.getElementById("userPersonal").innerText = read("personalDetails");
        document.getElementById("userFamily").innerText = read("familyDetails");
        document.getElementById("userPassport").innerText = read("passport");
        document.getElementById("userAddress").innerText = read("address");
        document.getElementById("userReference").innerText = read("reference");
        document.getElementById("userDeclaration").innerText = read("declaration");
  
        const file = document.getElementById('photo').files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = () => {
            document.getElementById('userPhoto').src = reader.result;
          };
          reader.readAsDataURL(file);
        }
      }
  
      function downloadPDF() {
        const element = document.getElementById("resume");
        html2pdf().set({
          margin: 0,
          filename: 'resume.pdf',
          image: { type: 'jpeg', quality: 0.98 },
          html2canvas: { scale: 2 },
          jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        }).from(element).save();
      }
    </script>
  </body>
  </html> 