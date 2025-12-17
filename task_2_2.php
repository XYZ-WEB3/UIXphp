<?php
// Задание 2.2 — Числа Армстронга

function isArmstrong($x) {
    if ($x < 0) return false;
    $s = (string)$x;
    $k = strlen($s);
    $sum = 0;
    for ($i = 0; $i < $k; $i++) {
        $d = (int)$s[$i];
        $sum += $d ** $k;
        if ($sum > $x && $k > 4) return false; // небольшая оптимизация
    }
    return $sum === $x;
}

$limit = isset($_GET['limit']) || isset($_POST['limit']) ? (int)($_POST['limit'] ?? $_GET['limit']) : 100000;
$limit = max(0, min(100000, $limit));

$list = [];
for ($i = 0; $i <= $limit; $i++) {
    if (isArmstrong($i)) { $list[] = $i; }
}

$three = array_values(array_filter($list, function($x){ return $x>=100 && $x<=999; }));
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Задание 2.2 — Числа Армстронга</title>
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

  <h1>Задание 2.2 — Числа Армстронга</h1>
  <form method="post" class="card">
    <label for="limit">Верхняя граница (≤ 100000):</label>
    <input id="limit" type="number" name="limit" min="0" max="100000" value="<?php echo (int)$limit; ?>" />
    <button class="btn" type="submit">Посчитать</button>
  </form>

  <div class="card">
    <div>Все числа Армстронга в [0; <?php echo (int)$limit; ?>]: <strong><?php echo count($list); ?></strong></div>
    <div style="max-height:30vh;overflow:auto"><?php echo implode(', ', array_map('strval', $list)); ?></div>
  </div>

  <div class="card">
    <div>Трёхзначные числа Армстронга: <strong><?php echo count($three); ?></strong></div>
    <div><?php echo implode(', ', array_map('strval', $three)); ?></div>
  </div>
  </div>
</body>
</html>

