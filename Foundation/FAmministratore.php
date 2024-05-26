<?php

//require_once '../utility/autoload.php';
//Questo è un commento banale
class FAmministratore {
    /** tabella con la quale opera */
    private static $table = "Amministratore";
    /** valori della tabella */
    private static $values="(:IdAdmin,:nome,:cognome,:email,:password)";
    //Primary key della tabella
    private static $key = "IdAdmin";

    /** costruttore*/ 
    public function __construct(){}

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

    /**
    * Questo metodo lega gli attributi del Luogo da inserire con i parametri della INSERT
    * @param PDOStatement $stmt 
    * @param EAmministratore $admin amministratore in cui i dati devono essere inseriti nel DB
    */
    public static function bind($stmt,EAmministratore $admin) {
    	$stmt->bindValue(':IdAdm',$admin->getIdAdmin(), PDO::PARAM_INT); 
        $stmt->bindValue(':nome', $admin->getNome(), PDO::PARAM_STR); 
        $stmt->bindValue(':cognome', $admin->getCognome(), PDO::PARAM_STR); 
        $stmt->bindValue(':email', $admin->getEmail(), PDO::PARAM_STR); 
        $stmt->bindValue(':password', $admin->getPassword(), PDO::PARAM_STR); 
    }


    public static function creaamministratore($queryResult){
        if(count($queryResult) > 0){
            $admin = new EAmministratore($queryResult[0]['IdAdmin'], $queryResult[0]['nome'],$queryResult[0]['cognome'],
                                    $queryResult[0]['email'], $queryResult[0]['password']);
            return $admin;
        }else{
            return array();
        }
    }

    /* STA ROBA NON DOVREBBE SERVIRE
    public static function bind($stmt, $id){
        $stmt->bindValue(":idUser", $id, PDO::PARAM_INT);
        //var_dump($id);
    }
    */ 

    public static function getadminfromid($id){
        $result = FEntityManagerSQL::getInstance()->retriveObj(FAmministratore::getTable(), FAmministratore::getKey(), $id);
        //var_dump($result);
        if(count($result) > 0){
            $mod = self::creaamministratore($result);
            return $mod;
        }else{
            return null;
        }

    }

    public static function saveObj($obj){

        $saveAmministratore = FEntityManagerSQL::getInstance()->saveObject(FAmministratore::getClass(), $obj);
        //var_dump($savePerson);
        if($saveAmministratore !== null){
            $saveAmministratore = FEntityManagerSQL::getInstance()->saveObjectFromId(self::getClass(), $obj, $saveAmministratore);
            return $saveAmministratore;
        }else{
            return false;
        }
    }

    public static function getadminbyemail($email){

        $result = FEntityManagerSQL::getInstance()->retriveObj(FAmministratore::getTable(), 'email', $email);
        //var_dump($result);

        if($result !== null && count($result) > 0){
            $admin = self::creaamministratore($result);
            return $admin;
        }else{
            return null;
        }
    }

}
