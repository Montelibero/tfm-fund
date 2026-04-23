<?php

declare(strict_types=1);

$reportsRoot = wiki_ru('Третий_фонд_Монтелиберо');

return [
    'updated_date' => '2025-10-28',
    'links' => [
        'contact_bot' => 'https://t.me/TFM_contact_bot',
        'public_chat' => 'https://t.me/TFM_talk',
        'multisig_explorer' => 'https://bsn.expert/accounts/' . rawurlencode(STELLAR_TFM_MAIN_ACCOUNT) . '/',
        'charter' => wiki_ru('Устав_ТФМ'),
        'reports' => $reportsRoot,
    ],
    'reports' => [
        [
            'id' => 'munich',
            'href' => 'https://t.me/tfm_talk/3356',
        ],
        [
            'id' => 'speech',
            'href' => 'https://t.me/tfm_talk/3440',
        ],
        [
            'id' => 'crypto_book',
            'href' => 'https://t.me/tfm_talk/3636',
        ],
        [
            'id' => 'porcfest',
            'href' => 'https://t.me/tfm_talk/3641',
        ],
        [
            'id' => 'liberty_conf',
            'href' => 'https://t.me/tfm_talk/3718',
        ],
    ],
];
