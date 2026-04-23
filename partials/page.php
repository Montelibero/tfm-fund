<?php

declare(strict_types=1);

$currentLocale = $locales[$locale];
?>
<!doctype html>
<html lang="<?= e($currentLocale['html_lang']) ?>">
<?php require __DIR__ . '/head.php'; ?>
<body>
<?php require __DIR__ . '/header.php'; ?>
<?php require __DIR__ . '/main.php'; ?>
<?php require __DIR__ . '/footer.php'; ?>
</body>
</html>
