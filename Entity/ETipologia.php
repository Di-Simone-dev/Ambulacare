<?php
class ETipologia
{
    private $IdTipologia;
    private $nome_tipologia;
    private static $entity = ETipologia::class;
    //costruttore
    public function __construct($IdTipologia,$nome_tipologia)
    {
        $this->IdTipologia=0;
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

    public function getNomeTipologia()
    {
        return $this->nome_tipologia;
    }

    public function setNomeTipologia($nome_tipologia)
    {
        $this->nome_tipologia = $nome_tipologia;
    }
}
