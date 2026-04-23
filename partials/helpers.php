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
