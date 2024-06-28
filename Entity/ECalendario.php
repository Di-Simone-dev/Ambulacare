<?php

class ECalendario
{

    private $IdCalendario;

    private $medico;  //FK

    private static $entity = ECalendario::class;
    //costruttore
    public function __construct()
    {
        //$this->$IdCalendario=$IdCalendario;  PK
        //$this->$medico=$medico; FK 

    }
    //metodi get e set
    public function getIdCalendario()
    {
        return $this->IdCalendario;
    }

    public function setIdCalendario($IdCalendario)
    {
        $this->IdCalendario = $IdCalendario;
    }

    public function getMedico()
    {
        return $this->medico;
    }

    public function setMedico($medico)
    {
        $this->medico = $medico;
    }


}
