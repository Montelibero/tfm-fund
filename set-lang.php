<?php

declare(strict_types=1);

$routes = [
    'eng' => '/eng/',
    'rus' => '/rus/',
    'spa' => '/spa/',
    'cnr' => '/cnr/',
];

$lang = $_GET['lang'] ?? '';
if (!is_string($lang) || !isset($routes[$lang])) {
    http_response_code(400);
    header('Content-Type: text/plain; charset=UTF-8');
    echo 'Invalid language.';
    exit;
}

$return = $_GET['return'] ?? '';
$target = $routes[$lang];
if (is_string($return) && $return === $target) {
    $target = $return;
}

$isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || (($_SERVER['SERVER_PORT'] ?? null) === '443');

setcookie('lang', $lang, [
    'expires' => time() + 365 * 24 * 60 * 60,
    'path' => '/',
    'secure' => $isHttps,
    'httponly' => true,
    'samesite' => 'Lax',
]);

header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: no-referrer-when-downgrade');
header('Cache-Control: no-store');
header('Location: ' . $target, true, 302);
exit;
