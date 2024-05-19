<?php

//require_once '../utility/autoload.php';

class FFasciaOraria{
    /** nome della classe */
    private static $class = "FFasciaOraria";
    /** tabella con la quale opera */
    private static $table = "Fascia_Oraria";
    /** valori della tabella */
    private static $values="(:IdFasciaOraria,:data,:ora_inizio,:Calendario,:Appuntamento)";
    /** costruttore */
    public function __construct() { }

    /**
    * Questo metodo lega gli attributi della Fascia Oraria da inserire con i parametri della INSERT
    * @param PDOStatement $stmt 
    * @param EFasciaoraria $fascor fascia oraria in cui i dati devono essere inseriti nel DB
    */
    public static function bind($stmt,EFasciaoraria $fascor) {
    	$stmt->bindValue(':IdFasciaOraria',NULL, PDO::PARAM_INT); //l'id è posto a NULL poichè viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':data', $fascor->getData(), PDO::PARAM_STR); 
        $stmt->bindValue(':ora_inizio', $fascor->getOra_inizio(), PDO::PARAM_STR); 
        $stmt->bindValue(':Calendario', $fascor->getCalendario(), PDO::PARAM_STR);
        $stmt->bindValue(':Appuntamento', $fascor->getAppuntamento(), PDO::PARAM_STR);
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
    * @return object $fascor fascia oraria
    */
    public static function loadByField($field, $id){
        $fascor = null;
        $db = FDatabase::getInstance();
        $result = $db->loadDB(static::getClass(), $field, $id);
        $rows_number = $db->interestedRows(static::getClass(), $field, $id);
        if(($result != null) && ($rows_number == 1)) {
            $fascor = new EFasciaoraria($result['data'], $result['ora_inizio'], $result['Calendario'], $result['Appuntamento']);
                $fascor->setId($result['IdFasciaOraria']);
        }
        else {
            if(($result != null) && ($rows_number > 1)){
                $fascor = array();
                for($i = 0; $i < count($result); $i++){
                    $fascor[] = new EFasciaoraria($result[$i]['data'], $result[$i]['ora_inizio'], $result[$i]['Calendario'], $result[$i]['Appuntamento']);
                    $fascor[$i]->setId($result[$i]['IdFasciaOraria']);
                }
            }
        }
        return $fascor;
    }

    /**
     * Metodo che permette il saalavtaggio di una fascia oraria nel db
     * @param $fascor fascia oraria da salvare
     * @return $id della Fascia Oraria salvata
     */
    public static function store(EFasciaoraria $fascor) {
        $db = FDatabase::getInstance();
        $id = $db->storeDB(static::getClass(), $fascor);
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