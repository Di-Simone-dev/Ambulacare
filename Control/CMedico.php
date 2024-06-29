<?php

class CMedico{

//[medico]caso d'uso 4 "caricare un referto"

//4.1 visualizza_storico_esami()

//per mostrare gli appuntamenti conclusi di un medico ci basta prendere il suo id dalla sessione
public static function visualizza_storico_appuntamenti_medico(){
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){ //BISOGNA TENERLO
        
        $IdMedico =  USession::getSessionElement('id');
        $app = FEntityManagerSQL::getInstance()->getappuntamenticonclusifromIdMedico($IdMedico);
        $appuntamenti_medico_conclusi = FAppuntamento::creaappuntamento($app);
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
            $app[$i]["IdReferto"]? $arrayappuntamenti[$i]["IdReferto"] = $app[$i]["IdReferto"] : $arrayappuntamenti[$i]["IdReferto"] = false;
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
    } 
}

public static function home(){
    if (CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico") {
        $view = new VMedico(); //servirebbe una cosa del genere
        $view->Home();
    }
}

//4.2 ricerca_storico_esami(data)
public static function ricerca_storico_appuntamenti_medico(){
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){ //BISOGNA TENERLO   
        
        $dataform = UHTTPMethods::post('data');
        $IdMedico = USession::getSessionElement('id');
        $app = FEntityManagerSQL::getInstance()->getappuntamenticonclusifromIdMedico($IdMedico);
        $appuntamenti_medico_conclusi = FAppuntamento::creaappuntamento  //se si toglie stato dal db FUNZIONA
            ($app);
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
            $app[$i]["IdReferto"]? $arrayappuntamenti[$i]["IdReferto"] = $app[$i]["IdReferto"] : $arrayappuntamenti[$i]["IdReferto"] = false;

        }
        $view = new VMedico(); //servirebbe una cosa del genere
        $view->showAppHistory($arrayappuntamenti);
    } 
}

//4.3 inserimento_referto(appuntamento)

//PENSIAMO AD UN METODO CHE CARICHI IL REFERTO SOLO SE TUTTO è OK ALTRIMENTI MANDI UN MESSAGGIO DI ERRORE
public static function inserimento_referto($IdAppuntamento){
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){ //BISOGNA TENERLO   
        //DOBBIAMO MOSTRARE I DATI RELATIVI ALL'APPUNTAMENTO (PAZIENTE, COSTO, DATA) PARTENDO DA ID APPUNTAMENTO
        //$medico = FMedico::getObj($IdMedico); //prendo il medico per prendere la tipologia
        $appuntamento = FAppuntamento::getObj($IdAppuntamento);
        $arrayappuntamento = array();
        
        $arrayappuntamenti = array();  
        //var_dump($appuntamento);  
        $paziente = $appuntamento[0]->getPaziente();
    
        $fasciaoraria = $appuntamento[0]->getFasciaoraria();
        $datastring = $fasciaoraria->getDatatostring();
        $arrayappuntamento["IdAppuntamento"] = $IdAppuntamento;
        $arrayappuntamento["dataeora"] = $datastring;
        $arrayappuntamento["nomepaziente"] = $paziente->getNome();
        $arrayappuntamento["cognomepaziente"] =$paziente->getCognome();
        //$arrayappuntamenti[$i]["valutazionemedico"] = FEntityManagerSQL::getInstance()->getAveragevalutazione($medico[0]->getIdMedico());
        $arrayappuntamento["costoappuntamento"] = $appuntamento[0]->getCosto();
        
        //$referto->setIdImmagine();  //DA FARE
        //FReferto::saveObj($referto); //LO SALVO NEL DB

        $view = new VMedico(); //servirebbe una cosa del genere
        $view->CaricaReferto($arrayappuntamento);
    }
}

//4.4 caricamento_referto(appuntamento)

//PENSIAMO AD UN METODO CHE CARICHI IL REFERTO SOLO SE TUTTO è OK ALTRIMENTI MANDI UN MESSAGGIO DI ERRORE
public static function caricamento_referto(){
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){ //BISOGNA TENERLO   
        $messaggio = "Errore con il caricamento del referto!";
        $IdAppuntamento = UHTTPMethods::post('IdAppuntamento');
        //BISOGNA PRENDERE L'OGGETTO ed il contenuto dal form
        $oggetto = UHTTPMethods::post('oggetto');
        $contenuto = UHTTPMethods::post('contenuto');
        $referto = new EReferto($oggetto,$contenuto);
        $appuntamento = FAppuntamento::getObj($IdAppuntamento);
        $referto->setAppuntamento($appuntamento[0]);
        $IdReferto = FReferto::saveObj($referto); //LO SALVO NEL DB
        $referto->setIdReferto($IdReferto);
        //SE C'è ANCHE L'IMMAGINE DEVO MODIFICARLO AL VOLO

        //MANCA ANCHE SALVARE L'IMMAGINE NEL DB SE PRESENTE
        $check = UHTTPMethods::files('immagineref','error');                                       
        if($check == 0){ //CONTROLLANDO CHE SIA STATO PRESO IL CAMPO IMMAGINE
            $immaginereferto = UHTTPMethods::files('immagineref'); //EQUIVALENTE AD ACCEDERE A $_FILES['immagineref']
            $check = FPersistentManager::getInstance()->manageImages($immaginereferto, $referto);
            if($check){
                //$view->uploadFileError($check);
                $messaggio="Referto caricato correttamente!";
            }
        }//L'IMMAGINE VIENE CREATA E SALVATA IN FOUNDATION?

       
        //$referto->setIdImmagine();  //DA FARE
        //FReferto::saveObj($referto); //LO SALVO NEL DB

        $view = new VMedico(); //servirebbe una cosa del genere
        $view->messaggio($messaggio);
    }
}


//[medico]caso d'uso 5 "inserimento orari di disponibilità"

//5.1 mostra_orari()
public static function mostra_orari_disponibilita($weekdisplacement=0){
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){ //possiamo tenerlo o toglierlo
        
        $IdMedico = USession::getSessionElement('id');
        $data = new DateTime(); //DATA E ORA AL MOMENTO DELL'ESECUZIONE  //i mesi vanno ignorati
        //DA QUESTA SI RICAVA LA SETTIMANA CHE SI USA PER ESTRARRE I DATI DAL DB (QUINDI CONDIZIONE SU ANNO + SETTIMANA)
        $numerosettimana = $data->format('W'); //numero della settimana nell'anno (es 43)
        $anno = $data->format('o'); //anno attuale (es 2024)
        //$giornosettimana = $data->format('N'); //numero da 1 a 7 della settimana (1=lunedì) non è detto che serva qui
        //L'IDEA è quella di ciclare sul db e mettere true/false nell'array bidimensionale che rappresenta la settimana
        $orari_disponinibilità = FEntityManagerSQL::getInstance()->getdisponibilitàsettimana($IdMedico,$numerosettimana-1,$anno);
        //servirebbe anche la valutazione del medico
        if ($weekdisplacement == 0){
            $giorno[0] = date("d/m",strtotime('Monday this week'));
            $giorno[1] = date("d/m",strtotime('Tuesday this week'));
            $giorno[2] = date("d/m",strtotime('Wednesday this week'));
            $giorno[3] = date("d/m",strtotime('Thursday this week'));
            $giorno[4] = date("d/m",strtotime('Friday this week'));
            $giorno[5] = date("d/m",strtotime('Saturday this week'));
            }
            elseif ($weekdisplacement==1){
                $giorno[0] = date("d/m",strtotime('Monday next week'));
                $giorno[1] = date("d/m",strtotime('Tuesday next week'));
                $giorno[2] = date("d/m",strtotime('Wednesday next week'));
                $giorno[3] = date("d/m",strtotime('Thursday next week'));
                $giorno[4] = date("d/m",strtotime('Friday next week'));
                $giorno[5] = date("d/m",strtotime('Saturday next week'));
            }else header("Location: /Ambulacare/Pages/templates/pagenotfound.tpl");
        $view = new VMedico(); //servirebbe una cosa del genere per il passaggio dei parametri
        $view->ShowPageOrari($orari_disponinibilità,$giorno); //che poi id esame sarebbe quello che del medico
    } 
}

//5.2 conferma_orari_disponibilità(data,slot1,slot2,.....)

public static function conferma_orari_disponibilita(){  //questa funzione crea le fasce orarie
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){ //possiamo tenerlo o toglierlo
        //serve controllare l'esistenza della fascia oraria relativa come libera per creare l'appuntamento 
        //$nometipologia = FTipologia::getObj($IdTipologia)[0]->getNometipologia();
        $messaggio = "Errore con la fascia oraria";
        $dataform = UHTTPMethods::post('datadisp');
        $slotarray = UHTTPMethods::post('orariodisp');  //$slotarray = ["14:30","15:30","17:30"]
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
            $fascia_oraria = new EFasciaoraria($data->format("Y-m-d H:i:s"));
            //var_dump($fascia_oraria);
            $IdCalendario = FEntityManagerSQL::getInstance()->retrieveObj("calendario", "IdMedico" ,$IdMedico)[0]["IdCalendario"];
            $calendario = FCalendario::getObj($IdCalendario);

            $fascia_oraria->setCalendario($calendario[0]);
            FFasciaOraria::saveObj($fascia_oraria);  //QUESTA OPERAZIONE VA CICLATA IN BASE AI VALORI PASSATI IN INPUT DALLE CHECKBOX
            $messaggio = "Fasce caricate correttamente!";
            
        }
        }

        $view = new VMedico(); //servirebbe una cosa del genere NON SO COSA PASSARE 
        $view->messaggio($messaggio);
    } 
}

//[medico]caso d'uso 6 "visualizzare lo storico esami di un paziente

//6.1 visualizza_pazienti() dobbiamo visualizzare tutti i pazienti attivi sulla piattaforma

public static function visualizza_pazienti(){ 
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){ 
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
    $view = new VMedico(); //servirebbe una cosa del genere
    $view->listaPazienti($arraypazienti);
}
}

//6.2 ricerca_pazienti() dobbiamo visualizzare tutti i pazienti attivi sulla piattaforma

public static function ricerca_pazienti(){ 
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){ 
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
    $view = new VMedico(); //servirebbe una cosa del genere
    $view->listaPazienti($arraypazienti);
}
}

//6.3) dettagli_paziente(paziente) grazie all'id inserito possiamo accedere allo storico esami del paziente selezionato 
//MOLTO SIMILE A 2.1

public static function dettagli_storico_paziente($IdPaziente){
     if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){  //BISOGNA TENERLO   
        
        $paziente = FPersistentManager::retrieveinfopaziente($IdPaziente);
        //$IdPaziente = USession::getSessionElement('id');
        $app = FEntityManagerSQL::getInstance()->getappuntamenticonclusipaziente($IdPaziente);
        $appuntamenti_paziente_conclusi = FAppuntamento::creaappuntamento  //se si toglie stato dal db FUNZIONA
            ($app);
        $arrayappuntamenti = array();
        for($i=0;$i<count($appuntamenti_paziente_conclusi);$i++){
            $IdMedico = FEntityManagerSQL::getInstance()->getIdMedicofromIdAppuntamento
                        ($appuntamenti_paziente_conclusi[$i]->getIdAppuntamento());
            $medico = FMedico::getObj($IdMedico[0]["IdMedico"]);
            $fasciaoraria = FFasciaOraria::getObj($app[$i]["IdFasciaOraria"]);
            $datastring = $fasciaoraria[0]->getDatatostring();
            $arrayappuntamenti[$i]["IdAppuntamento"] = $appuntamenti_paziente_conclusi[$i]->getIdAppuntamento();
            $arrayappuntamenti[$i]["dataeora"] = $datastring;
            $arrayappuntamenti[$i]["nomemedico"] = $medico[0]->getNome();
            $arrayappuntamenti[$i]["cognomemedico"] = $medico[0]->getCognome();
            $arrayappuntamenti[$i]["valutazionemedico"] = FEntityManagerSQL::getInstance()->getAveragevalutazione($medico[0]->getIdMedico());
            $arrayappuntamenti[$i]["costomedico"] = $appuntamenti_paziente_conclusi[$i]->getCosto();
            $arrayappuntamenti[$i]["nometipologiamedico"] = $medico[0]->getTipologia()[0]->getNometipologia(); 
            $arrayappuntamenti[$i]["tipoimmaginemedico"] = FImmagine::getObj($medico[0]->getIdImmagine())[0]->getTipo(); 
            $arrayappuntamenti[$i]["datiimmaginemedico"] = FImmagine::getObj($medico[0]->getIdImmagine())[0]->getDati(); 
            $app[$i]["IdReferto"]? $arrayappuntamenti[$i]["IdReferto"] = $app[$i]["IdReferto"] : $arrayappuntamenti[$i]["IdReferto"] = false;
            //SERVE CONTROLLARE LA PRESENZA DEL REFERTO E SE PRESENTE INSERIRE L'ID SUL BOTTONE PER IL PROSSIMO PUNTO
        }
        //dentro questo array abbiamo gli oggetti appuntamento conclusi per essere visualizzati 
        //l'id dell'appuntamento va tenuto per associarlo ai bottoni di recensioni e di visualizzazione referto
        //per le recensioni servirebbe anche quello del medico (da vedere)
        //$tipologie = FEntityManagerSQL::retrieveall("tipologia");
        $view = new VMedico(); //servirebbe una cosa del genere
        $view->showStoricoEsami($paziente,$arrayappuntamenti);
    } 
}

//6.4) visualizza_referto()
public static function visualizza_referto($IdReferto){
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){ //BISOGNA TENERLO   

        $arrayreferto = array();
        $referto = FReferto::getObj($IdReferto);
        $arrayreferto["oggetto"] = $referto[0]->getOggetto();
        $arrayreferto["contenuto"] = $referto[0]->getContenuto();     
        //servirebbe passare alla view anche l'immagine associata
        $immagine = FImmagine::getObj($referto[0]->getIdImmagine()); //questa è molto comoda per instanziare l'immagine
        $withimg=FALSE;
        if(isset($immagine)){
            $withimg=TRUE;
            $arrayreferto["tipoimmagine"] = $immagine[0]->getTipo();
            $arrayreferto["datiimmagine"] = $immagine[0]->getDati();

        }
        $paziente = $referto[0]->getAppuntamento()->getPaziente();
        $arrayreferto["nominativopaziente"]= $paziente->getNome()+ " "+ $paziente->getCognome();
        $IdMedico =  FEntityManagerSQL::getInstance()->getIdMedicofromIdAppuntamento( $referto[0]->getAppuntamento()->getIdAppuntamento());
        $medico = FMedico::getObj($IdMedico[0]["IdMedico"]);
        $arrayreferto["nominativomedico"]= $medico[0]->getNome() + " " + $medico[0]->getCognome();
        UPdf::crea_scarica_pdf($arrayreferto,$withimg);
    }
}

//[medico]caso d'uso 7 "visualizzare esami complessivi e guadagni in un periodo di tempo

//7.1)visualizza_statistiche() qui non dovrei passare nulla per ora perchè servono le date

public static function visualizza_statistiche(){
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){ //BISOGNA TENERLO   

        $view = new VMedico(); //servirebbe una cosa del genere
        $view->ShowDataStatistiche();
    } 
}

//7.2) calcola_statistiche(data1,data2) qui devo passare a view il numero complessivo di appuntamenti nel periodo di tempo selezionato
//ed anche la somma dei costi degli appuntamenti, oltre che un array per il grafico effettivo

public static function calcola_statistiche(){
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){ //BISOGNA TENERLO   

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

        $view = new VMedico(); //servirebbe una cosa del genere
        //var_dump($appuntamenti);
        $view->ShowStatistiche($appuntamenti,$data1,$data2,$sommacosti);
    } 
}

//[medico]caso d'uso 8 "visualizzare e rispondere ad una recensione"

//8.1) visualizza_recensioni()

public static function visualizza_recensioni(){
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){ //BISOGNA TENERLO   

        $IdMedico = USession::getSessionElement('id'); //prendiamo l'id dalla sessione

        $recensioni = FEntityManagerSQL::getInstance()->retrieveObj(FRecensione::getTable(),"$IdMedico",$IdMedico);
        for ($i=0; $i<count($recensioni); $i++){
            $paziente = FPaziente::getObj($recensioni[$i]["IdPaziente"]);
            $recensioni[$i]["nominativopaziente"] = $paziente[0]->getNome() . " " . $paziente[0]->getCognome();
        }
        //dovrebbe bastare passare il risultato della query visto che non sono oggetti
        //$recensioni[0]["IdRecensione"] è l'id della prima recensione
        $view = new VMedico(); //servirebbe una cosa del genere
        $view->showRevPage($recensioni);
    } 
}

//8.2) dettagli_recensione() nella schermata di dettaglio possiamo inserire la risposta alla recensione
public static function dettagli_recensione($IdRecensione){
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){ //BISOGNA TENERLO   

        $IdMedico = USession::getSessionElement('id'); //prendiamo l'id dalla sessione
        $recensione = FEntityManagerSQL::getInstance()->retrieveObj(FRecensione::getTable(),"IdRecensione",$IdRecensione);
        $risposta = FEntityManagerSQL::getInstance()->retrieveObj(FRisposta::getTable(),"IdRecensione",$IdRecensione);
        $paziente = FPaziente::getObj($recensione[0]["IdPaziente"]);
        $recensione[0]["nominativopaziente"] = $paziente[0]->getNome() . " " . $paziente[0]->getCognome();
        //passiamo anche la risposta se esiste
        //$valutazione = $recensione["valutazione"];
        //dovrebbe bastare passare il risultato della query visto che non sono oggetti
        //$recensioni[0]["IdRecensione"] è l'id della prima recensione
        $view = new VMedico(); //servirebbe una cosa del genere
        $view->RispostaRecensione($recensione[0]);
    } 
}

//8.3) inserisci_risposta() prendiamo i dati dal form e creiamo la risposta per salvarla nel db 
public static function inserisci_risposta(){
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){ //BISOGNA TENERLO   
        $messaggio = "Errore nel caricamento della recensione";
        $IdRecensione = UHTTPMethods::post("IdRecensione");
        $IdMedico = USession::getSessionElement('id'); //prendiamo l'id dalla sessione
        
        $contenuto = UHTTPMethods::post("contenuto"); //contenuto della risposta
        $data = getdate();//data attuale

        $risposta = new ERisposta($contenuto,$data);
        $risposta->setMedico(FMedico::getObj($IdMedico)[0]);
        $risposta->setRecensione(FRecensione::getObj($IdRecensione));
        $idr = FRisposta::saveObj($risposta); //setto tutto e salvo la risposta del medico
        //$recensioni[0]["IdRecensione"] è l'id della prima recensione
        $messaggio = "Risposta caricata correttamente!";
        $view = new VMedico(); //servirebbe una cosa del genere
        $view->messaggio($messaggio);
    } 
}

//[medico]caso d'uso 9 "modifica appuntamento"

//9.1 visualizza_agenda()

public static function visualizza_agenda(){
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){ //BISOGNA TENERLO
        //a questo punto prendiamo l'id del paziente della sessione e ritorniamo gli appuntamenti non ancora svolti

        $IdMedico = USession::getSessionElement('id');
        $agenda =FEntityManagerSQL::getInstance()->getagendamedico($IdMedico);
        //var_dump($agenda);
        //DOVREBBE BASTARE PASSARE QUESTA
        $view = new VMedico(); //servirebbe una cosa del genere
        $view->ShowAgenda($agenda);
    } 
}

//9.2 dettagli_appuntamento()
//con questo accediamo alla schermata di modifica dell'appuntamento 
//PASSIAMO LE DISPONIBILITà, IL NOMINATIVO DEL PAZIENTE E LE VECCHIE DATE ED ORA DELL'APPUNTAMENTO
public static function dettagli_appuntamento_modifica($IdAppuntamento, $weekdisplacement = 0){
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){ //BISOGNA TENERLO
        //Dobbiamo mostrare dei dati del vecchio appuntamento ed anche gli orari di disponibilità del medico
        $appuntamento = FAppuntamento::getObj($IdAppuntamento); //per mostrare le vecchie data e slot orario
        $fasciaoraria = FFasciaOraria::getObj($appuntamento[0]->getFasciaoraria()->getIdFasciaoraria());
        $vecchiadataeora = $fasciaoraria[0]->getDatatostring();
        $IdMedico = USession::getSessionElement('id');
        $paziente = FPaziente::getObj($appuntamento[0]->getPaziente()->getIdPaziente());
        $nominativopaziente = $paziente[0]->getNome()." ".$paziente[0]->getCognome();
        $data = new DateTime(); //DATA E ORA AL MOMENTO DELL'ESECUZIONE  //i mesi vanno ignorati
        //DA QUESTA SI RICAVA LA SETTIMANA CHE SI USA PER ESTRARRE I DATI DAL DB (QUINDI CONDIZIONE SU ANNO + SETTIMANA)
        $numerosettimana = $data->format('W'); //numero della settimana nell'anno (es 43)
        $anno = $data->format('o'); //anno attuale (es 2024)
        //$giornosettimana = $data->format('N'); //numero da 1 a 7 della settimana (1=lunedì) non è detto che serva qui
        //L'IDEA è quella di ciclare sul db e mettere true/false nell'array bidimensionale che rappresenta la settimana
        $orari_disponinibilità = FEntityManagerSQL::getInstance()->getdisponibilitàsettimana($IdMedico,$numerosettimana-1,$anno);
        //DOVRO IMPLEMENTARE IL MODO DI CAMBIARE SETTIMANA DI VISUALIZZAZIONE
        
        if ($weekdisplacement == 0){
            $giorno[0] = date("d/m",strtotime('Monday this week'));
            $giorno[1] = date("d/m",strtotime('Tuesday this week'));
            $giorno[2] = date("d/m",strtotime('Wednesday this week'));
            $giorno[3] = date("d/m",strtotime('Thursday this week'));
            $giorno[4] = date("d/m",strtotime('Friday this week'));
            $giorno[5] = date("d/m",strtotime('Saturday this week'));
            }
            elseif ($weekdisplacement==1){
                $giorno[0] = date("d/m",strtotime('Monday next week'));
                $giorno[1] = date("d/m",strtotime('Tuesday next week'));
                $giorno[2] = date("d/m",strtotime('Wednesday next week'));
                $giorno[3] = date("d/m",strtotime('Thursday next week'));
                $giorno[4] = date("d/m",strtotime('Friday next week'));
                $giorno[5] = date("d/m",strtotime('Saturday next week'));
            }else header("Location: /Ambulacare/Pages/templates/pagenotfound.tpl");
        
        $app = [
            "IdAppuntamento" => $IdAppuntamento,
            "costo" => $appuntamento[0]->getCosto(),
            "data" => $fasciaoraria[0]->getData(),
        ];
        $view = new VMedico(); //servirebbe anche la fascia oraria
        $view->ModificaAppuntamento($app,$orari_disponinibilità,$giorno);
    } 
}

//9.3 modifica_appuntamento()
//PROBABILMENTE I METODI POSSONO ESSERE RIUTILIZZATI CON QUALCHE ACCORTEZZA
public static function modifica_appuntamento(){  //DA FARE
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){ //possiamo tenerlo o toglierlo
        $messaggio="Errore nella modifica!";
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
        $IdMedico = USession::getSessionElement('id');
        //CONVIENE RIGETTARE l'ID DEL MEDICO usando l'id dell'appuntamento già prenotato
        $exist = is_int(FEntityManagerSQL::getInstance()->getIdFasciaOrariafromIdMedicondata($IdMedico,$data));
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
                $messaggio = "Modifica avvenuta con successo!";
            }
            
            
        }
        $view = new VMedico(); //servirebbe una cosa del genere NON SO COSA PASSARE 
        $view->messaggio($messaggio);
    } 
}

public static function login()
{
    $view = new VMedico();
    $view->showFormLogin();
}

public static function checkLogin()
{   //FACCIAMO IL LOGIN DEL PAZIENTE oppure posso fare un metodo unico con gli switch
    $view = new VMedico();
    //ESEGUO UN CHECK SULL'ESISTENZA DELL'USERNAME NEL DB (CONTROLLO LA PRESENZA DELLA MAIL NELLA TABLE DEI PAZIENTI)
    $medico = FPersistentManager::getInstance()->retrievemedicofromemail(UHTTPMethods::post('email'));
    //CONTROLLO LA PASSWORD IMMESSA CON QUELLA HASHATA SUL DB
    //password_verify è una funzione NATIVA DI PHP
    if ($medico != null && $medico[0]->getAttivo()!=0) {
        //var_dump(password_verify(UHTTPMethods::post('password'), $medico[0]->getPassword()));
        
        if (password_verify(UHTTPMethods::post('password'), $medico[0]->getPassword())) {
            USession::getSessionStatus() == PHP_SESSION_NONE;   //ALTRIMENTI SE LO STATO è NULLO LO SETTIAMO 
            USession::getInstance();
            USession::setSessionElement('tipo_utente', 'medico');
            USession::setSessionElement('id', $medico[0]->getIdMedico());
            
            $view->loginOk();
        } else {
            $view->showFormLogin(UHTTPMethods::post('email'), "Username o password errate!");
        }
    } else {
        $view->showFormLogin(UHTTPMethods::post('email'), "Username o password errate!");
    }
}

public static function logout()
{
    USession::getInstance();
    USession::unsetSession();
    USession::destroySession();
    header('Location: /Ambulacare');
}

   /**
     * QUESTO VA USATO PER APRIRE LA SCHERMATA DELLE INFORMAZIONI PERSONALI DEL PAZIENTE (PROFILO PERSONALE)
     * load the settings page compiled with the user data
     */
    public static function settingsmedico(){  //POTREBBE ESSERE RINOMINATO
        if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){
            $view = new VMedico();
            
            $Idmedico = USession::getSessionElement('id');
            //var_dump($Idmedico);
            //qui ho bisogno di un metodo nel persistent manager che passi un array con tutte le info visualizzabili dal medico compresa la propic
            $datimedico = FPersistentManager::getInstance()->retrieveinfomedico($Idmedico);  
            //$immagine = $datimedico["propic"];
            //var_dump($immagine); 
            $view->profileCli($datimedico);  //PASSO A VIEW QUESTO ARRAY ASSOCIATIVO CON I DATI DELL'UTENTE PER VISUALIZZARLI
        }
    }

    public static function formSetInfoMedico(){  //POTREBBE ESSERE RINOMINATO
        if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){
            $view = new VMedico();

            $Idmedico = USession::getInstance()->getSessionElement('id');
            //qui ho bisogno di un metodo nel persistent manager che passi un array con tutte le info visualizzabili dal medico compresa la propic
            $datimedico = FPersistentManager::getInstance()->retrieveinfomedico($Idmedico);    
            $view->formmodificacli($datimedico);  //PASSO A VIEW QUESTO ARRAY ASSOCIATIVO CON I DATI DELL'UTENTE PER VISUALIZZARLI
        }
    }

    /**
     * QUESTO VA USATO PER LA MODIFICA DELLE INFO DEL PROFILO DEL PAZIENTE
     * Take the compiled form and use the data for update the user info (Biography, Working, StudeiedAt, Hobby)
     */
    public static function setInfoMedico(){
        if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){
            $IdMedico = USession::getInstance()->getSessionElement('id');
            $medico = FMedico::getObj($IdMedico)[0];
            $medico->setNome(UHTTPMethods::post('Nome'));
            $medico->setCognome(UHTTPMethods::post('Cognome'));
            //$medico->setEmail(UHTTPMethods::post('Email')); //credenziale di accesso  CONTROLLO PER L'UNIVOCITà NECESSARIO
            /* $medico->setPassword(UHTTPMethods::post('Password')); //credenziale di accesso  */
            $medico->setCosto(UHTTPMethods::post('Costo')); //ATTENZIONE A QUESTO PERCHè SI RIPERCUOTE ANCHE SU ALTRO COME LE STATISTICHE
                                                            //COMPRESI GLI APPUNTAMENTI GIà EFFETTUATI
            
            $check = UHTTPMethods::files('imgprofilo','error');                                       
            if($check == 0){ //CONTROLLANDO CHE SIA STATO PRESO IL CAMPO IMMAGINE
            $immagineprofilo = UHTTPMethods::files('imgprofilo'); //EQUIVALENTE AD ACCEDERE A $_FILES['immagineref']
            $check = FPersistentManager::getInstance()->manageImagepropic($immagineprofilo, $medico);
            if($check){
                //$view->uploadFileError($check);
                $messaggio="Propic caricato correttamente!";
            }
            }//L'IMMAGINE VIENE CREATA E SALVATA IN FOUNDATION?
                                                
            
            /* var_dump($medico); */
            FPersistentManager::getInstance()->updateinfomedico($medico);
            $view = new VMedico();
            $view->messaggio("Operazione effettuata!");
        }
    }

    public static function formEmailMedico(){  //POTREBBE ESSERE RINOMINATO
        if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){
            $view = new VMedico();

            $Idmedico = USession::getInstance()->getSessionElement('id');
            //qui ho bisogno di un metodo nel persistent manager che passi un array con tutte le info visualizzabili dal medico compresa la propic
            /* $datimedico = FPersistentManager::getInstance()->retrieveinfomedico($Idmedico);   */  
            $view->formmodificaemail();  //PASSO A VIEW QUESTO ARRAY ASSOCIATIVO CON I DATI DELL'UTENTE PER VISUALIZZARLI
        }
    }


    /* *
     * QUESTO VA APPLICATO PER UN CAMBIO MAIL DEL MEDICO
     * Take the compiled form, use the data to check if the username alredy exist and if not update the user Username
     */
    public static function setEmailMedico(){
        if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){
            $view = new VMedico();
            $IdMedico = USession::getInstance()->getSessionElement('id');
            $medico = FMedico::getObj($IdMedico)[0];
            
            if($medico->getEmail() == UHTTPMethods::post('Email')){  //LA MAIL INSERITA NON DEVE ESSERE UGUALE A QUELLA ESISTENTE
                $view->messaggio("La mail deve essere diversa da quella precedente");
            }else{
                if(FPersistentManager::getInstance()->verificaemailmedico(UHTTPMethods::post('Email')) == false)
                {
                    $medico->setEmail(UHTTPMethods::post('Email'));
                    FPersistentManager::getInstance()->updatemailmedico($medico);
                    $view->messaggio("Operazione avvenuta con successo");
                }else
                {   //QUESTO NEL CASO SIA STATA INSERITA UNA MAIL ATTUALMENTE IN USO DA UN ALTRO UTENTE QUINDI VA MESSA UNA SCHERMATA DI ERRORE
                    //$userAndPropic = FPersistentManager::getInstance()->loadUsersAndImage($userId);
                    $view->formmodificaemail("Errore con la mail!");  //EMAIL ERROR
                }
            }
        }
    }

     /**
     * QUESTO VA APPLICATO PER UN CAMBIO PASSWORD DEL MEDICO
     * Take the compiled form and update the user password
     */
    public static function setPasswordMedico(){
        if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){
            $IdMedico = USession::getInstance()->getSessionElement('id');
            $medico = FMedico::getObj($IdMedico)[0];
            $newPass = UHTTPMethods::post('password');
            $medico->setPassword(password_hash($newPass,PASSWORD_DEFAULT));
            FPersistentManager::getInstance()->updatePasswordmedico($medico);

            $view = new VPaziente();
            $view->messaggio("Operazione effettuata con successo");
        }
    }

    public static function formPasswordMedico(){  //POTREBBE ESSERE RINOMINATO
        if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){
            $view = new VMedico();

            /* $Idmedico = USession::getInstance()->getSessionElement('id'); */
            //qui ho bisogno di un metodo nel persistent manager che passi un array con tutte le info visualizzabili dal medico compresa la propic
            /* $datimedico = FPersistentManager::getInstance()->retrieveinfomedico($Idmedico);   */  
            $view->formmodificapassw();  //PASSO A VIEW QUESTO ARRAY ASSOCIATIVO CON I DATI DELL'UTENTE PER VISUALIZZARLI
        }
    }

    public static function formImgMedico(){  //POTREBBE ESSERE RINOMINATO
        if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){
            $view = new VMedico();

            /* $Idmedico = USession::getInstance()->getSessionElement('id'); */
            //qui ho bisogno di un metodo nel persistent manager che passi un array con tutte le info visualizzabili dal medico compresa la propic
            /* $datimedico = FPersistentManager::getInstance()->retrieveinfomedico($Idmedico);   */  
            $view->formImg();  //PASSO A VIEW QUESTO ARRAY ASSOCIATIVO CON I DATI DELL'UTENTE PER VISUALIZZARLI
        }
    }

        /*
     * APPLICATO PER UN CAMBIO PROPIC DI UN MEDICO
     * Take the file, check if there is an upload error, if not update the user image and delete the old one 
     */
    public static function setProPicMedico(){
        if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "medico"){
            $view = new VMedico();
            $IdMedico = USession::getInstance()->getSessionElement('id');
            $medico = FMedico::getObj($IdMedico)[0];
            
            if(UHTTPMethods::files('imageFile','size') > 0){  //MMH
                $uploadedImage = UHTTPMethods::files('imageFile');
                $checkUploadImage = FPersistentManager::getInstance()->caricaimmagine($uploadedImage);
                if($checkUploadImage == 'UPLOAD_ERROR_OK' || $checkUploadImage == 'TYPE_ERROR' || $checkUploadImage == 'SIZE_ERROR')
                {   //ENTRIAMO QUI SE L'IMMAGINE NON VA BENE
                    $view = new VMedico();  
                    /* $userAndPropic = FPersistentManager::getInstance()->loadUsersAndImage($IdMedico); */  //BOH

                    $view->messaggio("Errore");  //MESSAGGIO DI ERRORE DEL FILE
                }else{
                    $idImage = FPersistentManager::getInstance()->uploadObj($checkUploadImage);
                    if($medico->getIdImmagine() != 1)  //SE è DIVERSA DA QUELLA DI DEFAULT CANCELLIAMO QUELLA CHE AVEVA DAL DB
                    {
                        if(FPersistentManager::getInstance()->cancellaImmagine($medico->getIdImmagine())){
                            $medico->setIdImmagine($idImage);
                            FPersistentManager::getInstance()->updatemedicopropic($medico);
                        }
                        $view->messaggio("Errore");
                    }
                    else
                    {   //se ha quella di default, basta settarla senza cancellarla
                        $medico->setIdImmagine($idImage);
                        FPersistentManager::getInstance()->updatemedicopropic($medico);
                    }
                    $view->messaggio("Caricamento Completato");
                }
            }else{
                $view->messaggio("Errore");
            }
        }
    }



}