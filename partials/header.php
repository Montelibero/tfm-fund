<a class="skip" href="#main"><?= e($t['header']['skip_link']) ?></a>
<header class="header">
  <div class="container nav">
    <a class="nav__brand" href="<?= e($currentLocale['path']) ?>">
      <span class="nav__logo" aria-hidden="true"></span>
      <span class="nav__title"><?= e($t['header']['brand']) ?></span>
    </a>
    <nav class="menu menu--desktop" aria-label="<?= e($t['header']['nav_aria_label']) ?>">
      <a href="#about"><?= e($t['header']['nav']['about']) ?></a>
      <a href="#how"><?= e($t['header']['nav']['how']) ?></a>
      <a href="#projects"><?= e($t['header']['nav']['projects']) ?></a>
      <a href="#apply"><?= e($t['header']['nav']['apply']) ?></a>
      <a href="#reports"><?= e($t['header']['nav']['reports']) ?></a>
      <a href="#council"><?= e($t['header']['nav']['council']) ?></a>
      <a href="#faq"><?= e($t['header']['nav']['faq']) ?></a>
      <a class="btn btn--brand" href="#donate"><?= e($t['shared']['donate']) ?></a>
    </nav>
    <div class="nav__controls">
      <details class="menu-mobile">
        <summary class="menu-mobile__summary"><?= e($t['header']['menu_label']) ?></summary>
        <nav class="menu-mobile__panel" aria-label="<?= e($t['header']['nav_aria_label']) ?>">
          <a href="#about"><?= e($t['header']['nav']['about']) ?></a>
          <a href="#how"><?= e($t['header']['nav']['how']) ?></a>
          <a href="#projects"><?= e($t['header']['nav']['projects']) ?></a>
          <a href="#apply"><?= e($t['header']['nav']['apply']) ?></a>
          <a href="#reports"><?= e($t['header']['nav']['reports']) ?></a>
          <a href="#council"><?= e($t['header']['nav']['council']) ?></a>
          <a href="#faq"><?= e($t['header']['nav']['faq']) ?></a>
          <a class="btn btn--brand" href="#donate"><?= e($t['shared']['donate']) ?></a>
        </nav>
      </details>
      <details class="lang">
        <summary class="lang__summary">
          <span class="sr-only"><?= e($t['header']['lang_aria_label']) ?>: </span><?= e($currentLocale['label']) ?>
        </summary>
        <ul class="lang__list" aria-label="<?= e($t['header']['lang_aria_label']) ?>">
<?php foreach ($localeOrder as $localeCode): ?>
<?php $switchLocale = $locales[$localeCode]; ?>
          <li>
            <a href="<?= e(locale_setter_href($localeCode, $switchLocale['path'])) ?>"<?php if ($localeCode === $locale): ?> aria-current="page"<?php endif; ?>><?= e($switchLocale['label']) ?></a>
          </li>
<?php endforeach; ?>
        </ul>
      </details>
    </div>
  </div>
</header>
