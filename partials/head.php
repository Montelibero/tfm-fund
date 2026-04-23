<head>
  <meta charset="utf-8">
  <title><?= e($t['meta']['title']) ?></title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="description" content="<?= e($t['meta']['description']) ?>">
  <link rel="icon" type="image/x-icon" href="../media/favicon.ico">
  <link rel="stylesheet" href="../style.css">
  <script src="../assets/copy.js" defer></script>
<?php foreach ($alternateLocaleOrder as $localeCode): ?>
<?php $altLocale = $locales[$localeCode]; ?>
  <link rel="alternate" hreflang="<?= e($altLocale['html_lang']) ?>" href="<?= e($altLocale['path']) ?>">
<?php endforeach; ?>
  <link rel="alternate" hreflang="x-default" href="<?= e($locales[$defaultLocale]['path']) ?>">
</head>
