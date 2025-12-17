<?php include __DIR__ . '/../../../includes/header.php'; ?>
<?php
$questions = [
    ['name' => 'capital', 'label' => 'Столица Франции', 'answer' => 'Париж', 'type' => 'text'],
    ['name' => 'php_release', 'label' => 'Год выхода PHP 7', 'answer' => '2015', 'type' => 'text'],
    ['name' => 'http', 'label' => 'Какой код означает «Не найдено»?', 'answer' => '404', 'type' => 'text'],
    ['name' => 'db', 'label' => 'База данных по умолчанию в LAMP', 'answer' => 'MySQL', 'type' => 'select', 'options' => ['PostgreSQL', 'MySQL', 'SQLite']],
    ['name' => 'array_fn', 'label' => 'Функция PHP для подсчёта элементов массива', 'answer' => 'count', 'type' => 'text'],
    ['name' => 'protocol', 'label' => 'Расшифровка HTTPS', 'answer' => 'HyperText Transfer Protocol Secure', 'type' => 'text'],
    ['name' => 'loop', 'label' => 'Цикл с предусловием в PHP', 'answer' => 'while', 'type' => 'select', 'options' => ['do...while', 'while', 'foreach']],
    ['name' => 'css', 'label' => 'За что отвечает CSS?', 'answer' => 'Cascading Style Sheets', 'type' => 'text'],
    ['name' => 'git', 'label' => 'Команда Git для фиксации изменений', 'answer' => 'git commit', 'type' => 'text'],
    ['name' => 'js', 'label' => 'Какое событие срабатывает при загрузке документа?', 'answer' => 'DOMContentLoaded', 'type' => 'select', 'options' => ['DOMContentLoaded', 'onReady', 'afterLoad']],
];
$result = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correct = $wrong = $skipped = 0;
    foreach ($questions as $q) {
        $value = $_POST[$q['name']] ?? null;
        if ($value === null || $value === '') {
            $skipped++;
            continue;
        }
        $normalized = is_string($value) ? trim($value) : $value;
        $isRight = strcasecmp($normalized, $q['answer']) === 0;
        if ($isRight) {
            $correct++;
        } else {
            $wrong++;
        }
    }
    $result = compact('correct', 'wrong', 'skipped');
}
?>
<div class="card">
    <h1>КР — Задание 1: Моя викторина</h1>
    <p>10 вопросов. Считаются верные, неверные и пропущенные ответы (по <code>isset</code>).</p>
    <form method="post" class="grid">
        <?php foreach ($questions as $q): ?>
            <div>
                <label for="<?php echo $q['name']; ?>"><?php echo htmlspecialchars($q['label']); ?></label>
                <?php if ($q['type'] === 'select'): ?>
                    <select id="<?php echo $q['name']; ?>" name="<?php echo $q['name']; ?>">
                        <option value="">—</option>
                        <?php foreach ($q['options'] as $option): ?>
                            <option <?php echo (($_POST[$q['name']] ?? '') === $option) ? 'selected' : ''; ?>><?php echo htmlspecialchars($option); ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php else: ?>
                    <input id="<?php echo $q['name']; ?>" name="<?php echo $q['name']; ?>" value="<?php echo htmlspecialchars($_POST[$q['name']] ?? ''); ?>" />
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        <div>
            <button type="submit">Проверить ответы</button>
        </div>
    </form>
    <?php if ($result !== null): ?>
        <p class="notice">Верно: <?php echo $result['correct']; ?> | Неверно: <?php echo $result['wrong']; ?> | Пропущено: <?php echo $result['skipped']; ?></p>
    <?php endif; ?>
</div>
<?php include __DIR__ . '/../../../includes/footer.php'; ?>
