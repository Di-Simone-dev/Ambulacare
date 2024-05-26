<?php

//require_once '../utility/autoload.php';

/**
 * La classe FMedico fornisce query per gli oggetti EMedico.
 * @author Gruppo AmbulaCare
 * @package Foundation
 */

class FMedico  {
	/** tabella con la quale opera */
    private static $table="Medico";
    /** valori della tabella */
    private static $values="(:IdMed,:nome,:cognome,:email,:password,:attivo,:costo:tipologia)";

    private static $key = "IdMedico";
    /** costruttore*/ 
    public function __construct(){}

    /**
    * questo metodo restituisce il nome della classe per la costruzione delle Query
    * @return string $class nome della classe
    */
    public static function getClass(){
        return self::class;
    }

    /**
    * questo metodo restituisce il nome della tabella per la costruzione delle Query
    * @return string $table nome della tabella
    */
    public static function getTable(){
        return self::$table;
    }

    /**
    * questo metodo restituisce l'insieme dei valori per la costruzione delle Query
    * @return string $values nomi delle colonne della tabella
    */
    public static function getValues(){
        return self::$values;
    }

    
    public static function getKey(){
        return self::$key;
    }

    /**
    * Questo metodo lega gli attributi del Medico da inserire con i parametri della INSERT
    * @param PDOStatement $stmt
    * @param EMedico $rec Medico in cui i dati devono essere inseriti nel DB
    */
    public static function bind($stmt, EMedico $cli){
        $stmt->bindValue(':IdMed',$cli->getIdMedico(), PDO::PARAM_STR);
        $stmt->bindValue(':nome',$cli->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':cognome',$cli->getCognome(), PDO::PARAM_STR);
        $stmt->bindValue(':email',$cli->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':password',$cli->getPassword(), PDO::PARAM_STR);
        $stmt->bindValue(':attivo',$cli->getAttivo(), PDO::PARAM_BOOL);
        $stmt->bindValue(':costo',$cli->getCosto(), PDO::PARAM_STR);
        $stmt->bindValue(':tipologia',$cli->getTipologia(), PDO::PARAM_STR);
    }


}
