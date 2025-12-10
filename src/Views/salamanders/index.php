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
  <link rel="stylesheet" href="/css/main.css">
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
    <div class="list-header">
      <h1>Salamanders List</h1>
      <a href="/salamanders/create" class="create-btn">
        + Create New Salamander
      </a>
    </div>

    <?php if (!empty($salamanders)): ?>
      <div class="table-wrapper">
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
                <td class="name-cell"><?= htmlspecialchars($salamander['name']) ?></td>
                <td class="habitat-cell"><?= nl2br(htmlspecialchars($salamander['habitat'])) ?></td>
                <td class="description-cell"><?= nl2br(htmlspecialchars($salamander['description'])) ?></td>
                <td class="actions-cell-td">
                  <div class="actions-cell">
                    <a href="/salamanders/show?id=<?= htmlspecialchars($salamander['id']) ?>"
                      class="action-btn btn-show"
                      title="View details">
                      Show
                    </a>
                    <a href="/salamanders/edit?id=<?= htmlspecialchars($salamander['id']) ?>"
                      class="action-btn btn-edit"
                      title="Edit salamander">
                      Edit
                    </a>
                    <a href="/salamanders/delete?id=<?= htmlspecialchars($salamander['id']) ?>"
                      class="action-btn btn-delete"
                      title="Delete salamander"
                      onclick="return confirm('Are you sure you want to delete this salamander?');">
                      Delete
                    </a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <div class="empty-state">
        <p class="no-data">No salamanders found.</p>
        <p><a href="/salamanders/create" class="btn-primary">Create your first salamander</a></p>
      </div>
    <?php endif; ?>
  </div>
</body>

</html>
