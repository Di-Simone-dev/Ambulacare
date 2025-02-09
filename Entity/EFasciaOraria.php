<?php

class EFasciaOraria
{

    private $IdFascia_oraria;

    private $data;


    private $calendario;   //FK

    private static $entity = EFasciaOraria::class;
    //costruttore
    public function __construct($data)
    {
        //$this->IdFascia_oraria;  l'id non va nel costruttore, perchè si mette con il metodo setIdFasciaOraria()
        /* $time = new DateTime($data); */
        $this->data=$data;
        //$this->ora_inizio=$ora_inizio;

    }
    //metodi set e get
    public function getIdFasciaoraria()
    {
        return $this->IdFascia_oraria;
    }

    public function setIdFasciaOraria($IdFascia_oraria): void
    {
        $this->IdFascia_oraria = $IdFascia_oraria;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getDatatostring()
    {
        return $this->data;
        //$format4 = $dateTime->format('G:i d/m/y'); // Output:03/06/23 03:45
    }

    public function setData($data): void
    {
        $this->data = $data;
    }

    /*
    public function getOrainizio()
    {
        return $this->ora_inizio;
    }

    public function setOrainizio(DateTime $ora_inizio): void
    {
        $this->ora_inizio = $ora_inizio;
    }
    */

    public function getCalendario()
    {
        return $this->calendario;
    }

    public function setCalendario(ECalendario $calendario): void
    {
        $this->calendario = $calendario;
    }

}
