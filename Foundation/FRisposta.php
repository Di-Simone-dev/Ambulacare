<?php

//require_once '../utility/autoload.php';

class FRisposta {
    /** tabella con la quale opera */
    private static $table = "risposta";
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
    * questo metodo restituisce il nome del campo della primary key per la costruzione delle Query
    * @return string $key nome del campo della primary key della tabella
    */
    public static function getKey(){
        return self::$key;
    }

    /**
    * Questo metodo lega gli attributi della Risposta da inserire con i parametri della INSERT
    * @param PDOStatement $stmt 
    * @param ERisposta $risp Risposta in cui i dati devono essere inseriti nel DB
    */
    public static function bind($stmt,ERisposta $risp) {
    	//$stmt->bindValue(':IdRisposta',NULL, PDO::PARAM_INT); //l'id è posto a NULL poichè viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':contenuto', $risp->getContenuto(), PDO::PARAM_STR);
        $stmt->bindValue(':data_creazione', $risp->getDatacreazione(), PDO::PARAM_STR);
        $stmt->bindValue(':IdRecensione', $risp->getRecensione()->getIdRecensione(), PDO::PARAM_STR); //FK
        $stmt->bindValue(':IdMedico', $risp->getMedico()->getIdMedico(), PDO::PARAM_STR);  //FK
    }
    
    public static function crearisposta($queryResult){
        /*
        if(count($queryResult) == 1){
            $risposta = new ERisposta($queryResult[0]['contenuto']);
            $risposta->setIdRisposta($queryResult[0]['IdRisposta']);
            $data_creazione = DateTime::createFromFormat('Y-m-d H:i:s', $queryResult[0]['data_creazione']);
            $risposta->setData_creazione($data_creazione);
            //metto la recensione (FOREIGN KEY)
            //DA TESTARE
            $recensione = FRecensione::getObj($queryResult[0]['IdRecensione']);  //il campo calendario è proprio l'id
            $risposta->setRecensione($recensione);

            //ispirazione presa da FReport
            //metto il medico (FOREIGN KEY)
            //DA TESTARE
            $medico = FMedico::getObj($queryResult[0]['IdMedico']);  //il campo calendario è proprio l'id
            $risposta->setMedico($medico);

            //ispirazione presa da FReport
            return $risposta;
        }else
        */
        if(count($queryResult) > 0){
            $risposte = array();
            for($i = 0; $i < count($queryResult); $i++){
                $risposta = new ERisposta($queryResult[$i]['contenuto'],$queryResult[$i]['data_creazione']);
                $risposta->setIdRisposta($queryResult[$i]['IdRisposta']);
                //$data_creazione = DateTime::createFromFormat('Y-m-d H:i:s', $queryResult[$i]['data_creazione']);
                //$risposta->setData_creazione($data_creazione);
                //metto la recensione (FOREIGN KEY)
                //DA TESTARE
                $recensione = FRecensione::getObj($queryResult[$i]['IdRecensione']);  //il campo calendario è proprio l'id
                $risposta->setRecensione($recensione);

                //ispirazione presa da FReport
                //metto il medico (FOREIGN KEY)
                //DA TESTARE
                $medico = FMedico::getObj($queryResult[$i]['IdMedico']);  //il campo calendario è proprio l'id
                $risposta->setMedico($medico);

                //ispirazione presa da FReport
                $risposte[] = $risposta;
            }
            return $risposte;
        }else{
            return array();
        }
    }

    public static function getObj($IdRisposta){
        $result = FEntityManagerSQL::getInstance()->retrieveObj(self::getTable(), self::getKey(), $IdRisposta);
        //var_dump($result);
        if(count($result) > 0){
            $risposta = self::crearisposta($result);
            return $risposta;
        }else{
            return null;
        }

    }

    public static function saveObj($risposta){
        $saveFasciaOraria = FEntityManagerSQL::getInstance()->saveObject(self::getClass(), $risposta);
        if($saveFasciaOraria !== null){
            return $saveFasciaOraria;
        }else{
            return false;
        }
    }
    
    /**
     * QUESTO SERVE PER CANCELLARE UNA RISPOSTA con La sua PK COME ARGOMENTO
     * POTREBBE ESSERE MODIFICATO IN MODO DA DARE IN INPUT DIRETTAMENTE LA RISPOSTA
     */
    public static function eliminarisposta($IdRisposta){        
        $eliminaRisposta = FEntityManagerSQL::getInstance()->deleteObjInDb(self::getTable(), self::getKey(), $IdRisposta);
        if($eliminaRisposta !== null){
            return $eliminaRisposta;
        }else{
            return false;
        }
    }

    //QUESTO DOVREBBE ESSERE IMPLEMENTATO PER MOSTRARE LE RISPOSTE DI MEDICI ATTIVI (NON BANNATI)
    /*
    public static function getCommentListNotBanned($idPost)
    {

        $result = FEntityManagerSQL::getInstance()->objectListNotRemoved(self::getTable(), FPost::getKey(), $idPost);

        if(count($result) == 1){
            $comment = array();
            $c = self::crateCommentObj($result);
            $comment[] = $c;
            return $comment;
        }elseif(count($result) > 1){
            return self::crateCommentObj($result);
        }else{
            return $result;
        }
        
    }
    */
}
