<?php
// src/Views/salamanders/edit.php
//
// The View displays an edit form for a salamander.
// It receives the $salamander variable from the controller.
//
// We use htmlspecialchars() to prevent XSS and nl2br() for line breaks.
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Edit <?= htmlspecialchars($salamander['name'] ?? 'Salamander') ?></title>
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

  <?php if ($salamander): ?>
    <h1>Edit <?= htmlspecialchars($salamander['name']) ?></h1>

    <form action="update?id=<?= htmlspecialchars($salamander['id']) ?>" method="POST">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" value="<?= htmlspecialchars($salamander['name']) ?>" required>

      <label for="habitat">Habitat:</label>
      <textarea id="habitat" name="habitat" rows="4" required><?= htmlspecialchars($salamander['habitat']) ?></textarea>

      <label for="description">Description:</label>
      <textarea id="description" name="description" rows="4" required><?= htmlspecialchars($salamander['description']) ?></textarea>

      <button type="submit" class="btn-primary">Update Salamander</button>
    </form>

    <div class="back-link">
      <p><a href="salamanders">← Back to list</a></p>
    </div>
  <?php else: ?>
    <h1>Salamander Not Found</h1>
    <p>Sorry, that salamander does not exist.</p>
    <p><a href="salamanders">Back to list</a></p>
  <?php endif; ?>
</body>

</html>
