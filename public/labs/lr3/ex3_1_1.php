<?php include __DIR__ . '/../../../includes/header.php'; ?>
<?php
$a = isset($_POST['a']) ? (float)$_POST['a'] : 0;
$b = isset($_POST['b']) ? (float)$_POST['b'] : 0;
$c = isset($_POST['c']) ? (float)$_POST['c'] : 0;
$maxValue = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $maxValue = max($a, $b, $c);
}
?>
<div class="card">
    <h1>ЛР3 — Упражнение 3.1.1</h1>
    <p>Введите три числа, чтобы получить максимальное значение.</p>
    <form method="post" class="inline-inputs">
        <div>
            <label for="a">a</label>
            <input id="a" type="number" name="a" value="<?php echo htmlspecialchars((string)$a); ?>" />
        </div>
        <div>
            <label for="b">b</label>
            <input id="b" type="number" name="b" value="<?php echo htmlspecialchars((string)$b); ?>" />
        </div>
        <div>
            <label for="c">c</label>
            <input id="c" type="number" name="c" value="<?php echo htmlspecialchars((string)$c); ?>" />
        </div>
        <div>
            <button type="submit">Найти максимум</button>
        </div>
    </form>
    <?php if ($maxValue !== null): ?>
        <p class="notice">Максимальное число: <strong><?php echo $maxValue; ?></strong></p>
    <?php endif; ?>
</div>
<?php include __DIR__ . '/../../../includes/footer.php'; ?>
