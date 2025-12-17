<?php
// Задание 2.1 — Суммы чисел Фибоначчи
// Показываем две трактовки: сумма первых N членов и сумма всех чисел Фибоначчи, меньших N.

function fibFirstN($N) {
    $res = [];
    if ($N <= 0) return $res;
    $a = 1; $b = 1; // 1,1,2,3,...
    for ($i=1; $i<=$N; $i++) {
        $res[] = $a;
        [$a, $b] = [$b, $a + $b];
    }
    return $res;
}

function fibLessThan($limit) {
    $res = [];
    if ($limit <= 0) return $res;
    $a = 1; $b = 1;
    while ($a < $limit) {
        $res[] = $a;
        [$a, $b] = [$b, $a + $b];
    }
    return $res;
}

$n = null; $firstNSum = null; $ltSum = null; $firstNSeq=[]; $ltSeq=[];
if (isset($_GET['n']) || isset($_POST['n'])) {
    $n = (int)($_POST['n'] ?? $_GET['n']);
    if ($n < 0) $n = 0;
    $firstNSeq = fibFirstN($n);
    $ltSeq = fibLessThan($n);
    $firstNSum = array_sum($firstNSeq);
    $ltSum = array_sum($ltSeq);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Задание 2.1 — Суммы чисел Фибоначчи</title>
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

  <h1>Задание 2.1 — Суммы чисел Фибоначчи</h1>
  <form method="post" class="card">
    <label for="n">Введите N:</label>
    <input id="n" type="number" name="n" min="0" value="<?php echo htmlspecialchars((string)($n ?? 10)); ?>" />
    <button class="btn" type="submit">Рассчитать</button>
  </form>

  <?php if ($n !== null): ?>
    <div class="card">
      <strong>N = <?php echo (int)$n; ?></strong>
      <div>Сумма первых N чисел (пример: 143 при N=10): <strong><?php echo (int)$firstNSum; ?></strong></div>
      <div>Первые N: <?php echo implode(', ', array_map('strval', $firstNSeq)); ?></div>
      <hr />
      <div>Сумма чисел Фибоначчи, меньших N: <strong><?php echo (int)$ltSum; ?></strong></div>
      <div>Числа &lt; N: <?php echo implode(', ', array_map('strval', $ltSeq)); ?></div>
    </div>
  <?php endif; ?>
  </div>
</body>
</html>

