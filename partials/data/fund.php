<?php

declare(strict_types=1);

$reportsRoot = wiki_ru('Третий_фонд_Монтелиберо');

return [
    'updated_date' => '2026-05-02',
    'links' => [
        'contact_bot' => 'https://t.me/TFM_contact_bot',
        'public_chat' => 'https://t.me/TFM_talk',
        'multisig_explorer' => 'https://bsn.expert/accounts/' . rawurlencode(STELLAR_TFM_MAIN_ACCOUNT) . '/',
        'charter' => wiki_ru('Устав_ТФМ'),
        'reports' => $reportsRoot,
    ],
    'reports' => [
        [
            'id' => 'IAM',
            'href' => 'https://t.me/tfm_talk/4220',
        ],
        [
            'id' => 'mindell',
            'href' => 'https://t.me/tfm_talk/4110',
        ],
        [
            'id' => 'veritas',
            'href' => 'https://t.me/tfm_talk/4049',
        ],
        [
            'id' => 'mocagaza',
            'href' => 'https://t.me/tfm_talk/3830',
        ],
        [
            'id' => 'libart',
            'href' => 'https://t.me/tfm_talk/3834',
        ],
    ],
];
