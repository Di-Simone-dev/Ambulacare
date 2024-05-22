<?php

class EAppuntamento
{
    private $IdApp;

    private $stato;

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
