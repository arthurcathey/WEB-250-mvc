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

  <h1>Create New Salamander</h1>

  <form action="store" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="habitat">Habitat:</label>
    <textarea id="habitat" name="habitat" rows="4" required></textarea>

    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="4" required></textarea>

    <button type="submit" class="btn-success">Create Salamander</button>
  </form>

  <div class="back-link">
    <p><a href="salamanders">← Back to list</a></p>
  </div>
</body>

</html>
