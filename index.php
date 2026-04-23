<?php

declare(strict_types=1);

require_once __DIR__ . '/partials/headers.php';
require_once __DIR__ . '/partials/helpers.php';

$localeData = locale_data();
$locales = $localeData['items'];
$defaultLocale = $localeData['default'];
$targetLocale = locale_detect_from_request($locales, $defaultLocale);
$targetPath = locale_path($targetLocale, $locales) ?? locale_path($defaultLocale, $locales) ?? '/eng/';

send_security_headers([
    'cache_control' => 'no-store',
    'vary' => 'Accept-Language, Cookie',
]);

header('Location: ' . $targetPath, true, 302);
exit;
