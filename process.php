<?php
// Обработчик формы (Задание 1)

function val($key, $default = '') {
    return isset($_POST[$key]) ? htmlspecialchars(is_array($_POST[$key]) ? implode(', ', $_POST[$key]) : (string)$_POST[$key], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') : $default;
}

$filled = 0;

// Подсчёт заполненных полей с использованием isset() и комбинированного сложения
$filled += isset($_POST['full_name']) && $_POST['full_name'] !== '' ? 1 : 0;
$filled += isset($_POST['email']) && $_POST['email'] !== '' ? 1 : 0;
$filled += isset($_POST['phone']) && $_POST['phone'] !== '' ? 1 : 0;
$filled += isset($_POST['age']) && $_POST['age'] !== '' ? 1 : 0;
$filled += isset($_POST['gender']) && $_POST['gender'] !== '' ? 1 : 0;
$filled += isset($_POST['city']) && $_POST['city'] !== '' ? 1 : 0;
$filled += isset($_POST['education']) && $_POST['education'] !== '' ? 1 : 0;
$filled += isset($_POST['interests']) && is_array($_POST['interests']) && count($_POST['interests']) > 0 ? 1 : 0;
$filled += isset($_POST['about']) && $_POST['about'] !== '' ? 1 : 0;
$filled += isset($_POST['rating']) && $_POST['rating'] !== '' ? 1 : 0;
$filled += isset($_POST['birth']) && $_POST['birth'] !== '' ? 1 : 0;
$filled += isset($_POST['agreement']) && $_POST['agreement'] === 'yes' ? 1 : 0;

$data = [
    'ФИО' => val('full_name'),
    'Email' => val('email'),
    'Телефон' => val('phone'),
    'Возраст' => val('age'),
    'Пол' => val('gender'),
    'Город' => val('city'),
    'Образование' => val('education'),
    'Интересы' => val('interests'),
    'О себе' => val('about'),
    'Оценка курса' => val('rating'),
    'Дата рождения' => val('birth'),
    'Согласие' => val('agreement'),
];

// Попытка сохранить строку в CSV (не критично, если не получится)
try {
    $row = [date('c')];
    foreach ($data as $v) { $row[] = html_entity_decode($v, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }
    $fp = @fopen(__DIR__ . DIRECTORY_SEPARATOR . 'submissions.csv', 'ab');
    if ($fp) {
        fputcsv($fp, $row, ';');
        fclose($fp);
    }
} catch (Throwable $e) {
    // ignore write errors
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Результат обработки формы</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 2rem; color: #000000; background: #ffffff; }
    pre { background: #ffffff; color:#000000; padding:1rem; border-radius:8px; overflow:auto; border: 1px solid #000000; }
    table { border-collapse: collapse; width: 100%; max-width: 820px; border: 1px solid #000000; }
    td, th { border: 1px solid #000000; padding: .5rem .6rem; text-align: left; }
    th { background:#ffffff; border-bottom: 2px solid #000000; }
    .muted { color:#666666 }
    a { color: #000000; }
  </style>
</head>
<body>
  <h1>Форма обработана</h1>
  <p>Заполненных полей: <strong><?php echo (int)$filled; ?></strong></p>

  <table>
    <thead>
      <tr><th>Поле</th><th>Значение</th></tr>
    </thead>
    <tbody>
      <?php foreach ($data as $k => $v): ?>
        <tr><td><?php echo $k; ?></td><td><?php echo $v === '' ? '<span class="muted">—</span>' : $v; ?></td></tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <p><a href="index.html">Назад к форме</a> • <a href="task_2_1.php">Задание 2.1</a> • <a href="task_2_2.php">2.2</a> • <a href="task_2_3.php">2.3</a> • <a href="graph_13.html">2.4 (график)</a></p>
</body>
</html>

