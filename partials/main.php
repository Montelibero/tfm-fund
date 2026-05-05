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
        <picture class="hero__picture">
          <source srcset="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==" type="image/gif" media="(max-width: 560px)">
          <source srcset="../media/cover.webp" type="image/webp" media="(min-width: 561px)">
          <img
            class="hero__cover"
            src="../media/cover.jpeg"
            width="1600"
            height="900"
            decoding="async"
            fetchpriority="high"
            alt="<?= e($t['hero']['cover_alt']) ?>"
          >
        </picture>
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

<?php require __DIR__ . '/donate.php'; ?>
<?php require __DIR__ . '/projects.php'; ?>
<?php require __DIR__ . '/apply.php'; ?>
<?php require __DIR__ . '/council.php'; ?>
<?php require __DIR__ . '/faq.php'; ?>
<?php require __DIR__ . '/reports.php'; ?>
</main>
