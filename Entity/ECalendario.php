<?php

class ECalendario
{

    private int $IdCalendario;

    private static $entity = ECalendario::class;
    //costruttore
    public function __construct($IdCalendario)
    {
        $this->$IdCalendario=0;

    }
    //metodi
    public function getIdCalendario()
    {
        return $this->IdCalendario;
    }

    public function setIdCalendario($IdCalendario)
    {
        $this->IdCalendario = $IdCalendario;
    }
}
