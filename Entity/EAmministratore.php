<?php

class EAmministratore
{
 
    private $IdAdm;

    private $nome;

    private $cognome;

    private $email;

    private $password;

    private static $entity = EAmministratore::class;

    //costruttore
    public function __construct($IdAdm, $nome, $cognome, $email,$password)
    {
        $this->IdAdm = $IdAdm;
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->email = $email;
        $this->password = $password;
    }

    //metodi
    public static function getEntity(): string
    {
        return self::$entity;
    }

    public function getIdAdm()
    {
        return $this->IdAdm;
    }

    public function setIdAdm($IdAdm)
    {
        $this->IdAdm = $IdAdm;

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
    
}
