  <section id="reports" class="section section--priority">
    <div class="container">
      <header class="section__header">
        <div class="section__intro">
          <h2><?= e($t['reports']['heading']) ?></h2>
          <p class="section__lead"><?= e($t['reports']['lead']) ?></p>
        </div>
        <p class="section__meta section__meta--inline page-updated"><?= e($t['reports']['updated_label']) ?>: <?= e(format_local_date($fundData['updated_date'], $locale)) ?></p>
      </header>

      <ul class="report-list">
<?php foreach ($fundData['reports'] as $report): ?>
<?php
$reportId = $report['id'] ?? '';
if (!is_string($reportId) || $reportId === '' || !isset($t['reports']['items'][$reportId])) {
    error_log('[tfm-fund] Missing or invalid reports.items key: ' . (is_string($reportId) ? $reportId : json_encode($reportId)));
    continue;
}
$reportItem = $t['reports']['items'][$reportId];
?>
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
