<?php
class ERisposta
{
    private $IdRisposta;
    private $contenuto;
    private static $entity = ERisposta::class;
    //constructor
    public function __construct($IdRisposta,$contenuto)
    {
        $this->IdRisposta=0;
        $this->contenuto=$contenuto;

    }
    //metodi
    public function getIdRisposta()
    {
        return $this->IdRisposta;
    }

    public function setIdRisposta($IdRisposta)
    {
        $this->IdRisposta = $IdRisposta;
    }

    public function getContenuto()
    {
        return $this->contenuto;
    }

    public function setContenuto($contenuto)
    {
        $this->contenuto = $contenuto;
    }
}
