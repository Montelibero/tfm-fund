<?php

declare(strict_types=1);

return [
    'meta' => [
        'title' => 'Treći fond Montelibero — dobrotvorni fond zajednice',
        'description' => 'Nevladin dobrotvorni fond: prikupljamo donacije i transparentno dodjeljujemo grantove za korisne projekte zajednice.',
    ],
    'shared' => [
        'donate' => 'Doniraj',
        'custom_amount' => 'Vaš iznos',
        'learn_more' => 'Detaljnije',
    ],
    'header' => [
        'brand' => 'Treći fond Montelibero',
        'nav_aria_label' => 'Navigacija',
        'lang_aria_label' => 'Jezik',
        'nav' => [
            'about' => 'O fondu',
            'how' => 'Kako funkcioniše',
            'council' => 'Savjet',
        ],
    ],
    'hero' => [
        'title' => 'Transparentan fond zajednice za korisne inicijative',
        'lead' => 'Primamo donacije i dodjeljujemo grantove za projekte koji uključuju razvoj infrastrukture, obrazovne inicijative, događaje, konferencije, publikacije i još mnogo toga.',
        'cover_alt' => 'Naslovna slika fonda',
    ],
    'about' => [
        'heading' => 'O fondu',
        'cards' => [
            [
                'title' => 'Misija',
                'body' => 'Podržati i proširiti inicijative koje koriste Montelibero pokretu putem dobrovoljnih donacija.',
            ],
            [
                'title' => 'Transparentnost',
                'body' => 'Odluke donosi Savjet TFM-a, koje uključuje glavne donatore. Izvještaji o grantovima i donacijama objavljuju se javno.',
            ],
            [
                'title' => 'Odgovornost',
                'body' => 'Strogi kriterijumi, namjensko trošenje, kontrola realizacije.',
            ],
        ],
    ],
    'how' => [
        'heading' => 'Kako funkcioniše',
        'cards' => [
            [
                'title' => '1. Prikupljanje',
                'body' => 'Donatori uplaćuju sredstva u fond na poseban račun.',
            ],
            [
                'title' => '2. Selekcija',
                'body' => 'Savjet razmatra prijave i odobrava projekte.',
            ],
            [
                'title' => '3. Finansiranje',
                'body' => 'Dodjeljujemo grantove, objavljujemo izvještaje i metrike.',
            ],
        ],
    ],
    'council' => [
        'heading' => 'Savjet fonda',
        'body' => 'Vijeće se sastoji od najvećih donatora Fondacije. Članstvo u Savjetu je ograničeno na 10 osoba. Odluke se donose kolektivno. Trenutni sastav Savjeta i Povelja Fondacije su javno dostupni.',
    ],
    'donate' => [
        'heading' => 'Donacije',
        'lead' => 'Možete podržati fond prebacivanjem bilo kojeg iznosa u EURMTL, USDM ili SATSMTL na račun za donacije na Stellar blockchainu.',
        'amount_placeholder' => 'Iznos, EURMTL',
        'methods' => [
            'mtl' => [
                'title' => 'Podrška preko MTL Wallet',
                'body' => 'Popularni novčanik u obliku Telegram bota.',
                'form_label' => 'Unesite svoj iznos (MTL Wallet)',
            ],
            'stellar' => [
                'title' => 'Podrška preko Sunce ili Lobster',
                'body' => 'Stellar novčanici kao aplikacije.',
                'form_label' => 'Unesite svoj iznos (Stellar)',
            ],
            'direct' => [
                'title' => 'Ili direktnim transferom',
                'body' => 'Koristite bilo koji Stellar novčanik za prenos EURMTL na adresu fondacije.',
                'note' => 'Kliknite na adresu za kopiranje',
            ],
        ],
        'stellar_info_label' => 'Šta je Stellar?',
    ],
    'projects' => [
        'heading' => 'Podržani projekti',
        'items' => [
            'fest' => [
                'title' => 'MTL Fest',
                'body' => 'Podrška organizaciji i govornicima.',
            ],
            'map' => [
                'title' => 'OpenStreetMap grant',
                'body' => 'Razvoj karata i otvorenih podataka za grad Bar.',
            ],
            'book1' => [
                'title' => 'Knjiga o kriptovalutama',
                'body' => 'Sponzorstvo izdanja knjige "Osnove kriptovaluta" na crnogorskom jeziku.',
            ],
            'fpc' => [
                'title' => 'Prevod knjige "Free private cities" na crnogorski',
                'body' => 'Prevod i štampanje crnogorskog prevoda knjige "Free private cities" od Titusa Gebela.',
            ],
            'liol' => [
                'title' => 'Liberty in Our Lifetime',
                'body' => 'Plaćanje karata za pohađanje festivala Liberty in Our Lifetime 2023 i 2024.',
            ],
            'book2' => [
                'title' => 'Knjiga "ANKAP"',
                'body' => 'Bespovijatni kredit za štampanje izdanja knjige o Ankapu.',
            ],
            'merch' => [
                'title' => 'Roba',
                'body' => 'Bespovijatni kredit za proizvodnju Montelibero robe.',
            ],
            'libertycon' => [
                'title' => 'LibertyCon',
                'body' => 'Podrška putovanju predstavnika na LibertyCon u Tbilisiju.',
            ],
            'wiki' => [
                'title' => 'MonteWiki',
                'body' => 'Plaćanje hostinga za MonteWiki, donacija za podršku.',
            ],
            'libertyconf' => [
                'title' => 'Liberty Conf',
                'body' => 'Sponzorstvo libertarijanske konferencije u Tbilisiju II Liberty Conf.',
            ],
            'mtltv' => [
                'title' => 'MTL TV',
                'body' => 'Donacije za podršku aktivnostima.',
            ],
        ],
    ],
    'footer' => [
        'contacts_heading' => 'Kontakt',
        'telegram_label' => 'Telegram kanal: ',
        'reports_prefix' => 'Javni izvještaji i odluke — na ',
        'reports_link_label' => 'wiki Montelibero',
        'reports_suffix' => '.',
        'legal_heading' => 'Pravno',
        'legal_body' => 'NVO. Namjenske donacije. Transparentno izvještavanje.',
        'made_prefix' => 'Napravili s ljubavlju za ',
        'made_link_label' => 'Montelibero',
        'made_logo_alt' => 'Montelibero',
    ],
    'error' => [
        'title' => 'Neispravan zahtjev za donaciju',
        'invalid_amount' => 'Unesite ispravan iznos veći od 0 i ne veći od 1.000.000.',
        'invalid_method' => 'Izaberite podržani način donacije i pokušajte ponovo.',
        'back_to_donate' => 'Nazad na formu za donaciju',
    ],
];
