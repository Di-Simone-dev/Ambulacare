<?php

//require_once '../utility/autoload.php';

/**
 * La classe FMedico fornisce query per gli oggetti EMedico.
 * @author Gruppo AmbulaCare
 * @package Foundation
 */

class FMedico  {
    /** classe foundation */
    private static $class="FMedico";
	/** tabella con la quale opera */
    private static $table="medico";
    /** valori della tabella */
    private static $values="(:IdMed,:nome,:cognome,:email,:password,:attivo,:costo)";

    /** costruttore*/ 
    public function __construct(){}

    /**
    * Questo metodo lega gli attributi del Medico da inserire con i parametri della INSERT
    * @param PDOStatement $stmt
    * @param EMedico $rec Medico in cui i dati devono essere inseriti nel DB
    */
    public static function bind($stmt, EMedico $cli){
      $stmt->bindValue(':IdMed',$cli->getIdMed(), PDO::PARAM_STR);
      $stmt->bindValue(':nome',$cli->getNome(), PDO::PARAM_STR);
      $stmt->bindValue(':cognome',$cli->getCognome(), PDO::PARAM_STR);
      $stmt->bindValue(':email',$cli->getEmail(), PDO::PARAM_STR);
       $stmt->bindValue(':password',$cli->getPassword(), PDO::PARAM_STR);
      $stmt->bindValue(':attivo',$cli->getAttivo(), PDO::PARAM_BOOL);
        $stmt->bindValue(':costo',$cli->getCosto(), PDO::PARAM_STR);
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
    * Permette la store sul db
    * @param EMedico $cli oggetto da salvare
    */
    public static function store($cli){
        $db=FDatabase::getInstance();
        $id = $db->storeDB("FUtenteloggato" , $cli);
        $id1 = $db->storeDB(static::getClass(), $cli );
    }

    /**
     * Permette la load sul db
     * @param $id valore da ricercare nel campo $field
     * @param $field valore del campo della ricerca
     * @return object $cli l'oggetto cliente se presente
     */
    public static function loadByField($field, $id)
    {
		$cli = null;
        $tra = null;
        $db = FDatabase::getInstance();
        $result = $db->loadDB(static::getClass(), $field, $id);
        $rows_number = $db->interestedRows(static::getClass(), $field, $id);
        if (($result != null) && ($rows_number == 1)) {
            $ute = FUtenteloggato::loadByField("email", $result["email"]);
            $cli = new EMedico($ute->getNome(), $ute->getCognome(), $ute->getEmail(), $ute->getPassword(),$ute->getAttivo(),$ute->getCosto());
        } else {
            if (($result != null) && ($rows_number > 1)) {
                $tra = array();
                for ($i = 0; $i < count($result); $i++) {
                    $ute[] = FUtenteloggato::loadByField("email", $result[$i]["email"]);
                    $cli[] = new EMedico($ute[$i]->getNome(), $ute[$i]->getCognome(), $ute[$i]->getEmail(), $ute[$i]->getPassword(),$ute->getAttivo(),$ute->getCosto());
                }
            }
        }
        return $cli;
    }


    /**
     * Metodo che verifica se esiste un medico con un dato valore in uno dei campi
     * @param $id valore da usare come ricerca
     * @param $field campo da usare come ricerca
     * @return true se esiste il cliente, altrimenti false
     */
    public static function exist ($field, $id) {
        $ris = false;
        $db = FDatabase::getInstance();
        $result = $db->existDB(static::getClass(), $field, $id);
        if($result!=null)
            $ris = true;
        return $ris;
    }

    /** Metodo che permette l'aggiornamento del valore di un attributo passato come parametro   */

	public static function update($field, $newvalue, $pk, $id){
		$result = FUtenteloggato::update($field,$newvalue,$pk,$id);
		if($result) return true;
		else return false;
	}



    }

?>