<?php

require_once(__DIR__ . '/../config/config.php');

class FEntityManagerSQL{
    /**
     * Singleton Class
     */

     private static $instance;

     private static $db;


     private function __construct(){
        
        //global $host, $database, $username, $password;
		$host = DB_HOST; //localhost
		$database = DB_NAME;
		$username = DB_USER;
		$password = DB_PASS;


        try{
            self::$db = new PDO("mysql:host=$host; dbname=$database", $username, $password);
        }catch(PDOException $e){
            echo "ERROR". $e->getMessage();
            die;
        }

     }

    /**
     * Method to create an instance af the EntityManager
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     *  Method to close the connection with the Database destrying the instance of the EntityManager
     */
    public static function closeConnection(){

        static::$instance = null;
    }

    /**
     *  Method to return the PDO
     */
    public static function getDb(){
        return self::$db;
    }

    /**
     * Method to return rows from a query SELECT FROM @table WHERE @field = @id
     * @param $table Refers to the table of the Database
     * @param $field  Refers to a field of the table
     * @param mixed $id Refers to the value in the where clause
     * @return array
     */
    public static function retrieveObj($table, $field ,$id){
        try{
            $query = "SELECT * FROM " .$table. " WHERE ".$field." = '".$id."';";
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            //var_dump($stmt);
            $rowNum = $stmt->rowCount();
            if($rowNum > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row;
                }
                return $result;
            }else{
                return array();
            }
            
        }catch(PDOException $e){
            echo "ERROR" . $e->getMessage();
            return array();
        }
    }
    public static function retrieveall($table){
        try{
            $query = "SELECT * FROM " .$table. ";";
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            $rowNum = $stmt->rowCount();
            if($rowNum > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row;
                }
                return $result;
            }else{
                return array();
            }
            
        }catch(PDOException $e){
            echo "ERROR" . $e->getMessage();
            return array();
        }
    }

    /**
     * Method to return rows from a query SELECT FROM WHERE but with 2 fields 
     * @param $table Refers to the table of the Database
     * @param $field1  Refers to a field of the table (1st field)
     * @param mixed $id1 Refers to the value in the where clause (1st value)
     * @param $field2  Refers to a field of the table (1st field)
     * @param mixed $id2 Refers to the value in the where clause (1st value)
     * @return array
     */
    public static function getObjOnAttributes($table, $field1, $id1, $field2, $id2)
    {
        try{
            $query = "SELECT * FROM " . $table . " WHERE " . $field1 . " = '".$id1. "' AND " . $field2 . " = '". $id2. "';";
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            $rowNum = $stmt->rowCount();
            if($rowNum > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row;
                }
                return $result;
            }else{
                return array();
            }
            
        }catch(PDOException $e){
            echo "ERROR" . $e->getMessage();
            return array();
        }
    }

    /**
     * Method to check if the query return or not a row
     * @param array $queryResult Is the output of a query
     * @return bool   
     */
    public static function existInDb($queryResult){
        if(count($queryResult) > 0){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Method to update rows with UPDATE @table SET @field = @fieldValue WHERE @cond = @condvalue
     * @param $table Refers to the table of the Database
     * @param $field  Refers to the field to update
     * @param mixed $fieldvalue Refers to the value to update
     * @param $cond Refers to the Where condition
     * @param mixed $condvalue Refers to the value of the condition
     * @return bool
     */
    public static function updateObj($table, $field, $fieldValue, $cond, $condValue){
        
        try{
            $query = "UPDATE " . $table . " SET ". $field. " = '" . $fieldValue . "' WHERE " . $cond . " = '" . $condValue . "';";
            $stmt = self::$db->prepare($query);
            //var_dump($stmt);
            $stmt->execute();
            return true;
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Method to save an object in the Database using the INSERT TO query
     * @param $foundClass Refers to the name of the foundation class, so you can get the table and the value
     * @param $obj Refers to an Entity Object to save in the Database
     * @return int | null
     */
    public static function saveObject($foundClass, $obj)
    {
        try{
            $query = "INSERT INTO " . $foundClass::getTable() . " VALUES " . $foundClass::getValues();
            $stmt = self::$db->prepare($query);
            $foundClass::bind($stmt, $obj);
            //var_dump($stmt);
            $stmt->execute();
            $id = self::$db->lastInsertId();
            return $id;
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return null;
        }
    }

    /**
     * Method to store an object in the Database if we only have the id and we need to store only the id
     * @param $foundClass Refers to the name of the foundation class, so you can get the table and the value
     * @param int $id Refers to an Entity Object id to save in the Database
     * @return bool
     */
    public static function saveObjectFromId($foundClass, $obj, $id)
    {
        try{
            $query = "INSERT INTO " . $foundClass::getTable() . " VALUES " . $foundClass::getValues();
            $stmt = self::$db->prepare($query);
            $foundClass::bind($stmt,$obj, $id);
            //var_dump($stmt);
            $stmt->execute();
            return true;
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Method to return rows from a SELECT FROM WHERE but attivo is = 1 (so it's not banned)
     * @param $table Refers to the table of the Database
     * @param $field  Refers to a field of the table
     * @param mixed $id Refers to the value in the where clause
     * @return array
     */
    public static function objectListNotRemoved($table, $field, $id)
    {
        try{
            //QUESTO DOVREBBE ESSERE RITOCCATO PERCHè 1 = ATTIVO E 0 = DISATTIVATO 
            $query = "SELECT * FROM " . $table . " e WHERE e." . $field . " = '" . $id . "' AND e.attivo = 1;";
            //QUESTA QUERY DOVREBBE ESSERE CORRETTA
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            $rowNum = $stmt->rowCount();
            if($rowNum > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row;
                }
                self::closeConnection();
                return $result;
            }else{
                return array();
            }
        }catch(Exception $e){
            echo "ERROR " . $e->getMessage();
            return array();
        }
    }

    /**
     * Metodo che ritorna le righe di una select * dove attivo è = 1 (non bannato)
     * @param $table Tabella del database dove facciamo la select
     * @return array
     */
    public static function retrieveattivi($table)
    {
        try{
            $query = "SELECT * FROM " . $table . " e WHERE e.attivo = 1;";
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            $rowNum = $stmt->rowCount();
            if($rowNum > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row;
                }
                self::closeConnection();
                return $result;
            }else{
                return array();
            }
        }catch(Exception $e){
            echo "ERROR " . $e->getMessage();
            return array();
        }
    }

    /**
     * Metodo che cancella un oggetto nel database
     * @param $table Tabella del database dove andiamo ad effettuare le cancellazioni
     * @param $field  Il campo con cui identifichiamo le righe da cancellare
     * @param mixed $id Il valore del campo nelle righe da cancellare
     * @return boolean
     */
    public static function deleteObjInDb($table, $field, $id){
        try{
            $query = "DELETE FROM " . $table . " WHERE " . $field . " = '".$id."';";
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            return true;
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }



    //QUESTA CI SERVE NELLA PRATICA
    //metodo che dato in input un id di un medico ne restituisce la media delle recensioni
    public static function getaveragevalutazione($IdMedico){
        
        //MI SERVE PER TROVARE LA MEDIA DELLE RECENSIONI DI UN MEDICO
        //SELECT AVG(valutazione),IdMedico FROM Recensioni where IdMedico = $idMedico group by IdMedico
        try{
            $query = "SELECT AVG(valutazione) as valutazione,IdMedico FROM Recensione WHERE IdMedico = '" . $IdMedico . "' GROUP BY IdMedico;"
                        ;
            $stmt = self::$db->prepare($query);
            //var_dump($stmt);
            $stmt->execute();
            //BISOGNA FARE IL FETCH
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt->fetch();  //IL RISULTATO DOVREBBE ESSERE QUI  e dovremmo prendere il primo elemento per avere il valore della media
            return $row;  //DA TESTARE
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    //QUESTA CI SERVE NELLA PRATICA PER VISUALIZZARE L'AGENDA DEL MEDICO (solo appuntamenti futuri)
    //DOBBIAMO OTTENERE UNA LISTA DI APPUNTAMENTI
    //CAMPI DA VISUALIZZARE 
    //1.NOME E COGNOME PAZIENTE 2.DATA E ORA APPUNTAMENTO E LA TIPOLOGIA SAREBBE DA TOGLIERE (IMPLICITA)
    //PRENDIAMO IL NOME E COGNOME DEL PAZIENTE DA IdPaziente in Appuntamento 
    //Prendiamo la data e ora da IdFasciaOraria
    //Idealmente l'output dovrebbe essere un array che con un primo indice numerico scorre gli appuntamenti
    //con un secondo indice associativo invece prendiamo i campi
    //agenda[0][paziente]="Mario Rossi"
    //agenda[0][data_ora]="20/03/24 11:30"
    //agenda[0][id]= id dell'apputanemento per accedere alla modifica
    //metodo che dato in input l'id di un medico restituisce un array con le pk degli appuntamenti in agenda(da svolgere)
    // query = SELECT IdMedico,IdFasciaOraria,IdAppuntamento FROM Calendario,Fasciaoraria,Appuntamento
    // WHERE IdMedico = '" . $IdMedico . "'AND GETDATE()<=Fasciaoraria.data ORDER BY data;
    public static function getagendamedico($IdMedico){
        try{
            $query = "SELECT calendario.IdMedico, fascia_oraria.IdFasciaOraria,appuntamento.IdAppuntamento, appuntamento.IdPaziente, costo, appuntamento.IdPaziente
                      FROM calendario
                      INNER JOIN fascia_oraria ON calendario.IdCalendario = fascia_oraria.IdCalendario
                      INNER JOIN appuntamento ON appuntamento.IdFasciaOraria = fascia_oraria.IdFasciaOraria
                      WHERE IdMedico = '" . $IdMedico . "'AND CURDATE()>=data ORDER BY data;";
                      
            $stmt = self::$db->prepare($query);
            //var_dump($stmt);
            $stmt->execute();
            $rowNum = $stmt->rowCount(); //il numero di risultati della query ovvero il numero di appuntamenti nell'agenda di un medico
            if($rowNum > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row; 
                }
                $agenda=array();
                for($i=0;$i<$rowNum;$i++)
                {
                    $paziente = FPaziente::getObj($result[$i]["IdPaziente"]);  //QUESTO è UN ARRAY DI OGGETI CON 1 SOLO ELEMENTO
                    $fasciaoraria = FFasciaOraria::getObj($result[$i]["IdFasciaOraria"]);  //QUESTO è UN ARRAY DI OGGETTI CON 1 SOLO ELEMENTO
                    $agenda[$i]["nominativo_paziente"] = $paziente[0]->getCognome() . " ". $paziente[0]->getNome(); 
                    $agenda[$i]["data_ora_appuntamento"] = $fasciaoraria[0]->getData(); 
                    $agenda[$i]["IdAppuntamento"] = $result[$i]["IdAppuntamento"]; 
                    $agenda[$i]["costo"] = $result[$i]["costo"];
                    $agenda[$i]["IdPaziente"] = $result[$i]["IdPaziente"];
                    $agenda[$i]["IdFasciaOraria"] = $result[$i]["IdFasciaOraria"];    
                }
                return $agenda;
                //dovremmo avere un array associativo bidimensionale $result[0][IdAppuntamento]=l'id del primo appuntamento
                //dovremmo ciclare $result[i][IdAppuntamento] su un getter degli appuntamenti e $result[i][IdFasciaOraria], 
                }else{
                return array();
            }
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }


    //QUESTA CI SERVE PER NON VEDERE QUELLE DEI PAZIENTI BLOCCATI
    //DA CAPIRE BENE IN QUALE SITUAZIONE BISOGNA MOSTRARLE
    /*
    public static function getrecensionipazientiattivi($IdMedico){
        try{
            $query = "SELECT IdMedico,IdRecesione,titolo,contenuto,valutazione,data_creazione FROM Recensioni,Pazienti 
                        WHERE IdMedico = '" . $IdMedico . "'AND paziente.attivo=1;"
                        ;
            $stmt = self::$db->prepare($query);
            //var_dump($stmt);
            $stmt->execute();
            //BISOGNA FARE IL FETCH
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt->fetch();  //IL RISULTATO DOVREBBE ESSERE QUI  e dovremmo prendere il primo elemento per avere il valore della media
            return $row[0];  //DA TESTARE
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }*/



    //per fare questa query mi serve usare l'id del medico per accedere al calendario, poi alle fasce orarie e poi agli appuntamenti
    //sarebbe possibile fare due query diverse, una la uso per ottenere tutte le fasce orarie di un medico di una determinata settimana
    //poi questo array delle fasce orarie va usato per vedere se queste fasce orarie sono nella tabella degli appuntamenti
    public static function getdisponibilitàsettimana($IdMedico,$numerosettimana,$anno){
        
        try{//DOMENICA = 1 LUNEDI = 2 .. SABATO = 7 SERVE FARE -1
            $query = "SELECT IdMedico,IdFasciaOraria,WEEK(fascia_oraria.data) AS numerosettimana, YEAR(fascia_oraria.data) AS anno,
                      DAYOFWEEK(fascia_oraria.data) AS giornosettimana,HOUR(data) AS ora 
                      FROM calendario
                      INNER JOIN fascia_oraria on calendario.IdCalendario = fascia_oraria.IdCalendario 
                      WHERE IdMedico = '" . $IdMedico . "' AND WEEK(fascia_oraria.data) = '" . $numerosettimana . "' AND YEAR(fascia_oraria.data) = '" . $anno ."'
                      ORDER BY data;";
   
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            $rowNum = $stmt->rowCount();
            if($rowNum >= 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row;  //aggiungiamo la row all'array result 
                }
                $prenotabili=array();
                $slotorari = ["","14","15","16","17","18"]; //sono fissi
                for($i=0;$i<$rowNum;$i++)
                {
                    //devo construire l'array da restituire 
                    //controllo se ogni singola fascia oraria esiste sulla tabella appuntamenti 
                    //NON ESISTE => true nell'array 
                    $appuntamento =  FEntityManagerSQL::getInstance()->retrieveObj(FAppuntamento::getTable(), "IdFasciaOraria",
                                     $result[$i]["IdFasciaOraria"]);
                    //var_dump($appuntamento);
                    $exist = FEntityManagerSQL::getInstance()->existInDb($appuntamento);
                    //quindi ora nell'array ci devo mettere $disponibilità [$giorno della settimana][$numero slot orario]
                    if(!$exist){
                        for($j=1;$j<6;$j++){ // $j ci indica il numero della fascia 
                            if($result[$i]["ora"] == $slotorari[$j]){
                               
                            $prenotabili[$result[$i]["giornosettimana"]][$j] = true; //il -1 serve per tarare altrimenti lunedì = 2
                               
                            }
                        }
                        //il trucco sta nel mettere a true le prenotabili e poi riempire gli spazi rimanenti di false 
                    }
                    
                    
                }
                $visualizzazione = array();
                /* var_dump($prenotabili); */
                //Qui dovrei aver finito di controllare le fasce orarie, attualmente l'array prenotabili ha solo i true su quelle effettivamente
                //prenotabli
                for($i=2;$i<8;$i++){
                    for($j=1;$j<6;$j++){
                        if (!(isset($prenotabili[$i][$j]))) {
                            $visualizzazione[$i-1][$j] = false;   //se non era prenotabile adesso metto effettivamente il valore a false;
                        }else  $visualizzazione[$i-1][$j] = true;
                    }
                }
                /* var_dump($prenotabili); */
                return $visualizzazione;
                //costruendo la tabella orari 5 righe e 6/7 colonne abbiamo che true = blue prenotabile e false = non prenotabile rosso
                //giorni da 1 = lunedi a 6 = sabato, fasce orarie 1=14:30 5= 18:30
                }else{
                return array();
            }
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }


    public static function getIdFasciaOrariafromIdMedicondata($IdMedico,$data){ 
        
        try{//GIORNO SETTIMANA è SBAGLIATO DOMENICA = 1 LUNEDI = 2 .. SABATO = 7 SERVE FARE -1
            $query = "SELECT IdMedico, IdFasciaOraria,fascia_oraria.data
                      FROM calendario
                      INNER JOIN fascia_oraria on calendario.IdCalendario = fascia_oraria.IdCalendario 
                      WHERE IdMedico = '" . $IdMedico . "'AND data = '" . $data->format('Y-m-d H:i:s') . "' ORDER BY data;";//prendo solo l'ora per il controllo
            //con questa prendo tutte le fasce orarie di un medico in una determinata settimana in un anno dati in input
            //adesso dovrei prendere un array monodimensionale contenente gli ID delle fasce orarie relative
            //per poi fare un controllo sull'exist() nella tabella appuntamenti e mettere il valore booleano nell'array in output
            //questo per controllare l'occupazione della fascia, ma per avere l'informazione della disponibilità del medico
            //posso passarla implicitamente per esclusione
            //conviene prima riempire un array subito con gli slot? se tengo l'id risulta facile il controllo ma ce l'ho già
            //posso riempirlo una volta sola se lo faccio mentre controllo la presenza di un appuntamento nello slot orario
            
            $stmt = self::$db->prepare($query);
            //var_dump($stmt);
            $stmt->execute();
            $rowNum = $stmt->rowCount(); //il numero di risultati della query ovvero il numero di slot orari disponibili nella settimana
            if($rowNum > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row; 
                }
                //return $result;
                return $result[0]["IdFasciaOraria"]; //contiene l'id della fascia oraria               
                }else{
                return array();
            }
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }


    public static function getappuntamenticonclusipaziente($IdPaziente,$data = null,$IdTipologia = null){ 
        
        //DOBBIAMO DISTINUGERE IL CASO DELLA RAFFINAZIONE DEL RISULTATO, LA QUERY DEVE ESSERE DIVERSA
        //BISOGNA RISALIRE FINO A MEDICO
        //CONTROLLO SULLA DATA????? POTREBBERO USCIRE APPUNTAMENTI NON CONCLUSI
        $today = new DateTime();
        $past = $today>$data; //controllo che la data inserita sia passata
        try{

            if($data && $IdTipologia && $past){ //se passiamo anche questi la query include questi parametri
                $query = "SELECT appuntamento.IdAppuntamento,IdPaziente, appuntamento.IdFasciaOraria,IdTipologia, medico.IdMedico, appuntamento.costo, referto.IdReferto
                          FROM appuntamento 
                          Inner Join fascia_oraria on appuntamento.IdFasciaOraria = fascia_oraria.IdFasciaOraria
                          INNER JOIN calendario ON calendario.IdCalendario = fascia_oraria.IdCalendario
                          INNER JOIN medico ON medico.IdMedico = calendario.IdMedico
                          LEFT OUTER JOIN referto ON referto.IdAppuntamento = appuntamento.IdAppuntamento
                          WHERE IdPaziente = '" . $IdPaziente . "'AND CAST(data as DATE) = '" . $data . "' 
                          AND IdTipologia = '" . $IdTipologia . "' ORDER BY data DESC;";
            }
            else
            {   //l'id medico serve per la recensione in ogni caso
                $query = "SELECT appuntamento.IdAppuntamento,IdPaziente,appuntamento.IdFasciaOraria, medico.IdMedico, appuntamento.costo, referto.IdReferto
                          FROM appuntamento
                          Inner Join fascia_oraria on appuntamento.IdFasciaOraria = fascia_oraria.IdFasciaOraria
                          INNER JOIN calendario ON calendario.IdCalendario = fascia_oraria.IdCalendario
                          INNER JOIN medico ON medico.IdMedico = calendario.IdMedico
                          LEFT OUTER JOIN referto ON referto.IdAppuntamento = appuntamento.IdAppuntamento
                          WHERE IdPaziente = '" . $IdPaziente . "'AND CURDATE()>=data ORDER BY data DESC;";
            }
           
            
            $stmt = self::$db->prepare($query);
            /* var_dump($query); */
            $stmt->execute();
            $rowNum = $stmt->rowCount(); //il numero di risultati della query ovvero il numero di appuntamenti conclusi di un dato paziente
            if($rowNum > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row;  //aggiungiamo la row all'array result 
                }
                return $result; //array bidimensionale, primo indice = numero appuntamento, secondo indice = campo
                //return $result[0]["IdFasciaOraria"]; //contiene l'id della fascia oraria               
                }else{
                return array();
            }
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    public static function getIdMedicofromIdAppuntamento($IdAppuntamento){ 
        try{ 
            $query = "SELECT IdAppuntamento,IdMedico 
                          FROM appuntamento
                          INNER JOIN fascia_oraria on appuntamento.IdFasciaOraria = fascia_oraria.IdFasciaOraria
                          INNER JOIN calendario on calendario.IdCalendario = fascia_oraria.IdCalendario
                          WHERE IdAppuntamento = '" . $IdAppuntamento . "';";
            $stmt = self::$db->prepare($query);
            /* var_dump($stmt); */
            $stmt->execute();
            $rowNum = $stmt->rowCount(); //il numero di risultati della query ovvero il numero di appuntamenti conclusi di un dato paziente
            if($rowNum > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row;  //aggiungiamo la row all'array result 
                }
                return $result; //array bidimensionale, primo indice = numero appuntamento, secondo indice = campo
                //return $result[0]["IdFasciaOraria"]; //contiene l'id della fascia oraria               
                }else{
                return array();
            }
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    public static function getappuntamentiprenotatifromIdPaziente($IdPaziente){ 
        
       
        $today = new DateTime();
        try{
            $query = "SELECT appuntamento.IdAppuntamento,IdPaziente,appuntamento.IdFasciaOraria, medico.IdMedico, appuntamento.costo, referto.IdReferto
                          FROM appuntamento
                          Inner Join fascia_oraria on appuntamento.IdFasciaOraria = fascia_oraria.IdFasciaOraria
                          INNER JOIN calendario ON calendario.IdCalendario = fascia_oraria.IdCalendario
                          INNER JOIN medico ON medico.IdMedico = calendario.IdMedico
                          LEFT OUTER JOIN referto ON referto.IdAppuntamento = appuntamento.IdAppuntamento
                          WHERE IdPaziente = '" . $IdPaziente . "'AND CURDATE()<=data ORDER BY data DESC;";
            //prendiamo tutti gli appuntamenti fissati in date future (quindi prenotati e non ancora conclusi)            
            $stmt = self::$db->prepare($query);
            //var_dump($stmt);
            $stmt->execute();
            $rowNum = $stmt->rowCount(); //il numero di risultati della query ovvero il numero di appuntamenti conclusi di un dato paziente
            if($rowNum > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row;  //aggiungiamo la row all'array result 
                }
                return $result; //array bidimensionale, primo indice = numero appuntamento, secondo indice = campo
                //return $result[0]["IdFasciaOraria"]; //contiene l'id della fascia oraria               
                }else{
                return array();
            }
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    public static function getappuntamenticonclusifromIdMedico($IdMedico,$data = null){ 
        
        //DOBBIAMO DISTINUGERE IL CASO DELLA RAFFINAZIONE DEL RISULTATO, LA QUERY DEVE ESSERE DIVERSA
        //BISOGNA RISALIRE FINO A MEDICO
        //CONTROLLO SULLA DATA????? POTREBBERO USCIRE APPUNTAMENTI NON CONCLUSI
        $today = new DateTime();
        $past = $today>$data; //controllo che la data inserita sia passata
        try{
            //la tipologia possiamo toglierla ma ci servono i dati del paziente
            if($data && $past){ //se passiamo anche questi la query include questi parametri
                $query = "SELECT appuntamento.IdAppuntamento, appuntamento.IdPaziente, fascia_oraria.IdFasciaOraria, medico.IdMedico, appuntamento.costo, referto.IdReferto
                          FROM appuntamento
                          INNER JOIN fascia_oraria ON fascia_oraria.IdFasciaOraria = appuntamento.IdFasciaOraria
                          INNER JOIN calendario ON calendario.IdCalendario = fascia_oraria.IdCalendario
                          INNER JOIN medico on medico.IdMedico = calendario.IdMedico
                          LEFT OUTER JOIN referto on referto.IdAppuntamento = appuntamento.IdAppuntamento
                          WHERE medico.IdMedico = '" . $IdMedico . "'AND data BETWEEN '" . $data." 00:00:00' AND '". $data ." 23:59:59'
                             ORDER BY data DESC;";
            }
            else
            {   
                $query = "SELECT appuntamento.IdAppuntamento, appuntamento.IdPaziente, fascia_oraria.IdFasciaOraria, medico.IdMedico, appuntamento.costo, referto.IdReferto
                          FROM appuntamento
                          INNER JOIN fascia_oraria ON fascia_oraria.IdFasciaOraria = appuntamento.IdFasciaOraria
                          INNER JOIN calendario ON calendario.IdCalendario = fascia_oraria.IdCalendario
                          INNER JOIN medico on medico.IdMedico = calendario.IdMedico
                          LEFT OUTER JOIN referto on referto.IdAppuntamento = appuntamento.IdAppuntamento
                          WHERE medico.IdMedico = '" . $IdMedico . "'AND CURDATE()>=data ORDER BY data DESC;";
            }
           
            $stmt = self::$db->prepare($query);
            //var_dump($stmt);
            $stmt->execute();
            $rowNum = $stmt->rowCount(); //il numero di risultati della query ovvero il numero di appuntamenti conclusi di un dato paziente
            if($rowNum > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row;  //aggiungiamo la row all'array result 
                }
                return $result; //array bidimensionale, primo indice = numero appuntamento, secondo indice = campo
                //return $result[0]["IdFasciaOraria"]; //contiene l'id della fascia oraria               
                }else{
                return array();
            }
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }
    
    public static function getstatistiche($IdMedico,$data1,$data2){ 
        
        try{//GIORNO SETTIMANA è SBAGLIATO DOMENICA = 1 LUNEDI = 2 .. SABATO = 7 SERVE FARE -1
            $query = "SELECT COUNT(*) as NumEsami, data, SUM(appuntamento.costo) as guadagno
                      FROM calendario
                      INNER JOIN fascia_oraria ON calendario.IdCalendario = fascia_oraria.IdCalendario
                      INNER JOIN appuntamento ON appuntamento.IdFasciaOraria = fascia_oraria.IdFasciaOraria 
                      WHERE IdMedico = '" . $IdMedico . "' AND DATE_FORMAT(fascia_oraria.data, '%Y-%m-%d') BETWEEN '" . $data1 . "' AND '" . $data2 . "'
                      GROUP BY data ORDER BY data ASC;";//prendo solo l'ora per il controllo
            //con questa prendo tutte le fasce orarie di un medico in una determinata settimana in un anno dati in input
            //adesso dovrei prendere un array monodimensionale contenente gli ID delle fasce orarie relative
            //per poi fare un controllo sull'exist() nella tabella appuntamenti e mettere il valore booleano nell'array in output
            //questo per controllare l'occupazione della fascia, ma per avere l'informazione della disponibilità del medico
            //posso passarla implicitamente per esclusione
            //conviene prima riempire un array subito con gli slot? se tengo l'id risulta facile il controllo ma ce l'ho già
            //posso riempirlo una volta sola se lo faccio mentre controllo la presenza di un appuntamento nello slot orario
            
            $stmt = self::$db->prepare($query);
            //var_dump($stmt);
            $stmt->execute();
            $rowNum = $stmt->rowCount(); //il numero di risultati della query ovvero il numero di slot orari disponibili nella settimana
            if($rowNum > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row;  //aggiungiamo la row all'array result 
                }
                //return $result;
                return $result;     
                }else{
                return array();
            }
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    public static function getstatistichegenerali($IdMedico,$data1,$data2){ 
        
        try{//GIORNO SETTIMANA è SBAGLIATO DOMENICA = 1 LUNEDI = 2 .. SABATO = 7 SERVE FARE -1
            $query = "SELECT IdMedico, fascia_oraria.IdFasciaOraria, SUM(costo) as sommacosti, COUNT(fascia_oraria.IdFasciaOraria) as numappuntamenti,  DATE_FORMAT(fascia_oraria.data, '%Y-%m-%d') as data
                      FROM calendario
                      INNER JOIN fascia_oraria ON calendario.IdCalendario = fascia_oraria.IdCalendario
                      INNER JOIN appuntamento ON appuntamento.IdFasciaOraria = fascia_oraria.IdFasciaOraria 
                      WHERE IdMedico = '" . $IdMedico . "' AND  DATE_FORMAT(fascia_oraria.data, '%Y-%m-%d') BETWEEN '" . $data1 . "' AND '" . $data2 . "'
                      GROUP BY data ORDER BY data ASC;";//prendo solo l'ora per il controllo
            //con questa prendo tutte le fasce orarie di un medico in una determinata settimana in un anno dati in input
            //adesso dovrei prendere un array monodimensionale contenente gli ID delle fasce orarie relative
            //per poi fare un controllo sull'exist() nella tabella appuntamenti e mettere il valore booleano nell'array in output
            //questo per controllare l'occupazione della fascia, ma per avere l'informazione della disponibilità del medico
            //posso passarla implicitamente per esclusione
            //conviene prima riempire un array subito con gli slot? se tengo l'id risulta facile il controllo ma ce l'ho già
            //posso riempirlo una volta sola se lo faccio mentre controllo la presenza di un appuntamento nello slot orario
            
            $stmt = self::$db->prepare($query);
            //var_dump($stmt);
            $stmt->execute();
            $rowNum = $stmt->rowCount(); //il numero di risultati della query ovvero il numero di slot orari disponibili nella settimana
            if($rowNum > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row;  //aggiungiamo la row all'array result 
                }
                //return $result;
                return $result; //contiene l'id della fascia oraria               
                }else{
                return array();
            }
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    public static function ricercautenti($nomeutente = null,$cognomeutente = null,$categoriautente = null){ 
        

        try{
            $query = "SELECT * ";
            /* $params = []; */

            if (isset($categoriautente)) {
                $query .= "FROM $categoriautente"; //la tabella è la categoria inserita
                /* $params[':categoriautente'] = '%' . $categoriautente . '%'; */
            }

            $query .= " WHERE 1=1"; //completo la query

            if (isset($nomeutente)) {
                $query .= " AND nome LIKE '%".$nomeutente."%'";
               /*  $params[':nome'] = '%' . $nomeutente . '%'; */
            }

            if (isset($cognomeutente)) {
                $query .= " AND cognome LIKE '%". $cognomeutente ."%';";
               /*  $params[':cognome'] = '%' . $cognomeutente . '%'; */
            }

            $stmt = self::$db->prepare($query);
            //var_dump($stmt);
            $stmt->execute();
            $rowNum = $stmt->rowCount(); //il numero di risultati della query ovvero il numero di appuntamenti conclusi di un dato paziente
            if($rowNum > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row;  //aggiungiamo la row all'array result 
                }
                return $result; 
                          
                }else{
                return array();
            }
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    public static function ricercaappuntamenti($data = null,$IdTipologia = null){ 
        
        $data = new DateTime($data);
        $anno = $data->format('o'); //anno attuale (es 2024)
        $mese = $data->format('n'); //numero del mese senza zeri
        $giorno = $data->format('j'); //numero del giorno senza zeri
        try{
            
            $query = "SELECT * ";
            $params = [];

            $query .= " FROM appuntamento 
            INNER JOIN fascia_oraria ON appuntamento.IdFasciaOraria=fascia_oraria.IdFasciaOraria
            INNER JOIN calendario on calendario.IdCalendario=fascia_oraria.IdCalendario
            INNER JOIN medico ON medico.IdMedico = calendario.IdMedico";
            $query .= " WHERE 1=1"; //completo la query

            if (isset($data)) {
                $query .= " AND YEAR(data) = $anno";
                /* $params[':anno'] = $anno; */
                $query .= " AND MONTH(data) = $mese";
                /* $params[':mese'] = $mese; */
                $query .= " AND DAY(data) = $giorno";
                /* $params[':giorno'] = $giorno; */
            }

            if (isset($IdTipologia)) {
                $query .= " AND IdTipologia = $IdTipologia";
                /* $params[':IdTipologia'] = $IdTipologia; */
            }

            $stmt = self::$db->prepare($query);
            /* var_dump($stmt); */
            $stmt->execute();
            $rowNum = $stmt->rowCount(); //il numero di risultati della query ovvero il numero di appuntamenti conclusi di un dato paziente
            if($rowNum > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row;  //aggiungiamo la row all'array result 
                }
                return $result; 
                          
                }else{
                return array();
            }
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    public static function ricercarecensioni($nomemedico = null,$cognomemedico = null){ 
        
        try{
            $query = "SELECT * ";
            $params = [];

            $query .= "FROM recensione INNER JOIN Medico ON recensione.IdMedico = medico.IdMedico";

            $query .= " WHERE 1=1"; //completo la query

            if (isset($nomemedico)) {
                $query .= " AND nome LIKE :nome";
                $params[':nome'] = '%' . $nomemedico . '%';
            }

            if (isset($cognomemedico)) {
                $query .= " AND cognome LIKE :cognome";
                $params[':cognome'] = '%' . $cognomemedico . '%';
            }

            $stmt = self::$db->prepare($query);
            //var_dump($stmt);
            $stmt->execute($params);
            $rowNum = $stmt->rowCount(); //il numero di risultati della query ovvero il numero di appuntamenti conclusi di un dato paziente
            if($rowNum > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row;  //aggiungiamo la row all'array result 
                }
                return $result; 
                          
                }else{
                return array();
            }
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }





}
