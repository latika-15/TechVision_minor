<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web Development Roadmap</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #eef2f7;
    }

    header {
      background-color: #278aab;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    h1 {
      margin: 0;
      font-size: 32px;
    }

    .container {
      padding: 20px;
    }

    section {
      margin-bottom: 40px;
    }

    h2 {
      color:rgb(210, 225, 239);
      font-size: 24px;
      margin-bottom: 10px;
    }

    ul {
      list-style-type: none;
      padding-left: 20px;
    }

    li {
      margin-bottom: 8px;
      color: #444;
    }

    .projects-section {
      padding: 30px;
      background-color: #f7f9fc;
      border-radius: 15px;
      margin-top: 40px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .projects-section h2 {
      text-align: center;
      color: #1e2a78;
      font-size: 28px;
      margin-bottom: 25px;
    }

    .project-category {
      margin-bottom: 20px;
      padding: 15px;
      background: #ffffff;
      border-left: 6px solidrgb(56, 203, 203);
      border-radius: 8px;
      transition: transform 0.3s ease;
    }

    .project-category:hover {
      transform: scale(1.02);
    }

    .project-category h3 {
      color: #2c3e50;
      margin-bottom: 10px;
    }

    .project-category ul {
      list-style-type: none;
      padding-left: 0;
    }

    .project-category li {
      margin-bottom: 10px;
    }

    .project-category a {
      text-decoration: none;
      color: #278aab;
      font-weight: 500;
    }

    .project-category a:hover {
      color:rgb(27, 81, 117);
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <header>
    <h1>Web Development Roadmap</h1>
  </header>
  <a href="TechVision/dashboard.php">Go Back to Dashboard</a>
  <div class="container">
    <section class="projects-section">
      <h2>Web Development Projects </h2>

      <!-- Mini Projects -->
      <div class="project-category">
        <h3>Mini Projects</h3>
        <ul>
          <li><a href="https://github.com/bradtraversy/50projects50days" target="_blank">50 Projects in 50 Days</a></li>
          <li><a href="https://github.com/solygambas/html-css-javascript-projects" target="_blank">100+ Mini Web Projects</a></li>
          <li><a href="https://github.com/Ayushparikh-code/Web-dev-mini-projects" target="_blank">Web Dev Mini Projects</a></li>
        </ul>
      </div>

      <!-- Minor Projects -->
      <div class="project-category">
        <h3>Minor Projects</h3>
        <ul>
          <li><a href="https://github.com/VectorStatic/Memory-Matching-Game" target="_blank">Memory Matching Game</a></li>
          <li><a href="https://github.com/keerti1924/E-Learning-Website-HTML-CSS" target="_blank">E-Learning Website</a></li>
          <li><a href="https://github.com/Yash-srivastav16/Tour-Project" target="_blank">Tour & Travel Website</a></li>
        </ul>
      </div>

      <!-- Major Projects -->
      <div class="project-category">
        <h3>Major Projects</h3>
        <ul>
          <li><a href="https://github.com/Vatshayan/Ecommerce-Website" target="_blank">Ecommerce Website</a></li>
          <li><a href="https://github.com/DevanshSahni/Portfolio" target="_blank">React Portfolio Website</a></li>
          <li><a href="https://github.com/sdil/open-production-web-projects" target="_blank">Production-ready Web Projects</a></li>
        </ul>
      </div>
    </section>
  </div>

  <script>
    const sections = document.querySelectorAll(".project-category");

    window.addEventListener("scroll", () => {
      sections.forEach((section) => {
        const rect = section.getBoundingClientRect();
        if (rect.top < window.innerHeight - 100) {
          section.style.opacity = "1";
          section.style.transform = "translateY(0)";
        }
      });
    });

    // Initial hidden styles
    sections.forEach((section) => {
      section.style.opacity = "0";
      section.style.transform = "translateY(30px)";
      section.style.transition = "all 0.6s ease-out";
    });
  </script>
</body>
</html>