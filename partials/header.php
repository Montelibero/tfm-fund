<?php $toggleId = $currentLocale['toggle_id']; ?>
<header class="header">
  <div class="container nav">
    <a class="nav__brand" href="../">
      <span class="nav__logo" aria-hidden="true"></span>
      <span class="nav__title"><?= e($t['header']['brand']) ?></span>
    </a>
    <nav class="menu" aria-label="<?= e($t['header']['nav_aria_label']) ?>">
      <a href="#about"><?= e($t['header']['nav']['about']) ?></a>
      <a href="#how"><?= e($t['header']['nav']['how']) ?></a>
      <a href="#council"><?= e($t['header']['nav']['council']) ?></a>
      <a class="btn btn--brand" href="#donate"><?= e($t['shared']['donate']) ?></a>
    </nav>
    <div class="lang" role="group" aria-label="<?= e($t['header']['lang_aria_label']) ?>">
      <input type="checkbox" id="<?= e($toggleId) ?>" class="lang__cb" aria-hidden="true">
      <label for="<?= e($toggleId) ?>" class="lang__summary" aria-label="<?= e($t['header']['lang_aria_label']) ?>"><?= e($currentLocale['label']) ?></label>
      <div class="lang__list" role="menu">
<?php foreach ($localeOrder as $localeCode): ?>
<?php $switchLocale = $locales[$localeCode]; ?>
        <a href="<?= e(locale_setter_href($localeCode, $switchLocale['path'])) ?>"<?php if ($localeCode === $locale): ?> aria-current="true"<?php endif; ?> role="menuitem"><?= e($switchLocale['label']) ?></a>
<?php endforeach; ?>
      </div>
    </div>
  </div>
</header>
