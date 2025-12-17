<?php include __DIR__ . '/../../../includes/header.php'; ?>
<?php
$limit = isset($_POST['limit']) ? (int)$_POST['limit'] : 20;
$results = [];
$overflow = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    for ($i = 2; $i <= $limit; $i += 2) {
        $square = $i * $i;
        if ($square < 0 || $square > PHP_INT_MAX) {
            $overflow = true;
            break;
        }
        $results[] = $square;
    }
}
?>
<div class="card">
    <h1>ЛР3 — Упражнение 3.3.3</h1>
    <p>Квадраты чётных чисел от 1 до N. Цикл завершается, если происходит переполнение.</p>
    <form method="post" class="inline-inputs">
        <div>
            <label for="limit">N</label>
            <input id="limit" type="number" min="2" step="2" name="limit" value="<?php echo htmlspecialchars((string)$limit); ?>" />
        </div>
        <div>
            <button type="submit">Сгенерировать</button>
        </div>
    </form>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <div class="notice">
            <?php echo empty($results) ? 'Нет значений' : 'Результаты: ' . implode(', ', $results); ?>
            <?php if ($overflow): ?><br/><strong>Переполнение, цикл остановлен.</strong><?php endif; ?>
        </div>
    <?php endif; ?>
</div>
<?php include __DIR__ . '/../../../includes/footer.php'; ?>
