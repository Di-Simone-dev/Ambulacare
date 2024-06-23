<?php
class EReferto
{
    private $IdReferto;
    private $oggetto;
    private $contenuto;
    private $IdImmagine;  //FK CON ID

    private $Appuntamento; //FK Senza ID
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

    public function getAppuntamento()
    {
        return $this->Appuntamento;
    }

    public function setAppuntamento($Appuntamento)
    {
        $this->Appuntamento = $Appuntamento;
    }


}
