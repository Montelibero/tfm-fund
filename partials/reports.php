  <section id="reports" class="section">
    <div class="container">
      <h2><?= e($t['reports']['heading']) ?></h2>
      <p class="section__lead"><?= e($t['reports']['lead']) ?></p>

      <ul class="report-list">
<?php foreach ($fundData['reports'] as $report): ?>
<?php $reportItem = $t['reports']['items'][$report['id']]; ?>
<?php $hasDate = !empty($report['date']); ?>
        <li class="report-item<?= $hasDate ? ' report-item--dated' : '' ?>">
<?php if ($hasDate): ?>
          <time datetime="<?= e($report['date']) ?>"><?= e(format_local_date($report['date'], $locale)) ?></time>
<?php endif; ?>
          <a href="<?= e($report['href']) ?>" target="_blank" rel="noopener noreferrer"><?= e($reportItem) ?></a>
        </li>
<?php endforeach; ?>
      </ul>

      <div class="section-actions">
        <a class="btn btn--brand" href="<?= e($fundData['links']['reports']) ?>" target="_blank" rel="noopener noreferrer"><?= e($t['reports']['cta']) ?></a>
      </div>
    </div>
  </section>
