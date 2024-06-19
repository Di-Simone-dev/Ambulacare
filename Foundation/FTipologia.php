<<<<<<< HEAD
<?php

//require_once '../utility/autoload.php';

class FTipologia {
    /** tabella con la quale opera */
    private static $table = "tipologia";
    /** valori della tabella */
    private static $values="(NULL,:nome_tipologia)";

    /** nome del campo della primary key della tabella*/
    private static $key = "IdTipologia";
    /** costruttore */
    public function __construct() { }

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
    * Questo metodo lega gli attributi della Tipologia da inserire con i parametri della INSERT
    * @param PDOStatement $stmt 
    * @param ETipologia $tip tipologia in cui i dati devono essere inseriti nel DB
    */
    public static function bind($stmt,ETipologia $tip) {
    	//$stmt->bindValue(':IdTipologia',NULL, PDO::PARAM_INT); //l'id è posto a NULL poichè viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':nome_nipologia', $tip->getNometipologia(), PDO::PARAM_STR); 
    }

     /** PER FARE LA LOAD DAL DB ed INSTANZIARE LE TIPOLOGIE data queryresult l'array con le fasce orarie da istanziare
     * Proxy obj
     */
    public static function creatipologia($queryResult){
        if(count($queryResult) > 0){
            $tipologie = array();
            for($i = 0; $i < count($queryResult); $i++){
                $tipologia = new ETipologia($queryResult[$i]['nome_tipologia']);
                $tipologia->setIdTipologia($queryResult[$i]['IdTipologia']);  //PER LA PK AUTOINCREMENT
                $tipologie[] = $tipologia;
            }
            return $tipologie;   //ARRAY DELLE TIPOLOGIE LOADDATE
        }else{
            return array();
        }
    }

    //PER LOADDARE UNA FASCIA ORARIA DAL SUO ID
    public static function getObj($IdTipologia){
        $result = FEntityManagerSQL::getInstance()->retrieveObj(self::getTable(), self::getKey(), $IdTipologia);
        //var_dump($result);
        if(count($result) > 0){
            $post = self::creatipologia($result);
            return $post;
        }else{
            return null;
        }
    }


    //CON QUESTO SALVIAMO LE TIPOLOGIE 
    public static function saveObj($tipologia){
            $saveFasciaOraria = FEntityManagerSQL::getInstance()->saveObject(self::getClass(), $tipologia);
            if($saveFasciaOraria !== null){
                return $saveFasciaOraria;
            }else{
                return false;
            }
    }

    /**
     * QUESTO SERVE PER CANCELLARE UNA TIPOLOGIA con il suo NOME COME ARGOMENTO(EVENTUALE CAMBIO DI NOME)
     * POTREBBE ESSERE MODIFICATO IN MODO DA DARE IN INPUT DIRETTAMENTE LA TIPOLOGIA
     */
    public static function eliminatipologia($nome_tipologia){        
        $eliminatipologia = FEntityManagerSQL::getInstance()->deleteObjInDb(self::getTable(), "nome_tipologia", $nome_tipologia);
        if($eliminatipologia !== null){
            return $eliminatipologia;
        }else{
            return false;
        }
    }


=======
<?php

//require_once '../utility/autoload.php';

class FTipologia {
    /** tabella con la quale opera */
    private static $table = "tipologia";
    /** valori della tabella */
    private static $values="(NULL,:nome_tipologia)";

    /** nome del campo della primary key della tabella*/
    private static $key = "IdTipologia";
    /** costruttore */
    public function __construct() { }

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
    * Questo metodo lega gli attributi della Tipologia da inserire con i parametri della INSERT
    * @param PDOStatement $stmt 
    * @param ETipologia $tip tipologia in cui i dati devono essere inseriti nel DB
    */
    public static function bind($stmt,ETipologia $tip) {
    	//$stmt->bindValue(':IdTipologia',NULL, PDO::PARAM_INT); //l'id è posto a NULL poichè viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':nome_nipologia', $tip->getNometipologia(), PDO::PARAM_STR); 
    }

     /** PER FARE LA LOAD DAL DB ed INSTANZIARE LE TIPOLOGIE data queryresult l'array con le fasce orarie da istanziare
     * Proxy obj
     */
    public static function creatipologia($queryResult){
        if(count($queryResult) > 0){
            $tipologie = array();
            for($i = 0; $i < count($queryResult); $i++){
                $tipologia = new ETipologia($queryResult[$i]['nome_tipologia']);
                $tipologia->setIdTipologia($queryResult[$i]['IdTipologia']);  //PER LA PK AUTOINCREMENT
                $tipologie[] = $tipologia;
            }
            return $tipologie;   //ARRAY DELLE TIPOLOGIE LOADDATE
        }else{
            return array();
        }
    }

    //PER LOADDARE UNA FASCIA ORARIA DAL SUO ID
    public static function getObj($IdTipologia){
        $result = FEntityManagerSQL::getInstance()->retrieveObj(self::getTable(), self::getKey(), $IdTipologia);
        //var_dump($result);
        if(count($result) > 0){
            $post = self::creatipologia($result);
            return $post;
        }else{
            return null;
        }
    }


    //CON QUESTO SALVIAMO LE TIPOLOGIE 
    public static function saveObj($tipologia){
            $saveFasciaOraria = FEntityManagerSQL::getInstance()->saveObject(self::getClass(), $tipologia);
            if($saveFasciaOraria !== null){
                return $saveFasciaOraria;
            }else{
                return false;
            }
    }

    /**
     * QUESTO SERVE PER CANCELLARE UNA TIPOLOGIA con il suo NOME COME ARGOMENTO(EVENTUALE CAMBIO DI NOME)
     * POTREBBE ESSERE MODIFICATO IN MODO DA DARE IN INPUT DIRETTAMENTE LA TIPOLOGIA
     */
    public static function eliminatipologia($nome_tipologia){        
        $eliminatipologia = FEntityManagerSQL::getInstance()->deleteObjInDb(self::getTable(), "nome_tipologia", $nome_tipologia);
        if($eliminatipologia !== null){
            return $eliminatipologia;
        }else{
            return false;
        }
    }


>>>>>>> origin/main
}