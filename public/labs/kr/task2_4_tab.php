<?php include __DIR__ . '/../../../includes/header.php'; ?>
<?php
$a = isset($_POST['a']) ? (float)$_POST['a'] : -2;
$b = isset($_POST['b']) ? (float)$_POST['b'] : 2;
$step = 0.1;
$rows = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($a > $b) {
        [$a, $b] = [$b, $a];
    }
    $x = $a;
    while ($x <= $b + 1e-9) {
        $y = 0.5 * pow($x, 2) - 2 * $x + 1; // пример функции для варианта
        $rows[] = ['x' => round($x, 2), 'y' => round($y, 2)];
        $x = round($x + $step, 10);
    }
}
?>
<div class="card">
    <h1>КР — Задание 2.4: Табулирование функции</h1>
    <p>Функция: <code>y = 0.5·x² − 2·x + 1</code>. Цикл с предусловием, шаг 0.1.</p>
    <form method="post" class="inline-inputs">
        <div>
            <label for="a">Левая граница [a]</label>
            <input id="a" type="number" step="0.1" name="a" value="<?php echo htmlspecialchars((string)$a); ?>" />
        </div>
        <div>
            <label for="b">Правая граница [b]</label>
            <input id="b" type="number" step="0.1" name="b" value="<?php echo htmlspecialchars((string)$b); ?>" />
        </div>
        <div>
            <button type="submit">Табулировать</button>
        </div>
    </form>
    <?php if (!empty($rows)): ?>
        <table class="table">
            <thead><tr><th>x</th><th>y</th></tr></thead>
            <tbody>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td><?php echo $row['x']; ?></td>
                        <td><?php echo $row['y']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php include __DIR__ . '/../../../includes/footer.php'; ?>
