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
        ],
        'rus' => [
            'path' => '/rus/',
            'html_lang' => 'ru',
            'label' => 'RUS',
        ],
        'spa' => [
            'path' => '/spa/',
            'html_lang' => 'es',
            'label' => 'SPA',
        ],
        'cnr' => [
            'path' => '/cnr/',
            'html_lang' => 'sr-ME',
            'label' => 'CNR',
        ],
    ],
];
