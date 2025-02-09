<?php

class FImmagine{

    private static $table = "immagine";

    private static $value = "(NULL,:nome,:dimensione,:tipo,:dati)";

    private static $key = "IdImmagine";

    public static function getTable(){
        return self::$table;
    }

    public static function getValues(){
        return self::$value;
    }

    public static function getClass(){
        return self::class;
    }

    public static function getKey(){
        return self::$key;
    }

    public static function bind($stmt, $immagine){
        $stmt->bindValue(":nome", $immagine->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(":dimensione", $immagine->getDimensione(), PDO::PARAM_INT);
        $stmt->bindValue(":tipo",$immagine->getTipo(), PDO::PARAM_STR);
        $stmt->bindValue(":dati", $immagine->getDati(), PDO::PARAM_LOB);  //QUESTO DEVE ESSERE COSì

        //QUESTA STRUTTURA POTREBBE ESSERE UTILE IN ALTRE CLASSI=> MEGLIO TENERLA
        /*
        if($image->getPost() !== null){
            $stmt->bindValue(":idPost", $image->getPost()->getId(), PDO::PARAM_INT);
        }else{
            $stmt->bindValue(":idPost", null, PDO::PARAM_NULL);
        }
        */
    }

    //POSSIAMO SUPPORRE DI CARICARE SOLO UNA IMMAGINE ALLA VOLTA
    public static function creaimmagine($queryResult){
        if(count($queryResult) > 0){
            $immagini = array();
            for($i = 0; $i < count($queryResult); $i++){
            $immagine = new EImmagine($queryResult[$i]['nome'], $queryResult[$i]['dimensione'],$queryResult[$i]['tipo'],$queryResult[$i]['dati']);
            $immagine->setIdImmagine($queryResult[$i]['IdImmagine']);
            $immagini[]=$immagine;
            }
        return $immagini;
        }
    }


    public static function getObj($id){
        $result = FEntityManagerSQL::getInstance()->retrieveObj(self::getTable(), self::getKey(), $id);
        //var_dump($result);
        if(count($result) > 0){
            $immagine = self::creaimmagine($result);
            return $immagine;
        }else{
            return null;
        }
    }

    public static function getimmaginefromidmedico($IdMedico){
        //andiamo a prendere 
        $result = FEntityManagerSQL::getInstance()->retrieveObj(self::getTable(), FMedico::getKey(), $IdMedico);
        //$result contiene la riga del medico che contiene anche l'id dell'immagine che vogliamo ottenere

        if(count($result) > 0){
            $immagine = self::creaimmagine($result['IdImmagine']);  //DOVREBBE FUNZIONARE
            return $immagine;
        }else{
            return null;
        }
    }

    public static function getimmaginefromidreferto($IdReferto){
        //andiamo a prendere 
        $result = FEntityManagerSQL::getInstance()->retrieveObj(self::getTable(), FReferto::getKey(), $IdReferto);
        //$result contiene la riga del medico che contiene anche l'id dell'immagine che vogliamo ottenere

        if(count($result) > 0){
            $immagine = self::creaimmagine($result['IdImmagine']);  //DOVREBBE FUNZIONARE
            return $immagine;
        }else{
            return null;
        }
    }



    //SALVIAMO UNA IMMAGINE DANDO IN PASTO L'OGGETTO IMMAGINE DA SALVARE
    public static function saveObj($immagine){

        $saveImage = FEntityManagerSQL::getInstance()->saveObject(self::getClass(), $immagine);
        if($saveImage !== null){
            return $saveImage;
        }else{
            return false;
        }
    }

    public static function eliminaimmagine($IdImmagine){        
        $eliminaimmagine = FEntityManagerSQL::getInstance()->deleteObjInDb(self::getTable(),self::getKey(), $IdImmagine);
        if($eliminaimmagine !== null){
            return $eliminaimmagine;
        }else{
            return false;
        }
    }


}