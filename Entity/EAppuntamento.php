<?php

class EAppuntamento
{
    private $IdAppuntamento;

    private $costo; //per conservare la storia integra se il medico cambia il suo costo
    
    private $paziente;  //Oggetto Paziente legato con l'IdPaziente in foundation

    private $fascia_oraria;   //Oggetto FasciaOraria legato con l'IdPaziente in foundation

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
        $this->stato = $costo;
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

    public function setFasciaoraria($Fascia_oraria)
    {
        $this->fascia_oraria = $Fascia_oraria;
    }

}
