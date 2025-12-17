<?php
// Задание 2.4 — Табулирование функции варианта 8-3: y = 3 − 2x^2, x ∈ [a, b] с шагом 0.1

$preset13 = (isset($_REQUEST['preset']) && (string)$_REQUEST['preset'] === '13');
$a = $preset13 ? -1.0 : (isset($_REQUEST['a']) ? (float)$_REQUEST['a'] : -1.0);
$b = $preset13 ? 3.0  : (isset($_REQUEST['b']) ? (float)$_REQUEST['b'] : 3.0);
$h = $preset13 ? 0.1  : (isset($_REQUEST['h']) ? (float)$_REQUEST['h'] : 0.1);

function f($x){ return 3 - 2*$x*$x; }

if ($a > $b) { $t=$a; $a=$b; $b=$t; }
if ($h <= 0) { $h = 0.1; }
// ограничим количество шагов, чтобы не зависнуть при слишком маленьком шаге
$len = max(0.0, $b - $a);
$stepsCount = $h > 0 ? (int)floor($len / $h) + 1 : 1;
if ($stepsCount > 10000 && $len > 0) {
    $h = $len / 9999.0; // ~10k точек максимум
    $stepsCount = 10000;
}

$rows = [];
$x = $a; // цикл с предусловием
while ($x <= $b + 1e-9) {
    $rows[] = [$x, f($x)];
    $x = round($x + $h, 10);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Задание 2.4 — Табулирование (вариант 8-3)</title>
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
    <a href="graph_13.html">График (доп.)</a>
  </nav>

  <h1>Задание 2.4 — Вариант 8-3</h1>
  <p class="muted">Функция: y = 3 − 2x²; по варианту 8-3: x ∈ [−1, 3], шаг 0.1.</p>

  <form method="get" class="card">
    <div style="display:flex;gap:.6rem;flex-wrap:wrap;align-items:center">
      <label>a: <input type="number" step="0.1" name="a" value="<?= htmlspecialchars((string)$a) ?>" /></label>
      <label>b: <input type="number" step="0.1" name="b" value="<?= htmlspecialchars((string)$b) ?>" /></label>
      <label>шаг h: <input type="number" step="0.01" name="h" value="<?= htmlspecialchars((string)number_format($h,2,'.','')) ?>" /></label>
      <button class="btn" type="submit">Перестроить</button>
      <a class="btn-outline" href="task_2_4.php?preset=13">Вариант 8-3</a>
    </div>
    <p class="muted" style="margin:.4rem 0 0">Точек: <?= (int)$stepsCount ?> (ограничение ≈ 10 000).</p>
  </form>

  <div class="card" style="overflow:auto">
    <table>
      <thead><tr><th>x</th><th>y</th></tr></thead>
      <tbody>
        <?php foreach ($rows as [$xx, $yy]): ?>
          <tr><td><?= number_format($xx,1,'.','') ?></td><td><?= number_format($yy,4,'.','') ?></td></tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  </div>
</body>
</html>
