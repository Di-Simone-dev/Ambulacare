<?php

class EImmagine{

    //attributes
    private $IdImmagine;

    private $nome;

    private $dimensione;

    private $tipo;

    private $dati;

    private static $entity = EImmagine::class;

    //constructor
    public function __construct($name, $size, $type, $imageData){
        $this->nome = $name;
        $this->dimensione = $size;
        $this->tipo = $type;
        $this->dati = $imageData;
    }

    //methods
    public static function getEntity(): string
    {
        return self::$entity;
    }

    public function getIdImmagine()
    {
        return $this->IdImmagine;
    }

    public function setIdImmagine($IdImmagine){
        $this->IdImmagine = $IdImmagine;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getDimensione()
    {
        return $this->dimensione;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getDati()
    {
        return $this->dati;
    }

    public function getEncodedData(){
        return base64_encode($this->dati);  //bisogna capire un attimo come funziona
    }

}