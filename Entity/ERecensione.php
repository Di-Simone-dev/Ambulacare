<<<<<<< HEAD
<?php
class ERecensione
{
    private $IdRecensione;
    private $titolo;
    private $contenuto;
    private float $valutazione;
    private DateTime $data_creazione;

    private $medico;  //FK senza id
    
    private $paziente;  //FK senza id

    private static $entity = ERecensione::class;
    //costruttore
    public function __construct($titolo,$contenuto,$valutazione)
    {
        //$this->IdRecensione=0; //l'id non va nel costruttore
        $this->titolo=$titolo;
        $this->contenuto=$contenuto;
        $this->valutazione=$valutazione;
        $this->setData_creazioneora();

    }
    //metodi

    public function getIdRecensione()
    {
        return $this->IdRecensione;
    }

    public function setIdRecensione($IdRecensione)
    {
        $this->IdRecensione = $IdRecensione;
    }

    public function getTitolo()
    {
        return $this->titolo;
    }

    public function setTitolo($titolo)
    {
        $this->titolo = $titolo;
    }

    public function getContenuto()
    {
        return $this->contenuto;
    }

    public function setContenuto($contenuto)
    {
        $this->contenuto = $contenuto;
    }

    public function getValutazione()
    {
        return $this->valutazione;
    }

    public function setValutazione(float $valutazione)
    {
        $this->valutazione = $valutazione;
    }

    //4 METODI PER LA DATA
    public function getDatacreazione()
    {
        return $this->data_creazione;
    }
    private function setData_creazioneora(){
        $this->data_creazione = new DateTime("now");  //in teoria dovrebbe settare un valore sensato
    }

    public function getTimetostring()   //ritorna una stringa
    {
        return $this->data_creazione->format('Y-m-d H:i:s');
    }

    public function setData_creazione($data_creazione){
        $this->data_creazione = $data_creazione;
    }

    public function getMedico()
    {
        return $this->medico;
    }

    public function setMedico($medico)
    {
        $this->medico = $medico;
    }

    public function getPaziente()
    {
        return $this->medico;
    }

    public function setPaziente($paziente)
    {
        $this->paziente = $paziente;
    }









}
=======
<?php
class ERecensione
{
    private $IdRecensione;
    private $titolo;
    private $contenuto;
    private float $valutazione;
    private DateTime $data_creazione;

    private $medico;  //FK senza id
    
    private $paziente;  //FK senza id

    private static $entity = ERecensione::class;
    //costruttore
    public function __construct($titolo,$contenuto,$valutazione)
    {
        //$this->IdRecensione=0; //l'id non va nel costruttore
        $this->titolo=$titolo;
        $this->contenuto=$contenuto;
        $this->valutazione=$valutazione;
        $this->setData_creazioneora();

    }
    //metodi

    public function getIdRecensione()
    {
        return $this->IdRecensione;
    }

    public function setIdRecensione($IdRecensione)
    {
        $this->IdRecensione = $IdRecensione;
    }

    public function getTitolo()
    {
        return $this->titolo;
    }

    public function setTitolo($titolo)
    {
        $this->titolo = $titolo;
    }

    public function getContenuto()
    {
        return $this->contenuto;
    }

    public function setContenuto($contenuto)
    {
        $this->contenuto = $contenuto;
    }

    public function getValutazione()
    {
        return $this->valutazione;
    }

    public function setValutazione(float $valutazione)
    {
        $this->valutazione = $valutazione;
    }

    //4 METODI PER LA DATA
    public function getDatacreazione()
    {
        return $this->data_creazione;
    }
    private function setData_creazioneora(){
        $this->data_creazione = new DateTime("now");  //in teoria dovrebbe settare un valore sensato
    }

    public function getTimetostring()   //ritorna una stringa
    {
        return $this->data_creazione->format('Y-m-d H:i:s');
    }

    public function setData_creazione($data_creazione){
        $this->data_creazione = $data_creazione;
    }

    public function getMedico()
    {
        return $this->medico;
    }

    public function setMedico($medico)
    {
        $this->medico = $medico;
    }

    public function getPaziente()
    {
        return $this->medico;
    }

    public function setPaziente($paziente)
    {
        $this->paziente = $paziente;
    }









}
>>>>>>> origin/main
