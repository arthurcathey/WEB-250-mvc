<?php
// src/Views/salamanders/create.php
//
// The View displays a form to create a new salamander.
//
// We use htmlspecialchars() to prevent XSS.
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Create New Salamander</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    form { max-width: 500px; }
    label { display: block; margin-top: 10px; font-weight: bold; }
    input, textarea { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
    button { margin-top: 15px; padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 3px; cursor: pointer; font-size: 16px; }
    button:hover { background-color: #45a049; }
    .back-link { margin-top: 15px; }
    .back-link a { color: #666; text-decoration: none; }
    .back-link a:hover { text-decoration: underline; }
  </style>
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

  <h1>Create New Salamander</h1>
  
  <form action="/WEB-250-mvc/web250-mvc/public/salamanders/store" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="habitat">Habitat:</label>
    <textarea id="habitat" name="habitat" rows="4" required></textarea>

    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="4" required></textarea>

    <button type="submit">Create Salamander</button>
  </form>

  <div class="back-link">
    <p><a href="/WEB-250-mvc/web250-mvc/public/salamanders">← Back to list</a></p>
  </div>
</body>

</html>
