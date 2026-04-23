<?php

declare(strict_types=1);

if (!function_exists('e')) {
    function e(?string $value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('wiki_ru')) {
    function wiki_ru(string $slug): string
    {
        return WIKI_ROOT_RU . rawurlencode($slug);
    }
}

if (!function_exists('locale_setter_href')) {
    function locale_setter_href(string $locale, string $path): string
    {
        return '../set-lang.php?lang=' . rawurlencode($locale) . '&return=' . rawurlencode($path);
    }
}
