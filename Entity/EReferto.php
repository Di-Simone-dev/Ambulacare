<?php
class EReferto
{
    private $IdReferto;
    private $oggetto;
    private $contenuto;
    private $IdImmagine;

    private $IdAppuntamento;
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

    public function getIdImmagine()
    {
        return $this->IdImmagine;
    }

    public function setIdImmagine($IdImmagine)
    {
        $this->IdImmagine = $IdImmagine;
    }

    public function getIdAppuntamento()
    {
        return $this->IdAppuntamento;
    }

    public function setIdAppuntamento($IdAppuntamento)
    {
        $this->IdAppuntamento = $IdAppuntamento;
    }


}
