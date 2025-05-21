<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Advanced Web Development Roadmap</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f0f2f5;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
      color: #2c3e50;
    }

    .section {
      margin: 20px auto;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: all 0.3s ease;
      max-width: 900px;
    }

    .section-header {
      padding: 20px;
      cursor: pointer;
      background-color:rgb(52, 211, 219);
      color: white;
      font-size: 18px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .section-content {
      display: none;
      padding: 20px;
    }

    .card {
      background: #ecf0f1;
      border-radius: 8px;
      margin-bottom: 20px;
      padding: 15px;
      box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
    }

    .card h3 {
      margin-top: 0;
      color: #2c3e50;
    }

    .card a {
      color: #2980b9;
      text-decoration: none;
    }

    .toggle-icon {
      font-size: 20px;
      transition: transform 0.3s ease;
    }

    .rotate {
      transform: rotate(90deg);
    }
  </style>
</head>
<body>

  <h1>Advanced Web Development Roadmap</h1>

  <!-- Section Template -->
  <div class="section">
    <div class="section-header" onclick="toggleSection(this)">
      1. Advanced JavaScript (ES6+)
      <span class="toggle-icon">▶</span>
    </div>
    <div class="section-content">
      <div class="card">
        <h3>Video</h3>
        <a href="https://www.youtube.com/watch?v=ieTHC78giGQ" target="_blank">ES6+ Features Explained</a>
      </div>
      <div class="card">
        <h3>PDF</h3>
        <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript" target="_blank">MDN JavaScript Docs</a>
      </div>
    </div>
  </div>

  <div class="section">
    <div class="section-header" onclick="toggleSection(this)">
      2. JavaScript Frameworks (React, Vue, Angular)
      <span class="toggle-icon">▶</span>
    </div>
    <div class="section-content">
      <div class="card">
        <h3>Video</h3>
        <a href="https://www.youtube.com/watch?v=bMknfKXIFA8" target="_blank">React Full Course</a>
      </div>
      <div class="card">
        <h3>PDF</h3>
        <a href="https://reactjs.org/docs/getting-started.html" target="_blank">React Official Docs</a>
      </div>
    </div>
  </div>

  <div class="section">
    <div class="section-header" onclick="toggleSection(this)">
      3. APIs & AJAX
      <span class="toggle-icon">▶</span>
    </div>
    <div class="section-content">
      <div class="card">
        <h3>Video</h3>
        <a href="https://www.youtube.com/watch?v=cuEtnrL9-H0" target="_blank">API & AJAX Tutorial</a>
      </div>
      <div class="card">
        <h3>PDF</h3>
        <a href="https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API" target="_blank">Fetch API Docs</a>
      </div>
    </div>
  </div>

  <div class="section">
    <div class="section-header" onclick="toggleSection(this)">
      4. Version Control (Git & GitHub)
      <span class="toggle-icon">▶</span>
    </div>
    <div class="section-content">
      <div class="card">
        <h3>Video</h3>
        <a href="https://www.youtube.com/watch?v=RGOj5yH7evk" target="_blank">Git & GitHub Crash Course</a>
      </div>
      <div class="card">
        <h3>PDF</h3>
        <a href="https://git-scm.com/doc" target="_blank">Git Official Docs</a>
      </div>
    </div>
  </div>

  <div class="section">
    <div class="section-header" onclick="toggleSection(this)">
      5. Deployment & Hosting
      <span class="toggle-icon">▶</span>
    </div>
    <div class="section-content">
      <div class="card">
        <h3>Video</h3>
        <a href="https://www.youtube.com/watch?v=nhBVL41-_Cw" target="_blank">How to Deploy Website</a>
      </div>
      <div class="card">
        <h3>PDF</h3>
        <a href="https://vercel.com/docs" target="_blank">Vercel Hosting Docs</a>
      </div>
    </div>
  </div>

  <div class="section">
    <div class="section-header" onclick="toggleSection(this)">
      6. Performance Optimization
      <span class="toggle-icon">▶</span>
    </div>
    <div class="section-content">
      <div class="card">
        <h3>Video</h3>
        <a href="https://www.youtube.com/watch?v=TG6BuSjw1fM" target="_blank">Web Performance Basics</a>
      </div>
      <div class="card">
        <h3>PDF</h3>
        <a href="https://web.dev/fast/" target="_blank">web.dev Performance Guide</a>
      </div>
    </div>
  </div>

  <script>
    function toggleSection(header) {
      const content = header.nextElementSibling;
      const icon = header.querySelector('.toggle-icon');
      const isVisible = content.style.display === 'block';

      document.querySelectorAll('.section-content').forEach(sec => sec.style.display = 'none');
      document.querySelectorAll('.toggle-icon').forEach(ic => ic.classList.remove('rotate'));

      if (!isVisible) {
        content.style.display = 'block';
        icon.classList.add('rotate');
      }
    }
  </script>

</body>
</html>