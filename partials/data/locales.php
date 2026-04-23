<?php

declare(strict_types=1);

return [
    'default' => 'eng',
    'order' => ['rus', 'cnr', 'spa', 'eng'],
    'alternate_order' => ['rus', 'eng', 'cnr', 'spa'],
    'items' => [
        'eng' => [
            'path' => '/eng/',
            'html_lang' => 'en',
            'og_locale' => 'en_US',
            'label' => 'ENG',
        ],
        'rus' => [
            'path' => '/rus/',
            'html_lang' => 'ru',
            'og_locale' => 'ru_RU',
            'label' => 'RUS',
        ],
        'spa' => [
            'path' => '/spa/',
            'html_lang' => 'es',
            'og_locale' => 'es_ES',
            'label' => 'SPA',
        ],
        'cnr' => [
            'path' => '/cnr/',
            'html_lang' => 'sr-ME',
            'og_locale' => 'sr_ME',
            'label' => 'CNR',
        ],
    ],
];
