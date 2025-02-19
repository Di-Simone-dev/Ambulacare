<?php
class CPaziente{

    public static function home(){
        if (CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "paziente") {
            $view = new VPaziente(); //servirebbe una cosa del genere
            $view->Home();
        }
    }
//QUI PARTO CON I METODI PRESI DALL'SSD

    //[paziente]caso d'uso 1 "prenotazione esame"

    //1.1 avvia_prenotazione
    //gli devo passare tutti i medici attivi per visualizzarli con i relativi dati da visualizzare
    //ma anche le tipologie in modo di metterle nella tendina la per la selezione e farmele passare nella prossima funzione
    public static function avviaprenotazione(){
        $medici = FMedico::getMedicinonBannati(); 
        //$medici = FPersistentManager::getInstance()->retrievemediciattivi(); //è l'array dei medici attivi, ma deve essere raffinato
        
        $arraymedici = array();
        $nmedici = count($medici);
        /* var_dump($medici[0]); */
        //ci devo aggiungere la tipologia per ogni medico
        for($i=0;$i<$nmedici; $i++){
            /* $tipologia = FTipol */
            $medico = [
            "IdMedico" => $medici[$i]->getIdMedico(),
            "nome" => $medici[$i]->getNome(),
            "cognome" => $medici[$i]->getCognome(),
            "valutazione" => FEntityManagerSQL::getInstance()->getAveragevalutazione($medici[$i]->getIdMedico()),
            "costo" => $medici[$i]->getCosto(),
            "nometipologia" => $medici[$i]->getTipologia()[0]->getNometipologia(), 
            "tipoimmagine" => FImmagine::getObj($medici[$i]->getIdImmagine())[0]->getTipo(), 
            "img" => base64_encode(FImmagine::getObj($medici[$i]->getIdImmagine())[0]->getDati()),
            ];
            isset($medico['valutazione']["IdMedico"]) ? : $medico["valutazione"]["IdMedico"] = false;
            $arraymedici[] = $medico;
           /*  echo $medico["img"];    */
           
        }
        $tipologie = FPersistentManager::getInstance()->retrievealltipologie();
        $view = new VPaziente();
        $view->showEsami($tipologie,$arraymedici);
    }

    //1.2 ricerca_esame(tipologia_esame)
    //prendo in input una tipologia e restituisco i medici attivi di quella tipologia alla view
    //dovrebbe servire anche il nome della tipologia per visualizzarlo e per metterlo nella URL
    //bisogna mettere gli id dei medici nei bottoni per passarli poi al metodo successivo
    public static function ricercaesame(){
        if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "paziente"){ //possiamo tenerlo o toglierlo
            $IdTipologia = UHTTPMethods::post('tipologia');
            $nometipologia = FTipologia::getObj($IdTipologia)[0]->getNometipologia();
            $medici = FMedico::getMedicinonBannatifromTipologia($IdTipologia);
            //$medici = FPersistentManager::getInstance()->retrievemediciattivifromTipologia($IdTipologia); //è l'array dei medici attivi, ma potrebbe essere raffinato
            $arraymedici = array();
            $nmedici = count($medici);
            //var_dump($medici[1]); 
            //ci devo aggiungere la tipologia per ogni medico
            if($nmedici == 1){
                $arraymedici[0]["IdMedico"] = $medici[0][0]->getIdMedico();
                $arraymedici[0]["nome"] = $medici[0][0]->getNome();
                $arraymedici[0]["cognome"] = $medici[0][0]->getCognome();
                $arraymedici[0]["valutazione"] = FEntityManagerSQL::getInstance()->getAveragevalutazione($medici[0][0]->getIdMedico());
                $arraymedici[0]["costo"] = $medici[0][0]->getCosto();
                $arraymedici[0]["nometipologia"] = $medici[0][0]->getTipologia()[0]->getNometipologia(); 
                $arraymedici[0]["tipoimmagine"] = FImmagine::getObj($medici[0][0]->getIdImmagine())[0]->getTipo(); 
                $arraymedici[0]["img"] = base64_encode(FImmagine::getObj($medici[0][0]->getIdImmagine())[0]->getDati());
                isset($arraymedici[0]['valutazione']["IdMedico"]) ? : $arraymedici[0]["valutazione"]["IdMedico"] = false;
            }
            else
            {
                for($i=0;$i<$nmedici;$i++){
                    $arraymedici[$i]["IdMedico"] = $medici[$i]->getIdMedico();
                    $arraymedici[$i]["nome"] = $medici[$i]->getNome();
                    $arraymedici[$i]["cognome"] = $medici[$i]->getCognome();
                    $arraymedici[$i]["valutazione"] = FEntityManagerSQL::getInstance()->getAveragevalutazione($medici[$i]->getIdMedico());
                    $arraymedici[$i]["costo"] = $medici[$i]->getCosto();
                    $arraymedici[$i]["nometipologia"] = $medici[$i]->getTipologia()[0]->getNometipologia(); 
                    $arraymedici[$i]["tipoimmagine"] = FImmagine::getObj($medici[$i]->getIdImmagine())[0]->getTipo(); 
                    $arraymedici[$i]["img"] = base64_encode(FImmagine::getObj($medici[$i]->getIdImmagine())[0]->getDati());
                    isset($arraymedici[$i]['valutazione']["IdMedico"]) ? : $arraymedici[$i]["valutazione"]["IdMedico"] = false;
                }
            }
            $tipologie = FPersistentManager::getInstance()->retrievealltipologie();
            $view = new VPaziente();
            $view->showEsami($tipologie,$arraymedici, $IdTipologia);
        } 
    }

    //1.3 dettagli_prenotazione(medico)
    //accedendo alla schermata di dettaglio prendendo in input l'id del medico
    //bisogna passare a view i dettagli dell'esame (quindi del medico) e gli orari di disponibilità (complesso) per la tabella
    //ed anche per le tendine
    //serve anche utilizzare gli appuntamenti per capire quali sono gli slot occupati o meno nella visualizzazione
    //query specifica nel persistent manager probabilmente basta passare un array tridimensionale del tipo
    //orari_disponibilità[$settimana][$giorno][$Numero slot orario (da 1 a 5)] = true/false
    //DEVO USARE LE SETTIMANE nel senso che ne passo una alla volta
    //SERVE UN METODO AGGIUNTIVO NEL CASO DI CLIC DEL TASTO ">" o "<" quindi ci deve essere memoria della settimana corrente

    //va implementato uno spostamento della data su weekdisplacement dove se presente sposta la settimana del valore immesso
    //qualcosa del tipo $data = $data + $weekdisplacement*7*giorni

    public static function dettagli_prenotazione($IdMedico,$weekdisplacement = 0){
        if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "paziente"){ //possiamo tenerlo o toglierlo
            $data = new DateTime(); //DATA E ORA AL MOMENTO DELL'ESECUZIONE  //i mesi vanno ignorati
            //var_dump($weekdisplacement);//ok
            //DA QUESTA SI RICAVA LA SETTIMANA CHE SI USA PER ESTRARRE I DATI DAL DB (QUINDI CONDIZIONE SU ANNO + SETTIMANA)
            $numerosettimana = $data->format('W') + $weekdisplacement; //numero della settimana nell'anno (es 43)
            $anno = $data->format('o'); //anno attuale (es 2024)
            //$giornosettimana = $data->format('N'); //numero da 1 a 7 della settimana (1=lunedì) non è detto che serva qui
            //L'IDEA è quella di ciclare sul db e mettere true/false nell'array bidimensionale che rappresenta la settimana
            $orari_disponinibilità = FEntityManagerSQL::getInstance()
                                    ->getdisponibilitàsettimana($IdMedico,$numerosettimana-1,$anno);
            //var_dump($orari_disponinibilità);
            $medico = FMedico::getObj($IdMedico); //prendo il medico per prendere la tipologia
            $arraymedico = [
                    "IdMedico" => $medico[0]->getIdMedico(),
                    "nome" => $medico[0]->getNome(),
                    "cognome" => $medico[0]->getCognome(),
                    "valutazione" => FEntityManagerSQL::getInstance()->getAveragevalutazione($medico[0]->getIdMedico()),
                    "costo" => $medico[0]->getCosto(),
                    "nometipologia" => $medico[0]->getTipologia()[0]->getNometipologia(), 
                    "tipoimmagine" => FImmagine::getObj($medico[0]->getIdImmagine())[0]->getTipo(), 
                    "img" => base64_encode(FImmagine::getObj($medico[0]->getIdImmagine())[0]->getDati()),
            ];
            isset($arraymedico['valutazione']["IdMedico"]) ? : $arraymedico["valutazione"]["IdMedico"] = false;
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
            $view = new VPaziente();
            $view->PrenotaEsame($arraymedico,$orari_disponinibilità,$giorno, ($weekdisplacement==1? true: false));
        }   
    }

    //1.4 conferma_appuntamento(orario_disponibilità)
    //prendiamo un orario di disponibilità ma in realtà abbiamo una data + uno slot orario
    //l'implementazione di un controllo aggiuntivo sull'esistenza della fascia oraria libera risulta necessario
    //PER LA CREAZIONE DELL'APPUNTAMENTO CI SERVE LA FASCIAORARIA E IL PAZIENTE (lo stato non serve)
    public static function conferma_appuntamento(){
        if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "paziente"){ //possiamo tenerlo o toglierlo
            //serve controllare l'esistenza della fascia oraria relativa come libera per creare l'appuntamento 
            //$nometipologia = FTipologia::getObj($IdTipologia)[0]->getNometipologia();
            $IdMedico = UHTTPMethods::post('IdMedico');
            $costo = FMedico::getObj($IdMedico)[0]->getCosto();
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
            $messaggio = "Prenotazione non effettuata, l'orario risulta non disponibile";
            $IdPaziente = USession::getSessionElement('id');
            $Paziente = FPaziente::getObj($IdPaziente);
            //$medico = FPersistentManager::getInstance()->retrievemedicofromId($IdMedico); //è l'array dei medici attivi, ma potrebbe essere raffinato
            //$tipologie = FPersistentManager::getInstance()->retrievealltipologie();
            $IdFasciaOraria = (FEntityManagerSQL::getInstance()->
            getIdFasciaOrariafromIdMedicondata($IdMedico,$data));
            $exist = empty($IdFasciaOraria);
            if(!$exist){ //se il medico ha creato la disponibilità
                $FasciaOraria = FFasciaOraria::getObj($IdFasciaOraria);
                $busy = FEntityManagerSQL::getInstance()->existInDb(FEntityManagerSQL::getInstance()->retrieveObj
                (FAppuntamento::getTable(), "IdFasciaOraria", $IdFasciaOraria)); 
                if(!$busy){ //se la fascia non è occupata procediamo con la creazione dell'appuntamento
                    //CREARE APPUNTAMENTO
                    $appuntamento = new EAppuntamento($costo); //INSERIAMO il costo attualmente del medico ma poi rimane fisso
                    $appuntamento->setpaziente($Paziente[0]);            //SETTIAMO IL PAZIENTE
                    $appuntamento->setFasciaoraria($FasciaOraria[0]);   //SETTIAMO LA FASCIA ORARIA CORRISPONDENTE 
                    FAppuntamento::saveObj($appuntamento);  //QUI LO ANDIAMO EFFETTIVAMENTE A SALVARE SUL DB DOPO
                    $messaggio = "Prenotazione effettuata con successo!";
                }
                //NELLA REALTà C'è UN'ALTRA PAGINA INTERMEDIA, basta spostare il codice
            }

            $view = new VPaziente();
            $view->messaggio($messaggio);
        } 
    }

//[paziente]caso d'uso 2 "visualizzare un referto"

//2.1 visualizza_esami_effettuati()
//PRENDO L'ID DEL PAZIENTE DALLA SESSIONE E CON QUESTO MI PRENDO TUTTI I SUOI APPUNTAMENTI CONCLUSI
//QUINDI LA QUERY DEVE AVERE IN INPUT L'ID DEL PAZIENTE E OPERARE SULLA TABELLA DEGLI APPUNTAMENTI MA CONTROLLARE CHE LA DATA SIA PASSATA
public static function visualizza_appuntamenti_effettuati(){
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "paziente"){  //BISOGNA TENERLO
        
        $IdPaziente = USession::getSessionElement('id'); 
        $app = FEntityManagerSQL::getInstance()->getappuntamenticonclusipaziente($IdPaziente);
        $appuntamenti_paziente_conclusi = FAppuntamento::creaappuntamento($app);

        $arrayappuntamenti = array();
        for($i=0;$i<count($appuntamenti_paziente_conclusi);$i++){
            $IdMedico = FEntityManagerSQL::getInstance()->getIdMedicofromIdAppuntamento
                        ($appuntamenti_paziente_conclusi[$i]->getIdAppuntamento())[0]["IdMedico"];
            $medico = FMedico::getObj($IdMedico);
            $fasciaoraria = $appuntamenti_paziente_conclusi[$i]->getFasciaoraria();
            $datastring = $fasciaoraria->getDatatostring();
            $arrayappuntamenti[$i]["IdAppuntamento"] = $appuntamenti_paziente_conclusi[$i]->getIdAppuntamento();
            $arrayappuntamenti[$i]["dataeora"] = $datastring;
            $arrayappuntamenti[$i]["nomemedico"] = $medico[0]->getNome();
            $arrayappuntamenti[$i]["IdMedico"] = $medico[0]->getIdMedico();
            $arrayappuntamenti[$i]["cognomemedico"] = $medico[0]->getCognome();
            $arrayappuntamenti[$i]["valutazionemedico"] = FEntityManagerSQL::getInstance()->getAveragevalutazione($medico[0]->getIdMedico());
            $arrayappuntamenti[$i]["costomedico"] = $appuntamenti_paziente_conclusi[$i]->getCosto();
            $arrayappuntamenti[$i]["nometipologiamedico"] = $medico[0]->getTipologia()[0]->getNometipologia(); 
            $arrayappuntamenti[$i]["tipoimmaginemedico"] = FImmagine::getObj($medico[0]->getIdImmagine())[0]->getTipo(); 
            $arrayappuntamenti[$i]["datiimmaginemedico"] = FImmagine::getObj($medico[0]->getIdImmagine())[0]->getDati(); 
            isset($app[$i]["IdReferto"])? $arrayappuntamenti[$i]["referto"] = $app[$i]["IdReferto"] : $arrayappuntamenti[$i]["referto"] = false;
        }
        //dentro questo array abbiamo gli oggetti appuntamento conclusi per essere visualizzati 
        //l'id dell'appuntamento va tenuto per associarlo ai bottoni di recensioni e di visualizzazione referto
        //per le recensioni servirebbe anche quello del medico (da vedere)
        //serve passare anche le tipologie
        $tipologie = FPersistentManager::getInstance()->retrievealltipologie();
        //$tipologie = FEntityManagerSQL::retrieveall("tipologia");
        $view = new VPaziente();
        $view->showStoricoEsami($arrayappuntamenti,$tipologie);
    }  
}

//2.2 ricerca_esami_effettuati
//qui raffino i risultati visti in precedenza con l'aggiunta di tipologia e data che si prendono dal form
//POTREBBE ESSERE UNITO AL PRECEDENTE
public static function ricerca_appuntamenti_effettuati(){
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "paziente"){ //BISOGNA TENERLO   
        
        $dataform = UHTTPMethods::post('data');
        $IdTipologia = UHTTPMethods::post('IdTipologia');

        $IdPaziente = USession::getSessionElement('id'); 
        $app = FEntityManagerSQL::getInstance()->getappuntamenticonclusipaziente($IdPaziente,$dataform,$IdTipologia);
        $appuntamenti_paziente_conclusi = FAppuntamento::creaappuntamento($app);
        $arrayappuntamenti = array();
        for($i=0;$i<count($appuntamenti_paziente_conclusi); $i++){
            $IdMedico = FEntityManagerSQL::getInstance()->getIdMedicofromIdAppuntamento
            ($appuntamenti_paziente_conclusi[$i]->getIdAppuntamento())[0]["IdMedico"];
            $medico = FMedico::getObj($IdMedico);
            $fasciaoraria = $appuntamenti_paziente_conclusi[$i]->getFasciaoraria();
            $datastring = $fasciaoraria->getDatatostring();
            $arrayappuntamenti[$i]["IdAppuntamento"] = $appuntamenti_paziente_conclusi[$i]->getIdAppuntamento();
            $arrayappuntamenti[$i]["dataeora"] = $datastring;
            $arrayappuntamenti[$i]["nomemedico"] = $medico[0]->getNome();
            $arrayappuntamenti[$i]["IdMedico"] = $medico[0]->getIdMedico();
            $arrayappuntamenti[$i]["cognomemedico"] = $medico[0]->getCognome();
            $arrayappuntamenti[$i]["valutazionemedico"] = FEntityManagerSQL::getInstance()->getAveragevalutazione($medico[0]->getIdMedico());
            $arrayappuntamenti[$i]["costomedico"] = $appuntamenti_paziente_conclusi[$i]->getCosto();
            $arrayappuntamenti[$i]["nometipologiamedico"] = $medico[0]->getTipologia()[0]->getNometipologia(); 
            $arrayappuntamenti[$i]["tipoimmaginemedico"] = FImmagine::getObj($medico[0]->getIdImmagine())[0]->getTipo(); 
            $arrayappuntamenti[$i]["datiimmaginemedico"] = FImmagine::getObj($medico[0]->getIdImmagine())[0]->getDati(); 
            isset($app[$i]["IdReferto"])? $arrayappuntamenti[$i]["referto"] = $app[$i]["IdReferto"] : $arrayappuntamenti[$i]["referto"] = false;
        }
        //dentro questo array abbiamo gli oggetti appuntamento conclusi per essere visualizzati 
        //l'id dell'appuntamento va tenuto per associarlo ai bottoni di recensioni e di visualizzazione referto
        //per le recensioni servirebbe anche quello del medico (da vedere)
        $tipologie = FEntityManagerSQL::retrieveall("tipologia");
        $view = new VPaziente();
        $view->showStoricoEsami($arrayappuntamenti,$tipologie);
    } 
}

//PREMENDO sul bottone viene passato anche l'id dell'appuntamento, quindi lo usiamo per andare a prendere il referto dal db
//2.3 visualizza_referto()
public static function visualizza_referto($IdReferto){
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "paziente"){ //BISOGNA TENERLO   

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
        $arrayreferto["nominativopaziente"]= $paziente->getNome() . " " . $paziente->getCognome();
        $IdMedico =  FEntityManagerSQL::getInstance()->getIdMedicofromIdAppuntamento( $referto[0]->getAppuntamento()->getIdAppuntamento());
        $medico = FMedico::getObj($IdMedico[0]["IdMedico"]);
        $arrayreferto["nominativomedico"]= $medico[0]->getNome() . " " . $medico[0]->getCognome();
        UPdf::crea_scarica_pdf($arrayreferto,$withimg);

    } 
}

//[paziente]caso d'uso 3 "recensire un medico" 
//PARTIAMO DIRETTAMENTE DALLA SCHERMATA DI VISUALIZZAZIONE DEGLI APPUNTAMENTI CONCLUSI 3.1 è già presente e concide con 2.1

//3.2 accedi_schermata_recensioni
public static function accedi_schermata_recensioni($IdMedico,$IdAppuntamento){
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "paziente"){ //BISOGNA TENERLO   
        //BISOGNERà PASSARE L'Id del medico a cui attribuire la recensione perchè serve nello step successivo per la creazione
        //quindi va tenuto, possibilmente anche in sessione se serve
        //SERVE PASSARE TUTTI I DATI RELATIVI AL MEDICO A CUI METTIAMO LA RECENSIONE
        //SERVE FIXARLO
        $medico = FMedico::getObj($IdMedico);
        $costoapp = FAppuntamento::getObj($IdAppuntamento)[0]->getCosto(); //questo non dipende più dal medico
        $arraymedico = array();
        $medico = FMedico::getObj($IdMedico);
        $arraymedico["IdMedico"] = $medico[0]->getIdMedico();
        $arraymedico["nome"] = $medico[0]->getNome();
        $arraymedico["cognome"] = $medico[0]->getCognome();
        $arraymedico["valutazione"] = FEntityManagerSQL::getInstance()->getAveragevalutazione($medico[0]->getIdMedico());
        $arraymedico["costo"] = $costoapp;
        $arraymedico["nometipologia"] = $medico[0]->getTipologia()[0]->getNometipologia(); 
        $arraymedico["tipoimmagine"] = FImmagine::getObj($medico[0]->getIdImmagine())[0]->getTipo(); 
        $arraymedico["datiimmagine"] = FImmagine::getObj($medico[0]->getIdImmagine())[0]->getDati();
        
        $view = new VPaziente();
        $view->Recensione($arraymedico);

    } 
}

//3.3 conferma_recensione(Titolo,contenuto,voto)
public static function conferma_recensione(){  //POSSIBILE IMPLEMENTAZIONE ATTRAVERSO LA SESSIONE
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "paziente"){ //BISOGNA TENERLO   
        
        $IdMedico = UHTTPMethods::post('IdMedico'); //prendendolo da un campo nascosto del form
        $medico = FMedico::getObj($IdMedico);
        $titolo = UHTTPMethods::post('titolo');
        $contenuto = UHTTPMethods::post('contenuto');
        $valutazione = UHTTPMethods::post('voto');     //PRENDO I VALORI DAL FORM
        $data_creazione = getdate(); //data del momento della creazione
        $dataOraStringa = sprintf('%04d-%02d-%02d %02d:%02d:%02d',
            $data_creazione['year'],
            $data_creazione['mon'],
            $data_creazione['mday'],
            $data_creazione['hours'],
            $data_creazione['minutes'],
            $data_creazione['seconds']
            );
        //$dataOraStringa = $data_creazione->format('Y-m-d');
        $IdPaziente =  USession::getSessionElement('id'); //l'id del paziente per la creazione della recensione
        $paziente = FPaziente::getObj($IdPaziente);

        $recensione = new ERecensione($titolo,$contenuto,$valutazione,$dataOraStringa);
        $recensione->setPaziente($paziente[0]);
        $recensione->setMedico($medico[0]);//setto gli oggetti instanziati all'interno della recensione
        FRecensione::saveObj($recensione); //una volta settato tutto la salvo nel db
        
        $view = new VPaziente();
        $view->messaggio("Recensione caricata correttamente!");
    } 
}

//[paziente]caso d'uso 9 "modifica appuntamento" 


//9.1 visualizza_appuntamenti_prenotati()
//DOBBIAMO OPERARE SUGLI ESAMI PRENOTATI (QUINDI NON ANCORA SVOLTI)=>CONDIZIONE SULLA DATA NELLA QUERY
public static function visualizza_appuntamenti_prenotati(){
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "paziente"){ //BISOGNA TENERLO
        //a questo punto prendiamo l'id del paziente della sessione e ritorniamo gli appuntamenti non ancora svolti

        $IdPaziente = USession::getSessionElement('id'); 
        $appuntamenti_paziente_prenotati = FAppuntamento::creaappuntamento
            (FEntityManagerSQL::getInstance()->getappuntamentiprenotatifromIdPaziente($IdPaziente));
        //dentro questo array abbiamo gli oggetti appuntamento conclusi per essere visualizzati 
        //l'id dell'appuntamento va tenuto per associarlo ai bottoni di recensioni e di visualizzazione referto
        //per le recensioni servirebbe anche quello del medico (da vedere)
        //serve passare anche le tipologie
        $arrayappuntamenti = array();
        for($i=0;$i<count($appuntamenti_paziente_prenotati);$i++){
            $IdMedico = FEntityManagerSQL::getInstance()->getIdMedicofromIdAppuntamento
                        ($appuntamenti_paziente_prenotati[$i]->getIdAppuntamento())[0]["IdMedico"];
            $medico = FMedico::getObj($IdMedico);
            $fasciaoraria = $appuntamenti_paziente_prenotati[$i]->getFasciaoraria();
            $datastring = $fasciaoraria->getDatatostring();
            $arrayappuntamenti[$i]["IdAppuntamento"] = $appuntamenti_paziente_prenotati[$i]->getIdAppuntamento();
            $arrayappuntamenti[$i]["dataeora"] = $datastring;
            $arrayappuntamenti[$i]["nomemedico"] = $medico[0]->getNome();
            $arrayappuntamenti[$i]["IdMedico"] = $medico[0]->getIdMedico();
            $arrayappuntamenti[$i]["cognomemedico"] = $medico[0]->getCognome();
            $arrayappuntamenti[$i]["valutazionemedico"] = FEntityManagerSQL::getInstance()->getAveragevalutazione($medico[0]->getIdMedico());
            $arrayappuntamenti[$i]["costomedico"] = $appuntamenti_paziente_prenotati[$i]->getCosto();
            $arrayappuntamenti[$i]["nometipologiamedico"] = $medico[0]->getTipologia()[0]->getNometipologia(); 
            $arrayappuntamenti[$i]["tipoimmaginemedico"] = FImmagine::getObj($medico[0]->getIdImmagine())[0]->getTipo(); 
            $arrayappuntamenti[$i]["datiimmaginemedico"] = FImmagine::getObj($medico[0]->getIdImmagine())[0]->getDati(); 
        }
        $tipologie = FPersistentManager::getInstance()->retrievealltipologie();
        $view = new VPaziente();
        $view->ShowAppuntamentiPrenotati($arrayappuntamenti, $tipologie);
    } 
}

//9.2 dettagli_appuntamento()
//con questo accediamo alla schermata di modifica dell'appuntamento 
//VISTO CHE NON ABBIAMO SCHERMATE INTERMEDIE QUA DEVO PRENDERE ANCHE IL RESTO DELLE INFORMAZIONI
//va passato il medico
public static function dettagli_appuntamento_modifica($IdAppuntamento,$weekdisplacement = 0){
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "paziente"){ //BISOGNA TENERLO
        //Dobbiamo mostrare dei dati del vecchio appuntamento ed anche gli orari di disponibilità del medico
        $appuntamento = FAppuntamento::getObj($IdAppuntamento); //per mostrare le vecchie data e slot orario
        $IdMedico = FEntityManagerSQL::getInstance()->getIdMedicofromIdAppuntamento($IdAppuntamento);
        $medico = FMedico::getObj($IdMedico[0]["IdMedico"]);
        $data = new DateTime(); //DATA E ORA AL MOMENTO DELL'ESECUZIONE  //i mesi vanno ignorati
        //DA QUESTA SI RICAVA LA SETTIMANA CHE SI USA PER ESTRARRE I DATI DAL DB (QUINDI CONDIZIONE SU ANNO + SETTIMANA)
        $numerosettimana = $data->format('W') + $weekdisplacement; //numero della settimana nell'anno (es 43)
        $anno = $data->format('o'); //anno attuale (es 2024)
        //$giornosettimana = $data->format('N'); //numero da 1 a 7 della settimana (1=lunedì) non è detto che serva qui
        //L'IDEA è quella di ciclare sul db e mettere true/false nell'array bidimensionale che rappresenta la settimana
        $orari_disponinibilità = FEntityManagerSQL::getInstance()->getdisponibilitàsettimana($medico[0]->getIdMedico(),$numerosettimana-1,$anno);
        //DOVRO IMPLEMENTARE IL MODO DI CAMBIARE SETTIMANA DI VISUALIZZAZIONE
        /* $medico = FMedico::getObj($IdMedico); */ //prendo il medico per prendere la tipologia
        $arraymedico = array();
        $arraymedico["IdAppuntamento"] = $IdAppuntamento;
        $arraymedico["nome"] = $medico[0]->getNome();
        $arraymedico["cognome"] = $medico[0]->getCognome();
        $arraymedico["valutazione"] = FEntityManagerSQL::getInstance()->getAveragevalutazione($medico[0]->getIdMedico());
        $arraymedico["costo"] = $appuntamento[0]->getCosto();
        $arraymedico["nometipologia"] = $medico[0]->getTipologia()[0]->getNometipologia(); 
        $arraymedico["tipoimmagine"] = FImmagine::getObj($medico[0]->getIdImmagine())[0]->getTipo(); 
        $arraymedico["datiimmagine"] = FImmagine::getObj($medico[0]->getIdImmagine())[0]->getDati(); 

        $IdPaziente = USession::getSessionElement('id'); 
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
        $view = new VPaziente();
        $view->ModificaAppuntamento($arraymedico, $orari_disponinibilità, $giorno,($weekdisplacement==1? true: false));
    } 
}

//9.3 modifica_appuntamento()
//PROBABILMENTE I METODI POSSONO ESSERE RIUTILIZZATI CON QUALCHE ACCORTEZZA
public static function modifica_appuntamento(){  //DA FARE
    if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "paziente"){ //possiamo tenerlo o toglierlo
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
        $IdFasciaOraria = (FEntityManagerSQL::getInstance()->
        getIdFasciaOrariafromIdMedicondata($IdMedico[0]["IdMedico"],$data));
        $messaggio = "L'orario scelto non è disponibile!";
        $exist = !empty($IdFasciaOraria);
        
        if($exist && $data>getdate()){ //se il medico ha creato la disponibilità e la data inserita è futura
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
                FAppuntamento::saveObj($appuntamento,$arraymodifica); //QUI LO ANDIAMO EFFETTIVAMENTE A SALVARE SUL DB DOPO
                $messaggio = "Modifiche avvenute con successo!";
            }
        }
        $view = new VPaziente(); //servirebbe una cosa del genere NON SO COSA PASSARE 
        $view->messaggio($messaggio);
    }
}

//ALTRI METODI OLTRE I CASI D'USO

    /**
     * QUI ANDREBBE FATTA LA SUDDIVISIONE TRA LE REGISTRAZIONI DI MEDICI E PAZIENTI
     * verify if the choosen username and email already exist, create the User Obj and set a default profile image 
     * @return void
     */
    public static function formregistrazione()
    {
        //if (CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "admin") { //BISOGNA TENERLO   

            $view = new VPaziente();
            //$tipologie = FEntityManagerSQL::getInstance()->retrieveall(FTipologia::getTable());
            $view->registra_paziente();
        //}
    }
    public static function registrazionepaziente()
    {   //registrazione del paziente
    //construct($nome,$cognome,$email, $password, $codice_fiscale,$data_nascita,$luogo_nascita,$residenza,$numero_telefono,$attivo)
        $view = new VPaziente();  
        //BASTA VERIFICARE CHE LA MAIL NON SIA GIà IN USO
        if(FPersistentManager::getInstance()->verificaemailpaziente(UHTTPMethods::post('email')) == FALSE ){ //false = mail non in uso  
                //QUI SI ISTANZIA UN PAZIENTE QUINDI SERVONO I CORRETTI ARGOMENTI DA PASSARGLI
                $paziente = new EPaziente(UHTTPMethods::post('nome'), UHTTPMethods::post('cognome'),UHTTPMethods::post('email'),
                password_hash(UHTTPMethods::post('password'), PASSWORD_DEFAULT),UHTTPMethods::post('codice_fiscale'),UHTTPMethods::post('data_nascita'),
                                UHTTPMethods::post('luogo_nascita'),UHTTPMethods::post('residenza'),UHTTPMethods::post('numero_telefono'),'1');
                //$user->setIdImage(1);  //i pazienti non hanno la propic MA PER IL MEDICO AVREBBE COMPLETAMENTE SENSO METTERE PROPIC DI DEF
                $IdPaziente = FPersistentManager::getInstance()->uploadObj($paziente);  //da sistemare il persistent manager
                USession::getInstance();
                USession::setSessionElement('tipo_utente', 'paziente');
                USession::setSessionElement('id', $IdPaziente);
                $view->messaggio("Registrazione effettuata!");   //DA FARE CON LA VIEW E SMARTY
        }else if(FPersistentManager::getInstance()->verificaemailpaziente(UHTTPMethods::post('email')) == TRUE )
        {
            $view->messaggio("errore!"); //DA FARE CON LA VIEW E SMARTY
        }
    }

    public static function login(){
        $view = new VPaziente();
        $view->showFormLogin();
    }

    public static function logout()
    {
        USession::getInstance();
        USession::unsetSession();
        USession::destroySession();
        header('Location: /Ambulacare');
    }
    /**
     * check if exist the Username inserted, and for this username check the password. If is everything correct the session is created and
     * the User is redirected in the homepage
     */
    public static function checkLogin()
    {   //FACCIAMO IL LOGIN DEL PAZIENTE oppure posso fare un metodo unico con gli switch
        $view = new VPaziente();
        //ESEGUO UN CHECK SULL'ESISTENZA DELL'USERNAME NEL DB (CONTROLLO LA PRESENZA DELLA MAIL NELLA TABLE DEI PAZIENTI)
        $exist = FPersistentManager::getInstance()->verificaemailpaziente(UHTTPMethods::post('email'));
        //SE ESISTE NEL DB ALLORA CONTINUO                                          
        if ($exist) {
            $paziente = FPersistentManager::getInstance()->retrievepazientefromemail(UHTTPMethods::post('email'));
            //CONTROLLO LA PASSWORD IMMESSA CON QUELLA HASHATA SUL DB
            //password_verify è una funzione NATIVA DI PHP
            if (password_verify(UHTTPMethods::post('password'), $paziente[0]->getPassword())) {
                if (!($paziente[0]->getAttivo()))  //PRIMA DI FARLO ACCEDERE EFFETTIVAMENTE CONTROLLIAMO SE è BANNATO
                {
                    $view->showFormLogin("Utente Bannato"); //LO MANDIAMO ALLA SCHERMATA DI UTENTE BANNATO
                } elseif (USession::getSessionStatus() == PHP_SESSION_NONE)   //ALTRIMENTI SE LO STATO è NULLO LO SETTIAMO 
                {
                    USession::getInstance();
                    USession::setSessionElement('tipo_utente', 'paziente');
                    USession::setSessionElement('id', $paziente[0]->getIdPaziente());
                    $view->loginOk();
                }
            } else {
                $view->showFormLogin(UHTTPMethods::post('email'), "Username o password errate!");
            }
        } else {
            $view->showFormLogin(UHTTPMethods::post('email'), "Username o password errate!");
        }
    }

    /**
     * QUESTO VA USATO PER APRIRE LA SCHERMATA DELLE INFORMAZIONI PERSONALI DEL PAZIENTE (PROFILO PERSONALE)
     * load the settings page compiled with the user data
     */
    public static function settingspaziente(){  //POTREBBE ESSERE RINOMINATO
        if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "paziente"){
            $view = new VPaziente();
            $IdPaziente = USession::getInstance()->getSessionElement('id');
            //qui ho bisogno di un metodo nel persistent manager che passi un array con tutte le info visualizzabili dal paziente
            $datipaziente = FPersistentManager::getInstance()->retrieveinfopaziente($IdPaziente);    
            //var_dump($datipaziente);
            $view->profileCli($datipaziente);  //PASSO A VIEW QUESTO ARRAY ASSOCIATIVO CON I DATI DELL'UTENTE PER VISUALIZZARLI
        }
    }
    public static function formSetInfoPaziente(){  //POTREBBE ESSERE RINOMINATO
        if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "paziente"){
            $view = new VPaziente();

            $Idpaziente = USession::getInstance()->getSessionElement('id');
            //qui ho bisogno di un metodo nel persistent manager che passi un array con tutte le info visualizzabili dal medico compresa la propic
            $datipaziente = FPersistentManager::getInstance()->retrieveinfopaziente($Idpaziente);    
            $view->formmodificacli($datipaziente);  //PASSO A VIEW QUESTO ARRAY ASSOCIATIVO CON I DATI DELL'UTENTE PER VISUALIZZARLI
        }
    }
    /**
     * QUESTO VA USATO PER LA MODIFICA DELLE INFO DEL PROFILO DEL PAZIENTE
     * Take the compiled form and use the data for update the user info (Biography, Working, StudeiedAt, Hobby)
     */
    public static function setInfoPaziente(){
        if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "paziente"){
            $IdPaziente = USession::getInstance()->getSessionElement('id');
            $paziente = FPersistentManager::getInstance()->retrieveObj(EPaziente::getEntity(), $IdPaziente);
            $paziente[0]->setNome(UHTTPMethods::post('Nome'));
            $paziente[0]->setCognome(UHTTPMethods::post('Cognome'));
            //$paziente->setEmail(UHTTPMethods::post('Email')); //credenziale di accesso  CONTROLLO PER L'UNIVOCITà NECESSARIO
            $paziente[0]->setPassword(UHTTPMethods::post('Password')); //credenziale di accesso 
            $paziente[0]->setCodiceFiscale(UHTTPMethods::post('CodiceFiscale'));
            $paziente[0]->setDataNascita(UHTTPMethods::post('DataNascita'));
            $paziente[0]->setLuogoNascita(UHTTPMethods::post('LuogoNascita'));
            $paziente[0]->setResidenza(UHTTPMethods::post('Residenza'));
            $paziente[0]->setNumerotelefono(UHTTPMethods::post('Numerotelefono'));
            
            FPersistentManager::getInstance()->updateinfopaziente($paziente[0]);
            $view = new VPaziente();
            $view->messaggio("Modifiche avvenute con successo!");
        }
    }

    public static function formEmail(){
        $view = new VPaziente();
        $view->formmodificaemail();
    }

        /**
     * QUESTO VA APPLICATO PER UN CAMBIO MAIL DEL PAZIENTE
     * Take the compiled form, use the data to check if the username alredy exist and if not update the user Username
     */
    public static function setEmailPaziente(){
        if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "paziente"){
            $view = new VPaziente();
            $IdPaziente = USession::getInstance()->getSessionElement('id');
            $paziente = FPersistentManager::getInstance()->retrieveObj(EPaziente::getEntity(), $IdPaziente)[0];
            
            if($paziente->getEmail() == UHTTPMethods::post('Email')){  //LA MAIL INSERITA NON DEVE ESSERE UGUALE A QUELLA ESISTENTE
                $view->formmodificaemail("Errore!");
            }else{
                if(FPersistentManager::getInstance()->verificaemailpaziente(UHTTPMethods::post('Email')) == false)
                {
                    $paziente->setEmail(UHTTPMethods::post('Email'));
                    FPersistentManager::getInstance()->updatemailpaziente($paziente);
                    $view->messaggio("Modifica email avvenuta");
                }else
                {   //QUESTO NEL CASO SIA STATA INSERITA UNA MAIL ATTUALMENTE IN USO DA UN ALTRO UTENTE QUINDI VA MESSA UNA SCHERMATA DI ERRORE
                    $view = new VPaziente();
                    //$userAndPropic = FPersistentManager::getInstance()->loadUsersAndImage($userId);
                    $view->formmodificaemail("Errore!");
                }
            }
        }
    }

    /**
     * QUESTO VA APPLICATO PER UN CAMBIO PASSWORD DEL PAZIENTE
     * Take the compiled form and update the user password
     */
    public static function formPasswordPaziente(){  //POTREBBE ESSERE RINOMINATO
        if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "paziente"){
            $view = new VPaziente();

            /* $Idmedico = USession::getInstance()->getSessionElement('id'); */
            //qui ho bisogno di un metodo nel persistent manager che passi un array con tutte le info visualizzabili dal medico compresa la propic
            /* $datimedico = FPersistentManager::getInstance()->retrieveinfomedico($Idmedico);   */  
            $view->formmodificapassw();  //PASSO A VIEW QUESTO ARRAY ASSOCIATIVO CON I DATI DELL'UTENTE PER VISUALIZZARLI
        }
    }
    public static function setPasswordPaziente(){
        if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "paziente"){
            $IdPaziente = USession::getInstance()->getSessionElement('id');
            $paziente = FPersistentManager::getInstance()->retrieveObj(EPaziente::getEntity(), $IdPaziente);
            $newPass = UHTTPMethods::post('password');
            $paziente[0]->setPassword($newPass);
            FPersistentManager::getInstance()->updatePasswordpaziente($paziente[0]);
            $view = new VPaziente();
            $view->messaggio("Operazione effettuata con successo");
            //header('Location: /paziente/profilopersonale');
        }
    } 

    //CASO D'USO AGGIUNTIVO VISUALIZZAZIONE RECENSIONI E RISPOSTE
    public static function visualizza_recensioni(){
        if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "paziente"){
        
        $IdPaziente = USession::getSessionElement('id');
        $recensioni = FEntityManagerSQL::getInstance()->retrieveObj(FRecensione::getTable(),"IdPaziente",$IdPaziente);
        $arrayrecensioni = array();
        $nrecensioni = count($recensioni);
        /* var_dump($medici[0]); */
        //ci devo aggiungere la tipologia per ogni medico
        for($i=0;$i<$nrecensioni; $i++){
            /* $tipologia = FTipol */
            $medico = FMedico::getObj($recensioni[$i]["IdMedico"]);
            $immagine = FImmagine::getObj($medico[0]->getIdImmagine());
            $recensione = [
            "nominativomedico" => $medico[0]->getNome(). " ". $medico[0]->getCognome(),
            "tipoimg" => $immagine[0]->getTipo(),
            "datiimg" => base64_encode($immagine[0]->getDati()),
            "data_ora" => $recensioni[$i]["data_creazione"],
            "valutazione" => $recensioni[$i]["valutazione"],
            "IdRecensione" => $recensioni[$i]["IdRecensione"]
            ];
            $arrayrecensioni[] = $recensione;
        }
        //$tipologie = FPersistentManager::getInstance()->retrievealltipologie();
        $view = new VPaziente();
        $view->showRevPage($arrayrecensioni);
        }
    }
    public static function dettaglio_recensione_risposta($IdRecensione){
        if(CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "paziente"){
        $recensione = FRecensione::getObj($IdRecensione);
        //var_dump($recensione);
        $IdPaziente = USession::getSessionElement('id');
        $paziente = FPaziente::getObj($IdPaziente);
        $arrayrecensione = array();
        $arrayrecensione = [
        "nominativopaziente" => $paziente[0]->getNome(). " ". $paziente[0]->getCognome(),
        "titolo" => $recensione[0]->getTitolo(),
        "contenuto" => $recensione[0]->getContenuto(),
        "data_ora" =>$recensione[0]->getDatacreazione(),
        "valutazione" => $recensione[0]->getValutazione()
        ];
        //$recensione=$arrayrecensione;
        //var_dump($arrayrecensione);
        $risposta = FEntityManagerSQL::getInstance()->retrieveObj(FRisposta::getTable(),"IdRecensione",$IdRecensione);
        $withrisposta=false;
        $arrayrisposta=array();
        if(!empty($risposta)){
            $withrisposta=true;
            $risposta = FRisposta::getObj($risposta[0]["IdRisposta"]);
            $medico = $recensione[0]->getMedico();
            $arrayrisposta = [
            "nominativomedico" => $medico[0]->getNome(). " ". $medico[0]->getCognome(),
            "contenutorisposta" => $risposta[0]->getContenuto(),
            "data_ora" =>$risposta[0]->getDatacreazione()
            ];
            //var_dump($risposta);
        }
      
        //$tipologie = FPersistentManager::getInstance()->retrievealltipologie();
        $view = new VPaziente();
        $view->showDettaglioRecRispPaziente($arrayrecensione,$arrayrisposta,$withrisposta);
        }
    }




}