<?php include __DIR__ . '/../../../includes/header.php'; ?>
<?php
$x = isset($_POST['x']) ? (float)$_POST['x'] : 7;
$y = isset($_POST['y']) ? (float)$_POST['y'] : 4;
$z = isset($_POST['z']) ? (float)$_POST['z'] : 8;
$result = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $denominator = $z - $y + 1;
    if ($denominator == 0) {
        $result = 'Деление на 0';
    } else {
        $result = (pow($x, $y) - sqrt(abs($z))) / $denominator + cos($x + $z);
        $result = round($result, 2);
    }
}
?>
<div class="card">
    <h1>ЛР2 — Самостоятельная (вариант 8)</h1>
    <p>Исходные данные из таблицы варианта: <strong>x = 7, y = 4, z = 8</strong>. Формула: <code>(x^y - √|z|) / (z - y + 1) + cos(x + z)</code>.</p>
    <form method="post" class="inline-inputs">
        <div>
            <label for="x">x</label>
            <input id="x" type="number" step="0.01" name="x" value="<?php echo htmlspecialchars((string)$x); ?>" />
        </div>
        <div>
            <label for="y">y</label>
            <input id="y" type="number" step="0.01" name="y" value="<?php echo htmlspecialchars((string)$y); ?>" />
        </div>
        <div>
            <label for="z">z</label>
            <input id="z" type="number" step="0.01" name="z" value="<?php echo htmlspecialchars((string)$z); ?>" />
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
