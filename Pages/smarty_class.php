<?php
require '../vendor/autoload.php';
use Smarty\Smarty;
$smarty = new Smarty();
$smarty->assign('slots',[
    [
        'p'=>'Luca',
        'titolo'=>'Buono',
        'descrizione' => 'non male',
    ],
    [
        'paziente'=>'Maurizio',
        'titolo'=>'Bua',
        'descrizione' => 'aiiiiiii',
    ]
    ]);

    $smarty->assign('fascieorarie',[
        [
            'giorno'=>'Lunedì 27/05',
            'orari' => [
                '14:30',
                '15:30',
                '16:30',
                '17:30',
            ],
        ],
        [
            'giorno'=>'Martedì 28/05',
            'orari' => [
                '14:30',
                '15:30',
                '17:30',
            ],
        ],
        [
            'giorno'=>'Mercoledì 29/05',
            'orari' => [
                '15:30',
                '16:30',
                '17:30',
            ],
        ],
        [
            'giorno'=>'Giovedì 30/05',
            'orari' => [
                '14:30',
                '15:30',
                '16:30',
            ],
        ],
        [
            'giorno'=>'Venerdì 31/05',
            'orari' => [
                '8:30',
                '9:30',
                '10:30',
            ],  
        ],
        [
            'giorno'=>'Sabato 1/06',
            'orari' => [
                '8:30',
                '9:30',
                '10:30',
                '11:30',
                '12:30',
            ],  
        ],
    ]);

    $smarty->assign('maxdim', 5);

$smarty->assign('recensioni',[
    [
        'valutazione' => 0,
        'paziente'=>'Luca Avenia',
        'titolo'=>'Buono',
        'descrizione' => 'non male',
    ],
    [
        'valutazione' => 5,
        'paziente'=>'Maurizio Vinicio',
        'titolo'=>'Bua',
        'descrizione' => 'daiiiiiii',
    ],
    [
        'valutazione' => 5,
        'paziente'=>'Maurizio Vinicio',
        'titolo'=>'Bua',
        'descrizione' => 'daiiiiiii',
    ],
    [
        'valutazione' => 5,
        'paziente'=>'Maurizio Vinicio',
        'titolo'=>'Bua',
        'descrizione' => 'daiiiiiii',
    ],
    [
        'valutazione' => 5,
        'paziente'=>'Maurizio Vinicio',
        'titolo'=>'Bua',
        'descrizione' => 'daiiiiiii',
    ],
    ]);

$smarty->assign('esame', [
    'medico' => 'Emanuele Papile',
    'categoria' => 'Neurologia',
    'costo' => '1000',
    'orario' => '11:30',
    'data' => '01/01/2021',
    'paziente' => 'Giacomo Giannini'
]);

$smarty->assign('medici',[
    [
        'nome' => 'Emanuele',
        'cognome' => 'Papile',
        'stato' => 'Bloccato',
    ],
    [
        'nome' => 'Andrea',
        'cognome' => 'Luca Di Simone',
        'stato' => 'Sbloccato',
    ],
    [
        'nome' => 'Andrea',
        'cognome' => 'Sorge',
        'stato' => 'Bloccato',
    ],
]);

$smarty->display("moderazioneaccount_admin.tpl");