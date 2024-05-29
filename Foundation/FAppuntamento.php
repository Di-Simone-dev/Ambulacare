<?php

//require_once '../utility/autoload.php';

/**
 * La classe FAppuntamento fornisce query per gli oggetti EAppuntamento
 * @author Gruppo AmbulaCare
 * @package Foundation
 */

class FAppuntamento{
    /** tabella con la quale opera */          
    private static $table="Appuntamento";
    /** valori della tabella */
    private static $values="(NULL,:stato,:IdPaziente,:IdFasciaOraria)";
    /** nome del campo della primary key della tabella*/
    private static $key = "IdAppuntamento";

    /** costruttore*/ 
    public function __construct(){}

	/**
	 * questo metodo restituisce il nome della classe per la costruzione delle Query
	 * @return string $class nome della classe
	 */
    public static function getClass(){
        return static::class;
    }

	/**
	 * questo metodo restituisce il nome della tabella per la costruzione delle Query
	 * @return string $table nome della tabella
	 */
    public static function getTable(){
        return static::$table;
    }

	/**
	 * questo metodo restituisce l'insieme dei valori per la costruzione delle Query
	 * @return string $values nomi delle colonne della tabella
	 */
    public static function getValues(){
        return static::$values;
    }

    /**
    * questo metodo restituisce il nome del campo della primary key per la costruzione delle Query
    * @return string $key nome del campo della primary key della tabella
    */
    public static function getKey(){
        return self::$key;
    }

    public static function bind($stmt,EAppuntamento $appuntamento){
        //$stmt->bindValue(':IdAppuntamento', NULL, PDO::PARAM_INT);
        $stmt->bindValue(':stato', $appuntamento->getStato(), PDO::PARAM_STR);
        $stmt->bindValue(':IdPaziente', $appuntamento->getPaziente()->getIdPaziente(), PDO::PARAM_STR);
        $stmt->bindValue(':IdFasciaOraria', $appuntamento->getFasciaoraria()->getIdFasciaoraria(), PDO::PARAM_STR);
    }

    /** PER FARE LA LOAD DAL DB ed INSTANZIARE LE RECENSIONI data query risult l'array con le fasce orarie da istanziare
     * Proxy obj
     */
    public static function crearecensione($queryResult){
        if(count($queryResult) > 0){
            $recensioni = array();
            for($i = 0; $i < count($queryResult); $i++){
                $recensione = new ERecensione($queryResult[$i]['titolo'],$queryResult[$i]['contenuto'],$queryResult[$i]['valutazione']);
                $recensione->setIdRecensione($queryResult[$i]['idRecensione']);  //PER LA PK AUTOINCREMENT
                //come si mette il paziente? (FOREIGN KEY)
                //DA TESTARE
                $paziente = FPaziente::getpazientefromid($queryResult[$i]['IdPaziente']);  //il campo IdPaziente è proprio l'id
                $recensione->setPaziente($paziente);

                //ispirazione presa da FReport
                //come si mette il medico? (FOREIGN KEY)
                //DA TESTARE
                $medico = FMedico::getmedicofromid($queryResult[$i]['IdMedico']);  //il campo IdMedico è proprio l'id
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
    public static function getrecensionefromid($IdRecensione){
        $result = FEntityManagerSQL::getInstance()->retriveObj(self::getTable(), self::getKey(), $IdRecensione);
        //var_dump($result);
        if(count($result) > 0){
            $recensione = self::crearecensione($result);
            return $recensione;
        }else{
            return null;
        }
    }


    //CON QUESTO SALVIAMO LE RECENSIONI
    public static function salvarecensione($recensione){
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






}