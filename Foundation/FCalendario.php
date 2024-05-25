<?php

//require_once '../utility/autoload.php';

class FCalendario {
    /** nome della classe */
    private static $class = "FCalendario";
    /** tabella con la quale opera */
    private static $table = "Calendario";
    /** valori della tabella */
    private static $values="(:IdCalendario,:Medico)";
    /** costruttore */
    public function __construct() { }

    /**
    * Questo metodo lega gli attributi del Calendario da inserire con i parametri della INSERT
    * @param PDOStatement $stmt 
    * @param ECalendario $cal calendario in cui i dati devono essere inseriti nel DB
    */
    public static function bind($stmt,ECalendario $cal) {
    	$stmt->bindValue(':IdCalendario',NULL, PDO::PARAM_INT); //l'id è posto a NULL poichè viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':Medico', $cal->getMedico(), PDO::PARAM_STR); 
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
    * @return object $cal calendario
    */
    public static function loadByField($field, $id){
        $cal = null;
        $db = FDatabase::getInstance();
        $result = $db->loadDB(static::getClass(), $field, $id);
        $rows_number = $db->interestedRows(static::getClass(), $field, $id);
        if(($result != null) && ($rows_number == 1)) {
            $cal = new ECalendario($result['Medico']);
                $cal->setId($result['IdCalendario']);
        }
        else {
            if(($result != null) && ($rows_number > 1)){
                $cal = array();
                for($i = 0; $i < count($result); $i++){
                    $cal[] = new ECalendario($result[$i]['Medico']);
                    $cal[$i]->setId($result[$i]['IdCalendario']);
                }
            }
        }
        return $cal;
    }

    /**
     * Metodo che permette il saalavtaggio di un Calendario nel db
     * @param $cal calendario da salvare
     * @return $id del calendario salvato
     */
    public static function store(ECalendario $cal) {
        $db = FDatabase::getInstance();
        $id = $db->storeDB(static::getClass(), $cal);
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