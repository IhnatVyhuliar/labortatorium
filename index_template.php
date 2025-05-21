<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Wyszukiwarka Pytań</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Wyszukaj pytanie po ID</h1>
    <input type="text" id="searchInput" placeholder="Wpisz 6-cyfrowe ID...">
    <button onclick="searchQuestion()">Szukaj</button>
    <div id="result">
    <?php if ($id): ?>
      <?php if ($description): ?>
        <p><strong>ID:</strong> <?= htmlspecialchars($id) ?></p>
        <p><strong>Opis:</strong> <?= htmlspecialchars($description) ?></p>
      <?php else: ?>
        <p><strong>Błąd:</strong> Nie znaleziono pytania o ID <?= htmlspecialchars($id) ?>.</p>
      <?php endif; ?>
    <?php endif; ?>
  </div>

  <script src="script.js"></script>
</body>
</html>

