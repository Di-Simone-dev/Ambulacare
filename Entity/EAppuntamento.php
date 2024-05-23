<?php

class EAppuntamento
{
    private $IdAppuntamento;

    private $stato;
    
    private $paziente;

    private static $entity = EAppuntamento::class;
    //costruttore
    public function __construct($IdAppuntamento, $stato)
    {
        //$this->$IdAppuntamento=$IdAppuntamento; questo non dovrebbe essere strettamente necessario(guardare i post nell'altro progetto)
        $this->stato=$stato;

    }
    //metodi get e set 
    public function getIdAppuntamento()
    {
        return $this->IdAppuntamento;
    }

    public function setIdAppuntamento($IdAppuntamento)
    {
        $this->IdAppuntamento = $IdAppuntamento;
    }

    public function getStato()
    {
        return $this->stato;
    }

    public function setStato($stato)
    {
        $this->stato = $stato;
    }

    public function getPaziente()
    {
        return $this->paziente;
    }

    public function setpaziente($paziente)
    {
        $this->stato = $paziente;
    }

}
