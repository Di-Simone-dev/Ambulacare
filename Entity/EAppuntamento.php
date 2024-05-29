<?php

class EAppuntamento
{
    private $IdAppuntamento;

    private $stato;
    
    private $paziente;  //FK

    private $fascia_oraria;   //FK

    private static $entity = EAppuntamento::class;
    //costruttore
    public function __construct($IdAppuntamento, $stato)
    {
        //$this->$IdAppuntamento=$IdAppuntamento; PK
        $this->stato=$stato;
        //$this->$paziente=$paziente; PK
        //$this->$fascia_oraria=$fascia_oraria; PK

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
    public function getFascia_Oraria()
    {
        return $this->paziente;
    }

    public function setFascia_Oraria($IdFascia_oraria)
    {
        $this->fascia_oraria = $IdFascia_oraria;
    }

}
