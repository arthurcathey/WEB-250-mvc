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
  <title><?php echo isset($salamander['name']) ? 'Edit ' . htmlspecialchars($salamander['name']) : 'Salamander Not Found'; ?></title>
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

  <div class="container">
    <?php if ($salamander): ?>
      <h1>Edit <?= htmlspecialchars($salamander['name']) ?></h1>

      <div class="form-wrapper">
        <form action="/WEB-250-mvc/web250-mvc/public/salamanders/update?id=<?= htmlspecialchars($salamander['id']) ?>" method="POST" class="edit-form">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($salamander['name']) ?>" required>
          </div>

          <div class="form-group">
            <label for="habitat">Habitat:</label>
            <textarea id="habitat" name="habitat" rows="4" required><?= htmlspecialchars($salamander['habitat']) ?></textarea>
          </div>

          <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required><?= htmlspecialchars($salamander['description']) ?></textarea>
          </div>

          <div class="form-actions">
            <button type="submit" class="btn-primary">Update Salamander</button>
            <a href="/WEB-250-mvc/web250-mvc/public/salamanders" class="btn-secondary">Cancel</a>
          </div>
        </form>
      </div>

      <div class="back-link">
        <a href="/WEB-250-mvc/web250-mvc/public/salamanders">← Back to list</a>
      </div>
    <?php else: ?>
      <div class="error-container">
        <h1>Salamander Not Found</h1>
        <p>Sorry, that salamander does not exist.</p>
        <a href="/WEB-250-mvc/web250-mvc/public/salamanders" class="btn-primary">Back to list</a>
      </div>
    <?php endif; ?>
  </div>
</body>

</html>
