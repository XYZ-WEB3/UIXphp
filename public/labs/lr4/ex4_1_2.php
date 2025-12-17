<?php include __DIR__ . '/../../../includes/header.php'; ?>
<?php
$students = [
    'Иванов' => 'Отлично',
    'Петров' => 'Хорошо',
    'Сидорова' => 'Удовлетворительно',
    'Кузнецов' => 'Хорошо',
    'Фёдоров' => 'Отлично',
];
?>
<div class="card">
    <h1>ЛР4 — Упражнение 4.1.2</h1>
    <p>Ассоциативный массив со студентами и оценками, вывод через <code>foreach</code> в таблицу.</p>
    <table class="table">
        <thead><tr><th>Студент</th><th>Оценка</th></tr></thead>
        <tbody>
            <?php foreach ($students as $name => $grade): ?>
                <tr>
                    <td><?php echo htmlspecialchars($name); ?></td>
                    <td><?php echo htmlspecialchars($grade); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include __DIR__ . '/../../../includes/footer.php'; ?>
