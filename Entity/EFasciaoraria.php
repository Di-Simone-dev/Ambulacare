<?php

class EFasciaoraria
{

    private $IdFascia_oraria;

    private DateTime $data;

    private DateTime $ora_inizio;

    private static $entity = EFasciaoraria::class;
    //costruttore
    public function __construct($IdFascia_oraria,$data,$ora_inizio)
    {
        $this->IdFascia_oraria=0;
        $this->data=$data;
        $this->ora_inizio=$ora_inizio;

    }
    //metodi
    public function getIdFasciaOraria()
    {
        return $this->IdFascia_oraria;
    }

    public function setIdFasciaOraria($IdFascia_oraria)
    {
        $this->IdFascia_oraria = $IdFascia_oraria;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData(DateTime $data)
    {
        $this->data = $data;
    }

    public function getOraInizio()
    {
        return $this->ora_inizio;
    }

    public function setOraInizio(DateTime $ora_inizio)
    {
        $this->ora_inizio = $ora_inizio;
    }
}
