<?php

//require_once '../utility/autoload.php';

/**
 * La classe FMedico fornisce query per gli oggetti EMedico.
 * @author Gruppo AmbulaCare
 * @package Foundation
 */

class FMedico  {
	/** tabella con la quale opera */
    private static $table="Medico";
    /** valori della tabella */
    private static $values="(:IdMed,:nome,:cognome,:email,:password,:attivo,:costo:tipologia)";

    private static $key = "IdMedico";
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
    * Questo metodo lega gli attributi del Medico da inserire con i parametri della INSERT
    * @param PDOStatement $stmt
    * @param EMedico $rec Medico in cui i dati devono essere inseriti nel DB
    */
    public static function bind($stmt, EMedico $cli){
        $stmt->bindValue(':IdMedico',$cli->getIdMedico(), PDO::PARAM_STR);
        $stmt->bindValue(':nome',$cli->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':cognome',$cli->getCognome(), PDO::PARAM_STR);
        $stmt->bindValue(':email',$cli->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':password',$cli->getPassword(), PDO::PARAM_STR);
        $stmt->bindValue(':attivo',$cli->getAttivo(), PDO::PARAM_BOOL);
        $stmt->bindValue(':costo',$cli->getCosto(), PDO::PARAM_STR);
        $stmt->bindValue(':tipologia',$cli->getTipologia(), PDO::PARAM_STR);
    }

    //MALLOPPONE CHE SERVE AD ISTANZIARE I MEDICI
    //queryresult è una roba del tipo $result = FEntityManagerSQL::getInstance()->retriveObj(FPerson::getTable(), self::getKey(), $id);
    //queryresult è quindi un array associativo bidimensionale con prima chiave il numero dell'elemento e come seconda il campo
    public static function creamedico($queryResult){
        if(count($queryResult) == 1){
            //nel nostro caso una separazione non è necessaria, quindi si fa tutto con $query result perchè contiene tutti i campi
            $medico = new EMedico($queryResult[0]['IdMedico'], $queryResult[0]['nome'],$queryResult[0]['cognome'],
                                    $queryResult[0]['email'], $queryResult[0]['password'],$queryResult[0]['attivo'],
                                    $queryResult[0]['costo'],$queryResult[0]['tipologia']);
            return $medico;
        }
        //Questo nel caso di più utenti in output dalla query
        elseif(count($queryResult) > 1){
            $medici = array();
            for($i = 0; $i < count($queryResult); $i++){
                

                $medico =  new EMedico($queryResult[$i]['IdMedico'], $queryResult[$i]['nome'],$queryResult[$i]['cognome'],
                                        $queryResult[$i]['email'], $queryResult[$i]['password'],$queryResult[$i]['attivo'],
                                        $queryResult[$i]['costo'],$queryResult[$i]['tipologia']);
               
                $medici[] = $medico;   //AGGIUNGE L'ELEMENTO ALL'ARRAY MEDICI
            }
            return $medici;
        }else{
            return array();
        }
        
    }

    /**
     * Permette la load dal db di un medico mettendo il suo ID come argomento
     * @param $id valore da ricercare nel campo $field
     * @return $medico l'oggetto medico se presente
     */
    public static function getmedicofromid($id){
        $result = FEntityManagerSQL::getInstance()->retriveObj(FMedico::getTable(), self::getKey(), $id);
        //var_dump($result);
        if(count($result) > 0){
            $medico = self::creamedico($result);  //va bene anche per un array di medici
            return $medico;
        }else{
            return null;
        }

    }

    //RISULTA NECESSARIA PER SODDISFARE LE SPECIFICHE UNA QUERY CHE RESTITUISCA TUTTI I MEDICI DI UNA CERTA TIPOLOGIA
    public static function getmedicofromtipologia($idTipologia){
        $result = FEntityManagerSQL::getInstance()->retriveObj(FMedico::getTable(),"Tipologia", $idTipologia);
        //var_dump($result);
        if(count($result) > 0){
            $medico = self::creamedico($result);  //va bene anche per un array di medici
            return $medico;
        }else{
            return null;
        }

    }

    //if field null salva, sennò deve updetare la table
    //fieldArray è un array che deve contere array aventi nome del field e valore 
    //ALTRO MALLOPPONE CHE SERVE A SALVARE UN MEDICO o AD AGGIORNARNE I DATI

    public static function saveObj($obj, $fieldArray = null){
        if($fieldArray === null){   
            try{
                FEntityManagerSQL::getInstance()->getDb()->beginTransaction();
                $savePersonAndLastInsertedID = FEntityManagerSQL::getInstance()->saveObject(FMedico::getClass(), $obj);
                if($savePersonAndLastInsertedID !== null){
                    $saveUser = FEntityManagerSQL::getInstance()->saveObjectFromId(self::getClass(), $obj, $savePersonAndLastInsertedID);
                    FEntityManagerSQL::getInstance()->getDb()->commit();
                    if($saveUser){
                        return $savePersonAndLastInsertedID;
                    }
                }else{
                    return false;
                }
            }catch(PDOException $e){
                echo "ERROR " . $e->getMessage();
                FEntityManagerSQL::getInstance()->getDb()->rollBack();
                return false;
            }finally{
                FEntityManagerSQL::getInstance()->closeConnection();
            }  
        }else{   //QUA è NEL CASO DI UPDATE $fieldarray contiene i campi da updatare
            try{
                FEntityManagerSQL::getInstance()->getDb()->beginTransaction();
                //var_dump($fieldArray);
                foreach($fieldArray as $fv)
                {   //fv[0] è il campo da aggiornare e fv[1] ne contiene il valore 
                    FEntityManagerSQL::getInstance()->updateObj(FMedico::getTable(), $fv[0], $fv[1], self::getKey(), $obj->getId());
                }
                FEntityManagerSQL::getInstance()->getDb()->commit();
                return true;
            }catch(PDOException $e){
                echo "ERROR " . $e->getMessage();
                FEntityManagerSQL::getInstance()->getDb()->rollBack();
                return false;
            }finally{
                FEntityManagerSQL::getInstance()->closeConnection();
            }  
        }
    }












}
