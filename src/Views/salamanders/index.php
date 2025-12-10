<h1>Salamanders List</h1>

<nav>
  <ul>
    <li><a href="/WEB-250-mvc/web250-mvc/public/">Home</a></li>
    <li><a href="/WEB-250-mvc/web250-mvc/public/salamanders">Salamanders</a></li>
    <li><a href="/WEB-250-mvc/web250-mvc/public/about">About</a></li>
    <li><a href="/WEB-250-mvc/web250-mvc/public/contact">Contact</a></li>
  </ul>
</nav>

<style>
  .actions-cell {
    display: flex;
    gap: 5px;
    flex-wrap: wrap;
    justify-content: center;
  }
  
  .action-btn {
    padding: 5px 10px;
    color: white;
    text-decoration: none;
    border-radius: 3px;
    display: inline-block;
    white-space: nowrap;
  }
  
  .btn-show { background-color: #4CAF50; }
  .btn-edit { background-color: #2196F3; }
  .btn-delete { background-color: #f44336; }
</style>

<div style="margin-bottom: 20px;">
  <a href="/WEB-250-mvc/web250-mvc/public/salamanders/create"
    style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 3px; font-weight: bold;">
    + Create New Salamander
  </a>
</div>

<?php if (!empty($salamanders)): ?>
  <table border="1" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
    <thead>
      <tr style="background-color: #f2f2f2;">
        <th style="padding: 10px; text-align: left;">Name</th>
        <th style="padding: 10px; text-align: left;">Habitat</th>
        <th style="padding: 10px; text-align: left;">Description</th>
        <th style="padding: 10px; text-align: center; min-width: 250px;">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($salamanders as $salamander): ?>
        <tr>
          <td style="padding: 10px;"><?= htmlspecialchars($salamander['name']) ?></td>
          <td style="padding: 10px;"><?= nl2br(htmlspecialchars($salamander['habitat'])) ?></td>
          <td style="padding: 10px;"><?= nl2br(htmlspecialchars($salamander['description'])) ?></td>
          <td style="padding: 10px;">
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
  <p>No salamanders found.</p>
<?php endif; ?>
