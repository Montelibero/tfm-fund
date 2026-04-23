<main id="main">
  <section class="hero">
    <div class="container hero__grid">
      <div>
        <h1><?= e($t['hero']['title']) ?></h1>
        <p><?= e($t['hero']['lead']) ?></p>
        <div class="hero__actions">
          <a class="btn btn--brand" href="#donate"><?= e($t['shared']['donate']) ?></a>
        </div>
      </div>
      <div>
        <img class="hero__cover" src="../media/cover.jpeg" alt="<?= e($t['hero']['cover_alt']) ?>">
      </div>
    </div>
  </section>

  <section id="about" class="section">
    <div class="container">
      <h2><?= e($t['about']['heading']) ?></h2>
      <div class="cards">
<?php foreach ($t['about']['cards'] as $card): ?>
        <div class="card">
          <h3><?= e($card['title']) ?></h3>
          <p><?= e($card['body']) ?></p>
        </div>
<?php endforeach; ?>
      </div>
    </div>
  </section>

  <section id="how" class="section">
    <div class="container">
      <h2><?= e($t['how']['heading']) ?></h2>
      <div class="cards">
<?php foreach ($t['how']['cards'] as $card): ?>
        <div class="card">
          <h3><?= e($card['title']) ?></h3>
          <p><?= e($card['body']) ?></p>
        </div>
<?php endforeach; ?>
      </div>
    </div>
  </section>

  <section id="council" class="section">
    <div class="container">
      <h2><?= e($t['council']['heading']) ?></h2>
      <p><?= e($t['council']['body']) ?></p>
    </div>
  </section>

<?php require __DIR__ . '/donate.php'; ?>
<?php require __DIR__ . '/projects.php'; ?>
</main>
