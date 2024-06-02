<?php

class EFasciaoraria
{

    private $IdFascia_oraria;

    private DateTime $data;

    //private $ora_inizio;   //questa non sarebbe una datetime ma una stringa nella pratica (solo ora scritta)
                            //QUESTA SAREBBE RICAVABILE DA $DATA, QUESTA è UNA RIDONDANZA ma probabilmente conviene tenerla

    private $calendario;

    private static $entity = EFasciaoraria::class;
    //costruttore
    public function __construct($data)
    {
        //$this->IdFascia_oraria;  l'id non va nel costruttore, perchè si mette con il metodo setIdFasciaOraria()
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

    public function setData(DateTime $data): void
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
