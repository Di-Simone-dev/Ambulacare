<?php
class EReferto
{
    private $IdReferto;
    private $oggetto;
    private $contenuto;
    private $file;

    private static $entity = EReferto::class;
    //costruttore
    public function __construct($IdReferto,$oggetto,$contenuto,$file)
    {
        $this->IdReferto=0;
        $this->oggetto=$oggetto;
        $this->contenuto=$contenuto;
        $this->file=0;

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

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;
    }
}
