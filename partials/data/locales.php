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
            'label' => 'ENG',
            'toggle_id' => 'lang-toggle-en',
        ],
        'rus' => [
            'path' => '/rus/',
            'html_lang' => 'ru',
            'label' => 'RUS',
            'toggle_id' => 'lang-toggle-ru',
        ],
        'spa' => [
            'path' => '/spa/',
            'html_lang' => 'es',
            'label' => 'SPA',
            'toggle_id' => 'lang-toggle-es',
        ],
        'cnr' => [
            'path' => '/cnr/',
            'html_lang' => 'sr-ME',
            'label' => 'CNR',
            'toggle_id' => 'lang-toggle-cnr',
        ],
    ],
];
