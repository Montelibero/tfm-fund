<!doctype html>
<html lang="<?= e($errorLang) ?>">
<head>
  <meta charset="utf-8">
  <title><?= e($errorTitle) ?></title>
  <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
  <meta name="referrer" content="no-referrer">
  <meta name="robots" content="noindex, nofollow">
  <link rel="icon" type="image/x-icon" href="/media/favicon.ico">
  <link rel="stylesheet" href="/style.css">
</head>
<body>
  <main class="section error-page">
    <div class="container">
      <div class="card error-card">
        <h1><?= e($errorTitle) ?></h1>
        <p><?= e($errorMessage) ?></p>
        <div class="error-actions">
          <a class="btn btn--brand" href="<?= e($backHref) ?>"><?= e($backLabel) ?></a>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
