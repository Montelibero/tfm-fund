<?php

declare(strict_types=1);

return [
    'meta' => [
        'title' => 'Tercer Fondo Montelibero — fondo benéfico de la comunidad',
        'description' => 'Fondo benéfico sin ánimo de lucro: recaudamos donaciones y distribuimos de forma transparente subvenciones para proyectos útiles de la comunidad Montelibero.',
    ],
    'shared' => [
        'donate' => 'Donar',
        'custom_amount' => 'Introducir monto',
        'learn_more' => 'Más información',
    ],
    'header' => [
        'brand' => 'Tercer Fondo Montelibero',
        'nav_aria_label' => 'Principal',
        'lang_aria_label' => 'Idioma',
        'nav' => [
            'about' => 'Sobre el fondo',
            'how' => 'Cómo funciona',
            'council' => 'Consejo',
        ],
    ],
    'hero' => [
        'title' => 'Fondo comunitario transparente para iniciativas útiles',
        'lead' => 'Aceptamos donaciones y otorgamos subvenciones para proyectos: desarrollo de infraestructura, iniciativas educativas, eventos, conferencias, desarrollo, publicaciones y mucho más.',
        'cover_alt' => 'Imagen de portada del fondo: colaboración y apoyo',
    ],
    'about' => [
        'heading' => 'Sobre el fondo',
        'cards' => [
            [
                'title' => 'Misión',
                'body' => 'Apoyar y escalar iniciativas útiles para el movimiento Montelibero mediante donaciones voluntarias.',
            ],
            [
                'title' => 'Transparencia',
                'body' => 'Las decisiones las toma el Consejo del TFM, que incluye a los mayores donantes. Los informes sobre subvenciones y donaciones se publican de forma abierta.',
            ],
            [
                'title' => 'Responsabilidad',
                'body' => 'Criterios estrictos de selección, uso dirigido de los fondos, control de la ejecución.',
            ],
        ],
    ],
    'how' => [
        'heading' => 'Cómo funciona',
        'cards' => [
            [
                'title' => '1. Recaudación',
                'body' => 'Los donantes aportan fondos al fondo en una cuenta especial.',
            ],
            [
                'title' => '2. Selección',
                'body' => 'El Consejo examina las solicitudes y selecciona los proyectos.',
            ],
            [
                'title' => '3. Financiación',
                'body' => 'Otorgamos subvenciones, publicamos informes y métricas.',
            ],
        ],
    ],
    'council' => [
        'heading' => 'Consejo del fondo',
        'body' => 'El Consejo está compuesto por los mayores donantes del fondo. El número de miembros del Consejo está limitado a 10 personas. Las decisiones se toman de forma colegiada. La composición actual del Consejo y el Estatuto del TFM están disponibles públicamente.',
    ],
    'donate' => [
        'heading' => 'Hacer una donación',
        'lead' => 'Puede apoyar el fondo transfiriendo cualquier cantidad en EURMTL, USDM o SATSMTL a la cuenta de donaciones en la cadena de bloques Stellar.',
        'amount_placeholder' => 'Monto, EURMTL',
        'methods' => [
            'mtl' => [
                'title' => 'Apoyar vía MTL Wallet',
                'body' => 'Monedero custodio popular en forma de bot de Telegram.',
                'form_label' => 'Introducir su monto (MTL Wallet)',
            ],
            'stellar' => [
                'title' => 'Apoyar vía Sunce o Lobster',
                'body' => 'Monederos Stellar en forma de aplicaciones.',
                'form_label' => 'Introducir su monto (Stellar)',
            ],
            'direct' => [
                'title' => 'O transferencia directa',
                'body' => 'Utilice cualquier monedero Stellar para transferir tokens a la dirección del TFM.',
                'note' => 'Haga clic en la dirección para copiarla',
            ],
        ],
        'stellar_info_label' => '¿Qué es Stellar?',
    ],
    'projects' => [
        'heading' => 'Proyectos apoyados por el fondo',
        'items' => [
            'fest' => [
                'title' => 'MTL Fest',
                'body' => 'Apoyo a los gastos organizativos y a los ponentes.',
            ],
            'map' => [
                'title' => 'Beca OpenStreetMap',
                'body' => 'Desarrollo de mapas y datos abiertos para la ciudad de Bar.',
            ],
            'book1' => [
                'title' => 'Libro sobre criptomonedas',
                'body' => 'Patrocinio de la publicación del libro «Fundamentos de las criptomonedas» en idioma montenegrino.',
            ],
            'fpc' => [
                'title' => 'Traducción de la libro "Free private cities" al montenegrino',
                'body' => 'Traducción y impresión de la traducción montenegrina del libro "Free private cities" de Titus Gebel.',
            ],
            'liol' => [
                'title' => 'Liberty in Our Lifetime',
                'body' => 'Pago de entradas para asistir al festival Liberty in Our Lifetime 2023 y 2024.',
            ],
            'book2' => [
                'title' => 'Libro «ANCAP»',
                'body' => 'Préstamo sin interés para la impresión de la tirada del libro sobre Ancap.',
            ],
            'merch' => [
                'title' => 'Merch',
                'body' => 'Préstamo sin interés para la producción de merchandising de Montelibero.',
            ],
            'libertycon' => [
                'title' => 'LibertyCon',
                'body' => 'Apoyo al viaje de representantes a LibertyCon en Tbilisi.',
            ],
            'wiki' => [
                'title' => 'MonteWiki',
                'body' => 'Pago del hosting de MonteWiki, donación de apoyo.',
            ],
            'libertyconf' => [
                'title' => 'Liberty Conf',
                'body' => 'Patrocinio de la conferencia libertaria en Tbilisi II Liberty Conf.',
            ],
            'mtltv' => [
                'title' => 'MTL TV',
                'body' => 'Donaciones para apoyar la actividad.',
            ],
        ],
    ],
    'footer' => [
        'contacts_heading' => 'Contactos',
        'telegram_label' => 'Canal de Telegram: ',
        'reports_prefix' => 'Informes y decisiones públicas — en la ',
        'reports_link_label' => 'wiki de Montelibero',
        'reports_suffix' => '.',
        'legal_heading' => 'Información legal',
        'legal_body' => 'ONG. Donaciones finalistas. Informes transparentes.',
        'made_prefix' => 'Hecho con amor para ',
        'made_link_label' => 'Montelibero',
        'made_logo_alt' => 'Montelibero',
    ],
];
