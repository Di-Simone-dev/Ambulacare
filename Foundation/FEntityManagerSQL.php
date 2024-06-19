<?php

//require_once(__DIR__ . '/../../../../config/config.php');

class FEntityManagerSQL{
    /**
     * Singleton Class
     */

     private static $instance;

     private static $db;


     private function __construct(){

        //global $host, $database, $username, $password;
		$host = "127.0.0.1"; //localhost
		$database = "AmbulaCare";
		$username = "root";
		$password = "";


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
     * Method to return rows from a SELECT FROM WHERE but removed is = 0 (so it's not banned)
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
     * Method to delete a row from the Database with query DELETE FROM WHERE
     * @param $table Refers to the table of the Database
     * @param $field  Refers to a field of the table
     * @param mixed $id Refers to the value in the where clause
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

    /*
     * Method to check if a row (not on User) have the same attribute @idUser
     * @param array $queryResult 
     * @param int $idUser
     * @return bool 
     */
    /*
    public static function checkCreator($queryResult, $idUser){
        if(self::existInDb($queryResult) && $queryResult[0][FUser::getKey()] == $idUser){
            return true;
        }else{
            return false;
        }
    }*/

    /*
     * Method to retrun rows from a SELECT FROM WHERE, but the @str is a string so search a row using LIKE % @str %
     * @param $table Refers to the table of the Database
     * @param $field  Refers to a field of the table
     * @param $str Refers to a string to serach on a field
     * @return array 
     */
    /*
    public static function getSearchedItem($table, $field, $str){
        try{
            $query = "SELECT * FROM " . $table . " WHERE " . $field . " LIKE '%" . $str . "%'";
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
    */
    /*
     * Method to return rows from a SELECT FROM WHERE but the @field is NULL
     * @param $table Refers to the table of the Database
     * @param $field  Refers to a field of the table
     * @return array
     */
    /*
    public static function objectListOnNull($table, $field){
        try{
            $query = "SELECT * FROM " .$table. " WHERE ".$field." IS NULL;";
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
    */


    //QUESTA CI SERVE NELLA PRATICA
    //metodo che dato in input un id di un medico ne restituisce la media delle recensioni
    public static function getaveragevalutazione($IdMedico){
        
        //MI SERVE PER TROVARE LA MEDIA DELLE RECENSIONI DI UN MEDICO
        //SELECT AVG(valutazione),IdMedico FROM Recensioni where IdMedico = $idMedico group by IdMedico
        try{
            $query = "SELECT AVG(valutazione),IdMedico FROM Recensioni WHERE IdMedico = '" . $IdMedico . "' GROUP BY IdMedico;"
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
            $query = "SELECT IdMedico,IdFasciaOraria,IdAppuntamento,IdPaziente FROM calendario,fascia_oraria,appuntamento
                      WHERE IdMedico = '" . $IdMedico . "'AND GETDATE()<=fascia_oraria.data ORDER BY data;";
                      
            $stmt = self::$db->prepare($query);
            //var_dump($stmt);
            $stmt->execute();
            $rowNum = $stmt->rowCount(); //il numero di risultati della query ovvero il numero di appuntamenti nell'agenda di un medico
            if($rowNum > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row;  //aggiungiamo la row all'array result
                }
                //return $result;
                $agenda=array();
                for($i=0;$i++;$i<$rowNum)
                {
                    //devo construire l'array da restituire
                    $paziente = FPaziente::getObj($result[$i]["IdPaziente"]);  //QUESTO è UN ARRAY DI OGGETI CON 1 SOLO ELEMENTO
                    $fasciaoraria = FFasciaOraria::getObj($result[$i]["IdPaziente"]);  //QUESTO è UN ARRAY DI OGGETTI CON 1 SOLO ELEMENTO
                    
                    $agenda[$i]["nominativo_paziente"] = $paziente[0]->getCognome()+" "+$paziente[0]->getNome(); //da testare
                    $agenda[$i]["data_ora_appuntamento"] = $fasciaoraria[0]->getData();  //da testare 
                    $agenda[$i]["IdAppuntamento"] = $result[$i]["IdAppuntamento"];  //da testare    
                }
                return $agenda;
                //dovremmo avere un array associativo bidimensionale $result[0][IdAppuntamento]=l'id del primo appuntamento
                //dovremmo ciclare $result[i][IdAppuntamento] su un getter degli appuntamenti e $result[i][IdFasciaOraria], 
                //ma bisogna aggiungere la data e l'ora (data)
                //UNA SOLUZIONE POTREBBE ESSERE QUELLA DI UTILIZZARE 2 ARRAY SINCRONIZZATI CON LO STESSO INDICE PER RESTITUIRE I DATI
            
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
    public static function getrecensionipazientiattivi($IdMedico){
        
        //MI SERVE PER TROVARE LA MEDIA DELLE RECENSIONI DI UN MEDICO
        //SELECT AVG(valutazione),IdMedico FROM Recensioni where IdMedico = $idMedico group by IdMedico
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
    }






}