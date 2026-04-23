<a class="skip" href="#main"><?= e($t['header']['skip_link']) ?></a>
<header class="header">
  <div class="container nav">
    <a class="nav__brand" href="../">
      <span class="nav__logo" aria-hidden="true"></span>
      <span class="nav__title"><?= e($t['header']['brand']) ?></span>
    </a>
    <nav class="menu menu--desktop" aria-label="<?= e($t['header']['nav_aria_label']) ?>">
      <a href="#about"><?= e($t['header']['nav']['about']) ?></a>
      <a href="#how"><?= e($t['header']['nav']['how']) ?></a>
      <a href="#council"><?= e($t['header']['nav']['council']) ?></a>
      <a class="btn btn--brand" href="#donate"><?= e($t['shared']['donate']) ?></a>
    </nav>
    <div class="nav__controls">
      <details class="menu-mobile">
        <summary class="menu-mobile__summary"><?= e($t['header']['menu_label']) ?></summary>
        <nav class="menu-mobile__panel" aria-label="<?= e($t['header']['nav_aria_label']) ?>">
          <a href="#about"><?= e($t['header']['nav']['about']) ?></a>
          <a href="#how"><?= e($t['header']['nav']['how']) ?></a>
          <a href="#council"><?= e($t['header']['nav']['council']) ?></a>
          <a class="btn btn--brand" href="#donate"><?= e($t['shared']['donate']) ?></a>
        </nav>
      </details>
      <details class="lang">
        <summary class="lang__summary"><?= e($currentLocale['label']) ?></summary>
        <ul class="lang__list">
<?php foreach ($localeOrder as $localeCode): ?>
<?php $switchLocale = $locales[$localeCode]; ?>
          <li>
            <a href="<?= e(locale_setter_href($localeCode, $switchLocale['path'])) ?>"<?php if ($localeCode === $locale): ?> aria-current="true"<?php endif; ?>><?= e($switchLocale['label']) ?></a>
          </li>
<?php endforeach; ?>
        </ul>
      </details>
    </div>
  </div>
</header>
