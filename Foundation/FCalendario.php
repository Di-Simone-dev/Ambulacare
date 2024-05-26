<?php

//require_once '../utility/autoload.php';

class FCalendario {
    /** tabella con la quale opera */
    private static $table = "Calendario";
    /** valori della tabella */
    private static $values="(:IdCalendario,:Medico)";

    private static $key = "IdCalendario";
    /** costruttore */
    public function __construct() { }

    /**
    * Questo metodo lega gli attributi del Calendario da inserire con i parametri della INSERT
    * @param PDOStatement $stmt 
    * @param ECalendario $cal calendario in cui i dati devono essere inseriti nel DB
    */
    public static function bind($stmt, $calendario){
        $stmt->bindValue(":IdCalendario", $calendario->getIdCalendario(), PDO::PARAM_STR);
        $stmt->bindValue(":medico", $calendario->getMedico(), PDO::PARAM_STR);
        
    }


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

    
    

}