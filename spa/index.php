<?php

declare(strict_types=1);

$locale = 'spa';

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../partials/helpers.php';

$localeData = require __DIR__ . '/../partials/data/locales.php';
$locales = $localeData['items'];
$localeOrder = $localeData['order'];
$alternateLocaleOrder = $localeData['alternate_order'];
$defaultLocale = $localeData['default'];
$projects = require __DIR__ . '/../partials/data/projects.php';
$t = require __DIR__ . '/../partials/strings/spa.php';

require __DIR__ . '/../partials/page.php';
