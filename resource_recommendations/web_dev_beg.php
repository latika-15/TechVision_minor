<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Web Development Beginner Roadmap</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f5f8fa;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #03DAC5;
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

 .panel {
  padding: 10px 20px;
  display: none;
  background-color: #f9f9f9;
  border-left: 4px solid  #03DAC5;
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
  color: #03DAC5;
}

.panel code {
  background-color: #e2e2e2;
  padding: 4px 8px;
  border-radius: 4px;
  font-size: 90%;
}

.accordion {
  background-color: #f0f8ff;
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
}

.accordion:hover {
  background-color: #e0ecff;
}


    .resource-list a {
      display: block;
      color: #4CAF50;
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
    <h1>🚀Web Development Beginner Roadmap</h1>
    <p>Your guide to start web development from scratch!</p>
  </header>

 <!-- Roadmap Section -->
<div class="card">
  <h2>📘 Roadmap- Network, HTML, CSS</h2>

  <!-- Internet Basics -->
  <button class="accordion">🌐 Internet Fundamentals</button>
<div class="panel">
  <ul>
    <li><strong>How does the internet work?</strong>
      <p>The internet is a network of computers and servers connected globally. When you access a website, your computer (client) sends a request to a server, which processes the request and sends back the data to be displayed on your browser. This communication happens using the Internet Protocol (IP) and Transmission Control Protocol (TCP). The data travels through various routers, switches, and cables until it reaches the destination.</p>
    </li>

    <li><strong>What is HTTP/HTTPS?</strong>
      <p>HTTP (HyperText Transfer Protocol) is a protocol used by the World Wide Web to transfer data over the internet. It works as a request-response protocol where your browser (client) sends a request for a webpage, and the server responds with the requested content.</p>
      <p>HTTPS (HyperText Transfer Protocol Secure) is a more secure version of HTTP. It encrypts the data exchanged between the browser and the server using SSL/TLS, which protects sensitive information like passwords, credit card numbers, etc., from being intercepted by malicious actors.</p>
    </li>

    <li><strong>Domain Names and DNS explained</strong>
      <p>A domain name is a human-readable address for a website, like <code>www.example.com</code>. Since computers communicate using numerical IP addresses, the Domain Name System (DNS) translates the domain name you enter into the corresponding IP address of the server hosting that website.</p>
      <p>When you type a website address in the browser, your computer queries the DNS to find the IP address associated with the domain name, and then it sends the request to that IP address to access the website.</p>
    </li>

    <li><strong>What is web hosting?</strong>
      <p>Web hosting is a service that allows you to store your website files on a server that can be accessed over the internet. When you create a website, the files (HTML, CSS, images, etc.) need to be stored somewhere so that users can access them. Hosting providers offer space on their servers for a monthly or annual fee. There are different types of hosting, such as shared hosting, dedicated hosting, and cloud hosting.</p>
      <p>Popular web hosting providers include Bluehost, GoDaddy, and HostGator. The hosting server stores your website and ensures it's always accessible to visitors through the internet.</p>
    </li>

    <li><strong>Browsers and how they render HTML/CSS</strong>
      <p>A browser (e.g., Chrome, Firefox, Safari) is software that allows users to access and view websites. Browsers work by interpreting and rendering code written in HTML, CSS, and JavaScript. Here's how the rendering process works:</p>
      <ol>
        <li><strong>Parsing HTML:</strong> The browser first reads the HTML file and builds a Document Object Model (DOM), a tree-like structure that represents the page.</li>
        <li><strong>Parsing CSS:</strong> After parsing HTML, the browser reads the CSS to determine the style and layout of the page elements. It combines the DOM with the styles defined in the CSS to create a render tree.</li>
        <li><strong>Rendering the page:</strong> Finally, the browser paints the page on the screen, making sure the layout, fonts, colors, and other styles are applied correctly.</li>
      </ol>
      <p>Browsers also handle JavaScript execution, which can modify the page after it’s loaded, allowing for dynamic interactions and content updates.</p>
    </li>
  </ul>
</div>

<button class="accordion">🧱 HTML - Learn the Basics</button>
<div class="panel">
  <p>HTML (HyperText Markup Language) is the backbone of every website. It gives structure to web pages using elements and tags. Let’s explore the key basics step by step:</p>

  <h4>🧩 1. Structure of an HTML Document</h4>
  <p>Every HTML page follows this basic structure:</p>

  <pre><code>&lt;!DOCTYPE html&gt;
&lt;html&gt;
  &lt;head&gt;
    &lt;title&gt;My First Webpage&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;h1&gt;Hello, world!&lt;/h1&gt;
    &lt;p&gt;This is a paragraph.&lt;/p&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>

  <ul>
    <li><code>&lt;!DOCTYPE html&gt;</code>: Tells the browser this is an HTML5 document.</li>
    <li><code>&lt;html&gt;</code>: The root element of the page.</li>
    <li><code>&lt;head&gt;</code>: Contains page info like the title and links to CSS/JS files.</li>
    <li><code>&lt;body&gt;</code>: The visible content of the web page goes here.</li>
  </ul>

  <h4>📝 2. Headings, Paragraphs, Images, Links & Lists</h4>

  <p>Headings go from <code>&lt;h1&gt;</code> to <code>&lt;h6&gt;</code>, where <code>&lt;h1&gt;</code> is the largest.</p>

  <pre><code>&lt;h1&gt;Main Title&lt;/h1&gt;
&lt;p&gt;This is a paragraph giving more details.&lt;/p&gt;
&lt;img src="image.jpg" alt="A sample image"&gt;
&lt;a href="https://example.com"&gt;Visit Example&lt;/a&gt;
&lt;ul&gt;
  &lt;li&gt;List item 1&lt;/li&gt;
  &lt;li&gt;List item 2&lt;/li&gt;
&lt;/ul&gt;</code></pre>

  <ul>
    <li><code>&lt;h1&gt;</code>–<code>&lt;h6&gt;</code>: Headings for titles and subheadings</li>
    <li><code>&lt;p&gt;</code>: Paragraph for blocks of text</li>
    <li><code>&lt;img&gt;</code>: Embeds an image on the page</li>
    <li><code>&lt;a&gt;</code>: Creates a hyperlink to another page or website</li>
    <li><code>&lt;ul&gt;</code> and <code>&lt;li&gt;</code>: Create unordered (bulleted) lists</li>
  </ul>

  <h4>🛠️ 3. More Common Tags to Practice</h4>
  <pre><code>&lt;strong&gt;Bold Text&lt;/strong&gt;
&lt;em&gt;Italic Text&lt;/em&gt;
&lt;br&gt; (Line Break)
&lt;hr&gt; (Horizontal Line)
&lt;div&gt;&lt;/div&gt; (Container for layout or styling)
&lt;span&gt;&lt;/span&gt; (Inline container)</code></pre>

  <p>These tags help add styling or structure when building more complex layouts.</p>

  <h4>🎯 Practice Exercise:</h4>
  <p>Try building your own mini-profile card using just HTML!</p>

  <pre><code>&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
  &lt;title&gt;My Profile&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
  &lt;h1&gt;Jane Doe&lt;/h1&gt;
  &lt;p&gt;Web Developer from India&lt;/p&gt;
  &lt;img src="https://via.placeholder.com/150" alt="Jane's photo"&gt;
  &lt;a href="https://linkedin.com"&gt;Connect on LinkedIn&lt;/a&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>

  <p>This will give you confidence with basic structure, tags, and how browsers render your content.</p>

  <h4>✅ Summary Checklist:</h4>
  <ul>
    <li>✅ Understand the HTML document structure</li>
    <li>✅ Use tags for text, images, and links</li>
    <li>✅ Practice using lists and headings properly</li>
    <li>✅ Learn the purpose of <code>&lt;div&gt;</code> and <code>&lt;span&gt;</code></li>
  </ul>

  <p>🎉 You're now equipped to create your first static web page with HTML!</p>
</div>


  <button class="accordion">🔤 HTML - Writing Semantic HTML</button>
<div class="panel">
  <p><strong>Semantic HTML</strong> means using HTML5 elements that clearly describe their meaning in both the code and the structure of a web page. This helps browsers, search engines, and assistive technologies (like screen readers) better understand the content.</p>

  <p>Instead of using generic tags like <code>&lt;div&gt;</code> or <code>&lt;span&gt;</code> for everything, you should use tags that have a specific purpose. This improves:</p>
  <ul>
    <li><strong>Accessibility:</strong> Screen readers can easily navigate the content.</li>
    <li><strong>SEO:</strong> Search engines understand the importance of each section.</li>
    <li><strong>Maintainability:</strong> Developers can easily read and understand the structure.</li>
  </ul>

  <p>Common semantic tags include:</p>
  <ul>
    <li><code>&lt;header&gt;</code> – Defines the introductory content or navigation at the top of a page or section.</li>
    <li><code>&lt;nav&gt;</code> – Represents the navigation links.</li>
    <li><code>&lt;main&gt;</code> – Contains the main content of the document (only one per page).</li>
    <li><code>&lt;section&gt;</code> – Groups related content together (like chapters or tabs).</li>
    <li><code>&lt;article&gt;</code> – Represents self-contained content that can be distributed or reused, like blog posts or news articles.</li>
    <li><code>&lt;aside&gt;</code> – Contains secondary content, like sidebars or ads.</li>
    <li><code>&lt;footer&gt;</code> – Appears at the bottom of a section or page with author info, copyrights, or related links.</li>
    <li><code>&lt;figure&gt;</code> and <code>&lt;figcaption&gt;</code> – For images, charts, etc., with captions.</li>
  </ul>

  <p><strong>Example of Semantic HTML:</strong></p>

  <pre><code>&lt;header&gt;
  &lt;h1&gt;My Blog&lt;/h1&gt;
  &lt;nav&gt;
    &lt;a href="#"&gt;Home&lt;/a&gt;
    &lt;a href="#"&gt;Articles&lt;/a&gt;
    &lt;a href="#"&gt;About&lt;/a&gt;
  &lt;/nav&gt;
&lt;/header&gt;

&lt;main&gt;
  &lt;article&gt;
    &lt;h2&gt;Understanding Semantic HTML&lt;/h2&gt;
    &lt;p&gt;Semantic tags help give meaning to your content.&lt;/p&gt;
  &lt;/article&gt;
&lt;/main&gt;

&lt;footer&gt;
  &lt;p&gt;&copy; 2025 My Blog. All rights reserved.&lt;/p&gt;
&lt;/footer&gt;</code></pre>

  <p>This structure is much easier to read and understand, both for humans and machines!</p>
</div>


<button class="accordion">✅ HTML - Forms & Validations</button>
<div class="panel">
  <p><strong>Forms</strong> in HTML are used to collect user input. They can be used for login, registration, feedback, search, and much more. Let's break it down step-by-step:</p>

  <h4>🧱 1. Basic Form Structure:</h4>
  <p>A form is wrapped in the <code>&lt;form&gt;</code> tag, which can include various input elements. It usually includes the <code>action</code> (where to send the data) and <code>method</code> (GET or POST).</p>

  <pre><code>&lt;form action="/submit" method="post"&gt;
  &lt;!-- Inputs go here --&gt;
&lt;/form&gt;</code></pre>

  <h4>📝 2. Common Input Types:</h4>
  <p>HTML provides many input types for different data:</p>
  <ul>
    <li><code>&lt;input type="text"&gt;</code> – Plain text input</li>
    <li><code>&lt;input type="email"&gt;</code> – Email address (with built-in validation)</li>
    <li><code>&lt;input type="password"&gt;</code> – Hides characters as user types</li>
    <li><code>&lt;input type="radio"&gt;</code> – For selecting one option in a group</li>
    <li><code>&lt;input type="checkbox"&gt;</code> – For selecting multiple options</li>
    <li><code>&lt;textarea&gt;</code> – For longer text inputs</li>
    <li><code>&lt;select&gt;</code> – Drop-down options</li>
  </ul>

  <h4>🛡️ 3. Client-side Validations:</h4>
  <p>HTML allows you to validate form fields before submission using attributes:</p>
  <ul>
    <li><code>required</code> – Makes the field mandatory</li>
    <li><code>type="email"</code> – Validates for a proper email format</li>
    <li><code>pattern</code> – Uses regex to match input format (e.g., phone numbers)</li>
    <li><code>min</code> / <code>max</code> – For numeric inputs</li>
    <li><code>minlength</code> / <code>maxlength</code> – For text length restrictions</li>
  </ul>

  <h4>📄 4. Example Form:</h4>
  <pre><code>&lt;form action="/submit" method="post"&gt;
  &lt;label&gt;Name:
    &lt;input type="text" name="name" required&gt;
  &lt;/label&gt;&lt;br&gt;

  &lt;label&gt;Email:
    &lt;input type="email" name="email" required&gt;
  &lt;/label&gt;&lt;br&gt;

  &lt;label&gt;Password:
    &lt;input type="password" name="password" required minlength="6"&gt;
  &lt;/label&gt;&lt;br&gt;

  &lt;p&gt;Gender:&lt;/p&gt;
  &lt;label&gt;&lt;input type="radio" name="gender" value="male" required&gt; Male&lt;/label&gt;
  &lt;label&gt;&lt;input type="radio" name="gender" value="female"&gt; Female&lt;/label&gt;&lt;br&gt;

  &lt;p&gt;Skills:&lt;/p&gt;
  &lt;label&gt;&lt;input type="checkbox" name="skills" value="html"&gt; HTML&lt;/label&gt;
  &lt;label&gt;&lt;input type="checkbox" name="skills" value="css"&gt; CSS&lt;/label&gt;&lt;br&gt;

  &lt;label&gt;Phone:
    &lt;input type="text" name="phone" pattern="[0-9]{10}" placeholder="10-digit number"&gt;
  &lt;/label&gt;&lt;br&gt;

  &lt;input type="submit" value="Register"&gt;
&lt;/form&gt;</code></pre>

  <p><strong>Note:</strong> All these validations happen in the browser before sending data to the server.</p>
</div>


<button class="accordion">♿ HTML - Accessibility</button>
<div class="panel">
  <p>Web accessibility means designing websites that are usable by everyone, including people with disabilities (visual, auditory, motor, or cognitive impairments). HTML provides built-in features and tags to enhance accessibility without much effort.</p>

  <h4>🔖 1. Semantic HTML:</h4>
  <p>Semantic tags describe the meaning of the content, which helps screen readers and assistive technologies interpret your page correctly.</p>
  <ul>
    <li><code>&lt;header&gt;</code>, <code>&lt;nav&gt;</code>, <code>&lt;main&gt;</code>, <code>&lt;article&gt;</code>, <code>&lt;footer&gt;</code> – clearly define page regions</li>
    <li><code>&lt;button&gt;</code>, <code>&lt;form&gt;</code>, <code>&lt;label&gt;</code>, <code>&lt;input&gt;</code> – useful for forms and actions</li>
  </ul>

  <pre><code>&lt;main&gt;
  &lt;article&gt;
    &lt;h2&gt;Welcome to My Blog&lt;/h2&gt;
    &lt;p&gt;This is a semantic structure that screen readers understand easily.&lt;/p&gt;
  &lt;/article&gt;
&lt;/main&gt;</code></pre>

  <h4>🔗 2. Proper Use of Labels:</h4>
  <p>Link every <code>&lt;input&gt;</code> with a <code>&lt;label&gt;</code> using the <code>for</code> and <code>id</code> attributes.</p>

  <pre><code>&lt;label for="email"&gt;Email Address:&lt;/label&gt;
&lt;input type="email" id="email" name="email" required&gt;</code></pre>

  <p>This helps screen readers announce the purpose of the input field properly.</p>

  <h4>🖼️ 3. Alt Attributes for Images:</h4>
  <p>Always use the <code>alt</code> attribute for images to describe their content. This is especially useful for users using screen readers or when the image fails to load.</p>

  <pre><code>&lt;img src="team.jpg" alt="Our development team group photo"&gt;</code></pre>

  <p>If the image is purely decorative, use <code>alt=""</code> to skip it:</p>
  <pre><code>&lt;img src="decoration.png" alt=""&gt;</code></pre>

  <h4>♿ 4. ARIA Roles and Attributes:</h4>
  <p><strong>ARIA</strong> (Accessible Rich Internet Applications) provides extra meaning to custom components.</p>
  <ul>
    <li><code>role="button"</code> for clickable divs</li>
    <li><code>aria-label</code> to provide custom names</li>
    <li><code>aria-hidden="true"</code> to hide elements from screen readers</li>
  </ul>

  <pre><code>&lt;div role="button" tabindex="0" aria-label="Open menu"&gt;
  ☰
&lt;/div&gt;</code></pre>

  <p><strong>Note:</strong> Use native HTML elements first; only use ARIA when necessary.</p>

  <h4>⌨️ 5. Keyboard Navigation:</h4>
  <p>Ensure that users can navigate your site using only the keyboard (Tab, Enter, Arrow keys).</p>
  <ul>
    <li>Use <code>tabindex="0"</code> to make custom elements focusable</li>
    <li>Make sure all interactive elements are reachable and usable via keyboard</li>
  </ul>

  <pre><code>&lt;div tabindex="0"&gt;Focusable custom card&lt;/div&gt;</code></pre>

  <h4>✅ Summary Checklist:</h4>
  <ul>
    <li>✅ Use semantic tags for clear structure</li>
    <li>✅ Always link labels to form fields</li>
    <li>✅ Add alt text to all images</li>
    <li>✅ Use ARIA only when needed</li>
    <li>✅ Ensure full keyboard navigation</li>
  </ul>

  <p>Making your website accessible is not just good practice—it’s an inclusive design choice that benefits everyone.</p>
</div>


<button class="accordion">📈 HTML - SEO Basics</button>
<div class="panel">
  <p>SEO (Search Engine Optimization) is the practice of optimizing your website so that it ranks higher on search engines like Google. Basic HTML knowledge plays a big role in making your site more discoverable.</p>

  <h4>🔍 1. Meta Tags</h4>
  <p>Meta tags provide metadata about the webpage, such as description, author, and keywords. These are added inside the <code>&lt;head&gt;</code> section.</p>
  
  <pre><code>&lt;head&gt;
  &lt;meta name="description" content="Learn HTML and CSS easily with our beginner-friendly roadmap and video resources."&gt;
  &lt;meta name="keywords" content="HTML, CSS, web development, beginner tutorial"&gt;
  &lt;meta name="author" content="Your Name"&gt;
&lt;/head&gt;</code></pre>

  <p>✅ The <code>description</code> tag helps search engines understand what your page is about and may be shown as the snippet in results.</p>

  <h4>🔠 2. Proper Use of Headings</h4>
  <p>Use headings in a hierarchical structure from <code>&lt;h1&gt;</code> to <code>&lt;h6&gt;</code>. Your main title should be <code>&lt;h1&gt;</code>, subtopics as <code>&lt;h2&gt;</code>, and so on. Avoid skipping levels.</p>

  <pre><code>&lt;h1&gt;HTML Learning Roadmap&lt;/h1&gt;
&lt;h2&gt;HTML Basics&lt;/h2&gt;
&lt;h3&gt;Introduction to Tags&lt;/h3&gt;</code></pre>

  <p>✅ This structure improves readability for users and helps search engines categorize your content correctly.</p>

  <h4>🖼️ 3. Alt Text for Images</h4>
  <p>Include the <code>alt</code> attribute in all image tags to describe the content. This not only improves accessibility but also helps search engines understand your media content.</p>

  <pre><code>&lt;img src="html-guide.png" alt="HTML guide diagram showing structure"&gt;</code></pre>

  <h4>🧩 4. Semantic HTML Structure</h4>
  <p>Use semantic tags such as <code>&lt;article&gt;</code>, <code>&lt;nav&gt;</code>, <code>&lt;footer&gt;</code>, etc. to help search engines better interpret the sections of your webpage.</p>

  <pre><code>&lt;article&gt;
  &lt;h2&gt;Why Learn HTML?&lt;/h2&gt;
  &lt;p&gt;HTML is the foundation of web development...&lt;/p&gt;
&lt;/article&gt;</code></pre>

  <p>✅ Semantic tags act as meaningful labels, helping Google and other search engines figure out what your page is truly about.</p>

  <h4>📌 5. Additional SEO Tips</h4>
  <ul>
    <li>Use meaningful page titles using the <code>&lt;title&gt;</code> tag</li>
    <li>Keep URL structure clean and keyword-rich</li>
    <li>Use internal linking between related content</li>
    <li>Optimize page load speed and use mobile-friendly design</li>
  </ul>

  <h4>✅ Summary Checklist</h4>
  <ul>
    <li>✅ Use <code>&lt;meta name="description"&gt;</code> for better snippets</li>
    <li>✅ Structure headings with <code>&lt;h1&gt; - &lt;h6&gt;</code></li>
    <li>✅ Add <code>alt</code> text to all images</li>
    <li>✅ Use semantic HTML layout</li>
    <li>✅ Optimize titles, URLs, and linking</li>
  </ul>

  <p>With these SEO-friendly practices, you give your site the best chance of appearing higher in search engine results.</p>
</div>


  <!-- CSS Section -->
  <button class="accordion">🎨 CSS - Learn the Basics</button>
  <div class="panel">
    <ul>
      <li>Inline, internal, external CSS</li>
      <li>Selectors, properties, values</li>
      <li>Color, fonts, spacing basics</li>
    </ul>
  </div>

  <button class="accordion">📐 CSS - Layouts & Box Model</button>
  <div class="panel">
    <ul>
      <li>Box model (margin, border, padding, content)</li>
      <li>Display types: block, inline, flex</li>
      <li>Flexbox for alignment and layout</li>
    </ul>
  </div>

  <button class="accordion">📱 CSS - Responsive Design</button>
  <div class="panel">
    <p>Make your site work on phones, tablets, and desktops using media queries and fluid layouts.</p>
  </div>

  <button class="accordion">✨ CSS - Transitions & Animation</button>
  <div class="panel">
    <ul>
      <li>Hover effects using <code>:hover</code></li>
      <li>CSS transitions and keyframes</li>
      <li>Simple animations for buttons and cards</li>
    </ul>
  </div>
</div>


  <!-- Video Resources -->
<div class="card">
  <h2>🎥 Recommended Video Tutorials</h2>
  <div class="video-grid">

    <div class="video-card">
      <a href="https://youtu.be/ESnrn1kAD4E?si=Z3AG4FWiRYBdHLwt" target="_blank">
      <img src="https://img.youtube.com/vi/HcOc7P5BMi4/0.jpg" alt="Apna College HTML Tutorial" />
        <p>CSS Crash Course for Beginners - Apna College</p>
      </a>
    </div>

    <div class="video-card">
      <a href="https://www.youtube.com/watch?v=pQN-pnXPaVg" target="_blank">
        <img src="https://img.youtube.com/vi/pQN-pnXPaVg/0.jpg" alt="HTML Full Course" />
        <p>HTML Full Course - FreeCodeCamp</p>
      </a>
    </div>

    <div class="video-card">
      <a href="https://youtu.be/IPvYjXCsTg8?si=q1eUhrbSc6IDwNg-" target="_blank">
      <img src="https://img.youtube.com/vi/IPvYjXCsTg8/0.jpg" alt="Apna College CSS Tutorial" />
        <p>Networking Course for Beginners - Kunal Kushwaha</p>
      </a>
    </div>

    <div class="video-card">
      <a href="https://www.youtube.com/watch?v=yfoY53QXEnI" target="_blank">
        <img src="https://img.youtube.com/vi/yfoY53QXEnI/0.jpg" alt="CSS Tutorial" />
        <p>CSS Tutorial for Beginners - Programming with Mosh</p>
      </a>
    </div>

  </div>
</div>


    <!-- PDF Book Reference -->
    <div class="card">
      <h2>📚 Download PDF Books (Provided Resources)</h2>
      <div class="resource-list">
        <a href="HTML5NotesForProfessionals.pdf" target="_blank">📘 HTML Notes</a>
        <a href="https://www.pdfdrive.com/download.pdf?id=157104655&h=71f7bfe4ae61e6484f6c9c663a39c4b8&u=cache&ext=pdf" target="_blank">📙 HTML5 & CSS3 Visual </a>
        <a href="https://www.tutorialrepublic.com/lib/books/html5-cheat-sheet.pdf" target="_blank">📗 HTML5 Cheat Sheet </a>
      </div>
    </div>

  </div>

  <footer>
    Made with ❤️ for Beginners | Keep Building 🚀
  </footer>

  <script>
    const acc = document.getElementsByClassName("accordion");
    for (let i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function () {
        this.classList.toggle("active");
        const panel = this.nextElementSibling;
        panel.style.display = panel.style.display === "block" ? "none" : "block";
      });
    }
  </script>
</body>
</html>
