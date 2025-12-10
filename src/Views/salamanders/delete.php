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
  <title>Delete <?= htmlspecialchars($salamander['name'] ?? 'Salamander') ?></title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    .delete-form { max-width: 500px; }
    .warning { background-color: #fff3cd; border: 1px solid #ffc107; padding: 15px; margin: 20px 0; border-radius: 3px; }
    .salamander-info { background-color: #f8f9fa; border: 1px solid #dee2e6; padding: 15px; margin: 20px 0; border-radius: 3px; }
    .buttons { margin-top: 20px; }
    button { padding: 10px 20px; margin-right: 10px; border: none; border-radius: 3px; cursor: pointer; font-size: 16px; }
    .delete-btn { background-color: #f44336; color: white; }
    .delete-btn:hover { background-color: #da190b; }
    .cancel-btn { background-color: #666; color: white; }
    .cancel-btn:hover { background-color: #444; }
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
    <h1>Delete <?= htmlspecialchars($salamander['name']) ?></h1>

    <div class="warning">
      <strong>⚠️ Warning:</strong> This action cannot be undone. Are you sure you want to delete this salamander?
    </div>

    <div class="salamander-info">
      <p><strong>Name:</strong> <?= htmlspecialchars($salamander['name']) ?></p>
      <p><strong>Habitat:</strong> <?= nl2br(htmlspecialchars($salamander['habitat'])) ?></p>
      <p><strong>Description:</strong> <?= nl2br(htmlspecialchars($salamander['description'])) ?></p>
    </div>

    <div class="delete-form">
      <form action="/WEB-250-mvc/web250-mvc/public/salamanders/destroy?id=<?= htmlspecialchars($salamander['id']) ?>" method="POST">
        <div class="buttons">
          <button type="submit" class="delete-btn">Delete Salamander</button>
          <a href="/WEB-250-mvc/web250-mvc/public/salamanders"><button type="button" class="cancel-btn">Cancel</button></a>
        </div>
      </form>
    </div>

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
