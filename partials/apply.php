  <section id="apply" class="section">
    <div class="container">
      <h2><?= e($t['apply']['heading']) ?></h2>
      <p class="section__lead"><?= e($t['apply']['lead']) ?></p>
      <blockquote class="section__quote"><?= e($t['apply']['quote']) ?></blockquote>

      <div class="cards cards--two">
        <div class="card section-card">
          <h3><?= e($t['apply']['private']['title']) ?></h3>
          <p><?= e($t['apply']['private']['body']) ?></p>
          <a class="btn btn--brand" href="<?= e($fundData['links']['contact_bot']) ?>" target="_blank" rel="noopener"><?= e($t['apply']['private']['cta']) ?></a>
        </div>
        <div class="card section-card">
          <h3><?= e($t['apply']['public']['title']) ?></h3>
          <p><?= e($t['apply']['public']['body']) ?></p>
          <a class="btn btn--brand" href="<?= e($fundData['links']['public_chat']) ?>" target="_blank" rel="noopener"><?= e($t['apply']['public']['cta']) ?></a>
        </div>
      </div>

      <p class="section__note"><?= e($t['apply']['note']) ?></p>
    </div>
  </section>
