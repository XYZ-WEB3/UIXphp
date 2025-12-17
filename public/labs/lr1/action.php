<?php include __DIR__ . '/../../../includes/header.php'; ?>
<?php
function safe($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
$fields = [
    'full_name' => 'ФИО',
    'email' => 'Email',
    'age' => 'Возраст',
    'city' => 'Город',
    'gender' => 'Пол',
    'hobbies' => 'Увлечения',
    'study_format' => 'Формат обучения',
    'language' => 'Любимый язык программирования',
    'newsletter' => 'Рассылка',
    'comment' => 'Комментарий',
];
$data = [];
foreach ($fields as $name => $label) {
    if ($name === 'hobbies') {
        $data[$name] = isset($_POST[$name]) ? (array)$_POST[$name] : [];
    } else {
        $data[$name] = trim($_POST[$name] ?? '');
    }
}
?>
<div class="card">
    <h1>Результат обработки</h1>
    <p>Значения получены методом <?php echo safe($_SERVER['REQUEST_METHOD']); ?>. Все поля экранированы с помощью <code>htmlspecialchars</code>; чекбоксы и радио обработаны через <code>isset</code>.</p>
    <table class="table">
        <thead><tr><th>Поле</th><th>Ответ</th></tr></thead>
        <tbody>
        <?php foreach ($fields as $name => $label): ?>
            <tr>
                <td><?php echo safe($label); ?></td>
                <td>
                    <?php if ($name === 'hobbies'): ?>
                        <?php echo empty($data[$name]) ? 'Не выбрано' : safe(implode(', ', $data[$name])); ?>
                    <?php else: ?>
                        <?php echo $data[$name] !== '' ? safe($data[$name]) : '—'; ?>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <p><a class="btn" href="/labs/lr1/index.php">Вернуться к анкете</a></p>
</div>
<?php include __DIR__ . '/../../../includes/footer.php'; ?>
