  <section id="council" class="section">
    <div class="container">
      <h2><?= e($t['council']['heading']) ?></h2>
      <p class="section__lead"><?= e($t['council']['lead']) ?></p>
      <p class="section__copy"><?= e($t['council']['body']) ?></p>

      <div class="cards">
        <div class="card section-card">
          <h3><?= e($t['council']['links']['multisig']['title']) ?></h3>
          <p><?= e($t['council']['links']['multisig']['body']) ?></p>
          <a class="btn btn--brand" href="<?= e($fundData['links']['multisig_explorer']) ?>" target="_blank" rel="noopener noreferrer"><?= e($t['council']['links']['multisig']['cta']) ?></a>
        </div>
        <div class="card section-card">
          <h3><?= e($t['council']['links']['charter']['title']) ?></h3>
          <p><?= e($t['council']['links']['charter']['body']) ?></p>
          <a class="btn btn--brand" href="<?= e($fundData['links']['charter']) ?>" target="_blank" rel="noopener noreferrer"><?= e($t['council']['links']['charter']['cta']) ?></a>
        </div>
      </div>
    </div>
  </section>
