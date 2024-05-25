<?php

//require_once '../utility/autoload.php';

class FTipologia {
    /** nome della classe */
    private static $class = "FTipologia";
    /** tabella con la quale opera */
    private static $table = "Tipologia";
    /** valori della tabella */
    private static $values="(:IdTipologia,:Nome_Tipologia)";
    /** costruttore */
    public function __construct() { }

    /**
    * Questo metodo lega gli attributi della Tipologia da inserire con i parametri della INSERT
    * @param PDOStatement $stmt 
    * @param ECalendario $tip tipologia in cui i dati devono essere inseriti nel DB
    */
    public static function bind($stmt,ETipologia $tip) {
    	$stmt->bindValue(':IdTipologia',NULL, PDO::PARAM_INT); //l'id è posto a NULL poichè viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':Nome_Tipologia', $tip->getMedico(), PDO::PARAM_STR); 
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
    * @return object $tip Tipologia
    */
    public static function loadByField($field, $id){
        $tip = null;
        $db = FDatabase::getInstance();
        $result = $db->loadDB(static::getClass(), $field, $id);
        $rows_number = $db->interestedRows(static::getClass(), $field, $id);
        if(($result != null) && ($rows_number == 1)) {
            $tip = new ETipologia($result['Nome_Tipologia']);
                $tip->setId($result['IdTipologia']);
        }
        else {
            if(($result != null) && ($rows_number > 1)){
                $tip = array();
                for($i = 0; $i < count($result); $i++){
                    $tip[] = new ETipologia($result[$i]['Nome_Tipologia']);
                    $tip[$i]->setId($result[$i]['IdTipologia']);
                }
            }
        }
        return $cal;
    }

    /**
     * Metodo che permette il saalavtaggio di una Tipologia nel db
     * @param $tip Tipologia da salvare
     * @return $id della tipologia salvato
     */
    public static function store(ETipologia $tip) {
        $db = FDatabase::getInstance();
        $id = $db->storeDB(static::getClass(), $tip);
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