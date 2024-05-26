<?php

//require_once '../utility/autoload.php';

class FCalendario {
    /** tabella con la quale opera */
    private static $table = "Calendario";
    /** valori della tabella */
    private static $values="(:IdCalendario,:IdMedico)";

    private static $key = "IdCalendario";
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
    
    public static function getKey(){
        return self::$key;
    }

    /**
    * Questo metodo lega gli attributi del Calendario da inserire con i parametri della INSERT
    * @param PDOStatement $stmt 
    * @param ECalendario $cal calendario in cui i dati devono essere inseriti nel DB
    */
    public static function bind($stmt, $calendario){
        $stmt->bindValue(":IdCalendario", $calendario->getIdCalendario(), PDO::PARAM_STR);
        $stmt->bindValue(":medico", $calendario->getMedico(), PDO::PARAM_STR);
        
    }

        /**  PER FARE LA LOAD DAL DB ED INSTANZIARE IL CALENDARIO 
     * Proxy obj 
     */
    public static function creacalendario($queryResult){
        if(count($queryResult) > 0){
            $calendario = new ECalendario($queryResult[0]['IdCalendario'], $queryResult[0]['IdMedico']);
            return $calendario;
        }else{
            return array();
        }
    }

    //OTTENIAMO E LOADDIAMO DAL DB UN CALENDARIO USANDO IL SUO ID
    public static function getcalendariofromid($IdCalendario){
        $result = FEntityManagerSQL::getInstance()->retriveObj(self::getTable(), self::getKey(), $IdCalendario);
        //var_dump($result);
        if(count($result) > 0){
            $post = self::creacalendario($result);
            return $post;
        }else{
            return null;
        }
    }

    //if field null salva, sennò deve updetare la table
    //fieldArray è un array che deve contere array aventi nome del field e valore 
    //ALTRO MALLOPPONE CHE SERVE A SALVARE UN CALENDARIO o AD AGGIORNARNE I DATI, NON DOVREBBE SERVIRE LA PARTE DELLE MODIFICHE
    public static function saveObj($obj , $fieldArray = null){
        if($fieldArray === null){
            $saveCalendario = FEntityManagerSQL::getInstance()->saveObject(self::getClass(), $obj);
            if($saveCalendario !== null){
                return $saveCalendario;
            }else{
                return false;
            }
        }else{
            try{
                FEntityManagerSQL::getInstance()->getDb()->beginTransaction();
                //var_dump($fieldArray);
                foreach($fieldArray as $fv){
                    FEntityManagerSQL::getInstance()->updateObj(FCalendario::getTable(), $fv[0], $fv[1], self::getKey(), $obj->getId());
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

    
    //UN SACCO DI ROBA CHE QUI NON SERVE
    /**
     * un post ha immagini, commenti, likes; verificare che chi sta eliminando è il creatore del post
     */


    /*
    public static function deletePostInDb($idPost, $idUser){        
        try{
            FEntityManagerSQL::getInstance()->getDb()->beginTransaction();
            $queryResult = FEntityManagerSQL::getInstance()->retriveObj(self::getTable(), self::getKey(), $idPost);

            if(FEntityManagerSQL::getInstance()->existInDb($queryResult) && FEntityManagerSQL::getInstance()->checkCreator($queryResult, $idUser)){
                //mi servono solo gli id della query
                $likesList = FEntityManagerSQL::getInstance()->retriveObj(FLike::getTable(), self::getKey(), $idPost);
                for($i = 0; $i < count($likesList); $i++){
                    FEntityManagerSQL::getInstance()->deleteObjInDb(FLike::getTable(), FLike::getKey(), $likesList[$i][FLike::getKey()]);
                }

                $commentsList = FEntityManagerSQL::getInstance()->retriveObj(FComment::getTable(), self::getKey(), $idPost);
                for($i = 0; $i < count($commentsList); $i++){
                    $reportCommList = FEntityManagerSQL::getInstance()->retriveObj(FReport::getTable(), FComment::getKey(), $commentsList[$i][FComment::getKey()]);
                    for($j = 0; $j < count($reportCommList); $j++){
                        FEntityManagerSQL::getInstance()->deleteObjInDb(FReport::getTable(), FReport::getKey(), $reportCommList[$j][FReport::getKey()]);
                    }
                    FEntityManagerSQL::getInstance()->deleteObjInDb(FComment::getTable(), FComment::getKey(), $commentsList[$i][FComment::getKey()]);
                }

                $imagesList = FEntityManagerSQL::getInstance()->retriveObj(FImage::getTable(), self::getKey(), $idPost);
                for($i = 0; $i < count($imagesList); $i++){
                    FEntityManagerSQL::getInstance()->deleteObjInDb(FImage::getTable(), FImage::getKey(), $imagesList[$i][FImage::getKey()]);
                }

                $reportList = FEntityManagerSQL::getInstance()->retriveObj(FReport::getTable(), self::getKey(), $idPost);
                for($i = 0; $i < count($reportList); $i++){
                    FEntityManagerSQL::getInstance()->deleteObjInDb(FReport::getTable(), FReport::getKey(), $reportList[$i][FReport::getKey()]);
                }

                FEntityManagerSQL::getInstance()->deleteObjInDb(self::getTable(), self::getKey(), $idPost);

                FEntityManagerSQL::getInstance()->getDb()->commit();
                return true;
            }else{
                FEntityManagerSQL::getInstance()->getDb()->commit();
                return false;
            }
        }catch(PDOException $e){
            echo "ERROR " . $e->getMessage();
            FEntityManagerSQL::getInstance()->getDb()->rollBack();
            return false;
        }finally{
            FEntityManagerSQL::getInstance()->closeConnection();
        }
    }

    public static function getSearched($field, $keyword){
        //chiedere la row di post
        //creare i post 
        //settare gli utenti
        //ritornare la lista di post
        $queryResult = FEntityManagerSQL::getInstance()->getSearchedItem(self::getTable(), $field, $keyword);
        $arrayPostsNotBanned = array();
        foreach($queryResult as $key =>$row){
            if(!$row['removed']){
                $arrayPostsNotBanned[] = $queryResult[$key];
            }
        }
        if($field == 'title'){
            $posts = self::getPostWithUser($arrayPostsNotBanned);
        }else{
            $posts = self::getPostComplete($arrayPostsNotBanned);
        }
        
        return $posts;
    }

    public static function postListNotBanned($idUser){
        //ritorna una lista di post non bannati di un utente
        $queryResult = FEntityManagerSQL::getInstance()->objectListNotRemoved(self::getTable(), FPerson::getKey(), $idUser);
        $posts = self::getPostComplete($queryResult);
        return $posts;
    }

    public static function getPostWithUser($queryResult){
        $posts = array();
        if(count($queryResult) > 0){
            $posts =  self::createPostObj($queryResult);
            for($i = 0; $i < count($queryResult); $i++){
                $idUser = $queryResult[$i][FUser::getKey()];
                $user = FUser::getObj($idUser);
                $posts[$i]->setUser($user);
            }
        }
        return $posts;
    }

    public static function getPostComplete($queryResult){
        $posts = array();
        if(count($queryResult) > 0){
            $posts =  self::createPostObj($queryResult);
            for($i = 0; $i < count($queryResult); $i++){
                $idUser = $queryResult[$i][FUser::getKey()];
                $user = FUser::getObj($idUser);
                $posts[$i]->setUser($user);
                //var_dump($posts[$i]);

                $images = FImage::getObjOnPostId($posts[$i]->getId());
                //var_dump($images);
                if($images !== null){
                    foreach($images as $im){
                        $posts[$i]->addImage($im);
                    }
                }
            }
        }
        return $posts;
    }

    public static function postInExplore($idUser){
        try{
            $query = "SELECT p.* FROM " . FPost::getTable() . " p WHERE p." . FUser::getKey() . " <> :idUser AND p.removed = false ORDER BY p.creation_time DESC LIMIT :limit";
            $stmt = FEntityManagerSQL::getInstance()->getDb()->prepare($query);
            $stmt->bindValue(':idUser', $idUser);
            $stmt->bindValue(':limit', MAX_POST_EXPLORE, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($result) == 0) {   
                return array();
            }else{
                $posts = self::getPostComplete($result);
                return $posts;
            }
        }catch(Exception $e){
            echo "ERROR " . $e->getMessage();
            return null;
        }
    }

    public static function postInVisited($idPost){
        $queryResult = FEntityManagerSQL::getInstance()->retriveObj(self::getTable(), self::getKey(), $idPost);

        $postArr = self::getPostComplete($queryResult);
        return $postArr[0]; 
    }

    public static function comparePostsByCreationTime($post1, $post2) {
        $time1 = $post1->getTime();
        $time2 = $post2->getTime();

        if ($time1 == $time2) {
            return 0;
        }

        return ($time1 > $time2) ? -1 : 1;
    }

    */

    

}