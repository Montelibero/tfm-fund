<?php

declare(strict_types=1);

return [
    'default' => 'eng',
    'order' => ['rus', 'cnr', 'spa', 'eng'],
    'items' => [
        'eng' => [
            'path' => '/eng/',
            'html_lang' => 'en',
            'hreflang' => 'en',
            'og_locale' => 'en_US',
            'accept' => ['en'],
            'label' => 'ENG',
        ],
        'rus' => [
            'path' => '/rus/',
            'html_lang' => 'ru',
            'hreflang' => 'ru',
            'og_locale' => 'ru_RU',
            'accept' => ['ru'],
            'label' => 'RUS',
        ],
        'spa' => [
            'path' => '/spa/',
            'html_lang' => 'es',
            'hreflang' => 'es',
            'og_locale' => 'es_ES',
            'accept' => ['es'],
            'label' => 'SPA',
        ],
        'cnr' => [
            'path' => '/cnr/',
            // Keep the Montenegrin locale explicitly tagged for HTML, hreflang, and Open Graph.
            'html_lang' => 'sr-ME',
            'hreflang' => 'sr-ME',
            'og_locale' => 'sr_ME',
            'accept' => ['cnr', 'sr', 'bs', 'hr', 'sh'],
            'label' => 'CNR',
        ],
    ],
];
