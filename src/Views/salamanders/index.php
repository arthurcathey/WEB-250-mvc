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
  <ul>
    <?php foreach ($salamanders as $salamander): ?>
      <li>
        <a href="/WEB-250-mvc/web250-mvc/public/salamanders/show?id=<?= htmlspecialchars($salamander['id']) ?>">
          <?= htmlspecialchars($salamander['name']) ?>
        </a>
        <br>
        <strong>Habitat:</strong> <?= nl2br(htmlspecialchars($salamander['habitat'])) ?><br>
        <strong>Description:</strong> <?= nl2br(htmlspecialchars($salamander['description'])) ?>
      </li>
    <?php endforeach; ?>
  </ul>
<?php else: ?>
  <p>No salamanders found.</p>
<?php endif; ?>
