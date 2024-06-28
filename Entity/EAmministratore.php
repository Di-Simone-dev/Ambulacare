<?php
//CONVENZIONE: L'ATTRIBUTO CHE FA DA PK INIZIA CON IL MAIUSCOLO E GLI ALTRI IN MINUSCOLO
class EAmministratore
{
 
    private $IdAdmin;

    private $nome;

    private $cognome;

    private $email;

    private $password;

    private static $entity = EAmministratore::class;

    //costruttore
    public function __construct($nome, $cognome, $email,$password)
    {
        //$this->IdAdmin = $IdAdmin;
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->email = $email;
        $this->password = $password;
    }

    //metodi GET e SET di tutti gli attributi
    public static function getEntity(): string
    {
        return self::$entity;
    }

    public function getIdAdmin()
    {
        return $this->IdAdmin;
    }

    public function setIdAdmin($IdAdm)
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
