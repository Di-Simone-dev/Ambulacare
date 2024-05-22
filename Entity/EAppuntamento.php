<?php

class EAppuntamento
{
    private $IdApp;

    private $stato;

    private static $entity = EAppuntamento::class;
    //costruttore
    public function __construct($IdApp, $stato)
    {
        $this->$IdApp=0;
        $this->stato=$stato;

    }
    //metodi
    public function getIdApp()
    {
        return $this->IdApp;
    }

    public function setIdApp($IdApp)
    {
        $this->IdApp = $IdApp;
    }

    public function getStato()
    {
        return $this->stato;
    }

    public function setStato($stato)
    {
        $this->stato = $stato;
    }
}
