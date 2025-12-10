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
  <link rel="stylesheet" href="/WEB-250-mvc/web250-mvc/public/css/styles.css">
  <link rel="stylesheet" href="/WEB-250-mvc/web250-mvc/public/css/navigation.css">
  <link rel="stylesheet" href="/WEB-250-mvc/web250-mvc/public/css/forms.css">
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

    <button type="submit" class="btn-success">Create Salamander</button>
  </form>

  <div class="back-link">
    <p><a href="/WEB-250-mvc/web250-mvc/public/salamanders">← Back to list</a></p>
  </div>
</body>

</html>
