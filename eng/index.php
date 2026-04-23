<?php

declare(strict_types=1);

$locale = 'eng';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../partials/headers.php';
require_once __DIR__ . '/../partials/helpers.php';

send_security_headers([
    'cache_control' => 'public, max-age=300, s-maxage=3600',
    'vary' => 'Accept-Encoding',
]);

$localeData = require __DIR__ . '/../partials/data/locales.php';
$locales = $localeData['items'];
$localeOrder = locale_menu_order($locale, $localeData['order']);
$alternateLocaleOrder = $localeData['alternate_order'];
$defaultLocale = $localeData['default'];
$fundData = require __DIR__ . '/../partials/data/fund.php';
$projects = require __DIR__ . '/../partials/data/projects.php';
$t = require __DIR__ . '/../partials/strings/eng.php';

require __DIR__ . '/../partials/page.php';
