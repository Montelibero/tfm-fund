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

if (!function_exists('absolute_url')) {
    function absolute_url(string $path): string
    {
        return rtrim(SITE_URL, '/') . '/' . ltrim($path, '/');
    }
}

if (!function_exists('locale_data')) {
    function locale_data(): array
    {
        static $localeData;

        if ($localeData === null) {
            $localeData = require __DIR__ . '/data/locales.php';
        }

        return $localeData;
    }
}

if (!function_exists('locale_path')) {
    function locale_path(string $locale, array $locales): ?string
    {
        $path = $locales[$locale]['path'] ?? null;

        return is_string($path) ? $path : null;
    }
}

if (!function_exists('locale_normalize_code')) {
    function locale_normalize_code(string $code): string
    {
        $code = strtolower(trim($code));

        if (preg_match('/^[a-z]{2,3}/', $code, $match) === 1) {
            return $match[0];
        }

        return $code;
    }
}

if (!function_exists('locale_accept_candidates')) {
    function locale_accept_candidates(?string $header): array
    {
        if (!$header) {
            return [];
        }

        $candidates = [];

        foreach (explode(',', $header) as $part) {
            $part = trim($part);
            if ($part === '') {
                continue;
            }

            $q = 1.0;
            if (stripos($part, 'q=') !== false) {
                if (preg_match('/q=([0-9.]+)/i', $part, $match) === 1) {
                    $q = (float) $match[1];
                }
                $lang = trim(explode(';', $part, 2)[0]);
            } else {
                $lang = $part;
            }

            $candidates[] = [
                'lang' => locale_normalize_code($lang),
                'q' => $q,
            ];
        }

        usort($candidates, static fn(array $a, array $b): int => $b['q'] <=> $a['q']);

        return $candidates;
    }
}

if (!function_exists('locale_matches_accept_code')) {
    function locale_matches_accept_code(string $localeCode, array $localeConfig, string $acceptCode): bool
    {
        if ($acceptCode === locale_normalize_code($localeCode)) {
            return true;
        }

        foreach ($localeConfig['accept'] ?? [] as $alias) {
            if ($acceptCode === locale_normalize_code((string) $alias)) {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('locale_detect_from_accept_language')) {
    function locale_detect_from_accept_language(?string $header, array $locales, string $defaultLocale): string
    {
        $order = locale_data()['order'] ?? [];

        foreach (locale_accept_candidates($header) as $candidate) {
            foreach (ordered_locale_codes($locales, is_array($order) ? $order : []) as $localeCode) {
                if (locale_matches_accept_code($localeCode, $locales[$localeCode], $candidate['lang'])) {
                    return $localeCode;
                }
            }
        }

        return isset($locales[$defaultLocale]) ? $defaultLocale : (array_key_first($locales) ?: 'eng');
    }
}

if (!function_exists('locale_detect_from_request')) {
    function locale_detect_from_request(array $locales, string $defaultLocale): string
    {
        $cookieLang = $_COOKIE['lang'] ?? null;
        if (is_string($cookieLang) && isset($locales[$cookieLang])) {
            return $cookieLang;
        }

        $accept = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? null;

        return locale_detect_from_accept_language(is_string($accept) ? $accept : null, $locales, $defaultLocale);
    }
}

if (!function_exists('locale_redirect_target')) {
    function locale_redirect_target(string $locale, array $locales, ?string $returnPath = null): ?string
    {
        $target = locale_path($locale, $locales);
        if ($target === null) {
            return null;
        }

        if (is_string($returnPath) && $returnPath === $target) {
            return $returnPath;
        }

        return $target;
    }
}

if (!function_exists('locale_setter_href')) {
    function locale_setter_href(string $locale, string $returnPath): string
    {
        // The header switcher intentionally returns to locale roots only.
        // PHP never receives the browser fragment, so preserving the current in-page anchor
        // here would require client-side code we do not want to depend on.
        return '../set-lang.php?lang=' . rawurlencode($locale) . '&return=' . rawurlencode($returnPath);
    }
}

if (!function_exists('ordered_locale_codes')) {
    function ordered_locale_codes(array $locales, array $order): array
    {
        $result = [];

        foreach (array_values(array_unique($order)) as $localeCode) {
            if (isset($locales[$localeCode])) {
                $result[] = $localeCode;
            }
        }

        foreach (array_keys($locales) as $localeCode) {
            if (!in_array($localeCode, $result, true)) {
                $result[] = $localeCode;
            }
        }

        return $result;
    }
}

if (!function_exists('locale_menu_order')) {
    function locale_menu_order(string $currentLocale, array $orderedLocaleCodes): array
    {
        $result = [$currentLocale];

        foreach ($orderedLocaleCodes as $localeCode) {
            if ($localeCode !== $currentLocale) {
                $result[] = $localeCode;
            }
        }

        return $result;
    }
}

if (!function_exists('locale_strings')) {
    function locale_strings(string $locale): array
    {
        return require __DIR__ . '/strings/' . $locale . '.php';
    }
}

if (!function_exists('locale_page_bootstrap')) {
    function locale_page_bootstrap(string $locale): array
    {
        $localeData = locale_data();
        $locales = $localeData['items'];
        $defaultLocale = $localeData['default'];

        if (!isset($locales[$locale])) {
            $locale = $defaultLocale;
        }

        $localeCodes = ordered_locale_codes($locales, $localeData['order']);

        return [
            'locale' => $locale,
            'locales' => $locales,
            'localeCodes' => $localeCodes,
            'localeOrder' => locale_menu_order($locale, $localeCodes),
            'defaultLocale' => $defaultLocale,
            'fundData' => require __DIR__ . '/data/fund.php',
            'projects' => require __DIR__ . '/data/projects.php',
            't' => locale_strings($locale),
        ];
    }
}

if (!function_exists('render_locale_page')) {
    function render_locale_page(string $locale): never
    {
        send_security_headers([
            'cache_control' => 'public, max-age=300, s-maxage=3600',
            'vary' => 'Accept-Encoding',
        ]);

        extract(locale_page_bootstrap($locale), EXTR_SKIP);

        require __DIR__ . '/page.php';
        exit;
    }
}

if (!function_exists('request_is_https')) {
    function request_is_https(): bool
    {
        return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
            || (($_SERVER['SERVER_PORT'] ?? null) === '443');
    }
}

if (!function_exists('format_local_date')) {
    function format_local_date(string $ymd, string $locale): string
    {
        $date = DateTimeImmutable::createFromFormat('Y-m-d', $ymd);
        if (!$date) {
            return $ymd;
        }

        $months = [
            'eng' => ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            'rus' => ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'],
            'spa' => ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
            'cnr' => ['januar', 'februar', 'mart', 'april', 'maj', 'jun', 'jul', 'avgust', 'septembar', 'oktobar', 'novembar', 'decembar'],
        ];

        $monthIndex = (int) $date->format('n') - 1;
        $monthName = $months[$locale][$monthIndex] ?? $months['eng'][$monthIndex];
        $day = (int) $date->format('j');
        $year = $date->format('Y');

        if ($locale === 'eng') {
            return $monthName . ' ' . $day . ', ' . $year;
        }

        return $day . ' ' . $monthName . ' ' . $year;
    }
}
