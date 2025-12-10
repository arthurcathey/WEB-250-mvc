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

  <div class="container">
    <h1>Create New Salamander</h1>

    <div class="form-wrapper">
      <form action="store" method="POST" class="create-form">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" placeholder="Enter salamander name" required>
        </div>

        <div class="form-group">
          <label for="habitat">Habitat:</label>
          <textarea id="habitat" name="habitat" rows="4" placeholder="Describe the salamander's natural habitat" required></textarea>
        </div>

        <div class="form-group">
          <label for="description">Description:</label>
          <textarea id="description" name="description" rows="4" placeholder="Add details about the salamander" required></textarea>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn-success">Create Salamander</button>
          <a href="salamanders" class="btn-secondary">Cancel</a>
        </div>
      </form>
    </div>

    <div class="back-link">
      <a href="salamanders">← Back to list</a>
    </div>
  </div>
</body>

</html>
