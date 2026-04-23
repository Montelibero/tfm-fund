<?php

declare(strict_types=1);

return [
    'meta' => [
        'title' => 'Third Fund Montelibero — community charity foundation',
        'description' => 'Non-profit charity fund: we collect donations and transparently allocate grants to community projects.',
    ],
    'shared' => [
        'donate' => 'Donate',
        'custom_amount' => 'Custom amount',
        'learn_more' => 'Learn more',
    ],
    'header' => [
        'brand' => 'Third Fund Montelibero',
        'nav_aria_label' => 'Primary',
        'lang_aria_label' => 'Language',
        'nav' => [
            'about' => 'About',
            'how' => 'How it works',
            'council' => 'Council',
        ],
    ],
    'hero' => [
        'title' => 'Transparent community fund for useful initiatives',
        'lead' => 'We accept donations and award grants for projects such as infrastructure development, educational initiatives, events, conferences, development, publications, and much more.',
        'cover_alt' => 'Fund cover image: collaboration and support',
    ],
    'about' => [
        'heading' => 'About',
        'cards' => [
            [
                'title' => 'Mission',
                'body' => 'Support and scale initiatives that benefit the Montelibero movement through voluntary donations.',
            ],
            [
                'title' => 'Transparency',
                'body' => 'Decisions are made by the TFM Council, which includes the largest donors. Reports on grants and donations are published openly.',
            ],
            [
                'title' => 'Accountability',
                'body' => 'Strict selection criteria, targeted use of funds, delivery control.',
            ],
        ],
    ],
    'how' => [
        'heading' => 'How it works',
        'cards' => [
            [
                'title' => '1. Collect',
                'body' => 'Donors make donations to the fund through a special account.',
            ],
            [
                'title' => '2. Select',
                'body' => 'The Council reviews applications and approves projects.',
            ],
            [
                'title' => '3. Fund',
                'body' => 'We allocate grants and publish reports and metrics.',
            ],
        ],
    ],
    'council' => [
        'heading' => 'Fund Council',
        'body' => "The Council consists of the fund's largest donors. The number of Council members is limited to 10 people. Decisions are made collectively. The current composition of the Council and the TFM Charter are publicly available.",
    ],
    'donate' => [
        'heading' => 'Donate',
        'lead' => 'You can support the fund by transferring any amount in EURMTL, USDM, or SATSMTL to the donation account on the Stellar blockchain.',
        'amount_placeholder' => 'Amount, EURMTL',
        'methods' => [
            'mtl' => [
                'title' => 'Support via MTL Wallet',
                'body' => 'A popular custodial wallet in the form of a Telegram bot.',
                'form_label' => 'Custom amount (MTL Wallet)',
            ],
            'stellar' => [
                'title' => 'Support via Sunce or Lobster',
                'body' => 'Stellar wallets as apps.',
                'form_label' => 'Custom amount (Stellar)',
            ],
            'direct' => [
                'title' => 'Or direct transfer',
                'body' => 'Use any Stellar wallet to transfer EURMTL to the fund address.',
                'note' => 'Click on the address to copy',
            ],
        ],
        'stellar_info_label' => 'What is Stellar?',
    ],
    'projects' => [
        'heading' => 'Supported projects',
        'items' => [
            'fest' => [
                'title' => 'MTL Fest',
                'body' => 'Support for organizational expenses and speakers.',
            ],
            'map' => [
                'title' => 'OpenStreetMap grant',
                'body' => 'Development of maps and open data for the city of Bar.',
            ],
            'book1' => [
                'title' => 'Cryptocurrency book',
                'body' => 'Sponsorship of the publication of the book "Fundamentals of Cryptocurrencies" in Montenegrin language.',
            ],
            'fpc' => [
                'title' => '"Free private cities" book in Montenegrin',
                'body' => 'Translation and printing of the Montenegrin translation of the book "Free private cities" by Titus Gebel.',
            ],
            'liol' => [
                'title' => 'Liberty in Our Lifetime',
                'body' => 'Payment for tickets to attend the Liberty in Our Lifetime festival 2023 and 2024.',
            ],
            'book2' => [
                'title' => '"ANCAP" book',
                'body' => 'Interest-free loan for printing the edition of the book about Ancap.',
            ],
            'merch' => [
                'title' => 'Merchandise',
                'body' => 'Interest-free loan for the production of Montelibero merchandise.',
            ],
            'libertycon' => [
                'title' => 'LibertyCon',
                'body' => "Support for representatives' trip to LibertyCon in Tbilisi.",
            ],
            'wiki' => [
                'title' => 'MonteWiki',
                'body' => 'Hosting costs for MonteWiki, support donation.',
            ],
            'libertyconf' => [
                'title' => 'Liberty Conf',
                'body' => 'Sponsorship of the libertarian conference in Tbilisi II Liberty Conf.',
            ],
            'mtltv' => [
                'title' => 'MTL TV',
                'body' => 'Donations to support activity.',
            ],
        ],
    ],
    'footer' => [
        'contacts_heading' => 'Contacts',
        'telegram_label' => 'Telegram channel: ',
        'reports_prefix' => 'Public reports and decisions — on ',
        'reports_link_label' => 'Montewiki',
        'reports_suffix' => '.',
        'legal_heading' => 'Legal',
        'legal_body' => 'NPO. Earmarked donations. Transparent reporting.',
        'made_prefix' => 'Made with love for ',
        'made_link_label' => 'Montelibero',
        'made_logo_alt' => 'Montelibero',
    ],
    'error' => [
        'title' => 'Invalid donation request',
        'invalid_amount' => 'Enter a valid amount greater than 0 and no more than 1,000,000.',
        'invalid_method' => 'Choose a supported donation method and try again.',
        'back_to_donate' => 'Back to donation form',
    ],
];
