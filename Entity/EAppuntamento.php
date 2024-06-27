<?php

class EAppuntamento
{
    private $IdAppuntamento;

    private $costo; //per conservare la storia integra se il medico cambia il suo costo
    
    private $paziente;  //FK BISOGNA CAPIRE SE METTERE L'ID O NO 

    private $fascia_oraria;   //FK

    private static $entity = EAppuntamento::class;
    //costruttore
    public function __construct($costo)
    {
        //$this->$IdAppuntamento=$IdAppuntamento; PK
        $this->costo=$costo;
        //$this->$paziente=$paziente; FK
        //$this->$fascia_oraria=$fascia_oraria; FK

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

    
    public function getCosto()
    {
        return $this->costo;
    }

    public function setCosto($costo)
    {
        $this->costo = $costo;
    }
    

    public function getPaziente()
    {
        return $this->paziente;
    }

    public function setpaziente($paziente)
    {
        $this->paziente = $paziente;
    }
    public function getFasciaoraria()
    {
        return $this->fascia_oraria;
    }

    public function setFasciaoraria($IdFascia_oraria)
    {
        $this->fascia_oraria = $IdFascia_oraria;
    }

}
