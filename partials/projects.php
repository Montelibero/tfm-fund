  <section id="projects" class="section">
    <div class="container">
      <h2><?= e($t['projects']['heading']) ?></h2>
      <div class="projects">
<?php foreach ($projects as $project): ?>
<?php $item = $t['projects']['items'][$project['id']]; ?>
        <article class="project">
          <a class="project_more" href="<?= e($project['href']) ?>">
            <img src="../media/<?= e($project['image']) ?>" alt="">
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
