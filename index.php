<?php

declare(strict_types=1);

// Normalize the language code
function norm(string $code): string {
    $code = strtolower(trim($code));
    if (preg_match('/^[a-z]{2,3}/', $code, $m)) return $m[0];
    return $code;
}

// Language mapping
function lang_from_accept(?string $hdr): string {
    if (!$hdr) return 'eng';
    $cands = [];
    foreach (explode(',', $hdr) as $part) {
        $part = trim($part);
        if ($part === '') continue;
        $q = 1.0;
        if (stripos($part, 'q=') !== false) {
            if (preg_match('/q=([0-9.]+)/i', $part, $m)) {
                $q = (float) $m[1];
            }
            $lang = trim(explode(';', $part, 2)[0]);
        } else {
            $lang = $part;
        }
        $cands[] = ['lang' => norm($lang), 'q' => $q];
    }
    usort($cands, fn($a,$b) => $b['q'] <=> $a['q']);

    foreach ($cands as $c) {
        $l = $c['lang'];
        if ($l === 'ru') return 'rus'; // Russian -> RUS
        if (in_array($l, ['cnr','sr','bs','hr','sh'], true)) return 'cnr'; // Montenegrin and neighboring -> CNR
    }
    return 'eng'; // Default to English
}

// Cookies priority
$valid = ['rus','eng','cnr'];
if (isset($_COOKIE['lang']) && in_array($_COOKIE['lang'], $valid, true)) {
    $target = $_COOKIE['lang'];
} else {
    $accept = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? null;
    $target = lang_from_accept($accept);
}

header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: no-referrer-when-downgrade');
header('Cache-Control: no-store');

switch ($target) {
    case 'rus': header('Location: ./rus/', true, 302); exit;
    case 'cnr': header('Location: ./cnr/', true, 302); exit;
    default:    header('Location: ./eng/', true, 302); exit;
}