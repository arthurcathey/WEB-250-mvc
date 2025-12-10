<?php
// src/Views/home.php
//
// The home page of the MVC application.
// Displays welcome message and navigation links.
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Web250 MVC - Home</title>
  <link rel="stylesheet" href="/WEB-250-mvc/web250-mvc/public/css/main.css">
</head>

<body>
  <nav>
    <ul>
      <li><a href="/WEB-250-mvc/web250-mvc/public/">Home</a></li>
      <li><a href="/WEB-250-mvc/web250-mvc/public/salamanders">Salamanders</a></li>
      <li><a href="/WEB-250-mvc/web250-mvc/public/about">About</a></li>
      <li><a href="/WEB-250-mvc/web250-mvc/public/contact">Contact</a></li>
    </ul>
  </nav>

  <h1><?= htmlspecialchars($message ?? 'Welcome to Web250 MVC', ENT_QUOTES, 'UTF-8') ?></h1>

  <p>This is a PHP MVC application demonstrating routing, controllers, and views.</p>

  <h2>Quick Links</h2>
  <ul>
    <li><a href="/WEB-250-mvc/web250-mvc/public/salamanders">Salamanders page</a></li>
    <li><a href="/WEB-250-mvc/web250-mvc/public/about">About page</a></li>
    <li><a href="/WEB-250-mvc/web250-mvc/public/contact">Contact page</a></li>
  </ul>
</body>

</html>
