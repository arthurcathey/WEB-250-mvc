<?php
// src/Views/salamanders/show.php
//
// The View displays a single salamander record.
// It receives the $salamander variable from the controller.
//
// We use htmlspecialchars() to prevent XSS and nl2br() for line breaks.
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($salamander['name'] ?? 'Not Found') ?></title>
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
    <h1><?= htmlspecialchars($salamander['name'] ?? 'Salamander Not Found') ?></h1>

    <?php if ($salamander): ?>
      <div class="salamander-details">
        <div class="detail-field">
          <strong>Habitat:</strong>
          <p><?= nl2br(htmlspecialchars($salamander['habitat'])) ?></p>
        </div>
        <div class="detail-field">
          <strong>Description:</strong>
          <p><?= nl2br(htmlspecialchars($salamander['description'])) ?></p>
        </div>
      </div>

      <div class="form-actions" style="margin-top: 20px;">
        <a href="/WEB-250-mvc/web250-mvc/public/salamanders/edit?id=<?= htmlspecialchars($salamander['id']) ?>" class="btn-primary">Edit</a>
        <a href="/WEB-250-mvc/web250-mvc/public/salamanders/delete?id=<?= htmlspecialchars($salamander['id']) ?>" class="btn-danger">Delete</a>
        <a href="/WEB-250-mvc/web250-mvc/public/salamanders" class="btn-secondary">Back to List</a>
      </div>
    <?php else: ?>
      <div class="error-message">
        <p>Sorry, that salamander was not found.</p>
      </div>
      <div class="back-link">
        <a href="/WEB-250-mvc/web250-mvc/public/salamanders">← Back to list</a>
      </div>
    <?php endif; ?>
  </div>
</body>

</html>
