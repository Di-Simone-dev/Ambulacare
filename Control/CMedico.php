<?php

class CMedico{

//[medico]caso d'uso 4 "caricare un referto"

//4.1 visualizza_storico_esami()

//per mostrare gli appuntamenti conclusi di un medico ci basta prendere il suo id dalla sessione
public static function visualizza_storico_appuntamenti_medico(){
    /* if(CUtente::isLogged()){ */ //BISOGNA TENERLO
        
        $IdMedico = 3 /* USession::getSessionElement('id') */;
        $appuntamenti_medico_conclusi = FAppuntamento::creaappuntamento
            (FEntityManagerSQL::getInstance()->getappuntamenticonclusifromIdMedico($IdMedico));
        //dobbiamo prendere anche i pazienti per visualizzarne le informazioni
        //$pazienti = array();
        //foreach($appuntamenti_medico_conclusi as $ap)
        //    $pazienti = FPaziente::getObj($ap->getIdPaziente()); //aggiungo il paziente all'array
        $arrayappuntamenti = array();
        for($i=0;$i<count($appuntamenti_medico_conclusi);$i++){
            
            $paziente = $appuntamenti_medico_conclusi[$i]->getPaziente();

            $fasciaoraria = $appuntamenti_medico_conclusi[$i]->getFasciaoraria();
            $datastring = $fasciaoraria->getDatatostring();
            $arrayappuntamenti[$i]["IdAppuntamento"] = $appuntamenti_medico_conclusi[$i]->getIdAppuntamento();
            $arrayappuntamenti[$i]["dataeora"] = $datastring;
            $arrayappuntamenti[$i]["nomepaziente"] = $paziente->getNome();
            $arrayappuntamenti[$i]["cognomepaziente"] =$paziente->getCognome();
            //$arrayappuntamenti[$i]["valutazionemedico"] = FEntityManagerSQL::getInstance()->getAveragevalutazione($medico[0]->getIdMedico());
            $arrayappuntamenti[$i]["costoappuntamento"] = $appuntamenti_medico_conclusi[$i]->getCosto();
            //$arrayappuntamenti[$i]["nometipologiamedico"] = $medico[0]->getTipologia()->getNometipologia(); 
            //$arrayappuntamenti[$i]["tipoimmaginemedico"] = FImmagine::getObj($medico[0]->getIdImmagine())[0]->getTipo(); 
            //$arrayappuntamenti[$i]["datiimmaginemedico"] = FImmagine::getObj($medico[0]->getIdImmagine())[0]->getDati(); 
        }
        //IN QUESTO MODO GLI ARRAY SONO SINCRONIZZATI E $appuntamenti_medico_conclusi[0] $pazienti[0] ci danno la prima riga
        //dentro questo array abbiamo gli oggetti appuntamento conclusi per essere visualizzati 
        //l'id dell'appuntamento va tenuto per associarlo ai bottoni di recensioni e di visualizzazione referto
        //per le recensioni servirebbe anche quello del medico (da vedere)
        //serve passare anche le tipologie
        //$tipologie = FEntityManagerSQL::retrieveall("tipologia");
        $view = new VMedico(); //servirebbe una cosa del genere
        $view->showAppHistory($arrayappuntamenti);
   /*  }  */
}

//4.2 ricerca_storico_esami(data)
public static function ricerca_storico_appuntamenti_medico(){
    /* if(CUtente::isLogged()){ */ //BISOGNA TENERLO   
        
        $dataform = UHTTPMethods::post('data');
        $IdMedico = 3; /* USession::getSessionElement('id') */;
        $appuntamenti_medico_conclusi = FAppuntamento::creaappuntamento  //se si toglie stato dal db FUNZIONA
            (FEntityManagerSQL::getInstance()->getappuntamenticonclusifromIdMedico($IdMedico,$dataform));
        $arrayappuntamenti = array();
        var_dump($$appuntamenti_medico_conclusi);
        for($i=0;$i<count($appuntamenti_medico_conclusi);$i++){
            
            $paziente = FPaziente::getObj($appuntamenti_medico_conclusi[$i]->getIdPaziente())[0];
    
            $fasciaoraria = FFasciaOraria::getObj($appuntamenti_medico_conclusi[$i]->getIdFasciaoraria());
            $datastring = $fasciaoraria[0]->getDatatostring();
            $arrayappuntamenti[$i]["IdAppuntamento"] = $appuntamenti_medico_conclusi[$i]["IdAppuntamento"];
            $arrayappuntamenti[$i]["dataeora"] = $datastring;
            $arrayappuntamenti[$i]["nomepaziente"] = $paziente->getNome();
            $arrayappuntamenti[$i]["cognomepaziente"] =$paziente->getCognome();
            //$arrayappuntamenti[$i]["valutazionemedico"] = FEntityManagerSQL::getInstance()->getAveragevalutazione($medico[0]->getIdMedico());
            $arrayappuntamenti[$i]["costoappuntamento"] = $appuntamenti_medico_conclusi[$i]->getCosto();

        }
        $view = new VMedico(); //servirebbe una cosa del genere
        $view->showAppHistory($arrayappuntamenti);
   /*  } */ 
}

//4.3 inserimento_referto(appuntamento)

//PENSIAMO AD UN METODO CHE CARICHI IL REFERTO SOLO SE TUTTO è OK ALTRIMENTI MANDI UN MESSAGGIO DI ERRORE
public static function inserimento_referto($IdAppuntamento){
    if(CUtente::isLogged()){ //BISOGNA TENERLO   
        //DOBBIAMO MOSTRARE I DATI RELATIVI ALL'APPUNTAMENTO (PAZIENTE, COSTO, DATA) PARTENDO DA ID APPUNTAMENTO
        //$medico = FMedico::getObj($IdMedico); //prendo il medico per prendere la tipologia
        $appuntamento = FAppuntamento::getObj($IdAppuntamento);
        $arrayappuntamento = array();
        
        $arrayappuntamenti = array();    
        $paziente = FPaziente::getObj($appuntamento[0]->getIdPaziente())[0];
    
        $fasciaoraria = FFasciaOraria::getObj($appuntamento[0]->getIdFasciaoraria());
        $datastring = $fasciaoraria[0]->getDatatostring();
        $arrayappuntamento["IdAppuntamento"] = $IdAppuntamento;
        $arrayappuntamento["dataeora"] = $datastring;
        $arrayappuntamento["nomepaziente"] = $paziente->getNome();
        $arrayappuntamento["cognomepaziente"] =$paziente->getCognome();
        //$arrayappuntamenti[$i]["valutazionemedico"] = FEntityManagerSQL::getInstance()->getAveragevalutazione($medico[0]->getIdMedico());
        $arrayappuntamento["costoappuntamento"] = $appuntamento[0]->getCosto();
       
        //$referto->setIdImmagine();  //DA FARE
        //FReferto::saveObj($referto); //LO SALVO NEL DB

        $view = new VMedico($arrayappuntamento); //servirebbe una cosa del genere
        header('Location: /appuntamento/esamidaprenotare');
    }
}

//4.4 caricamento_referto(appuntamento)

//PENSIAMO AD UN METODO CHE CARICHI IL REFERTO SOLO SE TUTTO è OK ALTRIMENTI MANDI UN MESSAGGIO DI ERRORE
public static function caricamento_referto(){
    if(CUtente::isLogged()){ //BISOGNA TENERLO   
        
        $IdAppuntamento = UHTTPMethods::post('IdAppuntamento');
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
            $check = FPersistentManager::getInstance()->manageImages($immaginereferto, $referto);
            if(!$check){
                //$view->uploadFileError($check);
            }
        }//L'IMMAGINE VIENE CREATA E SALVATA IN FOUNDATION?

       
        //$referto->setIdImmagine();  //DA FARE
        //FReferto::saveObj($referto); //LO SALVO NEL DB

        $view = new VMedico($appuntamenti_medico_conclusi,$pazienti); //servirebbe una cosa del genere
        header('Location: /appuntamento/esamidaprenotare');
    }
}


//[medico]caso d'uso 5 "inserimento orari di disponibilità"

//5.1 mostra_orari()
public static function mostra_orari_disponibilità(){
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
        $view = new VMedico($orari_disponinibilità); //servirebbe una cosa del genere per il passaggio dei parametri
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

        $view = new VMedico(); //servirebbe una cosa del genere NON SO COSA PASSARE 
        header('Location: /appuntamento/riepilogoappuntamento/$idappuntamento/$fasciaoraria ');
    } 
}

//[medico]caso d'uso 6 "visualizzare lo storico esami di un paziente

//6.1 visualizza_pazienti() dobbiamo visualizzare tutti i pazienti attivi sulla piattaforma

public static function visualizza_pazienti(){  
    $pazienti = FPersistentManager::getInstance()->retrievepazientiattivi(); //è l'array dei pazienti attivi, ma deve essere raffinato
    
    $arraypazienti = array();
    //$nmedici = count($pazienti);
    //ci devo aggiungere la tipologia per ogni medico
    for($i=0;$i<count($pazienti);$i++){
        $arraypazienti[$i]["IdPaziente"] = $pazienti[$i]->getIdPaziente();
        $arraypazienti[$i]["nomepaziente"] = $pazienti[$i]->getNome();
        $arraypazienti[$i]["cognomepaziente"] = $pazienti[$i]->getCognome();
        $arraypazienti[$i]["data_nascita"] = $pazienti[$i]->getDataNascita();
    }
    
    $tipologie = FPersistentManager::getInstance()->retrievealltipologie();
    $view = new VMedico($arraypazienti); //servirebbe una cosa del genere
    header('Location: /appuntamento/esamidaprenotare');
}

//6.2 ricerca_pazienti() dobbiamo visualizzare tutti i pazienti attivi sulla piattaforma

public static function ricerca_pazienti(){  
    $nomepaziente = UHTTPMethods::post('nome');
    $cognomepaziente = UHTTPMethods::post('cognome');
    $pazienti = FPaziente::getpazientefromnome_cognome($nomepaziente,$cognomepaziente); //ATTENZIONE SONO PRESENTI ANCHE QUELLI BANNATI
    
    $arraypazienti = array();
    //$nmedici = count($pazienti);
    //ci devo aggiungere la tipologia per ogni medico
    for($i=0;$i<count($pazienti);$i++){
        $arraypazienti[$i]["IdPaziente"] = $pazienti[$i]->getIdPaziente();
        $arraypazienti[$i]["nomepaziente"] = $pazienti[$i]->getNome();
        $arraypazienti[$i]["cognomepaziente"] = $pazienti[$i]->getCognome();
        $arraypazienti[$i]["data_nascita"] = $pazienti[$i]->getDataNascita();
    }
    
    //$tipologie = FPersistentManager::getInstance()->retrievealltipologie();
    $view = new VMedico($arraypazienti); //servirebbe una cosa del genere
    header('Location: /appuntamento/esamidaprenotare');
}

//6.3) dettagli_paziente(paziente) grazie all'id inserito possiamo accedere allo storico esami del paziente selezionato 
//MOLTO SIMILE A 2.1

public static function dettagli_storico_paziente($IdPaziente){
    if(CUtente::isLogged()){ //BISOGNA TENERLO   
        
        
        //$IdPaziente = USession::getSessionElement('id');
        $appuntamenti_paziente_conclusi = FAppuntamento::creaappuntamento  //se si toglie stato dal db FUNZIONA
            (FEntityManagerSQL::getInstance()->getappuntamenticonclusipaziente($IdPaziente));
        $arrayappuntamenti = array();
        for($i=0;$i<count($appuntamenti_paziente_conclusi);$i++){
            $IdMedico = FEntityManagerSQL::getInstance()->getIdMedicofromIdAppuntamento
                        ($appuntamenti_paziente_conclusi[$i]->getIdAppuntamento);
            $medico = FMedico::getObj($IdMedico);
            $fasciaoraria = FFasciaOraria::getObj($appuntamenti_paziente_conclusi[$i]->getIdFasciaoraria());
            $datastring = $fasciaoraria[0]->getDatatostring();
            $arrayappuntamenti[$i]["IdAppuntamento"] = $appuntamenti_paziente_conclusi[$i]["IdAppuntamento"];
            $arrayappuntamenti[$i]["dataeora"] = $datastring;
            $arrayappuntamenti[$i]["nomemedico"] = $medico[0]->getNome();
            $arrayappuntamenti[$i]["cognomemedico"] = $medico[0]->getCognome();
            $arrayappuntamenti[$i]["valutazionemedico"] = FEntityManagerSQL::getInstance()->getAveragevalutazione($medico[0]->getIdMedico());
            $arrayappuntamenti[$i]["costomedico"] = $appuntamenti_paziente_conclusi[$i]["costo"];
            $arrayappuntamenti[$i]["nometipologiamedico"] = $medico[0]->getTipologia()->getNometipologia(); 
            $arrayappuntamenti[$i]["tipoimmaginemedico"] = FImmagine::getObj($medico[0]->getIdImmagine())[0]->getTipo(); 
            $arrayappuntamenti[$i]["datiimmaginemedico"] = FImmagine::getObj($medico[0]->getIdImmagine())[0]->getDati(); 
            //SERVE CONTROLLARE LA PRESENZA DEL REFERTO E SE PRESENTE INSERIRE L'ID SUL BOTTONE PER IL PROSSIMO PUNTO
        }
        //dentro questo array abbiamo gli oggetti appuntamento conclusi per essere visualizzati 
        //l'id dell'appuntamento va tenuto per associarlo ai bottoni di recensioni e di visualizzazione referto
        //per le recensioni servirebbe anche quello del medico (da vedere)
        //$tipologie = FEntityManagerSQL::retrieveall("tipologia");
        $view = new VMedico($arrayappuntamenti); //servirebbe una cosa del genere
        header('Location: /appuntamento/esamidaprenotare');
    } 
}

//6.4) visualizza_referto()
public static function visualizza_referto($IdAppuntamento){
    if(CUtente::isLogged()){ //BISOGNA TENERLO   

        $arrayreferto = array();
        $referto = FReferto::creareferto(
            FEntityManagerSQL::getInstance()->retrieveObj("referto","IdAppuntamento",$IdAppuntamento));

        $arrayreferto["oggetto"] = $referto[0]->getOggetto();
        $arrayreferto["contenuto"] = $referto[0]->getContenuto();     
        //servirebbe passare alla view anche l'immagine associata
        $immagine = FImmagine::getObj($referto[0]->getIdImmagine()); //questa è molto comoda per instanziare l'immagine
        
        $arrayreferto["tipoimmagine"] = $immagine[0]->getTipo();
        $arrayreferto["datiimmagine"] = $immagine[0]->getDati();     
        $view = new VMedico($arrayreferto); //servirebbe una cosa del genere
        header('Location: /appuntamento/esamidaprenotare');
    } 
}

//[medico]caso d'uso 7 "visualizzare esami complessivi e guadagni in un periodo di tempo

//7.1)visualizza_statistiche() qui non dovrei passare nulla per ora perchè servono le date

public static function visualizza_statistiche(){
    if(CUtente::isLogged()){ //BISOGNA TENERLO   

        
        $view = new VMedico(); //servirebbe una cosa del genere
        header('Location: /appuntamento/esamidaprenotare');
    } 
}

//7.2) calcola_statistiche(data1,data2) qui devo passare a view il numero complessivo di appuntamenti nel periodo di tempo selezionato
//ed anche la somma dei costi degli appuntamenti, oltre che un array per il grafico effettivo

public static function calcola_statistiche(){
    if(CUtente::isLogged()){ //BISOGNA TENERLO   

        $IdMedico = USession::getSessionElement('id'); //prendiamo l'id dalla sessione
        $data1 = UHTTPMethods::post('data1');
        $data2 = UHTTPMethods::post('data2');
        //meccanismo per invertire le date nel caso la prima sia successiva alla seconda, potrebbe anche non servire
        if($data1>$data2){
            [$data1, $data2] = [$data2, $data1];
        }

        $appuntamenti = FEntityManagerSQL::getInstance()->getstatistiche($IdMedico,$data1,$data2);
        $statistiche_tot = FEntityManagerSQL::getInstance()->getstatistichegenerali($IdMedico,$data1,$data2);
        $sommacosti = $statistiche_tot[0]["sommacosti"];
        $numappuntamenti = $statistiche_tot[0]["numappuntamenti"];

        $view = new VMedico($appuntamenti,$sommacosti,$numappuntamenti); //servirebbe una cosa del genere
        header('Location: /appuntamento/esamidaprenotare');
    } 
}

//[medico]caso d'uso 8 "visualizzare e rispondere ad una recensione"

//8.1) visualizza_recensioni()

public static function visualizza_recensioni(){
    if(CUtente::isLogged()){ //BISOGNA TENERLO   

        $IdMedico = USession::getSessionElement('id'); //prendiamo l'id dalla sessione

        $recensioni = FEntityManagerSQL::getInstance()->retrieveObj(FRecensione::getTable(),"$IdMedico",$IdMedico);
        //dovrebbe bastare passare il risultato della query visto che non sono oggetti
        //$recensioni[0]["IdRecensione"] è l'id della prima recensione
        $view = new VMedico($recensioni); //servirebbe una cosa del genere
        header('Location: /appuntamento/esamidaprenotare');
    } 
}

//8.2) dettagli_recensione() nella schermata di dettaglio possiamo inserire la risposta alla recensione
public static function dettagli_recensione($IdRecensione){
    if(CUtente::isLogged()){ //BISOGNA TENERLO   

        $IdMedico = USession::getSessionElement('id'); //prendiamo l'id dalla sessione

        $recensione = FEntityManagerSQL::getInstance()->retrieveObj(FRecensione::getTable(),"IdRecensione",$IdRecensione);
        $risposta = FEntityManagerSQL::getInstance()->retrieveObj(FRisposta::getTable(),"IdRecensione",$IdRecensione);
        //passiamo anche la risposta se esiste
        //$valutazione = $recensione["valutazione"];
        //dovrebbe bastare passare il risultato della query visto che non sono oggetti
        //$recensioni[0]["IdRecensione"] è l'id della prima recensione
        $view = new VMedico($recensione,$risposta); //servirebbe una cosa del genere
        header('Location: /appuntamento/esamidaprenotare');
    } 
}

//8.3) inserisci_risposta() prendiamo i dati dal form e creiamo la risposta per salvarla nel db 
public static function inserisci_risposta(){
    if(CUtente::isLogged()){ //BISOGNA TENERLO   

        $IdRecensione = UHTTPMethods::post("IdRecensione");
        $IdMedico = USession::getSessionElement('id'); //prendiamo l'id dalla sessione
        
        $contenuto = UHTTPMethods::post("contenuto"); //contenuto della risposta
        $data = getdate();//data attuale

        $risposta = new ERisposta($contenuto,$data);
        $risposta->setMedico(FMedico::getObj($IdMedico)[0]);
        $risposta->setRecensione(FRecensione::getObj($IdRecensione));
        $idr = FRisposta::saveObj($risposta); //setto tutto e salvo la risposta del medico
        //$recensioni[0]["IdRecensione"] è l'id della prima recensione
        $view = new VMedico(); //servirebbe una cosa del genere
        header('Location: /appuntamento/esamidaprenotare');
    } 
}

//[medico]caso d'uso 9 "modifica appuntamento"

//9.1 visualizza_agenda()

public static function visualizza_agenda(){
    if(CUtente::isLogged()){ //BISOGNA TENERLO
        //a questo punto prendiamo l'id del paziente della sessione e ritorniamo gli appuntamenti non ancora svolti

        $IdMedico = USession::getSessionElement('id');
        $agenda = FAppuntamento::creaappuntamento
            (FEntityManagerSQL::getInstance()->getagendamedico($IdMedico));
        //DOVREBBE BASTARE PASSARE QUESTA

        $view = new VMedico($agenda); //servirebbe una cosa del genere
        header('Location: /appuntamento/esamidaprenotare');
    } 
}

//9.2 dettagli_appuntamento()
//con questo accediamo alla schermata di modifica dell'appuntamento 
//PASSIAMO LE DISPONIBILITà, IL NOMINATIVO DEL PAZIENTE E LE VECCHIE DATE ED ORA DELL'APPUNTAMENTO
public static function dettagli_appuntamento_modifica($IdAppuntamento){
    if(CUtente::isLogged()){ //BISOGNA TENERLO
        //Dobbiamo mostrare dei dati del vecchio appuntamento ed anche gli orari di disponibilità del medico
        $appuntamento = FAppuntamento::getObj($IdAppuntamento); //per mostrare le vecchie data e slot orario
        $fasciaoraria = FFasciaOraria::getObj($appuntamento[0]->getFasciaoraria()->getIdFasciaoraria());
        $vecchiadataeora = $fasciaoraria[0]->getDatatostring();
        $IdMedico = USession::getSessionElement('id');
        $paziente = FPaziente::getObj($appuntamento[0]->getPaziente()->getIdPaziente());
        $nominativopaziente = $paziente[0]->getNome()+" "+$paziente[0]->getCognome();
        $data = new DateTime(); //DATA E ORA AL MOMENTO DELL'ESECUZIONE  //i mesi vanno ignorati
        //DA QUESTA SI RICAVA LA SETTIMANA CHE SI USA PER ESTRARRE I DATI DAL DB (QUINDI CONDIZIONE SU ANNO + SETTIMANA)
        $numerosettimana = $data->format('W'); //numero della settimana nell'anno (es 43)
        $anno = $data->format('o'); //anno attuale (es 2024)
        //$giornosettimana = $data->format('N'); //numero da 1 a 7 della settimana (1=lunedì) non è detto che serva qui
        //L'IDEA è quella di ciclare sul db e mettere true/false nell'array bidimensionale che rappresenta la settimana
        $orari_disponinibilità = FEntityManagerSQL::getInstance()->getdisponibilitàsettimana($IdMedico,$numerosettimana,$anno);
        //DOVRO IMPLEMENTARE IL MODO DI CAMBIARE SETTIMANA DI VISUALIZZAZIONE
        
        
        
        $view = new VMedico($nominativopaziente,$orari_disponinibilità,$vecchiadataeora); //servirebbe anche la fascia oraria
        header('Location: /appuntamento/esamidaprenotare');
    } 
}

//9.3 modifica_appuntamento()
//PROBABILMENTE I METODI POSSONO ESSERE RIUTILIZZATI CON QUALCHE ACCORTEZZA
public static function modifica_appuntamento(){  //DA FARE
    if(CUtente::isLogged()){ //possiamo tenerlo o toglierlo
        //serve controllare l'esistenza della fascia oraria relativa come libera per creare l'appuntamento 
        //$nometipologia = FTipologia::getObj($IdTipologia)[0]->getNometipologia();
        $IdAppuntamento = UHTTPMethods::post('IdAppuntamento');
        $dataform = UHTTPMethods::post('data');
        $nslot = UHTTPMethods::post('nslot');
        //su slot potrei farmi passare anche solo un valore di questo array da 1 a 5
        $orari = ["0","14:30:00","15:30:00","16:30:00","17:30:00","18:30:00"];
        $ora = $orari[$nslot];
        //$date = '2024-06-19'; //questo dovrei averlo da data
        //$time = '14:25:36'; //questo si crea con uno switch case su nslot

        $dateTimeString = $dataform . ' ' . $ora;
        $data = new DateTime($dateTimeString);
        //METODO PER OTTENERE L'ID DELLA FASCIA ORARIA QUA
        //CON IDMEDICO + DATA E SLOT CI PRENDIAMO L'ID
        $IdPaziente = USession::getSessionElement('id');
        //CONVIENE RIGETTARE l'ID DEL MEDICO usando l'id dell'appuntamento già prenotato
        $IdMedico = FEntityManagerSQL::getInstance()->getIdMedicofromIdAppuntamento($IdAppuntamento);

        $exist = FEntityManagerSQL::getInstance()->
                existInDb(FEntityManagerSQL::getInstance()->getIdFasciaOrariafromIdMedicondata($IdMedico,$data));
        if($exist && $data>getdate()){ //se il medico ha creato la disponibilità e la data inserita è futura
            $IdFasciaOraria = FEntityManagerSQL::getInstance()->getIdFasciaOrariafromIdMedicondata($IdMedico,$data);
            $busy = FEntityManagerSQL::getInstance()->existInDb(FEntityManagerSQL::getInstance()->retrieveObj
                    (FAppuntamento::getTable(), "IdFasciaOraria", $IdFasciaOraria)); 
            if(!$busy){ //se la fascia non è occupata procediamo con la creazione dell'appuntamento
                //CREARE APPUNTAMENTO
                //$appuntamento = new EAppuntamento(); //BISOGNEREBBE METTERE LO STATO MA ANDREBBE TOLTO
                $appuntamento = FAppuntamento::getObj($IdAppuntamento);
                //per la modifica ci serve il field array che è un array bidimensionale che in questo caso deve cambiare
                //l'id della fascia oraria 
                $arraymodifica[0][0] = "IdFasciaOraria";
                $arraymodifica[0][1] = $IdFasciaOraria;
                //$appuntamento->setpaziente($IdPaziente);            //SETTIAMO IL PAZIENTE
                //$appuntamento->setFasciaoraria($IdFascia_oraria);   //SETTIAMO LA FASCIA ORARIA CORRISPONDENTE 
                FAppuntamento::saveObj($appuntamento,$arraymodifica);  //QUI LO ANDIAMO EFFETTIVAMENTE A SALVARE SUL DB DOPO
            }
            
            
        }
        $view = new VMedico(); //servirebbe una cosa del genere NON SO COSA PASSARE 
        header('Location: /appuntamento/riepilogoappuntamento/$idappuntamento/$fasciaoraria ');
    } 
}






}