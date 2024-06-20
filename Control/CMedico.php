<?php

//controller fittizio
//solo per test

class CMedico
{

    public static function index()
    {
        $doc = new VMedico();
        $doc->loginOk();
    }

    public static function storico()
    {
        $doc = new VMedico();
        $esami =
            [
                [
                    'paziente' => 'Piero Marcozzi',
                    'data' => '01/01/2025',
                    'orario' => '11:30',
                    'categoria' => 'Psichiatria',
                    'costo' => '10',
                    'id' => 1,
                    'referto' => true,
                ],
                [
                    'paziente' => 'Piero Marcozzi',
                    'data' => '01/01/2025',
                    'orario' => '11:30',
                    'categoria' => 'Psichiatria',
                    'costo' => '10',
                    'id' => 1,
                    'referto' => false,
                ],
                [
                    'paziente' => 'Piero Marcozzi',
                    'data' => '01/01/2025',
                    'orario' => '11:30',
                    'categoria' => 'Psichiatria',
                    'costo' => '10',
                    'id' => 1,
                    'referto' => true,
                ],
            ];
        $doc->showStoricoEsamiReferto($esami);
    }
}
