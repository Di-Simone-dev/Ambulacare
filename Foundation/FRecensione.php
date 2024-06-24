<?php

//require_once '../utility/autoload.php';

class FRecensione {
    /** tabella con la quale opera */
    private static $table = "recensione";
    /** valori della tabella */
    private static $values="(NULL,:titolo,:contenuto,:valutazione,:data_creazione,:IdMedico,:IdPaziente)";

    /** nome del campo della primary key della tabella*/
    private static $key = "IdRecensione";
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
    * questo metodo restituisce il nome del campo della primary key per la costruzione delle Query
    * @return string $key nome del campo della primary key della tabella
    */
    public static function getKey(){
        return self::$key;
    }

    /**
    * Questo metodo lega gli attributi della Recensione da inserire con i parametri della INSERT
    * @param PDOStatement $stmt 
    * @param ERecensione $rec Recensione in cui i dati devono essere inseriti nel DB
    */
    public static function bind($stmt,ERecensione $rec) {
    	//$stmt->bindValue(':IdRecensione',NULL, PDO::PARAM_INT); //l'id è posto a NULL poichè viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':titolo', $rec->getTitolo(), PDO::PARAM_STR); 
        $stmt->bindValue(':contenuto', $rec->getContenuto(), PDO::PARAM_STR);
        $stmt->bindValue(':valutazione', $rec->getValutazione(), PDO::PARAM_STR); //float o INT
        $stmt->bindValue(':data_creazione', $rec->getDatacreazione(), PDO::PARAM_STR); // DA CONTROLLARE
        $stmt->bindValue(':IdMedico', $rec->getMedico()->getIdMedico(), PDO::PARAM_STR);  // FK
        $stmt->bindValue(':IdPaziente', $rec->getPaziente()->getIdPaziente(), PDO::PARAM_STR);  //FK
    }



    /** PER FARE LA LOAD DAL DB ed INSTANZIARE LE RECENSIONI data query risult l'array con le fasce orarie da istanziare
     * Proxy obj
     */
    public static function crearecensione($queryResult){
        if(count($queryResult) > 0){
            $recensioni = array();
            for($i = 0; $i < count($queryResult); $i++){
                $recensione = new ERecensione($queryResult[$i]['titolo'],$queryResult[$i]['contenuto'],
                                $queryResult[$i]['valutazione'],$queryResult[$i]['data_creazione']);
                $recensione->setIdRecensione($queryResult[$i]['IdRecensione']);  //PER LA PK AUTOINCREMENT
                //come si mette il paziente? (FOREIGN KEY)
                //DA TESTARE
                $paziente = FPaziente::getObj($queryResult[$i]['IdPaziente']);  //il campo IdPaziente è proprio l'id
                $recensione->setPaziente($paziente);

                //ispirazione presa da FReport
                //come si mette il medico? (FOREIGN KEY)
                //DA TESTARE
                $medico = FMedico::getObj($queryResult[$i]['IdMedico']);  //il campo IdMedico è proprio l'id
                $recensione->setMedico($medico);

                //ispirazione presa da FReport
                $recensioni[] = $recensione;
            }
            return $recensioni;   //ARRAY DELLE RECENSIONI
        }else{
            return array();
        }
    }

    //PER LOADDARE UNA RECENSIONE DAL SUO ID
    public static function getObj($IdRecensione){
        $result = FEntityManagerSQL::getInstance()->retrieveObj(self::getTable(), self::getKey(), $IdRecensione);
        //var_dump($result);
        if(count($result) > 0){
            $recensione = self::crearecensione($result);
            return $recensione;
        }else{
            return null;
        }
    }


    //CON QUESTO SALVIAMO LE RECENSIONI
    public static function saveObj($recensione){
            $saveFasciaOraria = FEntityManagerSQL::getInstance()->saveObject(self::getClass(), $recensione);
            if($saveFasciaOraria !== null){
                return $saveFasciaOraria;
            }else{
                return false;
            }
    }

    /**
     * QUESTO SERVE PER CANCELLARE UNA RECENSIONE con La sua PK COME ARGOMENTO
     * POTREBBE ESSERE MODIFICATO IN MODO DA DARE IN INPUT DIRETTAMENTE LA RECENSIONE
     */
    public static function eliminarecensione($IdRecensione){        
        $eliminaRecensione = FEntityManagerSQL::getInstance()->deleteObjInDb(self::getTable(), self::getKey(), $IdRecensione);
        if($eliminaRecensione !== null){
            return $eliminaRecensione;
        }else{
            return false;
        }
    }

    //PER CONTARE IL NUMERO DI RECENSIONI DI UN MEDICO
    public static function getnumerorecensionimedico($IdMedico){
        $result = FEntityManagerSQL::getInstance()->retrieveObj(self::getTable(), "IdMedico", $IdMedico);
        //var_dump($result);
        return count($result);
        
    }

    //PER LOADDARE le recensioni di utenti non bannati    ATTENZIONE  QUESTA VA FATTA SU ENTITY MANAGER
    /*
    public static function getrecensionipazientiattivi($IdMedico){
        $result = FEntityManagerSQL::getInstance()->retrieveObj(self::getTable(), self::getKey(), $IdRecensione);
        //var_dump($result);
        if(count($result) > 0){
            $recensione = self::crearecensione($result);
            return $recensione;
        }else{
            return null;
        }
    }
    */


}