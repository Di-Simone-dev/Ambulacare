<?php

//require_once '../utility/autoload.php';

/**
 * La classe FPaziente fornisce query per gli oggetti EPaziente.
 * @author Gruppo AmbulaCare
 * @package Foundation
 */

/*PAZIENTE CHE INTERAGISCE CON IL DB:
1)CREARE UN APPUNTAMENTO (CREATE)
2)MODIFICARE UN APPUNTAMENTO (UPDATE)
3)VISUALIZZARE UN REFERTO (RETRIEVE)
4)POSTARE UNA RECENSIONE (CREATE)

metodi già esistenti che teniamo:
__construct()
bind($stmt, EPaziente $cli)
getClass()  ritorna la classe
getTable()  ritorna la table
getValues() ritorna la stringa degli attributi
store($cli) salva sul db un oggetto


*/
class FPaziente  {
    /** classe foundation */
    private static $class="FPaziente";

	/** tabella con la quale opera */
    private static $table="Paziente";

    /** I CAMPI DELLA TABLE PAZIENTE*/
    private static $values="(:IdPaz,:nome,:cognome,:email,:password,:Codice_Fiscale,:Data_nascita,:Luogo_nascita,:residenza,:Numero_telefono,:attivo)";

    /** costruttore*/ 
    public function __construct(){}

    /**
    * Questo metodo lega gli attributi del Paziente da inserire con i parametri della INSERT
    * @param PDOStatement $stmt
    * @param EPaziente $paz Paziente in cui i dati devono essere inseriti nel DB
    */
    public static function bind($stmt, EPaziente $cli){
            $stmt->bindValue(':IdPaz',$cli->getIdPaz(), PDO::PARAM_STR);
            $stmt->bindValue(':nome',$cli->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(':cognome',$cli->getCognome(), PDO::PARAM_STR);
            $stmt->bindValue(':email',$cli->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(':password',$cli->getPassword(), PDO::PARAM_STR);
            $stmt->bindValue(':Codice_Fiscale',$cli->getCodice_Fiscale(), PDO::PARAM_STR);
            $stmt->bindValue(':Data_nascita',$cli->getData_nascita(), PDO::PARAM_STR);
            $stmt->bindValue(':Luogo_nascita',$cli->getLuogo_nascita(), PDO::PARAM_STR);
            $stmt->bindValue(':residenza',$cli->getResidenza(), PDO::PARAM_STR);
            $stmt->bindValue(':Numero_telefono',$cli->getNumero_telefono(), PDO::PARAM_STR);
            $stmt->bindValue(':attivo',$cli->getAttivo(), PDO::PARAM_BOOL);
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
    * @param EPaziente $cli oggetto da salvare
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
     * @return object $cli l'oggetto paziente se presente
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
            $cli = new EPaziente($ute->getNome(), $ute->getCognome(), $ute->getEmail(), $ute->getPassword(), $ute->getCodice_Fiscale(), $ute->getData_nascita(), $ute->getLuogo_nascita(), $ute->getResidenza(), $ute->getNumero_telefono(),$ute->getAttivo());
        } else {
            if (($result != null) && ($rows_number > 1)) {
                $tra = array();
                for ($i = 0; $i < count($result); $i++) {
                    $ute[] = FUtenteloggato::loadByField("email", $result[$i]["email"]);
                    $cli[] = new EPaziente($ute[$i]->getNome(), $ute[$i]->getCognome(), $ute[$i]->getEmail(), $ute[$i]->getPassword(), $ute[$i]->getCodice_Fiscale(), $ute[$i]->getData_nascita(), $ute[$i]->getLuogo_nascita(), $ute[$i]->getResidenza(), $ute[$i]->getNumero_telefono(), $ute[$i]->getAttivo());
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
    /*
    public static function exist ($field, $id) {
        $ris = false;
        $db = FDatabase::getInstance();
        $result = $db->existDB(static::getClass(), $field, $id);
        if($result!=null)
            $ris = true;
        return $ris;
    }
*/
    /** Metodo che permette l'aggiornamento del valore di un attributo passato come parametro   */

	public static function update($field, $newvalue, $pk, $id){
		$result = FUtenteloggato::update($field,$newvalue,$pk,$id);
		if($result) return true;
		else return false;
	}



    }

?>