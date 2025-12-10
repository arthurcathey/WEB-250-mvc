<?php
// src/Views/salamanders/delete.php
//
// The View displays a delete confirmation for a salamander.
// It receives the $salamander variable from the controller.
//
// We use htmlspecialchars() to prevent XSS.
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title><?php echo isset($salamander['name']) ? 'Delete ' . htmlspecialchars($salamander['name']) : 'Salamander Not Found'; ?></title>
  <link rel="stylesheet" href="/WEB-250-mvc/web250-mvc/public/css/main.css">
</head>

<body>
  <nav>
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/salamanders">Salamanders</a></li>
      <li><a href="/about">About</a></li>
      <li><a href="/contact">Contact</a></li>
    </ul>
  </nav>

  <div class="container">
    <h1>Delete Salamander</h1>

    <?php if ($salamander): ?>
      <div class="warning">
        <strong>⚠️ Warning!</strong> You are about to permanently delete this salamander record. This action cannot be undone.
      </div>

      <div class="salamander-info">
        <h3>Salamander Details</h3>
        <div class="detail-field">
          <strong>Name:</strong>
          <p><?= htmlspecialchars($salamander['name']) ?></p>
        </div>
        <div class="detail-field">
          <strong>Habitat:</strong>
          <p><?= nl2br(htmlspecialchars($salamander['habitat'])) ?></p>
        </div>
        <div class="detail-field">
          <strong>Description:</strong>
          <p><?= nl2br(htmlspecialchars($salamander['description'])) ?></p>
        </div>
      </div>

      <form action="/salamanders/destroy?id=<?= htmlspecialchars($salamander['id']) ?>" method="POST" class="delete-form">
        <div class="form-actions">
          <button type="submit" class="btn-danger">Delete Salamander</button>
          <a href="/salamanders" class="btn-secondary">Cancel</a>
        </div>
      </form>
    <?php else: ?>
      <div class="error-container">
        <h1>Salamander Not Found</h1>
        <p>Sorry, that salamander does not exist.</p>
        <a href="/salamanders" class="btn-primary">Back to list</a>
      </div>
    <?php endif; ?>

    <div class="back-link">
      <a href="/salamanders">← Back to list</a>
    </div>
  </div>
</body>

</html>
