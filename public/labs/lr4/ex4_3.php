<?php include __DIR__ . '/../../../includes/header.php'; ?>
<?php
$filePath = __DIR__ . '/data.txt';
$records = [];
if (file_exists($filePath)) {
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        [$name, $role, $exp] = array_pad(explode(';', $line), 3, '—');
        $records[] = ['name' => $name, 'role' => $role, 'exp' => $exp];
    }
}
?>
<div class="card">
    <h1>ЛР4 — Упражнение 4.3</h1>
    <p>Чтение данных из файла <code>data.txt</code> и вывод по шаблону.</p>
    <?php if (empty($records)): ?>
        <p class="notice">Нет данных для отображения.</p>
    <?php else: ?>
        <table class="table">
            <thead><tr><th>ФИО</th><th>Роль</th><th>Опыт</th></tr></thead>
            <tbody>
                <?php foreach ($records as $record): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($record['name']); ?></td>
                        <td><?php echo htmlspecialchars($record['role']); ?></td>
                        <td><?php echo htmlspecialchars($record['exp']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php include __DIR__ . '/../../../includes/footer.php'; ?>
