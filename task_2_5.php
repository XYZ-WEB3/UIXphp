<?php
// Задание 2.5 — Високосный год (простое правило из задания: делится на 4)

function isLeapSimple($y) { return $y % 4 === 0; }

$year = isset($_REQUEST['year']) ? (int)$_REQUEST['year'] : (int)date('Y');
$ans = isLeapSimple($year);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Задание 2.5 — Високосный год</title>
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

  <h1>Задание 2.5 — Високосный год</h1>
  <form method="get" class="card">
    <label for="year">Год:</label>
    <input id="year" type="number" name="year" value="<?= (int)$year ?>" />
    <button class="btn" type="submit">Проверить</button>
  </form>

  <div class="card">
    Год <strong><?= (int)$year ?></strong> — 
    <?php if ($ans): ?><span style="color:#000000">високосный</span><?php else: ?><span style="color:#000000">не високосный</span><?php endif; ?>
    (правило: делится на 4 без остатка).
  </div>
  </div>
</body>
</html>

