<?php

//require_once '../utility/autoload.php';

class FReferto {
    /** tabella con la quale opera */
    private static $table = "referto";
    /** valori della tabella */
    private static $values="(NULL,:oggetto,:contenuto,:IdAppuntamento,:IdImmagine)";
    /** nome del campo della primary key della tabella*/
    private static $key = "IdReferto";
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
    * Questo metodo lega gli attributi del Referto da inserire con i parametri della INSERT
    * @param PDOStatement $stmt 
    * @param EReferto $ref Referto in cui i dati devono essere inseriti nel DB
    */
    public static function bind($stmt,EReferto $ref) {
    	//$stmt->bindValue(':IdReferto',NULL, PDO::PARAM_INT); //l'id è posto a NULL poichè viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':oggetto', $ref->getOggetto(), PDO::PARAM_STR); 
        $stmt->bindValue(':contenuto', $ref->getContenuto(), PDO::PARAM_STR);
        $stmt->bindValue(':IdAppuntamento', $ref->getAppuntamento()->getIdAppuntamento(), PDO::PARAM_STR);  //FK
        $stmt->bindValue(':IdImmagine', $ref->getImmagine()->getIdImmagine(), PDO::PARAM_STR);      //FK 
    }

    public static function creareferto($queryResult){
        if(count($queryResult) > 0){
            $referti = array();
            for($i = 0; $i < count($queryResult); $i++){
                $referto = new EReferto($queryResult[$i]['oggetto'],$queryResult[$i]['contenuto']);
                $referto->setIdReferto($queryResult[$i]['IdReferto']);  //PER LA PK AUTOINCREMENT
                //come si mette il paziente? (FOREIGN KEY)
                //DA TESTARE
                $immagine = FImmagine::getimmaginefromid($queryResult[$i]['IdImmagine']);  //il campo IdPaziente è proprio l'id
                $referto->setImmagine($immagine);

                //ispirazione presa da FReport
                //come si mette il medico? (FOREIGN KEY)
                //DA TESTARE
                $appuntamento = FAppuntamento::getappuntamentofromid($queryResult[$i]['IdAppuntamento']);  //il campo IdMedico è proprio l'id
                $referto->setAppuntamento($appuntamento);

                //ispirazione presa da FReport
                $referti[] = $referto;
            }
            return $referti;   //ARRAY DEI REFERTI, ANCHE SE PROBABILMENTE BASTA IL CARICAMENTO SINGOLO DI UN REFERTO
        }else{
            return array();
        }
    }

    //PER LOADDARE UN REFERTO DAL SUO ID
    public static function getrefertofromid($IdReferto){
        $result = FEntityManagerSQL::getInstance()->retriveObj(self::getTable(), self::getKey(), $IdReferto);
        //var_dump($result);
        if(count($result) > 0){
            $referto = self::creareferto($result);
            return $referto;
        }else{
            return null;
        }
    }


    //CON QUESTO SALVIAMO I REFERTI
    public static function salvareferto($referto){
            $savereferto = FEntityManagerSQL::getInstance()->saveObject(self::getClass(), $referto);
            if($savereferto !== null){
                return $savereferto;
            }else{
                return false;
            }
    }

    /**
     * QUESTO SERVE PER CANCELLARE UNA RECENSIONE con La sua PK COME ARGOMENTO
     * POTREBBE ESSERE MODIFICATO IN MODO DA DARE IN INPUT DIRETTAMENTE LA RECENSIONE
     */
    public static function eliminareferto($IdReferto){        
        $eliminareferto = FEntityManagerSQL::getInstance()->deleteObjInDb(self::getTable(), self::getKey(), $IdReferto);
        if($eliminareferto !== null){
            return $eliminareferto;
        }else{
            return false;
        }
    }
    
    //PROBABILMENTE SERVE ANCORA QUALCOSA DI CORRELATO ALLE IMMAGINI


}