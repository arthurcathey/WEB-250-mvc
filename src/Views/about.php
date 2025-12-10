<?php
// src/Views/about.php
//
// The about page explains the project.
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>About - Web250 MVC</title>
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
  <nav>
    <ul>
      <li><a href="./">Home</a></li>
      <li><a href="salamanders">Salamanders</a></li>
      <li><a href="about">About</a></li>
      <li><a href="contact">Contact</a></li>
    </ul>
  </nav>

  <h1>About This Project</h1>

  <p>This MVC project is a learning tool for understanding routing, controllers, and views in PHP.</p>

  <p>Use this page to explore how URLs are mapped to controller methods.</p>

  <h2>Key Features</h2>
  <ul>
    <li>Custom PHP routing system</li>
    <li>MVC pattern with controllers and views</li>
    <li>Database integration with prepared statements</li>
    <li>CRUD operations for salamanders</li>
    <li>Input validation and error handling</li>
  </ul>

  <div class="back-link">
    <p><a href="./">← Back to home</a></p>
  </div>
</body>

</html>
