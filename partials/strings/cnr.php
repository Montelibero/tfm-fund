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
        'details' => 'Detalji',
        'learn_more' => 'Detaljnije',
    ],
    'header' => [
        'brand' => 'Treći fond Montelibero',
        'nav_aria_label' => 'Navigacija',
        'lang_aria_label' => 'Jezik',
        'menu_label' => 'Meni',
        'skip_link' => 'Preskoči na sadržaj',
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
    'apply' => [
        'heading' => 'Zatražite grant',
        'lead' => 'Svaka osoba može predložiti projekat ili ideju kojoj je potrebna podrška. Ne morate biti član Montelibera da biste tražili pomoć fonda.',
        'quote' => 'Ako projekat pomaže razvoju, promociji ili rastu pokreta Montelibero, fond ga može uzeti u razmatranje.',
        'private' => [
            'title' => 'Pišite Savjetu privatno',
            'body' => 'Koristite bot za povratne informacije Savjeta ako želite da privatno razgovarate o prijedlogu ili provjerite da li se ideja uklapa u ciljeve fonda.',
            'cta' => 'Pišite botu Savjeta',
        ],
        'public' => [
            'title' => 'Predložite ga javno',
            'body' => 'Javni Telegram chat je najbrži način da dobijete povratne informacije, pronađete podršku i doradite prijavu za grant.',
            'cta' => 'Otvori javni chat',
        ],
        'note' => 'Fond dodjeljuje grantove, ali administracija projekta ostaje na predlagaču. Ako ste spremni da koordinirate projekat, i taj rad može biti finansiran.',
    ],
    'council' => [
        'heading' => 'Savjet fonda',
        'lead' => 'Fondom upravljaju njegovi najveći aktivni donatori. Savjet ima do 10 članova, a glavni račun kontroliše multisig, ne jedna osoba.',
        'body' => 'Težine glasova u multisigu se preračunavaju prema svježim donacijama i delegacijama. Za potvrdu transakcija i odluka potreban je kvalifikovani prag, što upravljanje čini kolektivnim i transparentnim.',
        'links' => [
            'multisig' => [
                'title' => 'Glavni multisig račun',
                'body' => 'Pogledajte glavni Stellar račun kojim upravlja Savjet i njegovu javnu istoriju aktivnosti u exploreru.',
                'cta' => 'Otvori multisig račun',
            ],
            'charter' => [
                'title' => 'Povelja fonda',
                'body' => 'Pročitajte povelju koja definiše ciljeve fonda, status donatora, kriterijume Savjeta i pravila glasanja.',
                'cta' => 'Pročitaj povelju',
            ],
        ],
    ],
    'reports' => [
        'heading' => 'Izvještaji i najnoviji grantovi',
        'lead' => 'Javne odluke i istorija grantova vode se otvoreno. Ispod su najnoviji završeni grantovi koji su sada navedeni u javnoj evidenciji fonda.',
        'updated_label' => 'Ažurirano',
        'cta' => 'Otvori kompletnu javnu evidenciju',
        'items' => [
            'munich' => 'Djelimično finansiranje puta predstavnika MTLA na konferenciju u Minhenu',
            'speech' => 'Sponzorstvo konkursa eseja "Part of Speech"',
            'crypto_book' => 'Sponzorstvo crnogorskog izdanja knjige "Fundamentals of Cryptocurrencies"',
            'porcfest' => 'Sponzorstvo predstavljanja Montelibera na Porcupine Freedom Festival 2025',
            'liberty_conf' => 'Sponzorstvo konferencije II Liberty Conf u Tbilisiju',
        ],
    ],
    'donate' => [
        'heading' => 'Donacije',
        'lead' => 'Možete podržati fond prebacivanjem bilo kojeg iznosa u EURMTL, USDM ili SATSMTL na račun za donacije na Stellar blockchainu.',
        'amount_label' => 'Iznos u EURMTL',
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
                'note' => 'Zadržite pritisak ili koristite Ctrl+C za kopiranje',
                'copied' => 'Kopirano',
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
                'body' => 'Beskamatni kredit za štampanje izdanja knjige o Ankapu.',
            ],
            'merch' => [
                'title' => 'Suveniri',
                'body' => 'Beskamatni kredit za proizvodnju Montelibero suvenira.',
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
        'made_prefix' => 'Napravljeno s ljubavlju za ',
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
