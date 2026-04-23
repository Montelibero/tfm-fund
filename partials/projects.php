  <section id="projects" class="section section--priority">
    <div class="container">
      <header class="section__header">
        <div class="section__intro">
          <h2><?= e($t['projects']['heading']) ?></h2>
        </div>
      </header>
      <div class="projects">
<?php foreach ($projects as $project): ?>
<?php
$projectId = $project['id'] ?? '';
if (!is_string($projectId) || $projectId === '' || !isset($t['projects']['items'][$projectId])) {
    error_log('[tfm-fund] Missing or invalid projects.items key: ' . (is_string($projectId) ? $projectId : json_encode($projectId)));
    continue;
}
$item = $t['projects']['items'][$projectId];
?>
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
              <h3 class="project__title"><?= e($item['title']) ?></h3>
              <p><?= e($item['body']) ?></p>
              <span class="project_more__label"><?= e($t['shared']['details']) ?></span>
            </div>
          </a>
        </article>
<?php endforeach; ?>
      </div>
    </div>
  </section>
