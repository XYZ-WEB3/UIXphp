<?php include __DIR__ . '/../../../includes/header.php'; ?>
<?php
$score = null;
$questions = [
    'html' => ['label' => 'Как расшифровывается HTML?', 'answer' => 'HyperText Markup Language'],
    'year' => ['label' => 'Год выхода PHP 8', 'answer' => '2020'],
    'creator' => ['label' => 'Создатель языка PHP', 'answer' => 'Расмус Лердорф'],
];
$selectQuestions = [
    'php_type' => ['label' => 'PHP — это...', 'options' => ['Компилируемый', 'Интерпретируемый', 'Штатный'], 'answer' => 'Интерпретируемый'],
    'tag' => ['label' => 'Тег для абзаца в HTML', 'options' => ['<div>', '<p>', '<span>'], 'answer' => '<p>'],
    'db' => ['label' => 'Самая популярная связка с PHP', 'options' => ['PHP + SQLite', 'PHP + MySQL', 'PHP + Mongo'], 'answer' => 'PHP + MySQL'],
];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = ['correct' => 0, 'wrong' => 0];
    foreach ($selectQuestions as $name => $meta) {
        $value = $_POST[$name] ?? '';
        if ($value === $meta['answer']) {
            $score['correct']++;
        } else {
            $score['wrong']++;
        }
    }
    foreach ($questions as $name => $meta) {
        $value = trim($_POST[$name] ?? '');
        if ($value === '') {
            $score['wrong']++;
            continue;
        }
        $score['correct'] += strcasecmp($value, $meta['answer']) === 0 ? 1 : 0;
        $score['wrong'] += strcasecmp($value, $meta['answer']) === 0 ? 0 : 1;
    }
}
?>
<div class="card">
    <h1>ЛР3 — Упражнение 3.2</h1>
    <p>Мини-викторина: три вопроса с выбором и два со свободным ответом.</p>
    <form method="post" class="grid">
        <?php foreach ($selectQuestions as $name => $meta): ?>
            <div>
                <label for="<?php echo $name; ?>"><?php echo htmlspecialchars($meta['label']); ?></label>
                <select id="<?php echo $name; ?>" name="<?php echo $name; ?>">
                    <?php foreach ($meta['options'] as $option): ?>
                        <option <?php echo (($_POST[$name] ?? '') === $option) ? 'selected' : ''; ?>><?php echo htmlspecialchars($option); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php endforeach; ?>
        <?php foreach ($questions as $name => $meta): ?>
            <div>
                <label for="<?php echo $name; ?>"><?php echo htmlspecialchars($meta['label']); ?></label>
                <input id="<?php echo $name; ?>" name="<?php echo $name; ?>" value="<?php echo htmlspecialchars($_POST[$name] ?? ''); ?>" />
            </div>
        <?php endforeach; ?>
        <div>
            <button type="submit">Проверить</button>
        </div>
    </form>
    <?php if ($score !== null): ?>
        <p class="notice">Верных: <?php echo $score['correct']; ?>, Неверных или пропусков: <?php echo $score['wrong']; ?></p>
    <?php endif; ?>
</div>
<?php include __DIR__ . '/../../../includes/footer.php'; ?>
