<?php
class ETipologia
{
    private $IdTipologia;
    private $nome_tipologia;
    private static $entity = ETipologia::class;
    //costruttore
    public function __construct($IdTipologia,$nome_tipologia)
    {
        //$this->IdTipologia=0; non va messo nel costruttore
        $this->nome_tipologia=$nome_tipologia;

    }
    //metodi
    public function getIdTipologia()
    {
        return $this->IdTipologia;
    }

    public function setIdTipologia($IdTipologia)
    {
        $this->IdTipologia = $IdTipologia;
    }

    public function getNometipologia()
    {
        return $this->nome_tipologia;
    }

    public function setNometipologia($nome_tipologia)
    {
        $this->nome_tipologia = $nome_tipologia;
    }
}
