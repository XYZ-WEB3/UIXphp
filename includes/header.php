<?php
$theme = $_COOKIE['theme'] ?? 'old';
if (!in_array($theme, ['old', 'modern'], true)) {
    $theme = 'old';
}
$nextTheme = $theme === 'old' ? 'modern' : 'old';
$themeLabel = $theme === 'old' ? 'Старый' : 'Мой';
$navItems = require __DIR__ . '/nav.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PHP Лабораторные работы</title>
    <link rel="stylesheet" href="/assets/css/<?php echo htmlspecialchars($theme); ?>.css" />
    <script src="/assets/js/theme.js" defer></script>
</head>
<body class="theme-<?php echo htmlspecialchars($theme); ?>">
<header class="site-header">
    <div class="brand">
        <div class="title">PHP Лабораторные работы</div>
        <div class="subtitle">Выполнил: Крымов Михаил Вадимович — Группа: ИИПБ-22-1</div>
    </div>
    <button id="theme-toggle" class="theme-toggle" data-current-theme="<?php echo htmlspecialchars($theme); ?>" data-next-theme="<?php echo htmlspecialchars($nextTheme); ?>">
        Дизайн: <?php echo htmlspecialchars($themeLabel); ?>
    </button>
</header>
<nav class="top-nav">
    <ul class="nav-list">
        <?php foreach ($navItems as $item): ?>
            <li class="nav-item">
                <a href="<?php echo htmlspecialchars($item['url']); ?>"><?php echo htmlspecialchars($item['title']); ?></a>
                <?php if (!empty($item['children'])): ?>
                    <ul class="dropdown">
                        <?php foreach ($item['children'] as $child): ?>
                            <li><a href="<?php echo htmlspecialchars($child['url']); ?>"><?php echo htmlspecialchars($child['title']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
<main class="page">
