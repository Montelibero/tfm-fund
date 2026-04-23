<?php

declare(strict_types=1);

$locale = 'spa';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../partials/headers.php';
require_once __DIR__ . '/../partials/helpers.php';

send_security_headers([
    'cache_control' => 'public, max-age=300, s-maxage=3600',
    'vary' => 'Accept-Encoding',
]);

$localeData = require __DIR__ . '/../partials/data/locales.php';
$locales = $localeData['items'];
$localeCodes = ordered_locale_codes($locales, $localeData['order']);
$localeOrder = locale_menu_order($locale, $localeCodes);
$defaultLocale = $localeData['default'];
$fundData = require __DIR__ . '/../partials/data/fund.php';
$projects = require __DIR__ . '/../partials/data/projects.php';
$t = require __DIR__ . '/../partials/strings/spa.php';

require __DIR__ . '/../partials/page.php';
