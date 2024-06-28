<?php

class EPaziente
{
    private $IdPaziente;
    private $nome;
    private $cognome;
    private $email;
    private $password;
    private $codice_fiscale;
    private $data_nascita;
    private $luogo_nascita;
    private $residenza;
    private $numero_telefono;
    private $attivo;
    private static $entity = EPaziente::class;
    //costruttore
    public function __construct($nome,$cognome,$email, $password, $codice_fiscale,$data_nascita,$luogo_nascita,$residenza,$numero_telefono,$attivo)
    {
        //$this->IdPaziente= $IdPaziente;
        $this->nome=$nome;
        $this->cognome=$cognome;
        $this->email=$email;
        $this->password=$password;
        $this->codice_fiscale=$codice_fiscale;
        $this->data_nascita=$data_nascita;
        $this->luogo_nascita=$luogo_nascita;
        $this->residenza=$residenza;
        $this->numero_telefono=$numero_telefono;
        $this->attivo=$attivo;

    }
    //metodi
    public static function getEntity(): string
    {
        return self::$entity;
    }
    public function getIdPaziente()
    {
        return $this->IdPaziente;
    }

    public function setIdPaziente($IdPaziente)
    {
        $this->IdPaziente = $IdPaziente;
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

    public function getNumerotelefono()
    {
        return $this->numero_telefono;
    }

    public function setNumerotelefono($numero_telefono)
    {
        $this->numero_telefono = $numero_telefono;
    }

    public function getAttivo()       //ricordiamoci che non è un get
    {
        return $this->attivo;
    }

    public function setAttivo($bool)
    {
        $this->attivo = $bool;
    }
}
