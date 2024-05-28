<?php

//require_once '../utility/autoload.php';

class FRisposta {
    /** tabella con la quale opera */
    private static $table = "Risposta";
    /** valori della tabella */
    private static $values="(NULL,:contenuto,:data_creazione,:IdRecensione,:IdMedico)";

    /** nome del campo della primary key della tabella*/
    private static $key = "IdRisposta";
    /** costruttore */
    public function __construct() {}

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

        /**
    * Questo metodo lega gli attributi della Risposta da inserire con i parametri della INSERT
    * @param PDOStatement $stmt 
    * @param ERisposta $risp Risposta in cui i dati devono essere inseriti nel DB
    */
    public static function bind($stmt,ERisposta $risp) {
    	//$stmt->bindValue(':IdRisposta',NULL, PDO::PARAM_INT); //l'id è posto a NULL poichè viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':contenuto', $risp->getContenuto(), PDO::PARAM_STR);
        $stmt->bindValue(':data_creazione', $risp->getData_creazione(), PDO::PARAM_STR);
        $stmt->bindValue(':IdRecensione', $risp->getRecensione(), PDO::PARAM_STR);
        $stmt->bindValue(':IdMedico', $risp->getMedico(), PDO::PARAM_STR);
    }
    

}
