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
    'apply' => [
        'heading' => 'Solicitar una subvención',
        'lead' => 'Cualquier persona puede proponer un proyecto o una idea que necesite apoyo. No es necesario ser miembro de Montelibero para solicitar ayuda al fondo.',
        'quote' => 'Si un proyecto ayuda al desarrollo, la promoción o el crecimiento del movimiento Montelibero, el fondo puede considerarlo.',
        'private' => [
            'title' => 'Escribir al Consejo en privado',
            'body' => 'Utilice el bot de contacto del Consejo si quiere comentar una propuesta en privado o comprobar si la idea encaja con los objetivos del fondo.',
            'cta' => 'Escribir al bot del Consejo',
        ],
        'public' => [
            'title' => 'Proponerlo en público',
            'body' => 'El chat público de Telegram es la forma más rápida de recibir comentarios, encontrar apoyo y mejorar una propuesta de subvención.',
            'cta' => 'Abrir el chat público',
        ],
        'note' => 'El fondo concede subvenciones, pero la administración del proyecto sigue siendo responsabilidad del proponente. Si está listo para coordinar un proyecto, ese trabajo también puede financiarse.',
    ],
    'council' => [
        'heading' => 'Consejo del fondo',
        'lead' => 'El fondo está gobernado por sus mayores donantes activos. El Consejo tiene hasta 10 miembros y la cuenta principal se controla mediante multifirma, no por una sola persona.',
        'body' => 'Los pesos de voto de la multifirma se recalculan según las donaciones recientes y las delegaciones. Para aprobar transacciones y decisiones se necesita un umbral cualificado, lo que mantiene el control colectivo y transparente.',
        'links' => [
            'multisig' => [
                'title' => 'Cuenta principal multifirma',
                'body' => 'Consulte la cuenta principal de Stellar controlada por el Consejo y su actividad pública en el explorador.',
                'cta' => 'Abrir la cuenta multifirma',
            ],
            'charter' => [
                'title' => 'Estatuto del fondo',
                'body' => 'Lea el estatuto que define los objetivos del fondo, el estatus de los donantes, los criterios del Consejo y las reglas de votación.',
                'cta' => 'Leer el estatuto',
            ],
        ],
    ],
    'reports' => [
        'heading' => 'Informes y subvenciones recientes',
        'lead' => 'Las decisiones públicas y el historial de subvenciones se mantienen de forma abierta. A continuación figuran las últimas subvenciones completadas que hoy aparecen en el registro público del fondo.',
        'updated_label' => 'Actualizado',
        'cta' => 'Abrir el registro público completo',
        'items' => [
            'munich' => 'Financiación parcial del viaje de un representante de MTLA a la conferencia de Múnich',
            'speech' => 'Patrocinio del concurso de ensayos "Part of Speech"',
            'crypto_book' => 'Patrocinio de la edición montenegrina de "Fundamentals of Cryptocurrencies"',
            'porcfest' => 'Patrocinio de la representación de Montelibero en Porcupine Freedom Festival 2025',
            'liberty_conf' => 'Patrocinio de la conferencia II Liberty Conf en Tiflis',
        ],
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
    'error' => [
        'title' => 'Solicitud de donación no válida',
        'invalid_amount' => 'Introduzca un monto válido mayor que 0 y no superior a 1.000.000.',
        'invalid_method' => 'Elija un método de donación compatible e inténtelo de nuevo.',
        'back_to_donate' => 'Volver al formulario de donación',
    ],
];
