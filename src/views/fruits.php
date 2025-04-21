<h1>Fruits</h1>
<?php foreach ($fruits as $fruit): ?>
    <a href="/fruit/<?= urlencode($fruit['name']) ?>" data-internal><?= htmlspecialchars($fruit['name']) ?></a><br>
<?php endforeach; ?>