<?php
class EMedico
{

    private $IdMed;

    private $nome;

    private $cognome;

    private $email;
    private $password;

    private $tipologia;
    private $attivo=true;

    private float $costo;
    //costruttore
    public function __construct($IdMed,$nome,$cognome,$email, $password, $attivo, $tipologia)
    {
        $this->IdMed= $IdMed;
        $this->nome=$nome;
        $this->cognome=$cognome;
        $this->email=$email;
        $this->password=$password;
        $this->attivo=true;
        $this->tipologia=$tipologia;

    }

    //metodi
    public function getIdMed()
    {
        return $this->IdMed;
    }

    public function setIdMed($IdMed)
    {
        $this->IdMed = $IdMed;

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

    public function isAttivo()
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
