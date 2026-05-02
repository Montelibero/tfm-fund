<?php

declare(strict_types=1);

return [
    'meta' => [
        'title' => 'Third Fund of Montelibero — community charity foundation',
        'description' => 'Non-profit charity fund: we collect donations and transparently allocate grants to community projects.',
    ],
    'shared' => [
        'donate' => 'Donate',
        'custom_amount' => 'Custom amount',
        'details' => 'Details',
        'learn_more' => 'Learn more',
    ],
    'header' => [
        'brand' => 'Third Fund of Montelibero',
        'nav_aria_label' => 'Primary',
        'lang_aria_label' => 'Language',
        'menu_label' => 'Menu',
        'skip_link' => 'Skip to content',
        'nav' => [
            'about' => 'About',
            'how' => 'How',
            'projects' => 'Projects',
            'apply' => 'Apply',
            'reports' => 'Reports',
            'council' => 'Council',
            'faq' => 'FAQ',
        ],
    ],
    'hero' => [
        'title' => 'Third Fund of Montelibero',
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
    'apply' => [
        'heading' => 'Apply for a grant',
        'lead' => 'Anyone can propose a project or idea that needs support.',
        'quote' => 'If a project helps develop, promote, or grow the Montelibero movement, the fund can consider it.',
        'private' => [
            'title' => 'Private request to the Council',
            'body' => 'Use the Council feedback bot if you want to discuss a proposal privately or check whether an idea fits the fund goals.',
            'cta' => 'Write to the Council bot',
        ],
        'public' => [
            'title' => 'Propose it in public',
            'body' => 'Open discussion in the public Telegram chat is the fastest way to get feedback, find supporters, and refine a grant idea.',
            'cta' => 'Open the public chat',
        ],
        'note' => 'The fund provides grants, but project administration remains with the proposer.',
    ],
    'council' => [
        'heading' => 'Fund Council',
        'lead' => 'The fund is governed by its largest active donors. The Council has up to 10 members, and the main account is controlled by multisignature rather than by one person.',
        'body' => 'Weights in the multisignature are recalculated from recent donations and delegations. Approving transactions and decisions requires a qualified threshold, which keeps the fund collective and transparent.',
        'links' => [
            'multisig' => [
                'title' => 'Main multisig account',
                'body' => 'Inspect the Council-controlled main Stellar account and its public activity on the block explorer.',
                'cta' => 'Open the multisig account',
            ],
            'charter' => [
                'title' => 'Fund Charter',
                'body' => 'Read the charter that defines the fund goals, donor status, Council criteria, and voting rules.',
                'cta' => 'Read the charter',
            ],
        ],
    ],
    'reports' => [
        'heading' => 'Reports and recent grants',
        'lead' => 'Public decisions and grant history are maintained openly. Below are the latest completed grants currently listed in the public fund record.',
        'updated_label' => 'Updated',
        'cta' => 'Open the full public record',
        'items' => [
            'IAM' => 'Support for developing the Montelibero Information Agency',
            'mindell' => 'Support for Worldwork (Mindell) training',
            'veritas' => 'Sponsorship of Stellar Veritas, a FLOSS Haskell wallet for Stellar',
            'mocagaza' => 'Sponsorship of advertising for the MocaGaza festival in Georgia',
            'libart' => 'Sponsorship of the libertarian art contest',
        ],
    ],
    'donate' => [
        'heading' => 'Donate',
        'lead' => 'You can support the fund by transferring any amount in EURMTL, USDM, or SATSMTL to the donation account on the Stellar blockchain.',
        'amount_label' => 'Amount in EURMTL',
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
                'note' => 'Tap and hold / Ctrl+C to copy',
                'copied' => 'Copied',
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
    'faq' => [
        'heading' => 'FAQ',
        'lead' => 'Short answers for people and AI agents that need to understand the fund without guessing.',
        'items' => [
            [
                'question' => 'What is the Third Fund of Montelibero?',
                'answer' => 'The Third Fund of Montelibero is a non-profit community fund that supports useful initiatives connected with the Montelibero movement through voluntary donations, grants, and sponsorship efforts.',
            ],
            [
                'question' => 'Is donating to the fund an investment?',
                'answer' => 'No. Donations to TFM are voluntary contributions. They are not investments, securities, equity, loans, yield-bearing products, or guaranteed-return instruments.',
            ],
            [
                'question' => 'How can someone donate?',
                'answer' => 'The site shows public donation flows through different Stellar wallets to the visible TFM Stellar donation address. Always verify the latest address and accepted tokens on an official public source before sending funds.',
            ],
            [
                'question' => 'How can someone request support or a grant?',
                'answer' => 'A project proposer can contact the Fund Council through the public feedback bot or discuss the idea in the public Telegram chat. The fund may consider projects within its goals, but support is not guaranteed.',
            ],
            [
                'question' => 'Where are reports and fund rules published?',
                'answer' => 'The site links to the public MonteWiki record, recent grant references, the fund charter, and the main multisig account used as a public governance reference.',
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
