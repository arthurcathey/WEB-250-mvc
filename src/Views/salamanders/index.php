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
  <link rel="stylesheet" href="/WEB-250-mvc/web250-mvc/public/css/styles.css">
  <link rel="stylesheet" href="/WEB-250-mvc/web250-mvc/public/css/navigation.css">
  <link rel="stylesheet" href="/WEB-250-mvc/web250-mvc/public/css/salamanders-list.css">
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

  <h1>Salamanders List</h1>

  <a href="/WEB-250-mvc/web250-mvc/public/salamanders/create" class="create-btn">
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
                <a href="/WEB-250-mvc/web250-mvc/public/salamanders/show?id=<?= htmlspecialchars($salamander['id']) ?>"
                  class="action-btn btn-show">
                  Show
                </a>
                <a href="/WEB-250-mvc/web250-mvc/public/salamanders/edit?id=<?= htmlspecialchars($salamander['id']) ?>"
                  class="action-btn btn-edit">
                  Edit
                </a>
                <a href="/WEB-250-mvc/web250-mvc/public/salamanders/delete?id=<?= htmlspecialchars($salamander['id']) ?>"
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