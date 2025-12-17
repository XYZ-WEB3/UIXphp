<?php include __DIR__ . '/../../../includes/header.php'; ?>
<?php
function isPalindrome(string $text): bool {
    $normalized = strtolower(preg_replace('/[^a-z0-9а-яё]/iu', '', $text));
    return $normalized === strrev($normalized);
}
$input = $_POST['text'] ?? '';
$isPal = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isPal = isPalindrome($input);
}
?>
<div class="card">
    <h1>КР — Задание 3.2: Палиндром</h1>
    <p>Проверка строки на палиндром (латиница и кириллица, регистр игнорируется).</p>
    <form method="post">
        <label for="text">Строка</label>
        <input id="text" name="text" value="<?php echo htmlspecialchars($input); ?>" />
        <button type="submit">Проверить</button>
    </form>
    <?php if ($isPal !== null): ?>
        <p class="notice">Результат: <?php echo $isPal ? 'палиндром' : 'не палиндром'; ?></p>
    <?php endif; ?>
</div>
<?php include __DIR__ . '/../../../includes/footer.php'; ?>
