<h1>Salamanders List</h1>

<nav>
  <ul>
    <li><a href="/WEB-250-mvc/web250-mvc/public/">Home</a></li>
    <li><a href="/WEB-250-mvc/web250-mvc/public/salamanders">Salamanders</a></li>
    <li><a href="/WEB-250-mvc/web250-mvc/public/about">About</a></li>
    <li><a href="/WEB-250-mvc/web250-mvc/public/contact">Contact</a></li>
  </ul>
</nav>
<?php if (!empty($salamanders)): ?>
  <table border="1" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
    <thead>
      <tr style="background-color: #f2f2f2;">
        <th style="padding: 10px; text-align: left;">Name</th>
        <th style="padding: 10px; text-align: left;">Habitat</th>
        <th style="padding: 10px; text-align: left;">Description</th>
        <th style="padding: 10px; text-align: center;">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($salamanders as $salamander): ?>
        <tr>
          <td style="padding: 10px;"><?= htmlspecialchars($salamander['name']) ?></td>
          <td style="padding: 10px;"><?= nl2br(htmlspecialchars($salamander['habitat'])) ?></td>
          <td style="padding: 10px;"><?= nl2br(htmlspecialchars($salamander['description'])) ?></td>
          <td style="padding: 10px; text-align: center;">
            <a href="/WEB-250-mvc/web250-mvc/public/salamanders/show?id=<?= htmlspecialchars($salamander['id']) ?>" 
               style="padding: 5px 10px; margin: 0 2px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 3px;">
              Show
            </a>
            <a href="/WEB-250-mvc/web250-mvc/public/salamanders/edit?id=<?= htmlspecialchars($salamander['id']) ?>" 
               style="padding: 5px 10px; margin: 0 2px; background-color: #2196F3; color: white; text-decoration: none; border-radius: 3px;">
              Edit
            </a>
            <a href="/WEB-250-mvc/web250-mvc/public/salamanders/delete?id=<?= htmlspecialchars($salamander['id']) ?>" 
               style="padding: 5px 10px; margin: 0 2px; background-color: #f44336; color: white; text-decoration: none; border-radius: 3px;"
               onclick="return confirm('Are you sure you want to delete this salamander?');">
              Delete
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php else: ?>
  <p>No salamanders found.</p>
<?php endif; ?>
