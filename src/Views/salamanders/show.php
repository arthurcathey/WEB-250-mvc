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
  <h1><?= htmlspecialchars($salamander['name'] ?? 'Salamander Not Found') ?></h1>

  <?php if ($salamander): ?>
    <div class="salamander-details">
      <p><strong>Habitat:</strong> <?= nl2br(htmlspecialchars($salamander['habitat'])) ?></p>
      <p><strong>Description:</strong> <?= nl2br(htmlspecialchars($salamander['description'])) ?></p>
    </div>
  <?php else: ?>
    <p>Sorry, that salamander was not found.</p>
  <?php endif; ?>

  <div class="back-link">
    <p><a href="salamanders">← Back to list</a></p>
  </div>
</body>

</html>
