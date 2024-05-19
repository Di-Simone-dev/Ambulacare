<?php

//require_once '../utility/autoload.php';

/**
 * La classe FAppuntamento fornisce query per gli oggetti EAppuntamento
 * @author Gruppo AmbulaCare
 * @package Foundation
 */

class FAppuntamento extends FDataBase {
    /** classe foundation */
    private static $class="FAppuntamento";
    /** tabella con la quale opera */          
    private static $table="Appuntamento";
    /** valori della tabella */
    private static $values="(:IdApp,:stato,:paziente)";


    /** costruttore*/ 
    public function __construct(){}

    public static function bind($stmt,EAppuntamento $appuntamento){
        $stmt->bindValue(':IdApp', NULL, PDO::PARAM_INT);
        $stmt->bindValue(':stato', $appuntamento->getStato(), PDO::PARAM_STR);
        $stmt->bindValue(':paziente', $appuntamento->getPaziente(), PDO::PARAM_STR);
        //$stmt->bindValue(':intermediatestep', $annuncio->getIntermediateStep(), PDO::PARAM_STR);

        }


	/**
	 * questo metodo restituisce il nome della classe per la costruzione delle Query
	 * @return string $class nome della classe
	 */
    public static function getClass(){
        return static::$class;
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

    /** Metodo che richiama l'instanza di FDatabase per la store */
    /*
    public static function store(EAppuntamento $appuntamento){
        $db=FDatabase::getInstance();

		$arrivo = $db->loadVerificaLuogo($annuncio->getArrival()->getName() , $annuncio->getArrival()->getProvince());
		//print($arrivo->__toString());
		$partenza = $db->loadVerificaLuogo($annuncio->getDeparture()->getName() , $annuncio->getDeparture()->getProvince());
		//print_r($partenza);
		$utente = FUtenteloggato::exist("email", $annuncio->getEmailWriter()->getEmail());
		if (isset($arrivo) && isset($partenza) && $utente == true) {
			$annuncio->setArrival($arrivo);
			$annuncio->setDeparture($partenza);
			$id = $db->storeDB(static::getClass(), $annuncio);
			return $id;
		}
		else
			return false;
    }*/


/** Metodo che recupera dal db tutte le istanze che rispettano determinati parametri
     */
    /*
    public static function loadByField($field, $id){
        $annuncio = null;
        $intermedia = null;
        $tappa = null;
        $db=FDatabase::getInstance();
        $result=$db->loadDB(static::getClass(), $field, $id);
        $rows_number = $db->interestedRows(static::getClass(), $field, $id);
        if(($result!=null) && ($rows_number == 1)) {
            $part = FLuogo::loadByField("id" , $result["departure"]);
            $arr = FLuogo::loadByField("id" , $result["arrival"]);
        	$ute = FUtenteloggato::loadByField("email" , $result["emailWriter"]);
            $tappa = FTappa::loadByField("ad", $result["idAd"] );
           if ($tappa != null ) {
               $t = current($tappa);
               if (is_array($t)) {
               foreach ($tappa as $t) {
                   $intermedia[] = FLuogo::loadByField("id", $t['place']);
               }
               }
                   else {
                       $intermedia[] = FLuogo::loadByField("id", $tappa['place']);
                   }
               }
            $annuncio=new EAnnuncio($result['departureDate'], $result['arrivalDate'], $result['space'], $part , $arr ,$result['weight'],$result['description'],$ute);
            if ($intermedia != null) {
                foreach ($intermedia as $i)
                    $annuncio->addTappa($i);
            }
            $annuncio->setIdAd($result['idAd']);
            if($result['visibility']) $annuncio->setVis();
             }
        else {
            if(($result!=null) && ($rows_number > 1)){
                $part = array();
                $arr = array();
                $ute = array();
                $annuncio = array();
            for($i=0; $i<count($result); $i++){
                $tappa = null;
                $intermedia = null;
                $part[] = FLuogo::loadByField("id" , $result[$i]["departure"]);
                $arr[] = FLuogo::loadByField("id" , $result[$i]["arrival"]);
				$ute[] = FUtenteloggato::loadByField("email" , $result[$i]["emailWriter"]);
                $tappa = FTappa::loadByField("ad", $result[$i]["idAd"]);
                    if ($tappa != null ) {
                        $t = current($tappa);
                        if (is_array($t)) {
                            foreach ($tappa as $t) {
                                $intermedia[] = FLuogo::loadByField("id", $t['place']);
                            }
                        } else {
                            $intermedia[] = FLuogo::loadByField("id", $tappa['place']);
                        }
                    }

                    $annuncio[]=new EAnnuncio($result[$i]['departureDate'], $result[$i]['arrivalDate'], $result[$i]['space'], $part[$i] , $arr[$i] ,$result[$i]['weight'],$result[$i]['description'],$ute[$i]);
                    $annuncio[$i]->setIdAd($result[$i]['idAd']);
                    if($result[$i]['visibility']) $annuncio[$i]->setVis();
                    if ( $intermedia != null ){
                    foreach ($intermedia as $int)
                        $annuncio[$i]->addTappa($int);
                         }

                }
            }
        }
        return $annuncio;
    }
*/

    /** Metodo che verifica se esiste un annuncio con un certo valore in uno dei suoi campi:
     * 1) se esiste restituisce true;
     * 2) viceversa restituisce false.
     */
        /*
    public static function exist($field, $id){
        $db=FDatabase::getInstance();
        $result=$db->existDB(static::getClass(), $field, $id);          //funzione richiamata,presente in FDatabase
        if($result!=null) return true;
        else return false;
    }
*/
 /** Metodo che aggiorna il valore di un campo 
     */
    public static function update ($field, $newvalue, $pk, $id){
      $db=FDatabase::getInstance();
      $result = $db->updateDB(static::getClass(), $field, $newvalue, $pk, $id);  //funzione richiamata,presente in FDatabase
      if($result) return true;
        else return false;

    }

/** Metodo che elimina una delle istanze
     */
     public static function delete($field, $id){
      $db=FDatabase::getInstance();
      $result = $db->deleteDB(static::getClass(), $field, $id);   //funzione richiamata,presente in FDatabase
      if($result) return true;
        else return false;

    }

/** Metodo che permette di caricare un annuncio che ha determinati parametri  */
    /*
	public static function loadByForm ($luogo1, $luogo2, $data1, $data2, $dim , $peso) {
		$annuncio = null;
		$intermedia = null;
		$tappa = null;
		$db=FDatabase::getInstance();
		list ($result, $rows_number)=$db->loadMultipleAnnuncio($luogo1, $luogo2, $data1, $data2, $dim , $peso);
		//print_r ($result);
		//print $rows_number;
		if(($result!=null) && ($rows_number == 1)) {
			$part = FLuogo::loadByField("id" , $result["departure"]);
			$arr = FLuogo::loadByField("id" , $result["arrival"]);
            $ute = FUtenteloggato::loadByField("email" , $result["emailWriter"]);
			$tappa = FTappa::loadByField("ad", $result["idAd"] );
			if ($tappa != null ) {
				$t = current($tappa);
				if (is_array($t)) {
					foreach ($tappa as $t) {
						$intermedia[] = FLuogo::loadByField("id", $t['place']);
					}
				}
				else {
					$intermedia[] = FLuogo::loadByField("id", $tappa['place']);
				}
			}
			$annuncio=new EAnnuncio($result['departureDate'], $result['arrivalDate'], $result['space'], $part , $arr ,$result['weight'],$result['description'],$ute);
			if ($intermedia != null) {
				foreach ($intermedia as $i)
					$annuncio->addTappa($i);
			}
			$annuncio->setIdAd($result['idAd']);
			if($result['visibility']) $annuncio->setVis();
		}
		else {
			if(($result!=null) && ($rows_number > 1)){
				$part = array();
				$arr = array();
				$annuncio = array();
				for($i=0; $i<count($result); $i++){
					$tappa = null;
					$intermedia = null;
					$part[] = FLuogo::loadByField("id" , $result[$i]["departure"]);
					$arr[] = FLuogo::loadByField("id" , $result[$i]["arrival"]);
                    $ute[] = FUtenteloggato::loadByField("email" , $result[$i]["emailWriter"]);
					$tappa = FTappa::loadByField("ad", $result[$i]["idAd"]);
					if ($tappa != null ) {
						$t = current($tappa);
						if (is_array($t)) {
							foreach ($tappa as $t) {
								$intermedia[] = FLuogo::loadByField("id", $t['place']);
							}
						} else {
							$intermedia[] = FLuogo::loadByField("id", $tappa['place']);
						}
					}

					$annuncio[]=new EAnnuncio($result[$i]['departureDate'], $result[$i]['arrivalDate'], $result[$i]['space'], $part[$i] , $arr[$i] ,$result[$i]['weight'],$result[$i]['description'],$ute[$i]);
					$annuncio[$i]->setIdAd($result[$i]['idAd']);
					if($result[$i]['visibility']) $annuncio[$i]->setVis();
					if ( $intermedia != null ){
						foreach ($intermedia as $int)
							$annuncio[$i]->addTappa($int);
					}

				}
			}
		}
		return $annuncio;

	}
*/


    /** Metodo che recupera dal db tutte le istanze che rispettano determinati parametri
     */
    /*
    public static function initialLoad(){
        $annuncio = null;
        $intermedia = null;
        $tappa = null;
        $db=FDatabase::getInstance();
        $result=$db->loadTrasporti();
        $rows_number = $db->rowsTrasporti();
        if(($result!=null) && ($rows_number == 1)) {
            $part = FLuogo::loadByField("id" , $result["departure"]);
            $arr = FLuogo::loadByField("id" , $result["arrival"]);
            $ute = FUtenteloggato::loadByField("email" , $result["emailWriter"]);
            $tappa = FTappa::loadByField("ad", $result["idAd"] );
            if ($tappa != null ) {
                $t = current($tappa);
                if (is_array($t)) {
                    foreach ($tappa as $t) {
                        $intermedia[] = FLuogo::loadByField("id", $t['place']);
                    }
                }
                else {
                    $intermedia[] = FLuogo::loadByField("id", $tappa['place']);
                }
            }
            $annuncio=new EAnnuncio($result['departureDate'], $result['arrivalDate'], $result['space'], $part , $arr ,$result['weight'],$result['description'],$ute);
            if ($intermedia != null) {
                foreach ($intermedia as $i)
                    $annuncio->addTappa($i);
            }
            $annuncio->setIdAd($result['idAd']);
            if($result['visibility']) $annuncio->setVis();
        }
        else {
            if(($result!=null) && ($rows_number > 1)){
                $part = array();
                $arr = array();
                $ute = array();
                $annuncio = array();
                for($i=0; $i<count($result); $i++) {
                    $tappa = null;
                    $intermedia = null;
                    $part[] = FLuogo::loadByField("id" , $result[$i]["departure"]);
                    $arr[] = FLuogo::loadByField("id" , $result[$i]["arrival"]);
                    $ute[] = FUtenteloggato::loadByField("email" , $result[$i]["emailWriter"]);
                    $tappa = FTappa::loadByField("ad", $result[$i]["idAd"]);
                    if ($tappa != null ) {
                        $t = current($tappa);
                        if (is_array($t)) {
                            foreach ($tappa as $t) {
                                $intermedia[] = FLuogo::loadByField("id", $t['place']);
                            }
                        } else {
                            $intermedia[] = FLuogo::loadByField("id", $tappa['place']);
                        }
                    }

                    $annuncio[]=new EAnnuncio($result[$i]['departureDate'], $result[$i]['arrivalDate'], $result[$i]['space'], $part[$i] , $arr[$i] ,$result[$i]['weight'],$result[$i]['description'],$ute[$i]);
                    $annuncio[$i]->setIdAd($result[$i]['idAd']);
                    if($result[$i]['visibility']) $annuncio[$i]->setVis();
                    if ( $intermedia != null ){
                        foreach ($intermedia as $int)
                            $annuncio[$i]->addTappa($int);
                    }

                }
            }
        }
        return $annuncio;
    }
*/


    /** Metodo che recupera dal db tutte le istanze che contengono il parametro passato in input
     */
    /*
    public static function loadByParola($parola){
        $annuncio = null;
        $intermedia = null;
        $tappa = null;
        $db=FDatabase::getInstance();
        list ($result, $rows_number)=$db->ricercaParola($parola, static::getClass(), "description");
        if(($result!=null) && ($rows_number == 1)) {
            $part = FLuogo::loadByField("id" , $result["departure"]);
            $arr = FLuogo::loadByField("id" , $result["arrival"]);
            $ute = FUtenteloggato::loadByField("email" , $result["emailWriter"]);
            $tappa = FTappa::loadByField("ad", $result["idAd"] );
            if ($tappa != null ) {
                $t = current($tappa);
                if (is_array($t)) {
                    foreach ($tappa as $t) {
                        $intermedia[] = FLuogo::loadByField("id", $t['place']);
                    }
                }
                else {
                    $intermedia[] = FLuogo::loadByField("id", $tappa['place']);
                }
            }
            $annuncio=new EAnnuncio($result['departureDate'], $result['arrivalDate'], $result['space'], $part , $arr ,$result['weight'],$result['description'],$ute);
            if ($intermedia != null) {
                foreach ($intermedia as $i)
                    $annuncio->addTappa($i);
            }
            $annuncio->setIdAd($result['idAd']);
            if($result['visibility']) $annuncio->setVis();
        }
        else {
            if(($result!=null) && ($rows_number > 1)){
                $part = array();
                $arr = array();
                $ute = array();
                $annuncio = array();
                for($i=0; $i<count($result); $i++){
                    $tappa = null;
                    $intermedia = null;
                    $part[] = FLuogo::loadByField("id" , $result[$i]["departure"]);
                    $arr[] = FLuogo::loadByField("id" , $result[$i]["arrival"]);
                    $ute[] = FUtenteloggato::loadByField("email" , $result[$i]["emailWriter"]);
                    $tappa = FTappa::loadByField("ad", $result[$i]["idAd"]);
                    if ($tappa != null ) {
                        $t = current($tappa);
                        if (is_array($t)) {
                            foreach ($tappa as $t) {
                                $intermedia[] = FLuogo::loadByField("id", $t['place']);
                            }
                        } else {
                            $intermedia[] = FLuogo::loadByField("id", $tappa['place']);
                        }
                    }

                    $annuncio[]=new EAnnuncio($result[$i]['departureDate'], $result[$i]['arrivalDate'], $result[$i]['space'], $part[$i] , $arr[$i] ,$result[$i]['weight'],$result[$i]['description'],$ute[$i]);
                    $annuncio[$i]->setIdAd($result[$i]['idAd']);
                    if($result[$i]['visibility']) $annuncio[$i]->setVis();
                    if ( $intermedia != null ){
                        foreach ($intermedia as $int)
                            $annuncio[$i]->addTappa($int);
                    }

                }
            }
        }
        return $annuncio;
    }*/

}



?>