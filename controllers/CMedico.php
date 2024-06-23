<?php

class CMedico{

//[medico]caso d'uso 4 "caricare un referto"

//4.1 visualizza_storico_esami()

//per mostrare gli appuntamenti conclusi di un medico ci basta prendere il suo id dalla sessione
public static function visualizza_storico_esami(){
    if(CUtente::isLogged()){ //BISOGNA TENERLO
        
        $IdMedico = USession::getSessionElement('id');
        $appuntamenti_medico_conclusi = FAppuntamento::creaappuntamento
            (FEntityManagerSQL::getInstance()->getappuntamenticonclusifromIdMedico($IdMedico));
        //dobbiamo prendere anche i pazienti per visualizzarne le informazioni
        $pazienti = array();
        foreach($appuntamenti_medico_conclusi as $ap)
            $pazienti = FPaziente::getObj($ap->getIdPaziente());

        //IN QUESTO MODO GLI ARRAY SONO SINCRONIZZATI E $appuntamenti_medico_conclusi[0] $pazienti[0] ci danno la prima riga
        //dentro questo array abbiamo gli oggetti appuntamento conclusi per essere visualizzati 
        //l'id dell'appuntamento va tenuto per associarlo ai bottoni di recensioni e di visualizzazione referto
        //per le recensioni servirebbe anche quello del medico (da vedere)
        //serve passare anche le tipologie
        //$tipologie = FEntityManagerSQL::retrieveall("tipologia");
        $view = new VManagePost($appuntamenti_medico_conclusi,$pazienti); //servirebbe una cosa del genere
        header('Location: /appuntamento/esamidaprenotare');
    } 
}

//4.2 ricerca_storico_esami(data)
public static function ricerca_storico_esami($data){
    if(CUtente::isLogged()){ //BISOGNA TENERLO   
        
        $dataform = UHTTPMethods::post('data');
        

        $IdMedico = USession::getSessionElement('id');
        $appuntamenti_medico_conclusi = FAppuntamento::creaappuntamento  //se si toglie stato dal db FUNZIONA
            (FEntityManagerSQL::getInstance()->getappuntamenticonclusifromIdMedico($IdMedico,$dataform));
        $pazienti = array();
        foreach($appuntamenti_medico_conclusi as $ap)
            $pazienti = FPaziente::getObj($ap->getIdPaziente());

        $view = new VManagePost($appuntamenti_medico_conclusi,$pazienti); //servirebbe una cosa del genere
        header('Location: /appuntamento/esamidaprenotare');
        }
    } 


//4.3 inserimento_referto(appuntamento)


//PENSIAMO AD UN METODO CHE CARICHI IL REFERTO SOLO SE TUTTO è OK ALTRIMENTI MANDI UN MESSAGGIO DI ERRORE
public static function inserimento_referto($IdAppuntamento){
    if(CUtente::isLogged()){ //BISOGNA TENERLO   
        
        //BISOGNA PRENDERE L'OGGETTO ed il contenuto dal form
        $oggetto = UHTTPMethods::post('oggetto');
        $contenuto = UHTTPMethods::post('contenuto');
        $referto = new EReferto($oggetto,$contenuto);
        $appuntamento = FAppuntamento::getObj($IdAppuntamento);
        $referto->setAppuntamento($appuntamento);
        $IdReferto = FReferto::saveObj($referto); //LO SALVO NEL DB
        $referto->setIdReferto($IdReferto);
        //SE C'è ANCHE L'IMMAGINE DEVO MODIFICARLO AL VOLO

        //MANCA ANCHE SALVARE L'IMMAGINE NEL DB SE PRESENTE
        $check = UHTTPMethods::files('immagineref','error');                                       
        //var_dump($check);
        if($check > 0){ //CONTROLLANDO CHE SIA STATO PRESO IL CAMPO IMMAGINE
            $immaginereferto = UHTTPMethods::files('immagineref'); //EQUIVALENTE AD ACCEDERE A $_FILES['immagineref']
            $check = FPersistentManager::getInstance()->manageImages($immaginereferto, $referto, );
            if(!$check){
                $view->uploadFileError($check);
            }
        }//L'IMMAGINE VIENE CREATA E SALVATA IN FOUNDATION?

       
        //$referto->setIdImmagine();  //DA FARE
        //FReferto::saveObj($referto); //LO SALVO NEL DB

        $view = new VManagePost($appuntamenti_medico_conclusi,$pazienti); //servirebbe una cosa del genere
        header('Location: /appuntamento/esamidaprenotare');
        }
    }


//[medico]caso d'uso 5 "inserimento orari di disponibilità"

//5.1 mostra_orari()
public static function mostra_orari_disponibilità($IdMedico){
    if(CUtente::isLogged()){ //possiamo tenerlo o toglierlo
        
        $IdMedico = USession::getSessionElement('id');
        $data = new DateTime(); //DATA E ORA AL MOMENTO DELL'ESECUZIONE  //i mesi vanno ignorati
        //DA QUESTA SI RICAVA LA SETTIMANA CHE SI USA PER ESTRARRE I DATI DAL DB (QUINDI CONDIZIONE SU ANNO + SETTIMANA)
        $numerosettimana = $data->format('W'); //numero della settimana nell'anno (es 43)
        $anno = $data->format('o'); //anno attuale (es 2024)
        //$giornosettimana = $data->format('N'); //numero da 1 a 7 della settimana (1=lunedì) non è detto che serva qui
        //L'IDEA è quella di ciclare sul db e mettere true/false nell'array bidimensionale che rappresenta la settimana
        $orari_disponinibilità = FEntityManagerSQL::getInstance()->getdisponibilitàsettimana($IdMedico,$numerosettimana,$anno);
        
        //servirebbe anche la valutazione del medico
        $view = new VManagePost($orari_disponinibilità); //servirebbe una cosa del genere per il passaggio dei parametri
        header('Location: /appuntamento/esamidaprenotare/$idesame '); //che poi id esame sarebbe quello che del medico
    } 
}

//5.2 conferma_orari_disponibilità(data,slot1,slot2,.....)

public static function conferma_orari_disponibilità(){  //questa funzione crea le fasce orarie
    if(CUtente::isLogged()){ //possiamo tenerlo o toglierlo
        //serve controllare l'esistenza della fascia oraria relativa come libera per creare l'appuntamento 
        //$nometipologia = FTipologia::getObj($IdTipologia)[0]->getNometipologia();
        $dataform = UHTTPMethods::post('data');
        $slotarray = UHTTPMethods::post('slotarray');  //$slotarray = ["14:30","15:30","17:30"]
        //su slot potrei farmi passare anche solo un valore di questo array da 1 a 5
        //$orari = ["0","14:30:00","15:30:00","16:30:00","17:30:00","18:30:00"];
        //$ora = $orari[$nslot]; //bisogna vederla nel ciclo per la creazione
        //$date = '2024-06-19'; //questo dovrei averlo da data
        //$time = '14:25:36'; //questo si crea con uno switch case su nslot
        foreach($slotarray as $ora){
            //per ogni orario selezionato dalle checkbox, dobbiamo ciclare e creare la fascia oraria se non esiste già
            $dateTimeString = $dataform . ' ' . $ora; 
            $data = new DateTime($dateTimeString);
            //METODO PER OTTENERE L'ID DELLA FASCIA ORARIA QUA
            //CON IDMEDICO + DATA E SLOT CI PRENDIAMO L'ID
            $IdMedico = USession::getSessionElement('id');
            //$medico = FPersistentManager::getInstance()->retrievemedicofromId($IdMedico); //è l'array dei medici attivi, ma potrebbe essere raffinato
            //$tipologie = FPersistentManager::getInstance()->retrievealltipologie();
            $exist = FEntityManagerSQL::getInstance()->existInDb(FEntityManagerSQL::getInstance()->
                    getIdFasciaOrariafromIdMedicondata($IdMedico,$data));
            if(!$exist){ //se il medico non ha ancora creato la disponibilità la possiamo creare

            //A questo punto si dovrebbe controllare se il medico ha già associato un calendario, probabilmente bisognerebbe metterne 
            // la creazione, subito successivo alla creazione del medico, quindi assumiamo che ci sia già
            //$IdFasciaOraria = FEntityManagerSQL::getInstance()->getfasciaorariafromIdMedicoanddata($IdMedico,$data);
            //$busy = FEntityManagerSQL::getInstance()->existInDb(FAppuntamento::getTable(), "IdFasciaOraria", $IdFasciaOraria); 
            $fascia_oraria = new EFasciaoraria($data);
            $IdCalendario = FEntityManagerSQL::getInstance()->retrieveObj("calendario", "IdMedico" ,$IdMedico)[0]["IdCalendario"];
            $calendario = FCalendario::getObj($IdCalendario);

            $fascia_oraria->setCalendario($calendario[0]);

            FFasciaOraria::saveObj($fascia_oraria);  //QUESTA OPERAZIONE VA CICLATA IN BASE AI VALORI PASSATI IN INPUT DALLE CHECKBOX
            
            
        }
        }

        $view = new VManagePost(); //servirebbe una cosa del genere NON SO COSA PASSARE 
        header('Location: /appuntamento/riepilogoappuntamento/$idappuntamento/$fasciaoraria ');
    } 
}


}