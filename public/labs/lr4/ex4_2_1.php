<?php include __DIR__ . '/../../../includes/header.php'; ?>
<?php
function factorial(int $n): int {
    if ($n <= 1) {
        return 1;
    }
    $result = 1;
    for ($i = 2; $i <= $n; $i++) {
        $result *= $i;
    }
    return $result;
}
$n = isset($_POST['n']) ? (int)$_POST['n'] : 5;
$fact = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fact = factorial(max(0, $n));
}
?>
<div class="card">
    <h1>ЛР4 — Упражнение 4.2.1</h1>
    <p>Функция <code>factorial($n)</code> и вывод результата.</p>
    <form method="post" class="inline-inputs">
        <div>
            <label for="n">n</label>
            <input id="n" type="number" min="0" name="n" value="<?php echo htmlspecialchars((string)$n); ?>" />
        </div>
        <div>
            <button type="submit">Считать</button>
        </div>
    </form>
    <?php if ($fact !== null): ?>
        <p class="notice">n! = <?php echo $fact; ?></p>
    <?php endif; ?>
</div>
<?php include __DIR__ . '/../../../includes/footer.php'; ?>
