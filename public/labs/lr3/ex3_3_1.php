<?php include __DIR__ . '/../../../includes/header.php'; ?>
<?php
$size = 10;
?>
<div class="card">
    <h1>ЛР3 — Упражнение 3.3.1</h1>
    <p>Таблица умножения <?php echo $size; ?>×<?php echo $size; ?>, сгенерированная через циклы.</p>
    <table class="table">
        <thead>
            <tr>
                <th>×</th>
                <?php for ($i = 1; $i <= $size; $i++): ?>
                    <th><?php echo $i; ?></th>
                <?php endfor; ?>
            </tr>
        </thead>
        <tbody>
            <?php for ($row = 1; $row <= $size; $row++): ?>
                <tr>
                    <th><?php echo $row; ?></th>
                    <?php for ($col = 1; $col <= $size; $col++): ?>
                        <td><?php echo $row * $col; ?></td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</div>
<?php include __DIR__ . '/../../../includes/footer.php'; ?>
