<?php

//require_once '../utility/autoload.php';

/**
 * La classe FAppuntamento fornisce query per gli oggetti EAppuntamento
 * @author Gruppo AmbulaCare
 * @package Foundation
 */

class FAppuntamento{
    /** tabella con la quale opera */          
    private static $table="appuntamento";
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

    /** PER FARE LA LOAD DAL DB ed INSTANZIARE gli appuntamenti data query result l'array degli APPUNTAMENTI da istanziare
     * Proxy obj
     */
    public static function creaappuntamento($queryResult){
        if(count($queryResult) > 0){
            $appuntamenti = array();
            for($i = 0; $i < count($queryResult); $i++){
                $appuntamento = new EAppuntamento($queryResult[$i]['stato']);
                $appuntamento->setIdAppuntamento($queryResult[$i]['IdAppuntamento']);  //PER LA PK AUTOINCREMENT
                //come si mette il paziente? (FOREIGN KEY)
                //DA TESTARE
                $paziente = FPaziente::getObj($queryResult[$i]['IdPaziente']);
                $appuntamento->setPaziente($paziente);  //FK->GLI ASSEGNO DIRETTAMENTE L'OGGETTO

                //ispirazione presa da FReport
                //Metto la fascia oraria (FOREIGN KEY)
                //DA TESTARE
                $fascia_oraria = FFasciaOraria::getObj($queryResult[$i]['IdFasciaOraria']);  //
                $appuntamento->setFasciaoraria($fascia_oraria);  //FK->GLI ASSEGNO DIRETTAMENTE L'OGGETTO

                //ispirazione presa da FReport
                $recensioni[] = $appuntamento;
            }
            return $appuntamenti;   //ARRAY DEGLI APPUNTAMENTI
        }else{
            return array();
        }
    }

    //PER LOADDARE UN APPUNTAMENTO DAL SUO ID
    public static function getObj($IdAppuntamento){
        $result = FEntityManagerSQL::getInstance()->retriveObj(self::getTable(), self::getKey(), $IdAppuntamento);
        //var_dump($result);
        if(count($result) > 0){
            $Appuntamento = self::creaappuntamento($result);
            return $Appuntamento;
        }else{
            return null;
        }
    }

    //PER LOADDARE UN APPUNTAMENTO DAL SUO IDFasciaOraria
    public static function getappuntamentofromfasciaoraria($IdFascia_oraria){
        $result = FEntityManagerSQL::getInstance()->retriveObj(self::getTable(), "IdFasciaOraria" , $IdFascia_oraria);
        //var_dump($result);
        if(count($result) > 0){
            $Appuntamento = self::creaappuntamento($result);
            return $Appuntamento;
        }else{
            return null;
        }
    }

    //PER LOADDARE UN APPUNTAMENTO DAL SUO IdPaziente
    public static function getappuntamentofrompaziente($IdPaziente){
        $result = FEntityManagerSQL::getInstance()->retriveObj(self::getTable(), "IdPaziente" , $IdPaziente);
        //var_dump($result);
        if(count($result) > 0){  //dovrebbe funzionare per molteplici appuntamenti
            $Appuntamento = self::creaappuntamento($result);
            return $Appuntamento;
        }else{
            return null;
        }
    }


    //CON QUESTO SALVO GLI APPUNTAMENTI, MA DOVREBBE ANCHE SERVIRE UNA MODALITà DI MODIFICA
    //if field null salva, sennò deve updetare la table
    //fieldArray è un array che deve contere array aventi nome del field e valore 
    //ALTRO MALLOPPONE CHE SERVE A SALVARE UN APPUNTAMENTO o AD AGGIORNARNE I DATI

    public static function saveObj($obj, $fieldArray = null){
        if($fieldArray === null){   
            try{
                FEntityManagerSQL::getInstance()->getDb()->beginTransaction();
                $savePersonAndLastInsertedID = FEntityManagerSQL::getInstance()->saveObject(FAppuntamento::getClass(), $obj);
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
                    FEntityManagerSQL::getInstance()->updateObj(FAppuntamento::getTable(), $fv[0], $fv[1], self::getKey(), $obj->getId());
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

    /**
     * QUESTO SERVE PER CANCELLARE UN APPUNTAMENTO con La sua PK COME ARGOMENTO
     * POTREBBE ESSERE MODIFICATO IN MODO DA DARE IN INPUT DIRETTAMENTE L'APPUNTAMENTO
     */
    public static function eliminaappuntamento($IdAppuntamento){        
        $eliminaAppuntamento = FEntityManagerSQL::getInstance()->deleteObjInDb(self::getTable(), self::getKey(), $IdAppuntamento);
        if($eliminaAppuntamento !== null){
            return $eliminaAppuntamento;
        }else{
            return false;
        }
    }

    public static function confrontadataappuntamenti($app1, $app2) {//SERVONO LE FASCE ORARIE SE VOGLIAMO ORDINARE
        //POTREMMO TRANQUILLAMENTE NON FARLO E ORDINDARE PER PK

        $time1 = $app1->getIdAppuntamento();  //L'ID DEGLI APPUNTAMENTI SEGUE L'ORDINE DI CREAZIONE, POTREBBE ESSERE USATO
        $time2 = $app2->getIdAppuntamento();

        if ($time1 == $time2) {
            return 0;
        }

        return ($time1 > $time2) ? -1 : 1;
    }





}