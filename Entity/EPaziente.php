<?php

class EPaziente
{
    private $IdPaz;
    private $nome;

    private $cognome;
    private $email;
    private $password;
    private $codice_fiscale;
    private DateTime $data_nascita;
    private $luogo_nascita;
    private $residenza;
    private $numero_telefono;
    private $attivo=true;
    private static $entity = EPaziente::class;
    //costruttore
    public function __construct($IdPaz,$nome,$cognome,$email, $password, $codice_fiscale,$data_nascita,$luogo_nascita,$residenza,$numero_telefono,$attivo)
    {
        $this->IdPaz= $IdPaz;
        $this->nome=$nome;
        $this->cognome=$cognome;
        $this->email=$email;
        $this->password=$password;
        $this->codice_fiscale=$codice_fiscale;
        $this->data_nascita=$data_nascita;
        $this->luogo_nascita=$luogo_nascita;
        $this->residenza=$residenza;
        $this->numero_telefono=$numero_telefono;
        $this->attivo=true;

    }
    //metodi
    public function getIdPaz()
    {
        return $this->IdPaz;
    }

    public function setIdPaz($IdPaz)
    {
        $this->IdPaz = $IdPaz;
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

    public function setEmail($email)
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

    public function getCodiceFiscale()
    {
        return $this->codice_fiscale;
    }

    public function setCodiceFiscale($codice_fiscale)
    {
        $this->codice_fiscale = $codice_fiscale;
    }

    public function getDataNascita()
    {
        return $this->data_nascita;
    }

    public function setDataNascita(DateTime $data_nascita)
    {
        $this->data_nascita = $data_nascita;
    }

    public function getLuogoNascita()
    {
        return $this->luogo_nascita;
    }

    public function setLuogoNascita(string $luogo_nascita)
    {
        $this->luogo_nascita = $luogo_nascita;
    }

    public function getResidenza()
    {
        return $this->residenza;
    }

    public function setResidenza(string $residenza)
    {
        $this->residenza = $residenza;
    }

    public function getNumeroTelefono()
    {
        return $this->numero_telefono;
    }

    public function setNumeroTelefono($numero_telefono)
    {
        $this->numero_telefono = $numero_telefono;
    }

    public function isAttivo()
    {
        return $this->attivo;
    }

    public function setAttivo($bool)
    {
        $this->attivo = $bool;
    }
}
