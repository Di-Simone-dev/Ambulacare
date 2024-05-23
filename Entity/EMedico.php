<?php
class EMedico
{

    private $IdMedico;

    private $nome;

    private $cognome;

    private $email;

    private $password;

    private $tipologia;

    private $attivo=true;

    private float $costo;    //Un int è più semplice ma possiamo tenere float

    private static $entity = EMedico::class;
    //costruttore
    public function __construct($IdMedico,$nome,$cognome,$email, $password, $attivo, $tipologia)
    {
        $this->IdMed= $IdMedico;
        $this->nome=$nome;
        $this->cognome=$cognome;
        $this->email=$email;
        $this->password=$password;
        $this->attivo=true;  
        $this->tipologia=$tipologia;

    }

    //metodi
    public function getIdMedico()
    {
        return $this->IdMedico;
    }

    public function setIdMed($IdMedico)
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

    public function isAttivo()   //potrebbe essere cambiato a get ma bisogna ricordarsene (sarebbe meglio per uniformare il tutto)
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
        return $this->tipologia;
    }

    public function setTipologia($tipologia)
    {
        $this->tipologia = $tipologia;
    }
}
