<?php

//require_once '../utility/autoload.php';

class FRisposta {
    /** nome della classe */
    private static $class = "FRisposta";
    /** tabella con la quale opera */
    private static $table = "Risposta";
    /** valori della tabella */
    private static $values="(:IdRisposta,:contenuto,:Recensione,:Medico)";
    /** costruttore */
    public function __construct() {}

    /**
    * Questo metodo lega gli attributi della Risposta da inserire con i parametri della INSERT
    * @param PDOStatement $stmt 
    * @param ERisposta $risp Risposta in cui i dati devono essere inseriti nel DB
    */
    public static function bind($stmt,ERisposta $risp) {
    	$stmt->bindValue(':IdRisposta',NULL, PDO::PARAM_INT); //l'id è posto a NULL poichè viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':contenuto', $risp->getContenuto(), PDO::PARAM_STR);
        $stmt->bindValue(':Recensione', $risp->getMedico(), PDO::PARAM_STR);
        $stmt->bindValue(':Medico', $risp->getPaziente(), PDO::PARAM_STR);
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
    * Permette la load sul db 
    * @param $id campo da confrontare per trovare l'oggetto
    * @return object $risp Risposta
    */
    public static function loadByField($field, $id) {
        $risp = null;
        $db = FDatabase::getInstance();
        $result = $db->loadDB(static::getClass(), $field, $id);
        $rows_number = $db->interestedRows(static::getClass(), $field, $id);
        if(($result != null) && ($rows_number == 1)) {
            $risp = new ERisposta($result['contenuto'],$result['Recensione'],$result['Medico']);
                $risp->setId($result['IdRisposta']);
        }
        else {
            if(($result != null) && ($rows_number > 1)){
                $risp = array();
                for($i = 0; $i < count($result); $i++){
                    $risp[] = new ERisposta($result[$i]['contenuto'],$result[$i]['Recensione'], $result[$i]['Medico']);
                    $risp[$i]->setId($result[$i]['IdRisposta']);
                }
            }
        }
        return $risp;
    }

	/**
     * Metodo che permette di salvare una Risposta
     * @param $risp Risposta da salvare
     * @return $id della Risposta salvata
     */
    public static function store(ERisposta $risp) {
        $db = FDatabase::getInstance();
        $id = $db->storeDB(static::getClass(), $risp);
        if($id) 
            return $id;
        else 
            return null;
    }

    /** 
    * Funzione che permette di verificare se esiste una Recensione nel database
    * @param  $id valore della riga di cui si vuol verificare l'esistenza
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
    * Permette la delete sul db in base all'id
    * @param int l'id dell'oggetto da eliminare dal db
    * @return bool 
    */
    public static function delete($field, $id) {
        $db = FDatabase::getInstance();
        $result = $db->deleteDB(static::getClass(), $field, $id);
        if($result) 
            return true;
        else 
            return false;
    }

    /**
     * Ritorna tutte le recensioni presenti sul db
     * @return object $rec Recensione
     */
    /*
    public static function loadAll() {
        $rec = null;
        $db = FDatabase::getInstance();
        list ($result, $rows_number)=$db->getAllRev();
        if(($result != null) && ($rows_number == 1)) {
            $rec = new ERecensione($result['oggetto'],$result['contenuto'],$result['valutazione'],$result['Medico'],$result['Paziente']);
            $rec->setId($result['IdRecensione']);
        }
        else {
            if(($result != null) && ($rows_number > 1)){
                $rec = array();
                for($i = 0; $i < count($result); $i++){
                    $rec[] = new ERecensione($result['oggetto'],$result['contenuto'],$result['valutazione'],$result['Medico'],$result['Paziente']);
                    $rec[$i]->setId($result[$i]['IdRecensione']);
                }
            }
        }
        return $rec;
    }
*/
    /**
     *
     * @param $parola valore da ricercare all'interno del campo oggetto
     * @return object $rec Recensione
     */
    /*public static function loadByParola($parola) {
        $rec = null;
        $db = FDatabase::getInstance();
        list ($result, $rows_number)=$db->ricercaParola($parola, static::getClass(), "text");
        if(($result != null) && ($rows_number == 1)) {
            $rec = new ERecensione($result['text'],$result['mark'],$result['emailClient'],$result['emailConveyor']);
            $rec->setId($result['id']);
        }
        else {
            if(($result != null) && ($rows_number > 1)){
                $rec = array();
                for($i = 0; $i < count($result); $i++){
                    $rec[] = new ERecensione($result[$i]['text'], $result[$i]['mark'],$result[$i]['emailClient'], $result[$i]['emailConveyor']);
                    $rec[$i]->setId($result[$i]['id']);
                }
            }
        }
        return $rec;
    }*/


}

?>