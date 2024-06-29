<?php
class ERisposta
{
    private $IdRisposta;
    private $contenuto;
    private $data_creazione;
    private $recensione;   //FK senza ID
    private $medico;  //FK SENZA ID
    private static $entity = ERisposta::class;
    //constructor
    public function __construct($contenuto,$data_creazione)
    {
        //$this->IdRisposta=0; non va messo nel costruttore
        $this->contenuto=$contenuto;
        $this->data_creazione=$data_creazione;

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

    //4 METODI PER LA DATA
    public function getDatacreazione()
    {
        return $this->data_creazione;
    }
    private function setDatacreazioneora(){
        $data = new DateTime("now");
        $this->data_creazione = $data->format('Y-m-d H:i:s');  //in teoria dovrebbe settare un valore sensato
    }

    public function getData_creazionestringa()   //ritorna una stringa
    {
        return $this->data_creazione->format('Y-m-d H:i:s');
    }

    public function setData_creazione($data_creazione){
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
