<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Web Development Intermediate Roadmap</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f5f8fa;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #278aab;
      color: white;
      text-align: center;
      padding: 20px;
    }

    .container {
      max-width: 900px;
      margin: auto;
      padding: 20px;
    }

    h2 {
      margin: 20px 0 10px;
      color: #333;
    }

    .card {
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      padding: 20px;
      margin-bottom: 25px;
    }

    .accordion {
      background-color: #e8eaf6;
      color: #333;
      padding: 14px 20px;
      width: 100%;
      text-align: left;
      border: none;
      outline: none;
      transition: background 0.3s ease;
      font-size: 16px;
      font-weight: bold;
      border-radius: 6px;
      cursor: pointer;
      margin-top: 10px;
    }

    .accordion:hover {
      background-color: #d1d9ff;
    }

    .panel {
      padding: 10px 20px;
      display: none;
      background-color: #f9f9f9;
      border-left: 4px solid #278aab;
      margin-bottom: 15px;
      border-radius: 8px;
      font-size: 14px;
    }

    .panel p {
      font-size: 15px;
      margin: 10px 0;
      line-height: 1.6;
    }

    .panel ul {
      padding-left: 20px;
      list-style-type: square;
    }

    .panel ol {
      padding-left: 20px;
      list-style-type: decimal;
    }

    .panel strong {
      color: #278aab;
    }

    .panel code {
      background-color: #e2e2e2;
      padding: 4px 8px;
      border-radius: 4px;
      font-size: 90%;
    }

    .resource-list a {
      display: block;
      color: #278aab;
      margin: 8px 0;
      text-decoration: none;
    }

    .resource-list a:hover {
      text-decoration: underline;
    }

    .video-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
      margin-top: 15px;
    }

    .video-card {
      background-color: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      transition: transform 0.2s;
    }

    .video-card:hover {
      transform: translateY(-5px);
    }

    .video-card img {
      width: 100%;
      height: 140px;
      object-fit: cover;
    }

    .video-card p {
      padding: 10px;
      font-size: 14px;
      color: #333;
      font-weight: 600;
      text-align: center;
    }

    footer {
      text-align: center;
      padding: 15px;
      font-size: 0.9em;
      color: #777;
      margin-top: 40px;
    }

    @media (max-width: 600px) {
      .accordion {
        font-size: 15px;
      }
    }
  </style>
</head>
<body>
  <header>
    <h1>Web Development Intermediate Roadmap</h1>
    <p>Elevate your web development skills to the next level!</p>
  </header>

  <div class="container">

    <!-- Roadmap Section -->
    <div class="card">
      <h2>Intermediate Roadmap</h2>

      <button class="accordion">⚙ JavaScript Advanced Concepts</button>
      <div class="panel">
        <ul>
          <li><strong>ES6+ Features:</strong> Let, const, arrow functions, template literals, destructuring, spread/rest operators.</li>
          <li><strong>Asynchronous JavaScript:</strong> Promises, async/await, fetch API.</li>
          <li><strong>JavaScript Modules:</strong> Import/export, module bundlers like Webpack.</li>
          <li><strong>Error Handling:</strong> try/catch, custom errors.</li>
        </ul>
      </div>

      <button class="accordion">🧩 Frontend Frameworks</button>
      <div class="panel">
        <ul>
          <li><strong>React.js:</strong> Components, JSX, state management, hooks.</li>
          <li><strong>Vue.js:</strong> Directives, components, Vue CLI.</li>
          <li><strong>Angular:</strong> TypeScript, components, services, routing.</li>
        </ul>
      </div>

      <button class="accordion">🔗 APIs and AJAX</button>
      <div class="panel">
        <ul>
          <li><strong>RESTful APIs:</strong> CRUD operations, status codes.</li>
          <li><strong>GraphQL:</strong> Queries, mutations, schema design.</li>
          <li><strong>AJAX:</strong> XMLHttpRequest, fetch API.</li>
        </ul>
      </div>

      <button class="accordion">🗄 Backend Basics</button>
      <div class="panel">
        <ul>
          <li><strong>Node.js:</strong> Event-driven architecture, npm, Express.js.</li>
          <li><strong>Databases:</strong> MongoDB, PostgreSQL, MySQL basics.</li>
          <li><strong>Authentication:</strong> JWT, OAuth, session management.</li>
        </ul>
      </div>

      <button class="accordion">🛠 Dev Tools & Deployment</button>
      <div class="panel">
        <ul>
          <li><strong>Version Control:</strong> Git, GitHub workflows.</li>
          <li><strong>CI/CD:</strong> Continuous Integration and Deployment basics.</li>
          <li><strong>Hosting:</strong> Netlify, Vercel, Heroku, Firebase.</li>
        </ul>
      </div>
    </div>

    <!-- Video Resources -->
    <div class="card">
      <h2>🎥 Recommended Video Tutorials</h2>
      <div class="video-grid">

        <div class="video-card">
          <a href="https://www.youtube.com/watch?v=DPnqb74Smug" target="_blank">
            <img src="https://img.youtube.com/vi/DPnqb74Smug/0.jpg" alt="JavaScript ES6 Tutorial" />
            <p>JavaScript ES6 Tutorial - Programming with Mosh</p>
          </a>
        </div>

        <div class="video-card">
          <a href="https://www.youtube.com/watch?v=Ke90Tje7VS0" target="_blank">
            <img src="https://img.youtube.com/vi/Ke90Tje7VS0/0.jpg" alt="React JS Crash Course" />
            <p>React JS Crash Course - Traversy Media</p>
          </a>
        </div>

        <div class="video-card">
          <a href="https://www.youtube.com/watch?v=Oe421EPjeBE" target="_blank">
            <img src="https://img.youtube.com/vi/Oe421EPjeBE/0.jpg" alt="Node.js Tutorial" />
            <p>Node.js Tutorial for Beginners - Programming with Mosh</p>
          </a>
        </div>

        <div class="video-card">
          <a href="https://www.youtube.com/watch?v=9zUHg7xjIqQ" target="_blank">
            <img src="https://img.youtube.com/vi/9zUHg7xjIqQ/0.jpg" alt="GraphQL Tutorial" />
            <p>GraphQL Tutorial - Academind</p>
          </a>
        </div>

      </div>
    </div>

    <!-- Document Resources -->
    <div class="card">
      <h2>📄 Document Resources</h2>
      <div class="resource-list">
        <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript" target="_blank">MDN JavaScript Documentation</a>
        <a href="https://reactjs.org/docs/getting-started.html" target="_blank">React Official Documentation</a>
        <a href="https://nodejs.org/en/docs/" target="_blank">Node.js Official Documentation</a>
        <a href="https://graphql.org/learn/" target="_blank">GraphQL Official Documentation</a>
      </div>
    </div>

    <!-- PDF Book Reference -->
    <div class="card">
      <h2>📚 Download PDF Books (Provided Resources)</h2>
      <div class="resource-list">
        <a href="https://eloquentjavascript.net/Eloquent_JavaScript.pdf" target="_blank">Eloquent JavaScript</a>
        <a href="https://github.com/getify/You-Dont-Know-JS" target="_blank">You Don't Know JS (GitHub Repository)</a>
        <a href="https://www.oreilly.com/library/view/learning-react-2nd/9781492051718/" target="_blank">Learning React (
::contentReference[oaicite:0]{index=0}
 
          <em>Some books may require sign-in or subscription.</em>
      </div>
    </div>

  </div>

  <footer>
    &copy; 2025 Intermediate Web Dev Roadmap. Built with 💻 and ☕.
  </footer>

  <script>
    // Accordion functionality
    const acc = document.querySelectorAll(".accordion");
    acc.forEach(btn => {
      btn.addEventListener("click", function () {
        this.classList.toggle("active");
        const panel = this.nextElementSibling;
        if (panel.style.display === "block") {
          panel.style.display = "none";
        } else {
          panel.style.display = "block";
        }
      });
    });
  </script>
</body>
</html>