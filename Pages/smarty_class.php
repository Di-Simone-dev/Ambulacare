<?php
require '../vendor/autoload.php';

use Smarty\Smarty;

$smarty = new Smarty();
$smarty->assign('slots', [
    [
        'p' => 'Luca',
        'titolo' => 'Buono',
        'descrizione' => 'non male',
    ],
    [
        'paziente' => 'Maurizio',
        'titolo' => 'Bua',
        'descrizione' => 'aiiiiiii',
    ]
]);

$smarty->assign('fascieorarie', [
    [
        'giorno' => 'Lunedì 27/05',
        'orari' => [
            '14:30',
            '15:30',
            '16:30',
            '17:30',
        ],
    ],
    [
        'giorno' => 'Martedì 28/05',
        'orari' => [
            '14:30',
            '15:30',
            '17:30',
        ],
    ],
    [
        'giorno' => 'Mercoledì 29/05',
        'orari' => [
            '15:30',
            '16:30',
            '17:30',
        ],
    ],
    [
        'giorno' => 'Giovedì 30/05',
        'orari' => [
            '14:30',
            '15:30',
            '16:30',
        ],
    ],
    [
        'giorno' => 'Venerdì 31/05',
        'orari' => [
            '8:30',
            '9:30',
            '10:30',
        ],
    ],
    [
        'giorno' => 'Sabato 1/06',
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

$smarty->assign('recensioni', [
    [
        'valutazione' => 0,
        'paziente' => 'Luca Avenia',
        'titolo' => 'Buono',
        'descrizione' => 'non male',
        'medico' => 'Emanuele Papile',
        'data' => '21/12/2022',
    ],
    [
        'valutazione' => 5,
        'paziente' => 'Maurizio Vinicio',
        'titolo' => 'Bua',
        'descrizione' => 'daiiiiiii',
        'medico' => 'Emanuele Papile',
        'data' => '21/12/2022',
    ],
    [
        'valutazione' => 5,
        'paziente' => 'Maurizio Vinicio',
        'titolo' => 'Bua',
        'descrizione' => 'daiiiiiii',
        'medico' => 'Emanuele Papile',
        'data' => '21/12/2022',
    ],
    [
        'valutazione' => 5,
        'paziente' => 'Maurizio Vinicio',
        'titolo' => 'Bua',
        'descrizione' => 'daiiiiiii',
        'medico' => 'Emanuele Papile',
        'data' => '21/12/2022',
    ],
    [
        'valutazione' => 5,
        'paziente' => 'Maurizio Vinicio',
        'titolo' => 'Bua',
        'descrizione' => 'daiiiiiii',
        'medico' => 'Emanuele Papile',
        'data' => '21/12/2022',
    ],
]);

$smarty->assign('esame', [
    'medico' => [
        'nome' => 'Emanuele Papile',
        'valutazione' => "2",
    ],
    'categoria' => 'Neurologia',
    'costo' => '1000',
    'orario' => '11:30',
    'data' => '01/01/2021',
    'paziente' => 'Giacomo Giannini',
    'nome' => 'Taaaaaac (alla milanese)',
]);

$smarty->assign('medici', [
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

$smarty->assign('appuntamenti', [
    [
        'paziente' => [
            'nome' => 'Piero',
            'cognome' => 'Marcozzi',
        ],
        'data' => '01/01/2025',
        'orario' => '11:30',
        'categoria' => 'Psichiatria',
        'medico' => 'Emanuele Papile',
        'costo' => '10',
    ],
    [
        'paziente' => [
            'nome' => 'Laura',
            'cognome' => 'Tarantino',
        ],
        'data' => '01/01/2027',
        'orario' => '11:30',
        'categoria' => 'Psichiatria',
        'medico' => 'Emanuele Papile',
        'costo' => '10',
    ],
    [
        'paziente' => [
            'nome' => 'Giacomo',
            'cognome' => 'Giannini',
        ],
        'data' => '01/01/2028',
        'orario' => '11:30',
        'categoria' => 'Dermatologia - sezione bruciature',
        'medico' => 'Emanuele Papile',
        'costo' => '10',
    ],
]);

$smarty->assign('categorie', [
    [
        'nome' => 'Psichiatria',
        'id' => 1,
    ],
    [
        'nome' => 'Neurologia',
        'id' => 2,
    ],
    [
        'nome' => 'Oncologia',
        'id' => 3,
    ],
]);

$smarty->assign('esami', [
    [
        'medico' => [
            'nome' => 'Emanuele Papile',
            'valutazione' => "2",
        ],
        'categoria' => 'Neurologia',
        'costo' => '1000',
        'orario' => '11:30',
        'data' => '01/01/2021',
        'paziente' => 'Giacomo Giannini',
        'nome' => 'Taaaaaac (alla milanese)',
    ],
]);

$smarty->assign('statistiche',[
    [
        "data" => "21/05",
        'numero' => 3,
    ],
    [
        "data" => "22/05",
        'numero' => 3,
    ],
    [
        "data" => "23/05",
        'numero' => 6,
    ],
    [
        "data" => "24/05",
        'numero' => 3,
    ],
    [
        "data" => "25/05",
        'numero' => 8,
    ],
    [
        "data" => "26/05",
        'numero' => 1,
    ],
]);

$smarty->assign('data1', '21/05');
$smarty->assign('data1', '26/05');
$smarty->assign('guadagno', '1000');

$smarty->display("visualizzastoricoesami_medico.tpl");
