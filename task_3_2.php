<?php
// Задание 3.2 — Строка-палиндром (латиница/цифры). Игнорируем регистр и неалфанум.

function isPalindromeStr($s) {
    $t = strtolower($s);
    $t = preg_replace('/[^a-z0-9]+/', '', $t);
    return $t === strrev($t);
}

$src = isset($_REQUEST['s']) ? (string)$_REQUEST['s'] : 'Madam, I am Adam';
$ok = isPalindromeStr($src);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Задание 3.2 — Строка-палиндром</title>
  <link rel="stylesheet" href="assets/styles.css" />
</head>
<body>
  <div class="container">
  <nav class="nav">
    <a href="index.html">Главная</a>
    <a href="task_3_1.php">3.1</a>
    <a href="task_3_2.php">3.2</a>
  </nav>

  <h1>Задание 3.2 — Строка‑палиндром</h1>
  <form method="get" class="card">
    <label for="s">Введите строку</label>
    <input type="text" id="s" name="s" value="<?= htmlspecialchars($src, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>" />
    <button class="btn" type="submit">Проверить</button>
  </form>
  <p>
    Строка <strong>«<?= htmlspecialchars($src, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>»</strong> —
    <?php if ($ok): ?><span style="color:#000000">палиндром</span><?php else: ?><span style="color:#000000">не палиндром</span><?php endif; ?>.
  </p>
  </div>
</body>
</html>

