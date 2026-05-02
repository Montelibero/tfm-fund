  <section id="faq" class="section">
    <div class="container">
      <header class="section__header">
        <div class="section__intro">
          <h2><?= e($t['faq']['heading']) ?></h2>
          <p class="section__lead"><?= e($t['faq']['lead']) ?></p>
        </div>
      </header>

      <div class="faq-list">
<?php foreach ($t['faq']['items'] as $item): ?>
        <details class="faq-item">
          <summary><?= e($item['question']) ?></summary>
          <p><?= e($item['answer']) ?></p>
        </details>
<?php endforeach; ?>
      </div>
    </div>
  </section>
