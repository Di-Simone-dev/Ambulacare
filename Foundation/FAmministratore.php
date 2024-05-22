<?php

//require_once '../utility/autoload.php';
//Questo è un commento per provare
class FAmministratore {
    /** nome della classe */
    private static $class = "FAmministratore";
    /** tabella con la quale opera */
    private static $table = "Amministratore";
    /** valori della tabella */
    private static $values="(:IdAdm,:nome,:cognome,:email,:password)";
    /** costruttore */
    public function __construct() { }

    /**
    * Questo metodo lega gli attributi del Luogo da inserire con i parametri della INSERT
    * @param PDOStatement $stmt 
    * @param EAmministratore $admin amministratore in cui i dati devono essere inseriti nel DB
    */
    public static function bind($stmt,EAmministratore $admin) {
    	$stmt->bindValue(':IdAdm',$admin->getIdAdm(), PDO::PARAM_INT); 
        $stmt->bindValue(':nome', $admin->getNome(), PDO::PARAM_STR); 
        $stmt->bindValue(':cognome', $admin->getCognome(), PDO::PARAM_STR); 
        $stmt->bindValue(':email', $admin->getEmail(), PDO::PARAM_STR); 
        $stmt->bindValue(':password', $admin->getPassword(), PDO::PARAM_STR); 
    }

    /**
    * questo metodo restituisce il nome della classe per la costruzione delle Query
    * @return string $class nome della classe
    */
    public static function getClass(){
        return self::$class;
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
    * Permette la load sul db avendo come parametro di ricerca un campo passato in input alla funzione
    * @param $id campo da confrontare per trovare l'oggetto
    * @return object $admin Amministratore
    */
    public static function loadByField($field, $id){
        $admin = null;
        $db = FDatabase::getInstance();
        $result = $db->loadDB(static::getClass(), $field, $id);
        $rows_number = $db->interestedRows(static::getClass(), $field, $id);
        if(($result != null) && ($rows_number == 1)) {
            $admin = new EAmministratore($result['IdAdm'], $result['nome'],$result['cognome'],$result['email'],$result['password']);
        }
        else {
            if(($result != null) && ($rows_number > 1)){
                $admin = array();
                for($i = 0; $i < count($result); $i++){
                    $admin[] = new EAmministratore($result[$i]['IdAdm'], $result[$i]['nome'], $result[$i]['cognome'], $result[$i]['email'], $result[$i]['password']);
                }
            }
        }
        return $admin;
    }

    /**
     * Metodo che permette il saalavtaggio di un Luogo nel db
     * @param $admin Amministratore da salvare
     * @return $id dell'amministratore salvato
     */
    public static function store(EAmministratore $admin) {
        $db = FDatabase::getInstance();
        $id = $db->storeDB(static::getClass(), $admin);
        if($id) 
            return $id;
        else 
            return null;
    }

    /** 
    * Funzione che permette di verificare se esiste un Luogo nel database
    * @param  $id valore della riga di cui si vuo erificare l'esistenza
    * @param  string $field colonna su ci eseguire la verifica
    * @return bool $ris
    */
    /*
    public static function exist($field, $id) {
        $ris = false;
        $db = FDatabase::getInstance();
        $result = $db->existDB(static::getClass(), $field, $id);
        if($result!=null) 
            $ris = true;
        return $ris;
    }
    */
    /**
     * Restituisce tutti i nomi dei luoghi presenti sul db
     * @param $id campo da confrontare per trovare l'oggetto
     * @return array di nomi di luoghi
     */
    /*
    public static function loadNames($input){
        $place = null;
        $db = FDatabase::getInstance();
        list ($result, $rows_number)=$db->ricercaLuogo($input);
        if(($result != null) && ($rows_number == 1)) {
            $place = ($result['name']);
        }
        else {
            if(($result != null) && ($rows_number > 1)){
                $place = array();
                for($i = 0; $i < count($result); $i++){
                    $place[] = ($result[$i]['name']);
                }
            }
        }
        return $place;
    }
    */

}

?>