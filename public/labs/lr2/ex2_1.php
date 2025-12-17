<?php include __DIR__ . '/../../../includes/header.php'; ?>
<?php
$numberA = isset($_POST['a']) ? (float)$_POST['a'] : 0;
$numberB = isset($_POST['b']) ? (float)$_POST['b'] : 0;
$operation = $_POST['operation'] ?? 'add';
$result = null;
$operations = [
    'add' => 'Сложение',
    'sub' => 'Вычитание',
    'mul' => 'Умножение',
    'div' => 'Деление',
    'pow' => 'Степень',
    'mod' => 'Остаток',
];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($operation) {
        case 'add':
            $result = $numberA + $numberB;
            break;
        case 'sub':
            $result = $numberA - $numberB;
            break;
        case 'mul':
            $result = $numberA * $numberB;
            break;
        case 'div':
            $result = $numberB != 0 ? $numberA / $numberB : 'Деление на 0';
            break;
        case 'pow':
            $result = pow($numberA, $numberB);
            break;
        case 'mod':
            $result = $numberB != 0 ? fmod($numberA, $numberB) : 'Деление на 0';
            break;
    }
    if (is_numeric($result)) {
        $result = round($result, 2);
    }
}
?>
<div class="card">
    <h1>ЛР2 — Упражнение 2.1</h1>
    <p>Простые арифметические операции. Результат округляется до двух знаков.</p>
    <form method="post" class="inline-inputs">
        <div>
            <label for="a">Число A</label>
            <input id="a" type="number" step="0.01" name="a" value="<?php echo htmlspecialchars((string)$numberA); ?>" />
        </div>
        <div>
            <label for="b">Число B</label>
            <input id="b" type="number" step="0.01" name="b" value="<?php echo htmlspecialchars((string)$numberB); ?>" />
        </div>
        <div>
            <label for="operation">Операция</label>
            <select id="operation" name="operation">
                <?php foreach ($operations as $key => $label): ?>
                    <option value="<?php echo $key; ?>" <?php echo $operation === $key ? 'selected' : ''; ?>><?php echo htmlspecialchars($label); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <button type="submit">Вычислить</button>
        </div>
    </form>
    <?php if ($result !== null): ?>
        <p class="notice">Результат: <strong><?php echo is_numeric($result) ? $result : htmlspecialchars($result); ?></strong></p>
    <?php endif; ?>
</div>
<?php include __DIR__ . '/../../../includes/footer.php'; ?>
