<?php

class CAmministratore
{

    //[admin]caso d'uso 10 "moderazione account medici e pazienti"

    //10.1) visualizza_medici()  qui devo passare tutti i pazienti e tutti i medici della piattaforma

    public static function visualizza_medici()
    {
        if (CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "admin") { //BISOGNA TENERLO   
            $medici = FEntityManagerSQL::getInstance()->retrieveall(FMedico::getTable());
            //$pazienti = FEntityManagerSQL::getInstance()->retrieveall(FPaziente::getTable());
            $view = new VAmministratore(); //servirebbe una cosa del genere
            $view->moderazionemedici($medici);
        }
    }

    public static function home(){
        if (CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "admin") {
            $view = new VAmministratore(); //servirebbe una cosa del genere
            $view->Home();
        }
    }

    //10.2)ricerca_utenti(nome,cognome, categoria) questa query potrebbe essere complessa e va realizzata ad hoc
    //deve essere possibile la ricerca anche per uno solo di questi input 

    public static function ricerca_medici()
    {
        if (CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "admin") { //BISOGNA TENERLO   

            $nomemedico = UHTTPMethods::post('nomemedico');
            $cognomemedico = UHTTPMethods::post('cognomemedico');
            $medici = FEntityManagerSQL::getInstance()->ricercautenti($nomemedico, $cognomemedico, FMedico::getTable());
            $view = new VAmministratore(); //servirebbe una cosa del genere
            $view->moderazionemedici($medici);
        }
    }

    //10.3) moderazione_medico(utente, operazione) qui dobbiamo distinguere medici da pazienti 
    public static function moderazione_medico($IdMedico)
    {
        if (CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "admin") { //BISOGNA TENERLO   

            $medico = FMedico::getObj($IdMedico);
            //serve cambiare il campo "attivo" del medico e salvare la modifica sul db
            //var_dump($medico[0]->getAttivo());
            $arraymodifica[0][0] = "attivo";
            if ($medico[0]->getAttivo()) {  //se è attivo lo disattiviamo altrimento lo riattiviamo
                $arraymodifica[0][1] = "0";
            } else {
                $arraymodifica[0][1] = "1";
            }
            FMedico::saveObj($medico[0], $arraymodifica);

            $view = new VAmministratore(); //servirebbe una cosa del genere
            $view->messaggio("Operazione avvenuta con successo!");
        }
    }

    //10.1) visualizza_pazienti()  qui devo passare tutti i pazienti e tutti i medici della piattaforma

    public static function visualizza_pazienti()
    {
        if (CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "admin") { //BISOGNA TENERLO   

            $pazienti = FEntityManagerSQL::getInstance()->retrieveall(FPaziente::getTable());
            //$pazienti = FEntityManagerSQL::getInstance()->retrieveall(FPaziente::getTable());
            $view = new VAmministratore(); //servirebbe una cosa del genere
            $view->moderazionepazienti($pazienti);
        }
    }

    //10.2)ricerca_utenti(nome,cognome, categoria) questa query potrebbe essere complessa e va realizzata ad hoc
    //deve essere possibile la ricerca anche per uno solo di questi input 
    //1 => NESSUN INPUT oppure metto il controllo di errore
    //2 => SOLO NOME
    //3 => SOLO COGNOME
    //4 => NOME E COGNOME

    public static function ricerca_pazienti()
    {
        if (CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "admin") { //BISOGNA TENERLO   

            $nomepaziente = UHTTPMethods::post('nomepaziente');
            $cognomepaziente = UHTTPMethods::post('cognomepaziente');
            $pazienti = FEntityManagerSQL::getInstance()->ricercautenti($nomepaziente, $cognomepaziente, FPaziente::getTable());
            $view = new VAmministratore(); //servirebbe una cosa del genere
            $view->moderazionepazienti($pazienti);
        }
    }

    //10.3) moderazione_paziente(utente, operazione) 
    public static function moderazione_paziente($IdPaziente)
    {
        if (CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "admin") { //BISOGNA TENERLO   

            $paziente = FPaziente::getObj($IdPaziente);
            //serve cambiare il campo "attivo" del paziente e salvare la modifica sul db

            $arraymodifica[0][0] = "attivo";
            if ($paziente[0]->getAttivo() == "1") {  //se è attivo lo disattiviamo altrimento lo riattiviamo
                $arraymodifica[0][1] = "0";
            } else {
                $arraymodifica[0][1] = "1";
            }
            FPaziente::saveObj($paziente[0], $arraymodifica);

            $view = new VAmministratore(); //servirebbe una cosa del genere
            $view->messaggio("Operazione avvenuta con successo");
        }
    }

    //[admin]caso d'uso 11 "gestione appuntamenti"

    //11.1) gestione_appuntamenti() accedo alla schermata di gestione degli appuntamenti
    public static function gestione_appuntamenti()
    {
        if (CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "admin") { //BISOGNA TENERLO   

            $appuntamenti = FEntityManagerSQL::getInstance()->retrieveall(FAppuntamento::getTable());
            $tipologie = FEntityManagerSQL::getInstance()->retrieveall(FTipologia::getTable());
            for ($i = 0; $i < count($appuntamenti); $i++) {
                /* $appuntamenti[$i]["nominativopaziente"]= FPaziente::getObj($appuntamenti[$i]["IdPazienti"])[0]->getNome(). " " . FPaziente::getObj($appuntamenti[$i]["IdPazienti"])[0]->getCognome(); */
                /* $appuntamenti[$i]["nominativomedico"] = FMedico::getObj($appuntamenti[$i]["IdMedico"])[0]->getNome(). " " .FMedico::getObj($appuntamenti[$i]["IdMedico"])[0]->getCognome(); */
                $idapp = $appuntamenti[$i]["IdAppuntamento"];
                $IdMedico = FEntityManagerSQL::getIdMedicofromIdAppuntamento($idapp)[0]["IdMedico"];
                $appuntamenti[$i]["nominativomedico"] = FMedico::getObj($IdMedico)[0]->getCognome() . " " . FMedico::getObj($IdMedico)[0]->getNome();
                $appuntamenti[$i]["data"] = FFasciaOraria::getObj($appuntamenti[$i]["IdFasciaOraria"])[0]->getData();
            }
            $view = new VAmministratore(); //servirebbe una cosa del genere
            $view->showAppuntPage($appuntamenti, $tipologie);
        }
    }

    //11.2 ricerca_appuntamenti(data,ora,categoria,)
    public static function  ricerca_appuntamenti()
    {
        if (CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "admin") { //BISOGNA TENERLO   

            $data = UHTTPMethods::post('dataapp');
            $IdTipologia = UHTTPMethods::post('IdTipologia');
            $tipologie = FEntityManagerSQL::getInstance()->retrieveall(FTipologia::getTable());

            $appuntamenti = FEntityManagerSQL::getInstance()->ricercaappuntamenti($data, $IdTipologia);
            for ($i = 0; $i < count($appuntamenti); $i++) {
                /* $appuntamenti[$i]["nominativopaziente"]= FPaziente::getObj($appuntamenti[$i]["IdPazienti"])[0]->getNome(). " " . FPaziente::getObj($appuntamenti[$i]["IdPazienti"])[0]->getCognome(); */
                /* $appuntamenti[$i]["nominativomedico"] = FMedico::getObj($appuntamenti[$i]["IdMedico"])[0]->getNome(). " " .FMedico::getObj($appuntamenti[$i]["IdMedico"])[0]->getCognome(); */
                $idapp = $appuntamenti[$i]["IdAppuntamento"];
                $IdMedico = FEntityManagerSQL::getIdMedicofromIdAppuntamento($idapp)[0]["IdMedico"];
                $appuntamenti[$i]["nominativomedico"] = FMedico::getObj($IdMedico)[0]->getCognome() . " " . FMedico::getObj($IdMedico)[0]->getNome();
                $appuntamenti[$i]["data"] = FFasciaOraria::getObj($appuntamenti[$i]["IdFasciaOraria"])[0]->getData();
            }
            $view = new VAmministratore(); //servirebbe una cosa del genere
            $view->showAppuntPage($appuntamenti, $tipologie);
        }
    }

    //11.3) dettagli_appuntamento(appuntamento) PER LA SCHERMATA DI MODIFICA
    public static function dettagli_appuntamento_modifica($IdAppuntamento, $weekdisplacement = 0)
    { //CONVIENE VISUALIZZARE ANCHE I DATI DEL PAZIENTE
        if (CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "admin") { //BISOGNA TENERLO
            //Dobbiamo mostrare dei dati del vecchio appuntamento ed anche gli orari di disponibilità del medico
            $appuntamento = FAppuntamento::getObj($IdAppuntamento); //per mostrare le vecchie data e slot orario
            $paziente = $appuntamento[0]->getPaziente();
            $IdMedico = FEntityManagerSQL::getInstance()->getIdMedicofromIdAppuntamento($IdAppuntamento);
            $medico = FMedico::getObj($IdMedico[0]["IdMedico"]);
            $data = new DateTime(); //DATA E ORA AL MOMENTO DELL'ESECUZIONE  //i mesi vanno ignorati
            //DA QUESTA SI RICAVA LA SETTIMANA CHE SI USA PER ESTRARRE I DATI DAL DB (QUINDI CONDIZIONE SU ANNO + SETTIMANA)
            $numerosettimana = $data->format('W') + $weekdisplacement; //numero della settimana nell'anno (es 43)
            $anno = $data->format('o'); //anno attuale (es 2024)
            //$giornosettimana = $data->format('N'); //numero da 1 a 7 della settimana (1=lunedì) non è detto che serva qui
            //L'IDEA è quella di ciclare sul db e mettere true/false nell'array bidimensionale che rappresenta la settimana
            $orari_disponinibilità = FEntityManagerSQL::getInstance()->getdisponibilitàsettimana($IdMedico[0]["IdMedico"], $numerosettimana - 1, $anno);
            //DOVRO IMPLEMENTARE IL MODO DI CAMBIARE SETTIMANA DI VISUALIZZAZIONE
            $medico = FMedico::getObj($IdMedico[0]["IdMedico"]); //prendo il medico per prendere la tipologia
            $arraymedico = array();
            $arraymedico["IdMedico"] = $medico[0]->getIdMedico();
            $arraymedico["nome"] = $medico[0]->getNome();
            $arraymedico["cognome"] = $medico[0]->getCognome();
            $arraymedico["valutazione"] = FEntityManagerSQL::getInstance()->getAveragevalutazione($medico[0]->getIdMedico());
            $arraymedico["costo"] = $appuntamento[0]->getCosto();
            $arraymedico["nometipologia"] = $medico[0]->getTipologia()[0]->getNometipologia();
            $arraymedico["tipoimmagine"] = FImmagine::getObj($medico[0]->getIdImmagine())[0]->getTipo();
            $arraymedico["datiimmagine"] = FImmagine::getObj($medico[0]->getIdImmagine())[0]->getDati();
            $arraymedico["data"] = $appuntamento[0]->getFasciaoraria()->getData();
            $arraypaziente = array();
            $arraypaziente["nome"] = $paziente->getNome();
            $arraypaziente["cognome"] = $paziente->getCognome();
            $arraymedico["IdAppuntamento"] = $IdAppuntamento;

            if ($weekdisplacement == 0) {
                $giorno[0] = date("d/m", strtotime('Monday this week'));
                $giorno[1] = date("d/m", strtotime('Tuesday this week'));
                $giorno[2] = date("d/m", strtotime('Wednesday this week'));
                $giorno[3] = date("d/m", strtotime('Thursday this week'));
                $giorno[4] = date("d/m", strtotime('Friday this week'));
                $giorno[5] = date("d/m", strtotime('Saturday this week'));
            } elseif ($weekdisplacement == 1) {
                $giorno[0] = date("d/m", strtotime('Monday next week'));
                $giorno[1] = date("d/m", strtotime('Tuesday next week'));
                $giorno[2] = date("d/m", strtotime('Wednesday next week'));
                $giorno[3] = date("d/m", strtotime('Thursday next week'));
                $giorno[4] = date("d/m", strtotime('Friday next week'));
                $giorno[5] = date("d/m", strtotime('Saturday next week'));
            } else header("Location: /Ambulacare/Pages/templates/pagenotfound.tpl");

            $view = new VAmministratore(); //servirebbe anche la fascia oraria
            $view->editApp($arraymedico, $giorno, $orari_disponinibilità,($weekdisplacement==1? true: false));
        }
    }

    //11.4) conferma_appuntamento(data, ora)

    public static function modifica_appuntamento()
    {  //DA FARE
        if (CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "admin") { //possiamo tenerlo o toglierlo
            $messaggio = "Errore con la modifica dell'appuntamento!";
            //serve controllare l'esistenza della fascia oraria relativa come libera per creare l'appuntamento 
            //$nometipologia = FTipologia::getObj($IdTipologia)[0]->getNometipologia();
            $IdAppuntamento = UHTTPMethods::post('IdAppuntamento');
            $dataform = UHTTPMethods::post('data');
            $nslot = UHTTPMethods::post('nslot');
            //su slot potrei farmi passare anche solo un valore di questo array da 1 a 5
            $orari = ["0", "14:30:00", "15:30:00", "16:30:00", "17:30:00", "18:30:00"];
            $ora = $orari[$nslot];
            //$date = '2024-06-19'; //questo dovrei averlo da data
            //$time = '14:25:36'; //questo si crea con uno switch case su nslot

            $dateTimeString = $dataform . ' ' . $ora;
            $data = new DateTime($dateTimeString);
            //METODO PER OTTENERE L'ID DELLA FASCIA ORARIA QUA
            //CON IDMEDICO + DATA E SLOT CI PRENDIAMO L'ID
            //CONVIENE RIGETTARE l'ID DEL MEDICO usando l'id dell'appuntamento già prenotato
            $IdMedico = FEntityManagerSQL::getInstance()->getIdMedicofromIdAppuntamento($IdAppuntamento);
            $IdMedico = $IdMedico[0]["IdMedico"];

            $exist = !empty(FEntityManagerSQL::getInstance()->getIdFasciaOrariafromIdMedicondata($IdMedico, $data));
            if ($exist && $data > getdate()) { //se il medico ha creato la disponibilità e la data inserita è futura
                $IdFasciaOraria = FEntityManagerSQL::getInstance()->getIdFasciaOrariafromIdMedicondata($IdMedico, $data);
                $busy = FEntityManagerSQL::getInstance()->existInDb(FEntityManagerSQL::getInstance()->retrieveObj(FAppuntamento::getTable(), "IdFasciaOraria", $IdFasciaOraria));
                if (!$busy) { //se la fascia non è occupata procediamo con la creazione dell'appuntamento
                    //CREARE APPUNTAMENTO
                    //$appuntamento = new EAppuntamento(); //BISOGNEREBBE METTERE LO STATO MA ANDREBBE TOLTO
                    $appuntamento = FAppuntamento::getObj($IdAppuntamento);
                    //per la modifica ci serve il field array che è un array bidimensionale che in questo caso deve cambiare
                    //l'id della fascia oraria 
                    $arraymodifica[0][0] = "IdFasciaOraria";
                    $arraymodifica[0][1] = $IdFasciaOraria;
                    //$appuntamento->setpaziente($IdPaziente);            //SETTIAMO IL PAZIENTE
                    //$appuntamento->setFasciaoraria($IdFascia_oraria);   //SETTIAMO LA FASCIA ORARIA CORRISPONDENTE 
                    FAppuntamento::saveObj($appuntamento, $arraymodifica);  //QUI LO ANDIAMO EFFETTIVAMENTE A SALVARE SUL DB DOPO
                    $messaggio = "Modifica avvenuta con successo!";
                }
            }
            $view = new VAmministratore(); //servirebbe una cosa del genere NON SO COSA PASSARE 
            $view->messaggio($messaggio);
        }
    }

    //[admin]caso d'uso 12 "gestione recensioni"

    //12.1) gestione_recensioni() per accedere alla schermata di visualizzazione 

    public static function  gestione_recensioni()
    {
        if (CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "admin") { //BISOGNA TENERLO   

            $recensioni = FEntityManagerSQL::getInstance()->retrieveall(FRecensione::getTable());
            /* var_dump($recensioni); */
            for ($i = 0; $i < count($recensioni); $i++) {
                $recensioni[$i]["paziente"] = FPaziente::getObj($recensioni[$i]["IdPaziente"])[0]->getNome() . " " . FPaziente::getObj($recensioni[$i]["IdPaziente"])[0]->getCognome();
                $recensioni[$i]["medico"] = FMedico::getObj($recensioni[$i]["IdMedico"])[0]->getNome() . " " . FMedico::getObj($recensioni[$i]["IdMedico"])[0]->getCognome();
            }
            $view = new VAmministratore(); //servirebbe una cosa del genere
            $view->showRevPage($recensioni);
        }
    }

    //12.2) ricerca_recensione(nome_medico, cognome_medico)

    public static function  ricerca_recensioni()
    {
        if (CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "admin") { //BISOGNA TENERLO   
            $nomemedico = UHTTPMethods::post('nomemedico');
            $cognomemedico = UHTTPMethods::post('cognomemedico');
            $recensioni = FEntityManagerSQL::getInstance()->ricercarecensioni($nomemedico, $cognomemedico);
            for ($i = 0; $i < count($recensioni); $i++) {
                $recensioni[$i]["paziente"] = FPaziente::getObj($recensioni[$i]["IdPaziente"])[0]->getNome() . " " . FPaziente::getObj($recensioni[$i]["IdPaziente"])[0]->getCognome();
                $recensioni[$i]["medico"] = FMedico::getObj($recensioni[$i]["IdMedico"])[0]->getNome() . " " . FMedico::getObj($recensioni[$i]["IdMedico"])[0]->getCognome();
            }
            $view = new VAmministratore(); //servirebbe una cosa del genere
            $view->showRevPage($recensioni);
        }
    }

    //12.3) elimina_recensione(IdRecensione)

    public static function elimina_recensione($IdRecensione)
    {
        if (CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "admin") { //BISOGNA TENERLO   

            $recensione = FRecensione::eliminarecensione($IdRecensione);
            $view = new VAmministratore(); //servirebbe una cosa del genere
            $view->messaggio("Operazione effettuata!");
        }
    }

    //CASI D'USO AGGIUNTIVI

    /**
     * 
     * verify if the choosen username and email already exist, create the User Obj and set a default profile image 
     * @return void
     */
    public static function registrazionemedico()
    {   //registrazione del medico usata (dall'admin)
        if (CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "admin") {
            //construct($nome,$cognome,$email, $password, $codice_fiscale,$data_nascita,$luogo_nascita,$residenza,$numero_telefono,$attivo)
            $view = new VAmministratore();
            //BASTA VERIFICARE CHE LA MAIL NON SIA GIà IN USO
            if (FPersistentManager::getInstance()->verificaemailmedico(UHTTPMethods::post('email')) == FALSE) { //false = mail non in uso  
                //QUI SI ISTANZIA UN MEDICO QUINDI SERVONO I CORRETTI ARGOMENTI DA PASSARGLI
                $medico = new EMedico(
                    UHTTPMethods::post('nome'),
                    UHTTPMethods::post('cognome'),
                    UHTTPMethods::post('email'),
                    password_hash(UHTTPMethods::post('password'), PASSWORD_DEFAULT),
                    '1',
                    UHTTPMethods::post('costo')
                );
                //imposto la propic di default che avrà id=1
                //$user->setIdImage(1);  //i pazienti non hanno la propic MA PER IL MEDICO AVREBBE COMPLETAMENTE SENSO METTERE PROPIC DI DEF
                $medico->setTipologia(FTipologia::getObj(UHTTPMethods::post('tipologia'))[0]);
                $medico->setIdImmagine('0');
                //var_dump($medico);
                $IdMedico = FPersistentManager::getInstance()->uploadObj($medico);  //da sistemare il persistent manager
                $medico->setIdMedico($IdMedico);
                //necessità di creazione del calendario associato
                $calendario = new ECalendario();
                $calendario->setMedico($medico);
                FPersistentManager::getInstance()->uploadObj($calendario);
                $view->messaggio("Registrazione effettuata con successo!");   //DA FARE CON LA VIEW E SMARTY
            } 
            else if(FPersistentManager::getInstance()->verificaemailmedico(UHTTPMethods::post('email')) == TRUE) {
                $view->messaggio("Errore con la registrazione del medico"); //DA FARE CON LA VIEW E SMARTY
            }
        }
    }

    public static function formregistrazione()
    {
        if (CUtente::isLogged() && USession::getSessionElement('tipo_utente') == "admin") { //BISOGNA TENERLO   

            $view = new VAmministratore(); //servirebbe una cosa del genere
            $tipologie = FEntityManagerSQL::getInstance()->retrieveall(FTipologia::getTable());
            $view->registrazionemedico($tipologie);
        }
    }

    public static function login()
    {
        $view = new VAmministratore();
        $view->showFormLogin();
    }

    public static function checkLogin()
    {   //FACCIAMO IL LOGIN DEL PAZIENTE oppure posso fare un metodo unico con gli switch
        $view = new VAmministratore();
        //ESEGUO UN CHECK SULL'ESISTENZA DELL'USERNAME NEL DB (CONTROLLO LA PRESENZA DELLA MAIL NELLA TABLE DEI PAZIENTI)
        $admin = FAmministratore::getadminbyemail(UHTTPMethods::post('email'));
        //$admin = FPersistentManager::getInstance()->retrieveamministratorefromemail(UHTTPMethods::post('email'));
        //CONTROLLO LA PASSWORD IMMESSA CON QUELLA HASHATA SUL DB
        //password_verify è una funzione NATIVA DI PHP
        //var_dump($admin);
        if ($admin != null) {
            if (password_verify(UHTTPMethods::post('password'), $admin[0]->getPassword())) {
                USession::getSessionStatus() == PHP_SESSION_NONE;   //ALTRIMENTI SE LO STATO è NULLO LO SETTIAMO 
                USession::getInstance();
                USession::setSessionElement('tipo_utente', 'admin');
                USession::setSessionElement('id', $admin[0]->getIdAdmin());
                //var_dump(USession::getSessionStatus());
                //var_dump(USession::getSessionElement('tipo_utente'));
                $view->loginOk();
            } else {
                $view->showFormLogin(UHTTPMethods::post('email'), true);
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
}
