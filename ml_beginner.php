<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Development Beginner Guide</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
     <style>
        /* General Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f9;
}

header {
    background-color: #4CAF50;
    color: white;
    text-align: center;
    padding: 2rem 0;
}

h1 {
    font-size: 2.5rem;
    margin: 0;
}

p {
    font-size: 1.2rem;
}

/* Resources Section */
.resources {
    padding: 2rem;
    background-color: #ffffff;
}

.resources h2 {
    font-size: 2rem;
    color: #333;
    text-align: center;
    margin-bottom: 2rem;
}

.resource-item {
    background-color: #fafafa;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.resource-item h3 {
    font-size: 1.8rem;
    color: #333;
}

.resource-item p {
    font-size: 1rem;
    color: #666;
}

.resource-item a {
    display: inline-block;
    margin-top: 0.8rem;
    font-size: 1.1rem;
    color: #4CAF50;
    text-decoration: none;
}

.resource-item a:hover {
    text-decoration: underline;
}

/* Roadmap Section */
.roadmap {
    padding: 2rem;
    background-color: #ffffff;
    text-align: center;
}

.roadmap img {
    width: 80%;
    max-width: 900px;
    margin-top: 2rem;
    border-radius: 8px;
}

/* Footer */
footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 1rem 0;
}

footer p {
    font-size: 1rem;
}

     </style>
</head>
<body>

    <header>
        <h1>Web Development Beginner Guide</h1>
        <p>Get started with the basics of web development and follow the roadmap to become a proficient developer!</p>
    </header>

    <section class="resources">
        <h2>Essential Resources</h2>
        <div class="resource-item">
            <h3>HTML & CSS Basics</h3>
            <p>Learn the fundamental building blocks of the web, HTML and CSS, to structure and style web pages.</p>
            <a href="https://www.w3schools.com/html/" target="_blank">Start Learning HTML</a>
            <a href="https://www.w3schools.com/css/" target="_blank">Start Learning CSS</a>
        </div>

        <div class="resource-item">
            <h3>JavaScript Basics</h3>
            <p>JavaScript is the language of the web that makes websites interactive. Master it to enhance your skills.</p>
            <a href="https://www.javascript.com/learn/strings" target="_blank">Start Learning JavaScript</a>
        </div>

        <div class="resource-item">
            <h3>Responsive Web Design</h3>
            <p>Learn how to make your websites look great on all devices by mastering responsive design.</p>
            <a href="https://www.freecodecamp.org/news/responsive-web-design-tutorial/" target="_blank">Responsive Web Design Tutorial</a>
        </div>

        <div class="resource-item">
            <h3>Version Control with Git</h3>
            <p>Learn how to manage your code using Git and GitHub, tools essential for every web developer.</p>
            <a href="https://www.git-scm.com/book/en/v2" target="_blank">Learn Git</a>
        </div>
    </section>

    <section class="roadmap">
        <h2>Web Development Roadmap (Beginner Level)</h2>
        <p>Follow this roadmap to get a clear idea of what you need to learn as a beginner web developer.</p>
        <img src="https://raw.githubusercontent.com/kamranahmedse/developer-roadmap/master/web-dev.png" alt="Web Development Roadmap" class="roadmap-image">
    </section>

    <footer>
        <p>&copy; 2025 Web Development Guide. All rights reserved.</p>
    </footer>

    <script>
        // If you need to add any dynamic behavior, such as loading additional resources or interactivity,
// you can implement that here using JavaScript.

document.addEventListener('DOMContentLoaded', function() {
    console.log("Web Development Beginner Guide Loaded.");
});

    </script>
</body>
</html>
