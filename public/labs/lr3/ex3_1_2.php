<?php include __DIR__ . '/../../../includes/header.php'; ?>
<?php
$number = isset($_POST['number']) ? (float)$_POST['number'] : 0;
$sign = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($number > 0) {
        $sign = 'Положительное';
    } elseif ($number < 0) {
        $sign = 'Отрицательное';
    } else {
        $sign = 'Ноль';
    }
}
?>
<div class="card">
    <h1>ЛР3 — Упражнение 3.1.2</h1>
    <p>Определение знака числа.</p>
    <form method="post" class="inline-inputs">
        <div>
            <label for="number">Число</label>
            <input id="number" type="number" name="number" value="<?php echo htmlspecialchars((string)$number); ?>" />
        </div>
        <div>
            <button type="submit">Проверить</button>
        </div>
    </form>
    <?php if ($sign !== null): ?>
        <p class="notice">Число: <strong><?php echo htmlspecialchars((string)$number); ?></strong> — <?php echo $sign; ?></p>
    <?php endif; ?>
</div>
<?php include __DIR__ . '/../../../includes/footer.php'; ?>
