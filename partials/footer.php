<?php $reportsPageHref = wiki_ru('Третий_фонд_Монтелиберо'); ?>
<footer class="footer">
  <div class="container footer__inner">
    <div class="footer__grid">
      <div class="footer__block">
        <h3><?= e($t['footer']['contacts_heading']) ?></h3>
        <p><?= e($t['footer']['telegram_label']) ?><a href="<?= e(TG_CHANNEL) ?>" rel="noreferrer">@tfm_voice</a></p>
        <p><?= e($t['footer']['reports_prefix']) ?><a href="<?= e($reportsPageHref) ?>" rel="noreferrer"><?= e($t['footer']['reports_link_label']) ?></a><?= e($t['footer']['reports_suffix']) ?></p>
      </div>
      <div class="footer__block">
        <h3><?= e($t['footer']['legal_heading']) ?></h3>
        <p><?= e($t['footer']['legal_body']) ?></p>
      </div>
    </div>
    <div class="footer__colophon">
      <p class="made"><?= e($t['footer']['made_prefix']) ?><a href="https://montelibero.org/" target="_blank" rel="noopener noreferrer"><?= e($t['footer']['made_link_label']) ?></a><img src="../media/logo-mtl.svg" alt="<?= e($t['footer']['made_logo_alt']) ?>"></p>
      <p class="footer__meta">
        <span><?= e($t['footer']['since']) ?></span>
        <span class="footer__meta-gap" aria-hidden="true">·</span>
        <a href="<?= e(SOURCE_REPO_URL) ?>" target="_blank" rel="noopener noreferrer" title="<?= e($t['footer']['source_code_title']) ?>"><?= e($t['footer']['source_code']) ?></a>
      </p>
    </div>
  </div>
</footer>
