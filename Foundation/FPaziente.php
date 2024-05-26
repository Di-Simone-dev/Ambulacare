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
	/** tabella con la quale opera */
    private static $table="Paziente";

    /** I CAMPI DELLA TABLE PAZIENTE*/
    private static $values="(:IdPaziente,:nome,:cognome,:email,:password,:codice_fiscale,:data_nascita,:luogo_nascita,:residenza,:numero_telefono,:attivo)";

    private static $key = "idPaziente";

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
    * Questo metodo lega gli attributi del Paziente da inserire con i parametri della INSERT
    * @param PDOStatement $stmt
    * @param EPaziente $paz Paziente in cui i dati devono essere inseriti nel DB
    */
    public static function bind($stmt, EPaziente $cli){
            $stmt->bindValue(':IdPaz',$cli->getIdPaziente(), PDO::PARAM_STR);
            $stmt->bindValue(':nome',$cli->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(':cognome',$cli->getCognome(), PDO::PARAM_STR);
            $stmt->bindValue(':email',$cli->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(':password',$cli->getPassword(), PDO::PARAM_STR);
            $stmt->bindValue(':codice_fiscale',$cli->getCodiceFiscale(), PDO::PARAM_STR);
            $stmt->bindValue(':data_nascita',$cli->getDatanascita(), PDO::PARAM_STR);
            $stmt->bindValue(':luogo_nascita',$cli->getLuogonascita(), PDO::PARAM_STR);
            $stmt->bindValue(':residenza',$cli->getResidenza(), PDO::PARAM_STR);
            $stmt->bindValue(':numero_telefono',$cli->getNumerotelefono(), PDO::PARAM_STR);
            $stmt->bindValue(':attivo',$cli->getAttivo(), PDO::PARAM_BOOL);
    }

    //MALLOPPONE CHE SERVE AD ISTANZIARE I PAZIENTI
    //queryresult è una roba del tipo $result = FEntityManagerSQL::getInstance()->retriveObj(FPerson::getTable(), self::getKey(), $id);
    //queryresult è quindi un array associativo bidimensionale
    public static function creapaziente($queryResult){
        if(count($queryResult) == 1){
            //nel nostro caso una separazione non è necessaria, quindi si fa tutto con $query result perchè contiene tutti i campi
            $paziente = new EPaziente($queryResult[0]['IdPaziente'], $queryResult[0]['nome'],$queryResult[0]['cognome'],
                                    $queryResult[0]['email'], $queryResult[0]['password'],$queryResult[0]['codice_fiscale'],
                                    $queryResult[0]['data_nascita'],$queryResult[0]['luogo_nascita'],$queryResult[0]['residenza'],
                                    $queryResult[0]['numero_telefono'],$queryResult[0]['attivo']);
            return $paziente;
        }
        //Questo nel caso di più utenti in output dalla query
        elseif(count($queryResult) > 1){
            $pazienti = array();
            for($i = 0; $i < count($queryResult); $i++){
                

                $paziente = new EPaziente($queryResult[$i]['IdPaziente'], $queryResult[$i]['nome'],$queryResult[$i]['cognome'],
                                        $queryResult[$i]['email'], $queryResult[$i]['password'],$queryResult[$i]['codice_fiscale'],
                                        $queryResult[$i]['data_nascita'],$queryResult[$i]['luogo_nascita'],$queryResult[$i]['residenza'],
                                        $queryResult[$i]['numero_telefono'],$queryResult[$i]['attivo']);
               
                $pazienti[] = $paziente;   //AGGIUNGE L'ELEMENTO ALL'ARRAY PAZIENTI
            }
            return $pazienti;
        }else{
            return array();
        }
        
    }

        
    /*  STA ROBA NON DOVREBBE SERVIRE
    * Permette la store sul db del PAZIENTE 
    * @param EPaziente $cli oggetto da salvare
    
    public static function store($cli){
        $db=FEntityManagerSQL::getInstance();
        $db->storeDB("FPaziente" , $cli);
        //$id1 = $db->storeDB(self::getClass(), $cli );
    }
    */


    /**
     * Permette la load dal db di un paziente mettendo il suo ID come argomento
     * @param $id valore da ricercare nel campo $field
     * @return $user l'oggetto paziente se presente
     */
    public static function getpazientefromid($id){
        $result = FEntityManagerSQL::getInstance()->retriveObj(FPaziente::getTable(), self::getKey(), $id);
        //var_dump($result);
        if(count($result) > 0){
            $user = self::creapaziente($result);  //va bene anche per un array di pazienti
            return $user;
        }else{
            return null;
        }

    }

    //QUESTA QUERY PUò ESSERE COMODA PER LA RICERCA
    //MA BISOGNA CAPIRE BENE COME IMPLEMENTARLA (SOLO NOME,SOLO COGNOME O ENTRAMBI)
    //SERVE USARE getObjOnAttributes, per ora è implementato per prendere entrambi gli input
    public static function getpazientefromnome_cognome($nome,$cognome){
        $result = FEntityManagerSQL::getInstance()->getObjOnAttributes(FPaziente::getTable(), "nome", $nome,"cognome", $cognome);
        //var_dump($result);
        if(count($result) > 0){
            $user = self::creapaziente($result);  //va bene anche per un array di pazienti
            return $user;
        }else{
            return null;
        }

    }


    /**
     * Metodo che verifica se esiste un paziente con un dato valore in uno dei campi  (FIELD=CAMPO,ID=VALORE)
     * @param $id valore da usare come ricerca
     * @param $field campo da usare come ricerca
     * @return true se esiste il paziente, altrimenti false
     */
    /*
    public static function esistepaziente ($field, $id) {
        $ris = false;
        $db = FEntityManagerSQL::getInstance();
        $result = $db->existDB(self::getClass(), $field, $id);
        if($result!=null)
            $ris = true;
        return $ris;
    }
    */

    //if field null salva, sennò deve updetare la table
    //fieldArray è un array che deve contere array aventi nome del field e valore 
    //ALTRO MALLOPPONE CHE SERVE A SALVARE UN PAZIENTE o AD AGGIORNARNE I DATI

    public static function saveObj($obj, $fieldArray = null){
        if($fieldArray === null){   
            try{
                FEntityManagerSQL::getInstance()->getDb()->beginTransaction();
                $savePersonAndLastInsertedID = FEntityManagerSQL::getInstance()->saveObject(FPerson::getClass(), $obj);
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
                foreach($fieldArray as $fv){   //fv[0] è il campo da aggiornare e fv[1] ne contiene il valore 
                    if($fv[0] != "email" && $fv[0] != "password"){   //non deve essere un cambiamento di queste (sicurezza)
                        FEntityManagerSQL::getInstance()->updateObj(FUser::getTable(), $fv[0], $fv[1], self::getKey(), $obj->getId());
                    }else{
                        FEntityManagerSQL::getInstance()->updateObj(FPerson::getTable(), $fv[0], $fv[1], self::getKey(), $obj->getId());
                    }
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
