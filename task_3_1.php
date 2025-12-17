<?php
// Задание 3.1 — «Тевирп!» — зеркальное отображение слов с сохранением
// пунктуации в конце и регистра первой буквы. Проверка на латинице.

function transform_tevirp($input) {
    $punct = [',','.', '-', '!', '?', '"', "'", ':', ';', '»', '«', ')', '('];

    $words = explode(' ', (string)$input);
    foreach ($words as &$w) {
        if ($w === '' || empty($w)) { continue; }
        $last = substr($w, -1);
        $endPunct = in_array($last, $punct, true) ? $last : false;
        if ($endPunct !== false) { $w = substr($w, 0, -1); }

        if ($w === '') { $w = $endPunct !== false ? $endPunct : ''; continue; }

        $wasUpper = ctype_alpha($w[0]) ? ctype_upper($w[0]) : false;

        $low = strtolower($w);
        $rev = strrev($low);
        if ($wasUpper) { $rev = ucfirst($rev); }
        if ($endPunct !== false) { $rev .= $endPunct; }
        $w = $rev;
    }
    unset($w);
    return implode(' ', $words);
}

$src = isset($_REQUEST['s']) ? (string)$_REQUEST['s'] : 'Na vinte, vidat, vidna vidy vidavshaya «vinda»."';
$out = transform_tevirp($src);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Задание 3.1 — «Тевирп!»</title>
  <link rel="stylesheet" href="assets/styles.css" />
</head>
<body>
  <div class="container">
  <nav class="nav">
    <a href="index.html">Главная</a>
    <a href="task_3_1.php">3.1</a>
    <a href="task_3_2.php">3.2</a>
  </nav>

  <h1>Задание 3.1 — «Тевирп!»</h1>
  <form method="get" class="card">
    <label for="s">Исходная строка</label>
    <input type="text" id="s" name="s" value="<?= htmlspecialchars($src, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>" />
    <button class="btn" type="submit">Преобразовать</button>
  </form>
  <h3>Результат</h3>
  <pre><?= htmlspecialchars($out, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></pre>

  <p class="muted">Примечание: проверка букв выполняется латиницей через <code>ctype_alpha</code>. Для кириллицы возможны расхождения, как указано в задании.</p>
  </div>
</body>
</html>

