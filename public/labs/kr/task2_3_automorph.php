<?php include __DIR__ . '/../../../includes/header.php'; ?>
<?php
$n = isset($_POST['n']) ? (int)$_POST['n'] : 1000;
$numbers = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    for ($i = 1; $i <= $n; $i++) {
        $square = $i * $i;
        if (str_ends_with((string)$square, (string)$i)) {
            $numbers[] = $i;
        }
    }
}
?>
<div class="card">
    <h1>КР — Задание 2.3: Автоморфные числа</h1>
    <p>Введите N, чтобы получить все автоморфные числа, не превосходящие N.</p>
    <form method="post" class="inline-inputs">
        <div>
            <label for="n">N</label>
            <input id="n" type="number" min="1" name="n" value="<?php echo htmlspecialchars((string)$n); ?>" />
        </div>
        <div>
            <button type="submit">Показать</button>
        </div>
    </form>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <p class="notice">Найдено: <?php echo implode(', ', $numbers) ?: '—'; ?></p>
    <?php endif; ?>
</div>
<?php include __DIR__ . '/../../../includes/footer.php'; ?>
