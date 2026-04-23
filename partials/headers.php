<?php

declare(strict_types=1);

if (!function_exists('send_security_headers')) {
    function send_security_headers(array $options = []): void
    {
        if (headers_sent()) {
            return;
        }

        $cacheControl = $options['cache_control'] ?? null;
        $vary = $options['vary'] ?? null;

        header('X-Content-Type-Options: nosniff');
        header('Referrer-Policy: strict-origin-when-cross-origin');
        header('Permissions-Policy: geolocation=(), camera=(), microphone=()');
        header('Strict-Transport-Security: max-age=31536000; includeSubDomains');
        header("Content-Security-Policy: default-src 'self'; img-src 'self' data:; style-src 'self'; script-src 'self'; form-action 'self' https://t.me https://montelibero.net; frame-ancestors 'none'");

        if (is_string($cacheControl) && $cacheControl !== '') {
            header('Cache-Control: ' . $cacheControl);
        }

        if (is_string($vary) && $vary !== '') {
            header('Vary: ' . $vary);
        }
    }
}
