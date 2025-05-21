<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>OS Roadmap</title>
  <style>
   body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h1{
            background-color: #278aab;
            color: white;
            text-align: center;
            padding: 1em;
        }
        section {
            padding: 2em;
            margin: 2em;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        ul {
            list-style-type: none;
            padding-left: 0;
        }
        li {
            margin-bottom: 1em;
        }

    .button-container {
      margin: 20px 0;
    }

    button {
      padding: 10px 20px;
      font-size: 16px;
      color: white;
      background-color:#278aab;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color:rgb(6, 57, 74);
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
  <h1>Operating System and Its Roadmap</h1>


  <section>
      <h2>What is an Operating System (OS)?</h2>
      <p>An Operating System (OS) is software that manages computer hardware, software resources, and provides common services for computer programs. It acts as an intermediary between users and the hardware, allowing users to interact with the system and applications without needing to understand the underlying hardware.</p>
      
      <h3>Key Functions of an OS:</h3>
      <ul>
          <li><strong>Process Management:</strong> Handles processes, which are instances of running programs.</li>
          <li><strong>Memory Management:</strong> Manages system memory (RAM), allocating it to different processes as needed.</li>
          <li><strong>File System Management:</strong> Organizes files and directories, controlling access to them.</li>
          <li><strong>Device Management:</strong> Controls and interacts with peripheral devices like printers, displays, and storage devices.</li>
          <li><strong>User Interface:</strong> Provides an interface for users to interact with the computer (e.g., graphical or command-line).</li>
      </ul>
  </section>
  
  <section>
      <h2>Roadmap for an OS</h2>
      <p>The roadmap for an OS typically involves advancements in security, virtualization, AI, cross-platform support, and more. Below are some key trends:</p>
      
      <h3>1. Security Improvements</h3>
      <ul>
          <li><strong>Enhanced Encryption:</strong> Improving built-in encryption mechanisms to protect data.</li>
          <li><strong>Zero Trust Architectures:</strong> Ensuring every device and request is treated as untrusted until verified.</li>
          <li><strong>Secure Boot and Hardware Security:</strong> Incorporating hardware-level security features like Trusted Platform Module (TPM).</li>
      </ul>
  
      <h3>2. Virtualization and Containerization</h3>
      <ul>
          <li>OSes support virtualization (multiple virtual machines) and containerization (e.g., Docker) for better resource usage.</li>
      </ul>
  
      <h3>3. AI and Machine Learning Integration</h3>
      <ul>
          <li>AI and ML are used for predictive maintenance, system optimization, security, and user behavior analysis.</li>
      </ul>
  
      <h3>4. Cross-Platform Compatibility</h3>
      <ul>
          <li>Improving OS interoperability across different hardware platforms like smartphones, tablets, and cloud environments.</li>
      </ul>
  
      <h3>5. Edge Computing Support</h3>
      <ul>
          <li>OSes evolve to support distributed computing, processing data closer to the source (edge devices).</li>
      </ul>
  
      <h3>6. Resource Efficiency and Sustainability</h3>
      <ul>
          <li>Focus on reducing power consumption, improving battery life, and optimizing resource usage for sustainability.</li>
      </ul>
  
      <h3>7. User Experience and Accessibility</h3>
      <ul>
          <li>Improving user interfaces with voice commands, touch gestures, and better accessibility features.</li>
      </ul>
  
      <h3>8. Distributed and Cloud-Native OS</h3>
      <ul>
          <li>Providing native support for cloud-native and distributed applications, with a focus on multi-cloud and hybrid environments.</li>
      </ul>
  
      <h3>9. Decentralization and Blockchain Integration</h3>
      <ul>
          <li>OSes built for blockchain to offer decentralized models, using blockchain for transaction validation and file storage.</li>
      </ul>
  </section>
  
  <section>
      <h2>Examples of OS Roadmaps</h2>
      <p>Here are some key OSes and their roadmap highlights:</p>
  
      <h3>1. Linux</h3>
      <ul>
          <li>Improvements in kernel features, scalability, security, and multi-core processor support.</li>
      </ul>
  
      <h3>2. Windows</h3>
      <ul>
          <li>Improvements in security (e.g., Windows Defender), cloud integration (Microsoft 365, Azure), and mixed-reality support.</li>
      </ul>
  
      <h3>3. macOS</h3>
      <ul>
          <li>Integration with Apple Silicon chips, user privacy, and ecosystem improvements across macOS, iOS, and iPadOS.</li>
      </ul>
  
      <h3>4. Android</h3>
      <ul>
          <li>Focus on privacy controls, foldable devices, and improving overall performance.</li>
      </ul>
  
      <h3>5. Chrome OS</h3>
      <ul>
          <li>Expanding support for Android apps, Linux applications, and Google services integration.</li>
      </ul>
  
      <h3>6. Raspberry Pi OS</h3>
      <ul>
          <li>Lightweight performance improvements, better tools for education, and IoT support.</li>
      </ul>
  </section>

  <div class="button-container">
    <button onclick="showPDF()">📘 Show OS Book</button>
  </div>

  <div id="pdfSection" class="pdf-container">
    <h2>📖 OS Book</h2>
    <!-- Make sure 'dsa-book.pdf' is in the same folder as your HTML file -->
    <iframe src="uploads/OS-BOOK.pdf"></iframe>
  </div>

  <script>
    function showPDF() {
      document.getElementById('pdfSection').style.display = 'block';
    }
  </script>

</body>
</html>