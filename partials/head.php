<head>
<?php
$currentPath = $currentLocale['path'];
$canonicalUrl = absolute_url($currentPath);
$ogImagePath = '/media/og-' . $locale . '.jpg';
$ogImageUrl = absolute_url($ogImagePath);
$organizationId = absolute_url('/#organization');
$websiteId = absolute_url('/#website');
$organizationJsonLd = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'NonprofitOrganization',
            '@id' => $organizationId,
            'name' => $t['header']['brand'],
            'alternateName' => 'TFM',
            'url' => absolute_url('/'),
            'logo' => absolute_url('/media/logo-tfm.svg'),
            'description' => $t['meta']['description'],
            'foundingDate' => FUND_FOUNDING_DATE,
            'areaServed' => 'Worldwide',
            'sameAs' => [
                wiki_ru('Третий_фонд_Монтелиберо'),
                TG_CHANNEL,
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'contactType' => 'public inquiries',
                'url' => $fundData['links']['contact_bot'],
                'availableLanguage' => ['en', 'ru', 'es', 'sr-ME'],
            ],
        ],
        [
            '@type' => 'WebSite',
            '@id' => $websiteId,
            'name' => $t['header']['brand'],
            'url' => absolute_url('/'),
            'description' => $t['meta']['description'],
            'inLanguage' => array_values(array_map(static fn(array $localeItem): string => $localeItem['html_lang'], $locales)),
            'publisher' => [
                '@id' => $organizationId,
            ],
        ],
        [
            '@type' => 'FAQPage',
            '@id' => $canonicalUrl . '#faq',
            'url' => $canonicalUrl . '#faq',
            'inLanguage' => $currentLocale['html_lang'],
            'mainEntity' => array_map(static fn(array $item): array => [
                '@type' => 'Question',
                'name' => $item['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $item['answer'],
                ],
            ], $t['faq']['items']),
        ],
    ],
];
?>
  <meta charset="utf-8">
  <title><?= e($t['meta']['title']) ?></title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="description" content="<?= e($t['meta']['description']) ?>">
  <meta name="referrer" content="no-referrer">
  <meta name="theme-color" content="#dbb544">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="<?= e($t['header']['brand']) ?>">
  <meta property="og:title" content="<?= e($t['meta']['title']) ?>">
  <meta property="og:description" content="<?= e($t['meta']['description']) ?>">
  <meta property="og:url" content="<?= e($canonicalUrl) ?>">
  <meta property="og:locale" content="<?= e($currentLocale['og_locale']) ?>">
<?php foreach ($localeCodes as $localeCode): ?>
<?php if ($localeCode === $locale) { continue; } ?>
<?php $altLocale = $locales[$localeCode]; ?>
  <meta property="og:locale:alternate" content="<?= e($altLocale['og_locale']) ?>">
<?php endforeach; ?>
  <meta property="og:image" content="<?= e($ogImageUrl) ?>">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:alt" content="<?= e($t['header']['brand']) ?>">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= e($t['meta']['title']) ?>">
  <meta name="twitter:description" content="<?= e($t['meta']['description']) ?>">
  <meta name="twitter:image" content="<?= e($ogImageUrl) ?>">
  <link rel="icon" type="image/x-icon" href="../media/favicon.ico">
  <link rel="preload" as="image" href="../media/cover.webp" type="image/webp">
  <link rel="canonical" href="<?= e($canonicalUrl) ?>">
  <link rel="apple-touch-icon" href="../media/apple-touch-icon.png">
  <link rel="manifest" href="../site.webmanifest">
  <link rel="stylesheet" href="../style.css">
  <link rel="describedby" href="/llms.txt" type="text/markdown">
  <link rel="describedby" href="/.well-known/agent-skills/index.json" type="application/json">
  <script src="../assets/copy.js" defer></script>
<?php foreach ($localeCodes as $localeCode): ?>
<?php $altLocale = $locales[$localeCode]; ?>
  <link rel="alternate" hreflang="<?= e($altLocale['hreflang']) ?>" href="<?= e(absolute_url($altLocale['path'])) ?>">
<?php endforeach; ?>
  <link rel="alternate" hreflang="x-default" href="<?= e(absolute_url($locales[$defaultLocale]['path'])) ?>">
  <script type="application/ld+json"><?= json_encode($organizationJsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
</head>
