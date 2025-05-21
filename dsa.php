<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DSA Roadmap</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f4f4f4;
      color: #333;
    }
    h1{
        text-align: center;
    }
    .button-container {
      margin-bottom: 20px;
    }
    button {
      padding: 10px 20px;
      font-size: 16px;
      color: white;
      background-color: #007acc;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background-color: #005b99;
    }
    h1, h2, h3 {
      color: #004466;
    }
    .section {
      background-color: #ffffff;
      padding: 20px;
      margin-bottom: 20px;
      border-left: 5px solid #007acc;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    ul {
      padding-left: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }
    th, td {
      border: 1px solid #ccc;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #e0f7fa;
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
      background-color: #278aab;
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
    <h1>Dsa(Data-Structure-and-Algorithm)</h1>
    <div class="button-container">
        <button onclick="location.href= 'intro_dsa.html' ">📖 Intro to DSA</button>
      </div>

  <h1>🛣 DSA Roadmap (Beginner to Advanced)</h1>

  <div class="section">
    <h2>Phase 1: Foundations</h2>
    <p><strong>Goal:</strong> Understand basic programming and simple data types.</p>
    <ul>
      <li>Learn a programming language: Python, C++, or Java (pick one).</li>
      <li>Understand:
        <ul>
          <li>Variables, loops, functions</li>
          <li>Arrays, strings</li>
          <li>Recursion basics</li>
        </ul>
      </li>
    </ul>
    <p><strong>Practice:</strong> Easy problems on LeetCode, HackerRank, or Codeforces.</p>
  </div>

  <div class="section">
    <h2>Phase 2: Core Data Structures</h2>
    <p><strong>Goal:</strong> Master how data is organized and manipulated.</p>
    <h3>Arrays & Strings</h3>
    <ul>
      <li>Sliding window, two pointers</li>
      <li>Prefix sum, hashing</li>
    </ul>
    <h3>Linked Lists</h3>
    <ul>
      <li>Single, double, cycle detection (Floyd’s algo)</li>
      <li>Reversal, merge, middle element</li>
    </ul>
    <h3>Stacks & Queues</h3>
    <ul>
      <li>Infix, postfix conversion</li>
      <li>Monotonic stack</li>
      <li>Queue via stack, circular queue</li>
    </ul>
    <h3>Hashing</h3>
    <ul>
      <li>Frequency count, hashmap, hashset</li>
      <li>Anagrams, subarrays with sum = k</li>
    </ul>
    <h3>Trees & Binary Trees</h3>
    <ul>
      <li>Inorder, preorder, postorder (recursive + iterative)</li>
      <li>Height, diameter, LCA</li>
      <li>Binary Search Tree (insertion, deletion)</li>
      <li>Tree to DLL, balanced BST</li>
    </ul>
    <p><strong>Practice:</strong> 50–100 problems total on these topics.</p>
  </div>

  <div class="section">
    <h2> Phase 3: Algorithms</h2>
    <h3>Searching & Sorting</h3>
    <ul>
      <li>Binary search (lower/upper bound)</li>
      <li>Quick, merge, heap sort</li>
      <li>Count sort, radix sort</li>
    </ul>
    <h3>Recursion & Backtracking</h3>
    <ul>
      <li>Subsets, permutations</li>
      <li>N-queens, sudoku solver</li>
    </ul>
    <h3>Greedy Algorithms</h3>
    <ul>
      <li>Activity selection, coin change</li>
      <li>Huffman coding</li>
    </ul>
    <h3>Divide and Conquer</h3>
    <ul>
      <li>Merge sort, quick sort</li>
      <li>Binary search on answers</li>
    </ul>
  </div>

  <div class="section">
    <h2> Phase 4: Advanced DSA</h2>
    <h3>Graphs</h3>
    <ul>
      <li>Representations: adjacency list/matrix</li>
      <li>BFS, DFS</li>
      <li>Topological sort</li>
      <li>Dijkstra, Prim’s, Kruskal’s</li>
      <li>Union-Find (DSU)</li>
      <li>Bridges, articulation points</li>
    </ul>
    <h3>Dynamic Programming (DP)</h3>
    <ul>
      <li>0/1 Knapsack, subsets</li>
      <li>LIS, LCS, matrix DP</li>
      <li>DP on trees and graphs</li>
      <li>Memoization vs Tabulation</li>
    </ul>
    <h3>Tries & Heaps</h3>
    <ul>
      <li>Auto-complete, prefix matching</li>
      <li>Min heap, max heap, priority queue</li>
    </ul>
  </div>

  <div class="section">
    <h2>Phase 5: Competitive Programming & Interview Prep</h2>
    <ul>
      <li>Practice contests (Codeforces, AtCoder, LeetCode weekly)</li>
      <li>Solve interview problems on:
        <ul>
          <li>LeetCode Top 100</li>
          <li>NeetCode roadmap</li>
          <li>Striver’s DSA Sheet</li>
          <li>GFG SDE Sheet</li>
        </ul>
      </li>
    </ul>
  </div>

  <div class="section">
    <h2>Tools & Platforms</h2>
    <ul>
      <li><strong>IDE:</strong> VSCode, LeetCode Playground</li>
      <li><strong>Practice:</strong> LeetCode, Codeforces, GFG, InterviewBit</li>
      <li><strong>Track Progress:</strong> Notion, GitHub, Google Sheets</li>
    </ul>
  </div>

  <div class="section">
    <h2>Suggested Weekly Plan (Flexible)</h2>
    <table>
      <tr><th>Week</th><th>Focus Area</th></tr>
      <tr><td>1–2</td><td>Arrays, Strings, Recursion</td></tr>
      <tr><td>3–4</td><td>Linked List, Stack, Queue</td></tr>
      <tr><td>5–6</td><td>Trees, BSTs</td></tr>
      <tr><td>7–8</td><td>Graphs, Searching, Sorting</td></tr>
      <tr><td>9–10</td><td>DP, Greedy, Tries, Heaps</td></tr>
      <tr><td>11+</td><td>Mock Interviews + CP</td></tr>
    </table>
  </div>

  <div class="button-container">
    <button onclick="showPDF()">📘 Show DSA Book</button>
  </div>

  <div id="pdfSection" class="pdf-container">
    <h2>📖 DSA Book</h2>
    <!-- Make sure 'dsa-book.pdf' is in the same folder as your HTML file -->
    <iframe src="uploads/DSA-BOOK.pdf"></iframe>
  </div>

  <script>
    function showPDF() {
      document.getElementById('pdfSection').style.display = 'block';
    }
  </script>

</body>
</html>