<?php
// Задание 2.3 — Автоморфные числа (n совпадает с последними цифрами n^2)

function isAutomorphic($n) {
    if ($n < 0) return false;
    $sq = (string)($n * $n);
    $s  = (string)$n;
    return substr($sq, -strlen($s)) === $s;
}

$N = null; $list = [];
if (isset($_GET['N']) || isset($_POST['N'])) {
    $N = (int)($_POST['N'] ?? $_GET['N']);
    if ($N < 0) $N = 0;
    for ($i = 0; $i <= $N; $i++) if (isAutomorphic($i)) $list[] = $i;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Задание 2.3 — Автоморфные числа</title>
  <link rel="stylesheet" href="assets/styles.css" />
</head>
<body>
  <div class="container">
  <nav class="nav">
    <a href="index.html">Главная</a>
    <a href="task_2_1.php">2.1</a>
    <a href="task_2_2.php">2.2</a>
    <a href="task_2_3.php">2.3</a>
    <a href="task_2_4.php">2.4</a>
    <a href="task_2_5.php">2.5</a>
  </nav>

  <h1>Задание 2.3 — Автоморфные числа ≤ N</h1>

  <form method="post" class="card">
    <label for="N">Введите N:</label>
    <input id="N" type="number" name="N" min="0" value="<?php echo htmlspecialchars((string)($N ?? 1000)); ?>" />
    <button class="btn" type="submit">Показать</button>
  </form>

  <?php if ($N !== null): ?>
    <div class="card">Найдено: <strong><?php echo count($list); ?></strong><br />
      <?php echo implode(', ', array_map('strval', $list)); ?>
    </div>
  <?php endif; ?>
  </div>
</body>
</html>

