<?php
class EReferto
{
    private $IdReferto;
    private $oggetto;
    private $contenuto;
    private $immagine;

    private $appuntamento;
    private static $entity = EReferto::class;
    //costruttore
    public function __construct($oggetto,$contenuto)
    {
        //$this->IdReferto=0;  non ci va l'id nel costruttore
        $this->oggetto=$oggetto;
        $this->contenuto=$contenuto;
        //$this->immagine=immagine;  //FK 

    }
    //metodi
    public function getIdReferto()
    {
        return $this->IdReferto;
    }

    public function setIdReferto($IdReferto)
    {
        $this->IdReferto = $IdReferto;
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

    public function getImmagine()
    {
        return $this->immagine;
    }

    public function setImmagine($immagine)
    {
        $this->immagine = $immagine;
    }

    public function getAppuntamento()
    {
        return $this->appuntamento;
    }

    public function setAppuntamento($appuntamento)
    {
        $this->appuntamento = $appuntamento;
    }


}
