<?php
class ERisposta
{
    private $IdRisposta;
    private $contenuto;
    private DateTime $data_creazione;
    private $recensione;
    private $medico;
    private static $entity = ERisposta::class;
    //constructor
    public function __construct($IdRisposta,$contenuto)
    {
        //$this->IdRisposta=0; non va messo nel costruttore
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

    public function getData_creazione()
    {
        return $this->data_creazione;
    }

    public function setData_creazione($data_creazione)
    {
        $this->data_creazione = $data_creazione;
    }

    public function getRecensione()
    {
        return $this->recensione;
    }

    public function setRecensione($recensione)
    {
        $this->recensione = $recensione;
    }

    public function getMedico()
    {
        return $this->medico;
    }

    public function setMedico($medico)
    {
        $this->medico = $medico;
    }
}
