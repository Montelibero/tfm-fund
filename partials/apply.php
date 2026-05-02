  <section id="apply" class="section">
    <div class="container">
      <h2><?= e($t['apply']['heading']) ?></h2>
      <div class="section__quote">
        <p><?= e($t['apply']['lead']) ?></p>
        <p><?= e($t['apply']['quote']) ?></p>
      </div>

      <div class="cards cards--two">
        <div class="card section-card">
          <h3><?= e($t['apply']['private']['title']) ?></h3>
          <p><?= e($t['apply']['private']['body']) ?></p>
          <a class="btn btn--brand" href="<?= e($fundData['links']['contact_bot']) ?>" target="_blank" rel="noopener noreferrer"><?= e($t['apply']['private']['cta']) ?></a>
        </div>
        <div class="card section-card">
          <h3><?= e($t['apply']['public']['title']) ?></h3>
          <p><?= e($t['apply']['public']['body']) ?></p>
          <a class="btn btn--brand" href="<?= e($fundData['links']['public_chat']) ?>" target="_blank" rel="noopener noreferrer"><?= e($t['apply']['public']['cta']) ?></a>
        </div>
      </div>

      <p class="section__note"><?= e($t['apply']['note']) ?></p>
    </div>
  </section>
