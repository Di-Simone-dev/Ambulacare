<?php
class ERecensione
{
    private $IdRecensione;
    private $oggetto;
    private $contenuto;
    private float $valutazione;

    private static $entity = ERecensione::class;
    //costruttore
    public function __construct($IdRecensione,$oggetto,$contenuto,$valutazione)
    {
        $this->IdRecensione=0;
        $this->oggetto=$oggetto;
        $this->contenuto=$contenuto;
        $this->valutazione=$valutazione

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
}
