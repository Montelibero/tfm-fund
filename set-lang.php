<?php

declare(strict_types=1);

require_once __DIR__ . '/partials/headers.php';
require_once __DIR__ . '/partials/helpers.php';

send_security_headers([
    'cache_control' => 'no-store',
]);

$locales = locale_data()['items'];

$lang = $_GET['lang'] ?? '';
if (!is_string($lang) || !isset($locales[$lang])) {
    http_response_code(400);
    header('Content-Type: text/plain; charset=UTF-8');
    echo 'Invalid language.';
    exit;
}

$return = $_GET['return'] ?? '';
$target = locale_redirect_target($lang, $locales, is_string($return) ? $return : null) ?? '/eng/';

setcookie('lang', $lang, [
    'expires' => time() + 365 * 24 * 60 * 60,
    'path' => '/',
    'secure' => request_is_https(),
    'httponly' => true,
    'samesite' => 'Lax',
]);

header('Location: ' . $target, true, 302);
exit;
