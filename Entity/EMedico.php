<?php
class EMedico
{

    private $IdMedico;

    private $nome;

    private $cognome;

    private $email;

    private $password;

    private $attivo;

    private float $costo;    //Un int è più semplice ma possiamo tenere float

    private $IdImmagine;  //FK CON ID
    private $Tipologia; //FK SENZA ID

    private static $entity = EMedico::class;
    //costruttore
    public function __construct($nome,$cognome,$email, $password, $attivo,$costo)
    {
        //$this->IdMedico= $IdMedico; PRIMARY KEY AUTO INCREMENT=> NON VA MESSA NEL COSTRUTTORE
        $this->nome=$nome;
        $this->cognome=$cognome;
        $this->email=$email;
        $this->password=$password;
        $this->attivo=$attivo;
        $this->costo=$costo;
        //$this->tipologia=$tipologia; FOREIGN KEY=> NON VA MESSA NEL COSTRUTTORE
        //$this->immagine=$immagine; FOREIGN KEY=> NON VA MESSA NEL COSTRUTTORE

    }

    //metodi
    public function getIdMedico()
    {
        return $this->IdMedico;
    }

    public function setIdMedico($IdMedico)
    {
        $this->IdMedico = $IdMedico;

    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getCognome()
    {
        return $this->cognome;
    }

    public function setCognome($cognome)
    {
        $this->cognome = $cognome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getAttivo()   //potrebbe essere cambiato a get ma bisogna ricordarsene (sarebbe meglio per uniformare il tutto)
    {
        return $this->attivo;
    }

    public function setAttivo($bool)
    {
        $this->attivo = $bool;
    }

    public function getCosto()
    {
        return $this->costo;
    }

    public function setCosto(float $costo)
    {
        $this->costo = $costo;
    }

    public function getTipologia()
    {
        return $this->Tipologia;
    }

    public function setTipologia($Tipologia)
    {
        $this->Tipologia = $Tipologia;
    }

    public function getIdImmagine()
    {
        return $this->IdImmagine;
    }

    public function setIdImmagine($IdImmagine)
    {
        $this->IdImmagine = $IdImmagine;
    }
}
