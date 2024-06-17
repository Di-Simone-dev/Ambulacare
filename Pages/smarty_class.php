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
                '',
                '17:30',
            ],
        ],
        [
            'giorno'=>'Mercoledì 29/05',
            'orari' => [
                '',
                '15:30',
                '16:30',
                '17:30',
            ],
        ],
        [
            'giorno'=>'Giovedì 27/05',
            'orari' => [
                '14:30',
                '15:30',
                '16:30',
                '',
            ],
        ],
    ]);

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

$smarty->display("index.tpl");