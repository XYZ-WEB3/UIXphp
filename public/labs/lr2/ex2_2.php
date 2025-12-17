<?php include __DIR__ . '/../../../includes/header.php'; ?>
<?php
$a = isset($_POST['a']) ? (float)$_POST['a'] : 2.5;
$b = isset($_POST['b']) ? (float)$_POST['b'] : 1.8;
$c = isset($_POST['c']) ? (float)$_POST['c'] : 0.7;
$result = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $denominator = $c + pow($a, 2);
    if ($denominator == 0) {
        $result = 'Деление на 0';
    } else {
        $result = ($a + $b) / $denominator + sin($b * $c);
        $result = round($result, 2);
    }
}
?>
<div class="card">
    <h1>ЛР2 — Упражнение 2.2</h1>
    <p>Сложная формула с переменными <code>a</code>, <code>b</code>, <code>c</code>. Результат округляется до двух знаков.</p>
    <form method="post" class="inline-inputs">
        <div>
            <label for="a">a</label>
            <input id="a" type="number" step="0.01" name="a" value="<?php echo htmlspecialchars((string)$a); ?>" />
        </div>
        <div>
            <label for="b">b</label>
            <input id="b" type="number" step="0.01" name="b" value="<?php echo htmlspecialchars((string)$b); ?>" />
        </div>
        <div>
            <label for="c">c</label>
            <input id="c" type="number" step="0.01" name="c" value="<?php echo htmlspecialchars((string)$c); ?>" />
        </div>
        <div>
            <button type="submit">Рассчитать</button>
        </div>
    </form>
    <?php if ($result !== null): ?>
        <p class="notice">Значение формулы: <strong><?php echo is_numeric($result) ? $result : htmlspecialchars($result); ?></strong></p>
    <?php endif; ?>
</div>
<?php include __DIR__ . '/../../../includes/footer.php'; ?>
