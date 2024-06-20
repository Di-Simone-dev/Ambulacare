<?php


//controller fittizio
//solo per test
class CAdmin
{


    static public function index()
    {
        $amm = new VAmministratore();
        $amm->loginOk();
    }

    public static function moderazione()
    {
        $medici = [
            [
                'id' => 1,
                'nome' => 'Emanuele',
                'cognome' => 'Papile',
                'stato' => 'Bloccato',
            ],
            [
                'id' => 2,
                'nome' => 'Andrea',
                'cognome' => 'Luca Di Simone',
                'stato' => 'Sbloccato',
            ],
            [
                'id' => 3,
                'nome' => 'Andrea',
                'cognome' => 'Sorge',
                'stato' => 'Bloccato',
            ],
        ];
        $amm = new VAmministratore();
        $amm->moderazione($medici);
    }

    public static function bloccamedico($id)
    {
        echo "ID del medico da bloccare " . $id;
    }

    public static function modificaapp($app)
    {

        $esame = [
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
            'id' => $app,
        ];
        $maxdim = 5;

        $fasceorarie = [
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
        ];
        $amm = new VAmministratore();
        $amm->editApp($esame, $fasceorarie, $maxdim);
    }

    public static function visualizzaapp()
    {
        $app = [
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
                'id' => 1,
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
                'id' => 2,
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
                'id' => 3,
            ],
        ];
        $cat = [
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
        ];
        $amm = new VAmministratore();
        $amm->showAppuntPage($app, $cat);
    }

    public static function recensioni()
    {

        $amm = new VAmministratore();
        $recensioni = [
            [
                'id' => 1,
                'valutazione' => 0,
                'paziente' => 'Luca Avenia',
                'titolo' => 'Buono',
                'descrizione' => 'non male',
                'medico' => 'Emanuele Papile',
                'data' => '21/12/2022',
            ],
            [
                'id' => 1,
                'valutazione' => 5,
                'paziente' => 'Maurizio Vinicio',
                'titolo' => 'Bua',
                'descrizione' => 'daiiiiiii',
                'medico' => 'Emanuele Papile',
                'data' => '21/12/2022',
            ],
            [
                'id' => 1,
                'valutazione' => 5,
                'paziente' => 'Maurizio Vinicio',
                'titolo' => 'Bua',
                'descrizione' => 'daiiiiiii',
                'medico' => 'Emanuele Papile',
                'data' => '21/12/2022',
            ],
            [
                'id' => 1,
                'valutazione' => 5,
                'paziente' => 'Maurizio Vinicio',
                'titolo' => 'Bua',
                'descrizione' => 'daiiiiiii',
                'medico' => 'Emanuele Papile',
                'data' => '21/12/2022',
            ],
            [
                'id' => 1,
                'valutazione' => 5,
                'paziente' => 'Maurizio Vinicio',
                'titolo' => 'Bua',
                'descrizione' => 'daiiiiiii',
                'medico' => 'Emanuele Papile',
                'data' => '21/12/2022',
            ],
        ];
        $amm->showRevPage($recensioni);
    }

    public static function recensione($id)
    {
        echo ($id);
    }

    public static function esami()
    {
        $pazienti = [
            [
                'id' => 1,
                'nome' => "Gerry",
                'cognome' => 'Scotti',
                'data' => '07/08/1956',
            ],
            [
                'id' => 1,
                'nome' => "Gerry",
                'cognome' => 'Scotti',
                'data' => '07/08/1956',
            ],
            [
                'id' => 1,
                'nome' => "Gerry",
                'cognome' => 'Scotti',
                'data' => '07/08/1956',
            ],
        ];
        $amm = new VAmministratore();
        $amm->showPazPage($pazienti);
    }

    public static function esamipaziente($id)
    {

        $amm =  new VAmministratore();
        $amm->showStoricoEsami(
            [
                'nome' => 'pippo',
                'cognome' => 'baudo',
            ],
            [
                [
                    'medico' => [
                        'nome' => 'Emanuele Papile',
                        'valutazione' => "2",
                    ],
                    'categoria' => 'Neurologia',
                    'costo' => '1000',
                    'orario' => '11:30',
                    'data' => '01/01/2021',
                    'nome' => 'Taaaaaac (alla milanese)',
                    'referto' => true,
                ],
                [
                    'medico' => [
                        'nome' => 'Emanuele Papile',
                        'valutazione' => "2",
                    ],
                    'categoria' => 'Neurologia',
                    'costo' => '1000',
                    'orario' => '11:30',
                    'data' => '01/01/2021',
                    'nome' => 'Taaaaaac (alla milanese)',
                    'referto' => false,
                ],
                [
                    'medico' => [
                        'nome' => 'Emanuele Papile',
                        'valutazione' => "2",
                    ],
                    'categoria' => 'Neurologia',
                    'costo' => '1000',
                    'orario' => '11:30',
                    'data' => '01/01/2021',
                    'nome' => 'Taaaaaac (alla milanese)',
                    'referto' => true,
                ],
            ]
        );
    }
}
