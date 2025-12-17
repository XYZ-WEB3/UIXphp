<?php
// Обработка викторины: подсчёт верных, неверных и пропущенных ответов.

// Описание правильных ответов
$answers = [
    'q1'  => '366',                        // високосный год
    'q2'  => ['style-tag','css-file','style-attr'], // мультивыбор
    'q3'  => 'завтра',                     // условный свободный ответ
    'q4'  => 'http',
    'q5'  => '1024',
    'q6'  => 'language',
    'q7'  => '1995',
    'q8'  => '6',
    'q9'  => 'markup',
    'q10' => 'radio',
    // Новые вопросы
    'q11' => ['200','201','204'],          // успешные статусы
    'q12' => '===',                         // строгое сравнение
    'q13' => '5',                           // 2 + "3" => 5
    'q14' => ['append_square','array_push'],// добавить в конец массива
    'q15' => 'multipart/form-data',
];

function norm($v) {
    return trim(mb_strtolower((string)$v, 'UTF-8'));
}

function stringify($v) {
    if (is_array($v)) return implode(', ', $v);
    return (string)$v;
}

$correct=0; $wrong=0; $skipped=0;
$details = [];

foreach ($answers as $key => $right) {
    if (!isset($_POST[$key]) || $_POST[$key] === '' || (is_array($_POST[$key]) && count($_POST[$key])===0)) {
        $skipped += 1;
        $details[$key] = ['given' => '', 'ok' => false, 'skipped' => true];
        continue;
    }

    $given = $_POST[$key];
    $ok = false;
    if (is_array($right)) {
        $a = array_map('strval', $right);
        $b = array_map('strval', (array)$given);
        sort($a); sort($b);
        $ok = ($a === $b);
    } else {
        $ok = norm($given) === norm($right);
    }

    if ($ok) $correct += 1; else $wrong += 1;
    $details[$key] = ['given' => stringify($given), 'ok' => $ok, 'skipped' => false];
}

$total = count($answers);
$percent = $total ? round($correct * 100 / $total, 1) : 0;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Результаты викторины</title>
  <link rel="stylesheet" href="assets/styles.css" />
</head>
<body>
  <div class="container">
  <nav class="nav">
    <a href="quiz.html">Викторина</a>
    <a href="index.html">Главная</a>
  </nav>
  <h1>Результаты</h1>
  <p>
    Верных: <strong style="color:#000000"><?= (int)$correct ?></strong>,
    Неверных: <strong style="color:#000000"><?= (int)$wrong ?></strong>,
    Пропущенных: <strong><?= (int)$skipped ?></strong> из <?= (int)$total ?>.
    Успешность: <strong><?= $percent ?>%</strong>
  </p>

  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Ваш ответ</th>
        <th>Статус</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; foreach ($details as $key => $info): ?>
        <tr>
          <td><?= $i++ ?></td>
          <td><?= htmlspecialchars($info['given'] ?: '—', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></td>
          <td>
            <?php if ($info['skipped']): ?>
              <span class="muted">пропущено</span>
            <?php elseif ($info['ok']): ?>
              <span class="ok">верно</span>
            <?php else: ?>
              <span class="bad">неверно</span>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <p><a class="btn" href="quiz.html">Вернуться к вопросам</a></p>
</div>
</body>
</html>
