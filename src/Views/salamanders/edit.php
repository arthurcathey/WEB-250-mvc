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
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    form { max-width: 500px; }
    label { display: block; margin-top: 10px; font-weight: bold; }
    input, textarea { width: 100%; padding: 8px; margin-top: 5px; }
    button { margin-top: 15px; padding: 10px 20px; background-color: #2196F3; color: white; border: none; border-radius: 3px; cursor: pointer; }
    button:hover { background-color: #0b7dda; }
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

  <?php if ($salamander): ?>
    <h1>Edit <?= htmlspecialchars($salamander['name']) ?></h1>
    <form action="/WEB-250-mvc/web250-mvc/public/salamanders/update?id=<?= htmlspecialchars($salamander['id']) ?>" method="POST">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" value="<?= htmlspecialchars($salamander['name']) ?>" required>

      <label for="habitat">Habitat:</label>
      <textarea id="habitat" name="habitat" rows="4" required><?= htmlspecialchars($salamander['habitat']) ?></textarea>

      <label for="description">Description:</label>
      <textarea id="description" name="description" rows="4" required><?= htmlspecialchars($salamander['description']) ?></textarea>

      <button type="submit">Update Salamander</button>
    </form>

    <div class="back-link">
      <p><a href="/WEB-250-mvc/web250-mvc/public/salamanders">← Back to list</a></p>
    </div>
  <?php else: ?>
    <h1>Salamander Not Found</h1>
    <p>Sorry, that salamander does not exist.</p>
    <p><a href="/WEB-250-mvc/web250-mvc/public/salamanders">Back to list</a></p>
  <?php endif; ?>
</body>

</html>
