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
        header('Referrer-Policy: no-referrer');
        header('Permissions-Policy: geolocation=(), camera=(), microphone=()');
        header('Strict-Transport-Security: max-age=31536000; includeSubDomains');
        header("Content-Security-Policy: default-src 'self'; base-uri 'self'; object-src 'none'; connect-src 'none'; img-src 'self' data:; style-src 'self'; script-src 'self'; form-action 'self'; frame-ancestors 'none'");
        header('Link: </llms.txt>; rel="describedby"; type="text/markdown"', false);
        header('Link: </.well-known/agent-skills/index.json>; rel="describedby"; type="application/json"', false);

        if (is_string($cacheControl) && $cacheControl !== '') {
            header('Cache-Control: ' . $cacheControl);
        }

        if (is_string($vary) && $vary !== '') {
            header('Vary: ' . $vary);
        }
    }
}
