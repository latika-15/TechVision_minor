<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DBMS Roadmap</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #f4f4f4;
      color: #333;
    }
    header {
      background-color: #278aab;
      color: white;
      padding: 20px;
      text-align: center;
    }
    section {
      padding: 20px;
      max-width: 900px;
      margin: auto;
      background: white;
      margin-bottom: 20px;
      border-radius: 8px;
    }
    h2 {
      color: #278aab;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    table, th, td {
      border: 1px solid #ddd;
    }
    th, td {
      padding: 10px;
      text-align: left;
    }
    ul {
      line-height: 1.6;
    }

    .button-container {
      margin: 20px 0;
    }

    button {
      padding: 10px 20px;
      font-size: 16px;
      color: white;
      background-color: #278aab;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color:rgb(19, 91, 114);
    }

    .pdf-container {
      display: none;
      margin-top: 20px;
    }

    iframe {
      width: 100%;
      height: 600px;
      border: 1px solid #ccc;
    }
  </style>
</head>
<body>
  <header>
    <h1>DBMS Learning Roadmap</h1>
  </header>

  <section>
    <h2>What is DBMS?</h2>
    <p>A Database Management System (DBMS) is software that allows users to define, create, maintain, and control access to databases. It provides a systematic and organized way to manage data efficiently.</p>
    <ul>
      <li>Data storage, retrieval, and update</li>
      <li>Data integrity and security</li>
      <li>Transaction management</li>
      <li>User access control</li>
    </ul>
  </section>

  <section>
    <h2>Where is DBMS Used?</h2>
    <table>
      <tr><th>Industry</th><th>Use Case Example</th></tr>
      <tr><td>Banking</td><td>Account management, transactions, fraud detection</td></tr>
      <tr><td>E-commerce</td><td>Product catalogs, order management</td></tr>
      <tr><td>Healthcare</td><td>Patient records, appointments</td></tr>
      <tr><td>Education</td><td>Student records, grading systems</td></tr>
      <tr><td>Government</td><td>ID records, taxation systems</td></tr>
    </table>
  </section>

  <section>
    <h2>Roadmap to Learn DBMS</h2>
    <ol>
      <li><strong>Basics</strong>
        <ul>
          <li>Types: RDBMS, NoSQL, Hierarchical</li>
          <li>Examples: MySQL, PostgreSQL</li>
        </ul>
      </li>
      <li><strong>Data Models & Architecture</strong>
        <ul>
          <li>ER Diagrams, Relational Model</li>
        </ul>
      </li>
      <li><strong>SQL</strong>
        <ul>
          <li>DDL, DML, DCL, TCL</li>
          <li>SELECT, JOINs, GROUP BY</li>
        </ul>
      </li>
      <li><strong>Normalization</strong>
        <ul>
          <li>1NF to BCNF</li>
        </ul>
      </li>
      <li><strong>Indexing & Optimization</strong></li>
      <li><strong>Transactions & Concurrency</strong></li>
      <li><strong>Backup & Recovery</strong></li>
      <li><strong>Advanced Topics</strong>
        <ul>
          <li>Stored Procedures, Views, NoSQL</li>
        </ul>
      </li>
      <li><strong>Practice & Projects</strong>
        <ul>
          <li>CRUD app development</li>
        </ul>
      </li>
    </ol>
  </section>

  <div class="button-container">
    <button onclick="showPDF()">📘 Show DBMS Book</button>
  </div>

  <div id="pdfSection" class="pdf-container">
    <h2>📖 DBMS Book</h2>
    <!-- Make sure 'dsa-book.pdf' is in the same folder as your HTML file -->
    <iframe src="uploads/DBMS-BOOK.pdf"></iframe>
  </div>

  <script>
    function showPDF() {
      document.getElementById('pdfSection').style.display = 'block';
    }
  </script>

</body>
</html>