<?php

class ECalendario
{

    private $IdCalendario;

    private $medico;

    private static $entity = ECalendario::class;
    //costruttore
    public function __construct($IdCalendario,$Idmedico)
    {
        //$this->$IdCalendario=$IdCalendario;  QUI BISOGNA CAPIRE COSA FARE PERCHè NEL COSTRUTTORE NON CI VANNO NE' IL MEDICO NE' L'ID

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
