<?php

//require_once '../utility/autoload.php';

class FFasciaOraria{
    /** tabella con la quale opera */
    private static $table = "fascia_oraria";
    /** valori della tabella */
    private static $values="(NULL,:data,:IdCalendario)";  //per l'autoincrement si fa così

    /** nome del campo della primary key della tabella*/
    private static $key = "IdFasciaOraria";
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
    * Questo metodo lega gli attributi della Fascia Oraria da inserire con i parametri della INSERT
    * @param PDOStatement $stmt 
    * @param EFasciaoraria $fascor fascia oraria in cui i dati devono essere inseriti nel DB
    */
    public static function bind($stmt,EFasciaoraria $fascor) {
    	//$stmt->bindValue(':IdFasciaOraria',NULL, PDO::PARAM_INT); //l'id è posto a NULL poichè viene dato automaticamente dal DBMS (AUTOINCREMENT_ID)
        $stmt->bindValue(':data', $fascor->getData(), PDO::PARAM_STR); 
        //$stmt->bindValue(':ora_inizio', $fascor->getOraInizio(), PDO::PARAM_STR); 
        $stmt->bindValue(':IdCalendario', $fascor->getCalendario()->getIdCalendario(), PDO::PARAM_STR); //ATTENZIONE ALLE FOREIGN KEY
    }

    /** PER FARE LA LOAD DAL DB ed INSTANZIARE LE FASCE ORARIE data query risult l'array con le fasce orarie da istanziare
     * crea le fasce orarie dato un input di 
     */
    public static function creafasciaoraria($queryResult){
        if(count($queryResult) > 0){
            $orario = array();
            for($i = 0; $i < count($queryResult); $i++){
                $fasciaoraria = new EFasciaoraria($queryResult[$i]['data']);
                $fasciaoraria->setIdFasciaOraria($queryResult[$i]['IdFasciaOraria']);  //PER LA PK AUTOINCREMENT
                //come si mette il calendario? (FOREIGN KEY)
                //DA TESTARE
                $calendario = FCalendario::getObj($queryResult[$i]['IdCalendario']);  //il campo calendario è proprio l'id
                $fasciaoraria->setCalendario($calendario[0]);  //$calendario è un array e devo prendere il primo ed unico elemento

                //ispirazione presa da FReport
                $orario[] = $fasciaoraria;
            }
            return $orario;   //ARRAY DELLE FASCE ORARIE LOADDATE
        }else{
            return array();
        }
        //QUESTO è IL CODICE DI PAZIENTE CHE VA, PROVO A SOSTITUIRE QUELLO DI FASCIA ORARIA CON QUESTO
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
        elseif(count($queryResult) > 1){
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
        */



    }

    //PER LOADDARE UNA FASCIA ORARIA DAL SUO ID
    public static function getObj($IdFascia_oraria){
        $result = FEntityManagerSQL::getInstance()->retrieveObj(FFasciaOraria::getTable(), self::getKey(), $IdFascia_oraria);
        //var_dump($result);
        if(count($result) > 0){
            $post = self::creafasciaoraria($result);
            return $post;
        }else{
            return null;
        }
    }


    //CON QUESTO UPDATEIAMO LE FASCE ORARIE (SERVIREBBE ANCHE UNA DELETE, LE MODIFICHE NON HANNO TROPPO SENSO)
    public static function saveObj($fasciaoraria){
            $saveFasciaOraria = FEntityManagerSQL::getInstance()->saveObject(self::getClass(), $fasciaoraria);
            if($saveFasciaOraria !== null){
                return $saveFasciaOraria;
            }else{
                return false;
            }
    }

    /**
     * QUESTO SERVE PER CANCELLARE UNA FASCIA ORARIA con La sua PK COME ARGOMENTO(EVENTUALE CAMBIO DI DISPONIBILITà DI UN MEDICO)
     * POTREBBE ESSERE MODIFICATO IN MODO DA DARE IN INPUT DIRETTAMENTE LA FASCIA
     */
    public static function eliminafasciaoraria($IdFascia_oraria){        
        $eliminaFasciaOraria = FEntityManagerSQL::getInstance()->deleteObjInDb(self::getTable(), "IdFasciaOraria", $IdFascia_oraria);
        if($eliminaFasciaOraria !== null){
            return $eliminaFasciaOraria;
        }else{
            return false;
        }
    }

}
