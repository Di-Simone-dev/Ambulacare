<?php

//require_once '../utility/autoload.php';

/**
 * La classe FPaziente fornisce query per gli oggetti EPaziente.
 * @author Gruppo AmbulaCare
 * @package Foundation
 */

class FPaziente  {
	/** tabella con la quale opera */
    private static $table="paziente";

    /** campi della table paziente (escluso il primo*/
    private static $values="(NULL,:nome,:cognome,:email,:password,:codice_fiscale,:data_nascita,:luogo_nascita,:residenza,:numero_telefono,:attivo)";

    /** nome del campo della primary key della tabella*/
    private static $key = "IdPaziente";

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
    * @return $values nomi delle colonne della tabella
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
    * Questo metodo lega gli attributi del Paziente da inserire con i parametri della INSERT
    * @param PDOStatement $stmt
    * @param EPaziente $paz Paziente in cui i dati devono essere inseriti nel DB
    */
    public static function bind($stmt, EPaziente $cli){
            //$stmt->bindValue(':IdPaziente',$cli->getIdPaziente(), PDO::PARAM_STR);
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
    //CAMBIO QUESTA FUNZIONE IN MODO CHE LE "CREA*" RESTITUISCANO SEMPRE ARRAY 
    public static function creapaziente($queryResult){
        /*
        if(count($queryResult) == 1){
            //nel nostro caso una separazione non è necessaria, quindi si fa tutto con $query result perchè contiene tutti i campi
            $paziente = new EPaziente($queryResult[0]['nome'],$queryResult[0]['cognome'],
                                    $queryResult[0]['email'], $queryResult[0]['password'],$queryResult[0]['codice_fiscale'],
                                    $queryResult[0]['data_nascita'],$queryResult[0]['luogo_nascita'],$queryResult[0]['residenza'],
                                    $queryResult[0]['numero_telefono'],$queryResult[0]['attivo']);
            $paziente -> setIdPaziente($queryResult[0]['IdPaziente']);   //IMPORTANTE SETTARE LA PRIMARY KEY
            return $paziente;
        }
        //Questo nel caso di più utenti in output dalla query
        else
        */
        if(count($queryResult) > 0){
            $pazienti = array();
            for($i = 0; $i < count($queryResult); $i++){
                

                $paziente = new EPaziente($queryResult[$i]['nome'],$queryResult[$i]['cognome'],
                                        $queryResult[$i]['email'], $queryResult[$i]['password'],$queryResult[$i]['codice_fiscale'],
                                        $queryResult[$i]['data_nascita'],$queryResult[$i]['luogo_nascita'],$queryResult[$i]['residenza'],
                                        $queryResult[$i]['numero_telefono'],$queryResult[$i]['attivo']);
                $paziente -> setIdPaziente($queryResult[$i]['IdPaziente']);   //IMPORTANTE SETTARE LA PRIMARY KEY
                $pazienti[] = $paziente;   //AGGIUNGE L'ELEMENTO ALL'ARRAY PAZIENTI
            }
            return $pazienti;
        }else{
            return array();
        }
        
    }

    /**
     * Permette la load dal db di un paziente mettendo il suo ID come argomento
     * @param $id valore da ricercare nel campo $field
     * @return $paziente l'oggetto paziente se presente
     */
    public static function getObj($id){
        $result = FEntityManagerSQL::getInstance()->retrieveObj(FPaziente::getTable(), self::getKey(), $id);
        //var_dump($result);
        if(count($result) > 0){
            $paziente = self::creapaziente($result);  //va bene anche per un array di pazienti
            return $paziente;
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
            $paziente = self::creapaziente($result);  //va bene anche per un array di pazienti
            return $paziente;
        }else{
            return null;
        }

    }

    public static function getpazientefromemail($email){
        $result = FEntityManagerSQL::getInstance()->retrieveObj(FPaziente::getTable(), "email", $email);
        //var_dump($result);
        if(count($result) > 0){
            $paziente = self::creapaziente($result);  //va bene anche per un array di pazienti
            return $paziente;
        }else{
            return null;
        }

    }


    /*
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

    public static function saveObj($paziente, $fieldArray = null){
        if($fieldArray === null){   
            try{
                FEntityManagerSQL::getInstance()->getDb()->beginTransaction();
                $savePersonAndLastInsertedID = FEntityManagerSQL::getInstance()->saveObject(FPaziente::getClass(), $paziente);
                if($savePersonAndLastInsertedID !== null){
                    $saveUser = FEntityManagerSQL::getInstance()->saveObjectFromId(self::getClass(), $paziente, $savePersonAndLastInsertedID);
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
                    FEntityManagerSQL::getInstance()->updateObj(FPaziente::getTable(), $fv[0], $fv[1], self::getKey(), $paziente->getId());
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

    public static function verify($field, $id){  //PER IL CHECK DEI NON DUPLICATI ALLA REGISTRAZIONE
        $queryResult = FEntityManagerSQL::getInstance()->retrieveObj(self::getTable(), $field, $id);

        return FEntityManagerSQL::getInstance()->existInDb($queryResult);
    }

    public static function getPazientinonBannati()
    {
        $result = FEntityManagerSQL::getInstance()->retrieveattivi(self::getTable());
        //$result contiene i medici con IdTipologia e NON bannati
        //il controllo sul ban viene effettuato direttamente nel metodo objectListNotRemoved
        if(count($result) == 1){
            $medici = array();
            $medico = self::creapaziente($result);
            $medici[] = $medico;
            return $medici;
        }elseif(count($result) > 1){
            return self::creapaziente($result);
        }else{
            return $result;
        }
        
    }


    

}
