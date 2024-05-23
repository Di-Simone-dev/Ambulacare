<?php

class EFasciaoraria
{

    private $IdFascia_oraria;

    private DateTime $data;

    private $ora_inizio;   //questa non sarebbe una datetime ma una stringa nella pratica (solo ora scritta)

    private static $entity = EFasciaoraria::class;
    //costruttore
    public function __construct($IdFascia_oraria,$data,$ora_inizio)
    {
        //$this->IdFascia_oraria=0;  l'id non va nel costruttore
        $this->data=$data;
        $this->ora_inizio=$ora_inizio;

    }
    //metodi set e get
    public function getIdFasciaoraria()
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

    public function getOrainizio()
    {
        return $this->ora_inizio;
    }

    public function setOrainizio(DateTime $ora_inizio)
    {
        $this->ora_inizio = $ora_inizio;
    }
}
