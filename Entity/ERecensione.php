<?php
class ERecensione
{
    private $IdRecensione;
    private $oggetto;
    private $contenuto;
    private float $valutazione;

    private $medico;
    
    private $paziente;

    private static $entity = ERecensione::class;
    //costruttore
    public function __construct($IdRecensione,$oggetto,$contenuto,$valutazione)
    {
        //$this->IdRecensione=0; //l'id non va nel costruttore
        $this->oggetto=$oggetto;
        $this->contenuto=$contenuto;
        $this->valutazione=$valutazione;

    }
    //metodi

    public function getIdRecensione()
    {
        return $this->IdRecensione;
    }

    public function setIdRecensione($IdRecensione)
    {
        $this->IdRecensione = $IdRecensione;
    }

    public function getOggetto()
    {
        return $this->oggetto;
    }

    public function setOggetto($oggetto)
    {
        $this->oggetto = $oggetto;
    }

    public function getContenuto()
    {
        return $this->contenuto;
    }

    public function setContenuto($contenuto)
    {
        $this->contenuto = $contenuto;
    }

    public function getValutazione()
    {
        return $this->valutazione;
    }

    public function setValutazione(float $valutazione)
    {
        $this->valutazione = $valutazione;
    }

    public function getMedico()
    {
        return $this->medico;
    }

    public function setMedico($medico)
    {
        $this->medico = $medico;
    }

    public function getPaziente()
    {
        return $this->medico;
    }

    public function setPaziente($paziente)
    {
        $this->paziente = $paziente;
    }









}
