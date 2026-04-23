  <section id="projects" class="section">
    <div class="container">
      <h2><?= e($t['projects']['heading']) ?></h2>
      <div class="projects">
<?php foreach ($projects as $project): ?>
<?php $item = $t['projects']['items'][$project['id']]; ?>
        <article class="project">
          <img src="../media/<?= e($project['image']) ?>" alt="">
          <a class="project_more" href="<?= e($project['href']) ?>" aria-label="<?= e($t['shared']['learn_more']) ?>"></a>
          <div class="project_body">
            <h4><?= e($item['title']) ?></h4>
            <p><?= e($item['body']) ?></p>
          </div>
        </article>
<?php endforeach; ?>
      </div>
    </div>
  </section>
