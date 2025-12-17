<?php include __DIR__ . '/../../../includes/header.php'; ?>
<?php
$values = [3, 7, 12, 18, 21, 34, 55, 89];
?>
<div class="card">
    <h1>ЛР4 — Упражнение 4.1.1</h1>
    <p>Массив чисел, заполнение и вывод с помощью цикла <code>for</code>.</p>
    <ul>
        <?php for ($i = 0; $i < count($values); $i++): ?>
            <li><?php echo $i + 1; ?>: <?php echo $values[$i]; ?></li>
        <?php endfor; ?>
    </ul>
</div>
<?php include __DIR__ . '/../../../includes/footer.php'; ?>
