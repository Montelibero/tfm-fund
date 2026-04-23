  <section id="projects" class="section">
    <div class="container">
      <h2><?= e($t['projects']['heading']) ?></h2>
      <div class="projects">
<?php foreach ($projects as $project): ?>
<?php $item = $t['projects']['items'][$project['id']]; ?>
<?php $webpImage = preg_replace('/\.jpe?g$/i', '.webp', $project['image']); ?>
        <article class="project">
          <a class="project_more" href="<?= e($project['href']) ?>">
            <picture class="project__picture">
              <source srcset="../media/<?= e($webpImage) ?>" type="image/webp">
              <img
                src="../media/<?= e($project['image']) ?>"
                width="<?= e((string) $project['width']) ?>"
                height="<?= e((string) $project['height']) ?>"
                loading="lazy"
                decoding="async"
                alt=""
              >
            </picture>
            <div class="project_body">
              <h4><?= e($item['title']) ?></h4>
              <p><?= e($item['body']) ?></p>
              <span class="project_more__label"><?= e($t['shared']['details']) ?></span>
            </div>
          </a>
        </article>
<?php endforeach; ?>
      </div>
    </div>
  </section>
