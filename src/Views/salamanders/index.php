<?php
// src/Views/salamanders/index.php
//
// The View displays all salamanders.
// It receives the $salamanders variable from the controller.
//
// We use htmlspecialchars() to prevent XSS and nl2br() for line breaks.
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Salamanders List</title>
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

  <h1>Salamanders List</h1>

  <a href="create" class="create-btn">
    + Create New Salamander
  </a>

  <?php if (!empty($salamanders)): ?>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Habitat</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($salamanders as $salamander): ?>
          <tr>
            <td><?= htmlspecialchars($salamander['name']) ?></td>
            <td><?= nl2br(htmlspecialchars($salamander['habitat'])) ?></td>
            <td><?= nl2br(htmlspecialchars($salamander['description'])) ?></td>
            <td>
              <div class="actions-cell">
                <a href="show?id=<?= htmlspecialchars($salamander['id']) ?>"
                  class="action-btn btn-show">
                  Show
                </a>
                <a href="edit?id=<?= htmlspecialchars($salamander['id']) ?>"
                  class="action-btn btn-edit">
                  Edit
                </a>
                <a href="delete?id=<?= htmlspecialchars($salamander['id']) ?>"
                  class="action-btn btn-delete"
                  onclick="return confirm('Are you sure you want to delete this salamander?');">
                  Delete
                </a>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p class="no-data">No salamanders found.</p>
  <?php endif; ?>
</body>

</html>
