<?php

//require_once '../utility/autoload.php';
//Questo è un commento banale
class FAmministratore {
    /** tabella con la quale opera */
    private static $table = "amministratore";
    /** valori della tabella */
    private static $values="(NULL,:nome,:cognome,:email,:password)";
    /** nome del campo della primary key della tabella*/
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

    /**
    * questo metodo restituisce il nome del campo della primary key per la costruzione delle Query
    * @return string $key nome del campo della primary key della tabella
    */
    public static function getKey(){
        return self::$key;
    }

    /**
    * Questo metodo lega gli attributi del Luogo da inserire con i parametri della INSERT
    * @param PDOStatement $stmt 
    * @param EAmministratore $admin amministratore in cui i dati devono essere inseriti nel DB
    */
    public static function bind($stmt,EAmministratore $admin) {
    	//$stmt->bindValue(':IdAdm',$admin->getIdAdmin(), PDO::PARAM_INT); PK NON VA MESSA NEL BIND
        $stmt->bindValue(':nome', $admin->getNome(), PDO::PARAM_STR); 
        $stmt->bindValue(':cognome', $admin->getCognome(), PDO::PARAM_STR); 
        $stmt->bindValue(':email', $admin->getEmail(), PDO::PARAM_STR); 
        $stmt->bindValue(':password', $admin->getPassword(), PDO::PARAM_STR); 
    }


    public static function creaamministratore($queryResult){
        if(count($queryResult) > 0){
            $amministratori = array();
            for($i = 0; $i < count($queryResult); $i++){
            $admin = new EAmministratore($queryResult[$i]['nome'],$queryResult[$i]['cognome'],
                                    $queryResult[$i]['email'], $queryResult[$i]['password']);
            $admin -> setIdAdmin($queryResult[$i]['IdAdmin']);
            $amministratori[]=$admin;
            }
            return $amministratori;

        }else{
            return array();
        }
    }

    public static function getObj($id){
        $result = FEntityManagerSQL::getInstance()->retrieveObj(FAmministratore::getTable(), FAmministratore::getKey(), $id);
        //var_dump($result);
        if(count($result) > 0){
            $mod = self::creaamministratore($result);
            return $mod;
        }else{
            return null;
        }

    }

    public static function getadminbyemail($email){

        $result = FEntityManagerSQL::getInstance()->retrieveObj(FAmministratore::getTable(), 'email', $email);
        //var_dump($result);

        if($result !== null && count($result) > 0){
            $admin = self::creaamministratore($result);
            return $admin;
        }else{
            return null;
        }
    }

    public static function saveObj($admin){

        $saveAmministratore = FEntityManagerSQL::getInstance()->saveObject(FAmministratore::getClass(), $admin);
        //var_dump($savePerson);
        if($saveAmministratore !== null){
            $saveAmministratore = FEntityManagerSQL::getInstance()->saveObjectFromId(self::getClass(), $admin, $saveAmministratore);
            return $saveAmministratore;
        }else{
            return false;
        }
    }

}
