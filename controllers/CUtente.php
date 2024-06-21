<?php

class CUtente{

    /**
     * CONTROLLIAMO SE L'UTENTE è LOGGATO, true=LOGGATO, false=NON LOGGATO
     * @return boolean
     */
    public static function isLogged()
    {
        $logged = false;   //di base mettiamo il logged a false

        if(UCookie::isSet('PHPSESSID')){   //se è settato ritorna true
            if(session_status() == PHP_SESSION_NONE){  //se non abbiamo lo stato di sessione 
                USession::getInstance();  //getinstance() crea o getta la sessione (PATTERN SINGLETON) 
            }
        }
        if(USession::isSetSessionElement('tipo_utente')){     //qui andrebbe cambiato a "paziente"
            $logged = true;           //l'utente risulta loggato
            self::isBanned();        //qui andiamo a mandarlo nella schermata di login bannato nella view      
            //QUI DOVREBBE ESSERCI UNA DIVISIONE TRA I VARI TIPO DI UTENTI           
        }
        if(!$logged){
            header('Location: /Ambulacare/User/login');    //DA MODIFICARE
            exit;
        }
        return true;
    }

    /**
     * check if the user is banned
     * @return void
     */
    public static function isBanned()   //QUI ABBIAMO IL CHECK SUL BAN O MENO DELL'UTENTE USANDO FOUNDATION ED IL DB
    {
        $tipo_utente = USession::getSessionElement('tipo_utente');     //dipende da come settiamo l'array session
        $ID = USession::getSessionElement('id');
        switch ($tipo_utente) {
            case "paziente":
                $user = FPersistentManager::getInstance()->retrieveObj(EPaziente::getEntity(), $ID);
                if(!($user->getAttivo())){
                    $view = new VPaziente();   //DA CONCONCORDARE CON LA VIEW PER IL RESTO
                    USession::unsetSession();
                    USession::destroySession();
                    $view->loginBan();
                }
                break;
            case "medico":
                $user = FPersistentManager::getInstance()->retrieveObj(EMedico::getEntity(), $ID);
                if(!($user->getAttivo())){
                    $view = new VMedico();   //DA CONCONCORDARE CON LA VIEW PER IL RESTO
                    USession::unsetSession();
                    USession::destroySession();
                    $view->loginBan();
                }
                break;
            case "admin":
                $user = FPersistentManager::getInstance()->retrieveObj(EPaziente::getEntity(), $ID);
                /*
                if(!($user->getAttivo())){
                    $view = new VAmministratore();   //DA CAPIRE COSA FARE QUI
                    USession::unsetSession();
                    USession::destroySession();
                    $view->loginBan();
                }
                    */
                break;
            default:
              echo "ERRORE DI TIPO UTENTE";
        }
       
    
    }

    public static function login(){                     
        if(UCookie::isSet('PHPSESSID')){
            if(session_status() == PHP_SESSION_NONE){
                USession::getInstance();
            }
        }
        if(USession::isSetSessionElement('tipo_utente')){          //QUI ANDIAMO A CONTROLLARE SE L'UTENTE e loggato e lo portiamo sulla home
            header('Location: /Ambulacare');       //REDIRECT LOCATION DELLA HOME DELL'UTENTE
            //DOVREBBE USCIRE DOPO AVER USATO HEADER
            //exit; IN CASO 
        }
        $tipo_utente = USession::getSessionElement('tipo_utente');     //dipende da come settiamo l'array session
        $ID = USession::getSessionElement('id');
        switch ($tipo_utente) {
            case "paziente":
                $view = new VPaziente();   //DA CONCONCORDARE CON LA VIEW PER IL RESTO
                break;
            case "medico":
                $view = new VMedico();   //DA CONCONCORDARE CON LA VIEW PER IL RESTO
                break;
            case "admin":
                $view = new VAmministratore();   //DA CONCONCORDARE CON LA VIEW PER IL RESTO
                break;
            default:
              echo "ERRORE DI TIPO UTENTE";
        }
        $view->showLoginForm();     //MOSTRARE IL FORM DI LOGIN CON SMARTY MANCA??????
    }
    /**
     * QUI ANDREBBE FATTA LA SUDDIVISIONE TRA LE REGISTRAZIONI DI MEDICI E PAZIENTI
     * verify if the choosen username and email already exist, create the User Obj and set a default profile image 
     * @return void
     */
    public static function registrazionepaziente()
    {   //registrazione del paziente
    //construct($nome,$cognome,$email, $password, $codice_fiscale,$data_nascita,$luogo_nascita,$residenza,$numero_telefono,$attivo)
        $view = new VPaziente();  
        //BASTA VERIFICARE CHE LA MAIL NON SIA GIà IN USO
        if(FPersistentManager::getInstance()->verificaemailpaziente(UHTTPMethods::post('email')) == false ){ //false = mail non in uso  
                //QUI SI ISTANZIA UN PAZIENTE QUINDI SERVONO I CORRETTI ARGOMENTI DA PASSARGLI
                $paziente = new EPaziente(UHTTPMethods::post('nome'), UHTTPMethods::post('cognome'),UHTTPMethods::post('email'),
                                UHTTPMethods::post('password'),UHTTPMethods::post('codice_fiscale'),UHTTPMethods::post('data_nascita'),
                                UHTTPMethods::post('luogo_nascita'),UHTTPMethods::post('residenza'),UHTTPMethods::post('numero_telefono'),'1');
                //$user->setIdImage(1);  //i pazienti non hanno la propic MA PER IL MEDICO AVREBBE COMPLETAMENTE SENSO METTERE PROPIC DI DEF
                FPersistentManager::getInstance()->uploadObj($paziente);  //da sistemare il persistent manager
                
                $view->showLoginForm();   //DA FARE CON LA VIEW E SMARTY
        }else
        {
            $view->registrationError(); //DA FARE CON LA VIEW E SMARTY
        }
    }


    /**
     * 
     * verify if the choosen username and email already exist, create the User Obj and set a default profile image 
     * @return void
     */
    public static function registrazionemedico(){   //registrazione del medico usata (dall'admin)
        //construct($nome,$cognome,$email, $password, $codice_fiscale,$data_nascita,$luogo_nascita,$residenza,$numero_telefono,$attivo)
            $view = new VMedico();  
            //BASTA VERIFICARE CHE LA MAIL NON SIA GIà IN USO
            if(FPersistentManager::getInstance()->verificaemailmedico(UHTTPMethods::post('email')) == false ){ //false = mail non in uso  
                    //QUI SI ISTANZIA UN PAZIENTE QUINDI SERVONO I CORRETTI ARGOMENTI DA PASSARGLI
                    $medico = new EMedico(UHTTPMethods::post('nome'), UHTTPMethods::post('cognome'),UHTTPMethods::post('email'),
                                    UHTTPMethods::post('password'),'1',UHTTPMethods::post('costo'));
                    $medico->setIdImmagine(1);//imposto la propic di default che avrà id=1
                    //$user->setIdImage(1);  //i pazienti non hanno la propic MA PER IL MEDICO AVREBBE COMPLETAMENTE SENSO METTERE PROPIC DI DEF
                    FPersistentManager::getInstance()->uploadObj($medico);  //da sistemare il persistent manager
                    
                    $view->showLoginForm();   //DA FARE CON LA VIEW E SMARTY
            }
            else
            {
                $view->registrationError(); //DA FARE CON LA VIEW E SMARTY
            }
    }



    /**
     * check if exist the Username inserted, and for this username check the password. If is everything correct the session is created and
     * the User is redirected in the homepage
     */
    public static function checkLoginPaziente(){   //FACCIAMO IL LOGIN DEL PAZIENTE oppure posso fare un metodo unico con gli switch
        $view = new VPaziente();
        //ESEGUO UN CHECK SULL'ESISTENZA DELL'USERNAME NEL DB (CONTROLLO LA PRESENZA DELLA MAIL NELLA TABLE DEI PAZIENTI)
        $exist = FPersistentManager::getInstance()->verificaemailpaziente(UHTTPMethods::post('email'));  
        //SE ESISTE NEL DB ALLORA CONTINUO                                          
        if($exist)
        {
            $paziente = FPersistentManager::getInstance()->retrievepazientefromemail(UHTTPMethods::post('username'));  
            //CONTROLLO LA PASSWORD IMMESSA CON QUELLA HASHATA SUL DB
            //password_verify è una funzione NATIVA DI PHP
            if(password_verify(UHTTPMethods::post('password'), $paziente[0]->getPassword()))  
            {
                if(!($paziente[0]->getAttivo()))  //PRIMA DI FARLO ACCEDERE EFFETTIVAMENTE CONTROLLIAMO SE è BANNATO
                {
                    $view->loginBan(); //LO MANDIAMO ALLA SCHERMATA DI UTENTE BANNATO
                }
                elseif(USession::getSessionStatus() == PHP_SESSION_NONE)   //ALTRIMENTI SE LO STATO è NULLO LO SETTIAMO 
                {
                    USession::getInstance();
                    USession::setSessionElement('tipo_utente', 'paziente');
                    USession::setSessionElement('id', $paziente[0]->getIdPaziente());
                    header('Location: /Ambulacare');
                }
            }
            else
            {
                $view->loginError();
            }
        }
        else
        {
            $view->loginError();
        }
    }


    /**
     * check if exist the Username inserted, and for this username check the password. If is everything correct the session is created and
     * the User is redirected in the homepage
     */
    public static function checkLoginMedico(){   //FACCIAMO IL LOGIN DEL PAZIENTE oppure posso fare un metodo unico con gli switch
        $view = new VMedico();
        //ESEGUO UN CHECK SULL'ESISTENZA DELL'USERNAME NEL DB (CONTROLLO LA PRESENZA DELLA MAIL NELLA TABLE DEI PAZIENTI)
        $exist = FPersistentManager::getInstance()->verificaemailmedico(UHTTPMethods::post('email'));  
        //SE ESISTE NEL DB ALLORA CONTINUO                                          
        if($exist)
        {
            $medico = FPersistentManager::getInstance()->retrievemedicofromemail(UHTTPMethods::post('username'));  
            //CONTROLLO LA PASSWORD IMMESSA CON QUELLA HASHATA SUL DB
            //password_verify è una funzione NATIVA DI PHP
            if(password_verify(UHTTPMethods::post('password'), $medico[0]->getPassword()))  
            {
                if(!($medico[0]->getAttivo()))  //PRIMA DI FARLO ACCEDERE EFFETTIVAMENTE CONTROLLIAMO SE è BANNATO
                {
                    $view->loginBan(); //LO MANDIAMO ALLA SCHERMATA DI UTENTE BANNATO
                }
                elseif(USession::getSessionStatus() == PHP_SESSION_NONE)   //ALTRIMENTI SE LO STATO è NULLO LO SETTIAMO 
                {
                    USession::getInstance();
                    USession::setSessionElement('tipo_utente', 'medico');
                    USession::setSessionElement('id', $medico[0]->getIdMedico());
                    header('Location: /Ambulacare');
                }
            }
            else
            {
                $view->loginError();
            }
        }
        else
        {
            $view->loginError();
        }
    }






    /**
     * this method can logout the User, unsetting all the session element and destroing the session. Return the user to the Login Page
     * @return void
     */
    public static function logout(){
        USession::getInstance();
        USession::unsetSession();
        USession::destroySession();
        header('Location: /Ambulacare');
    }

    /**
     * load all the Posts in homepage (Posts of the Users that the logged User are following). Also are loaded Information about vip User and
     * about profile Images of all the involved User
     */
    public static function home(){  //questa roba non ha proprio un corrispettivo, si può usare per una struttura comune per richieste e load
        if(CUtente::isLogged())
        {   //questa obbligatorietò del login potrebbe essere tolta e messa nei punti cardine(creazione effettiva appuntamento)
            $view = new VPaziente();

            $userId = USession::getInstance()->getSessionElement('user');
            $userAndPropic = FPersistentManager::getInstance()->loadUsersAndImage($userId);

            //load all the posts of the users who you follow(post have user attribute) and the profile pic of the author of teh post
            //$postInHome = FPersistentManager::getInstance()->loadHomePage($userId);
            
            //load the VIP Users, their profile Images and the foillower number
            //$arrayVipUserPropicFollowNumb = FPersistentManager::getInstance()->loadVip();
        
            $view->home($userAndPropic, $postInHome,$arrayVipUserPropicFollowNumb);
        }  
    }

    /*
     * NON ESATTAMENTE CON CORRISPETTIVO
     * load Posts belonged to the logged User and his Bio information
     */
    /*
    public static function personalProfile(){ //NON DOVREBBE ESSERE POSSIBILE APRIRE I PROFILI DI ALTRI PAZIENTI, PROBABILMENTE SOLO DEI MEDICI
        if(CUser::isLogged()){ 
            $view = new VUser();

            $userId = USession::getInstance()->getSessionElement('user');
            $userAndPropic = FPersistentManager::getInstance()->loadUsersAndImage($userId);
                
            //load all the Posts belonged to a User that are not Banned
            //$postProfileAndLikes = FPersistentManager::getInstance()->loadUserPage($userId);

            //load the number of followed and following users
            //$followerNumb = FPersistentManager::getInstance()->getFollowerNumb($userId);
            //$followedNumb = FPersistentManager::getInstance()->getFollowedNumb($userId);

            $view->uploadPersonalUserInfo($userAndPropic, $postProfileAndLikes, $followerNumb, $followedNumb);
        }
    }
    */

    /*
     * load post belonged to the visited User and his informations
     * @param String $username Refers to the username of a user
     */
    /*
    public static function profile($username)
    {
        if(CUtente::isLogged()){
            $personalUserId =  USession::getInstance()->getSessionElement('user');
            $personalUserAndPropic = FPersistentManager::getInstance()->loadUsersAndImage($personalUserId);
            if($personalUserAndPropic[0][0]->getUsername() != $username){
                if(FPersistentManager::getInstance()->verifyUserUsername($username)){
                    $user = FPersistentManager::getInstance()->retriveUserOnUsername($username);
                    $userAndPropic = FPersistentManager::getInstance()->loadUsersAndImage($user->getId());

                    $postUser = FPersistentManager::getInstance()->loadUserPage($user->getId());
                    $follow = FPersistentManager::getInstance()->retriveFollow($personalUserId, $user->getId());

                    $followerNumb = FPersistentManager::getInstance()->getFollowerNumb($user->getId());
                    $followedNumb = FPersistentManager::getInstance()->getFollowedNumb($user->getId());
                    $view = new VUser();
                        

                    $view->uploadUserInfo($userAndPropic, $personalUserAndPropic, $postUser,  $follow, $followerNumb, $followedNumb);
                }else{
                    header('Location: /Agora/User/home');
                }
            }else{
                header('Location: /Agora/User/personalProfile');
            }    
        }
    }*/

    /**
     * QUESTO VA USATO PER APRIRE LA SCHERMATA DELLE INFORMAZIONI PERSONALI DEL PAZIENTE (PROFILO PERSONALE)
     * load the settings page compiled with the user data
     */
    public static function settingspaziente(){  //POTREBBE ESSERE RINOMINATO
        if(CUtente::isLogged()){
            $view = new VPaziente();

            $userId = USession::getInstance()->getSessionElement('id');
            //qui ho bisogno di un metodo nel persistent manager che passi un array con tutte le info visualizzabili dal paziente
            $datipaziente = FPersistentManager::getInstance()->retrieveinfopaziente($userId);    
            $view->settings($datipaziente);  //PASSO A VIEW QUESTO ARRAY ASSOCIATIVO CON I DATI DELL'UTENTE PER VISUALIZZARLI
        }
    }

   /**
     * QUESTO VA USATO PER APRIRE LA SCHERMATA DELLE INFORMAZIONI PERSONALI DEL PAZIENTE (PROFILO PERSONALE)
     * load the settings page compiled with the user data
     */
    public static function settingsmedico(){  //POTREBBE ESSERE RINOMINATO
        if(CUtente::isLogged()){
            $view = new VMedico();

            $Idmedico = USession::getInstance()->getSessionElement('id');
            //qui ho bisogno di un metodo nel persistent manager che passi un array con tutte le info visualizzabili dal medico compresa la propic
            $datipaziente = FPersistentManager::getInstance()->retrieveinfomedico($Idmedico);    
            $view->settings($datipaziente);  //PASSO A VIEW QUESTO ARRAY ASSOCIATIVO CON I DATI DELL'UTENTE PER VISUALIZZARLI
        }
    }
    

    /**
     * QUESTO VA USATO PER LA MODIFICA DELLE INFO DEL PROFILO DEL PAZIENTE
     * Take the compiled form and use the data for update the user info (Biography, Working, StudeiedAt, Hobby)
     */
    public static function setInfoPaziente(){
        if(CUtente::isLogged()){
            $IdPaziente = USession::getInstance()->getSessionElement('id');
            $paziente = FPersistentManager::getInstance()->retrieveObj(EPaziente::getEntity(), $IdPaziente);
            $paziente->setNome(UHTTPMethods::post('Nome'));
            $paziente->setCognome(UHTTPMethods::post('Cognome'));
            //$paziente->setEmail(UHTTPMethods::post('Email')); //credenziale di accesso  CONTROLLO PER L'UNIVOCITà NECESSARIO
            $paziente->setPassword(UHTTPMethods::post('Password')); //credenziale di accesso 
            $paziente->setCodiceFiscale(UHTTPMethods::post('CodiceFiscale'));
            $paziente->setDataNascita(UHTTPMethods::post('DataNascita'));
            $paziente->setLuogoNascita(UHTTPMethods::post('LuogoNascita'));
            $paziente->setResidenza(UHTTPMethods::post('Residenza'));
            $paziente->setNumerotelefono(UHTTPMethods::post('Numerotelefono'));
            
            FPersistentManager::getInstance()->updateinfopaziente($paziente);

            header('Location: /paziente/profilopersonale');
        }
    }

    /**
     * QUESTO VA USATO PER LA MODIFICA DELLE INFO DEL PROFILO DEL PAZIENTE
     * Take the compiled form and use the data for update the user info (Biography, Working, StudeiedAt, Hobby)
     */
    public static function setInfoMedico(){
        if(CUtente::isLogged()){
            $IdMedico = USession::getInstance()->getSessionElement('id');
            $medico = FPersistentManager::getInstance()->retrieveObj(EMedico::getEntity(), $IdMedico);
            $medico->setNome(UHTTPMethods::post('Nome'));
            $medico->setCognome(UHTTPMethods::post('Cognome'));
            //$medico->setEmail(UHTTPMethods::post('Email')); //credenziale di accesso  CONTROLLO PER L'UNIVOCITà NECESSARIO
            $medico->setPassword(UHTTPMethods::post('Password')); //credenziale di accesso 
            $medico->setCosto(UHTTPMethods::post('Costo')); //ATTENZIONE A QUESTO PERCHè SI RIPERCUOTE ANCHE SU ALTRO COME LE STATISTICHE
                                                            //COMPRESI GLI APPUNTAMENTI GIà EFFETTUATI
            
            FPersistentManager::getInstance()->updateinfomedico($medico);

            header('Location: /medico/profilopersonale');
        }
    }

    /**
     * QUESTO VA APPLICATO PER UN CAMBIO MAIL DEL PAZIENTE
     * Take the compiled form, use the data to check if the username alredy exist and if not update the user Username
     */
    public static function setEmailPaziente(){
        if(CUtente::isLogged()){
            $IdPaziente = USession::getInstance()->getSessionElement('id');
            $paziente = FPersistentManager::getInstance()->retrieveObj(EPaziente::getEntity(), $IdPaziente);
            
            if($paziente->getEmail() == UHTTPMethods::post('Email')){  //LA MAIL INSERITA NON DEVE ESSERE UGUALE A QUELLA ESISTENTE
                header('Location: /paziente/profilopersonale');
            }else{
                if(FPersistentManager::getInstance()->verificaemailpaziente(UHTTPMethods::post('Email')) == false)
                {
                    $paziente->setEmail(UHTTPMethods::post('Email'));
                    FPersistentManager::getInstance()->updatemailpaziente($paziente);
                    header('Location: /paziente/profilopersonale');
                }else
                {   //QUESTO NEL CASO SIA STATA INSERITA UNA MAIL ATTUALMENTE IN USO DA UN ALTRO UTENTE QUINDI VA MESSA UNA SCHERMATA DI ERRORE
                    $view = new VPaziente();
                    //$userAndPropic = FPersistentManager::getInstance()->loadUsersAndImage($userId);
                    $view->usernameError($userAndPropic , true);
                }
            }
        }
    }


    /**
     * QUESTO VA APPLICATO PER UN CAMBIO MAIL DEL MEDICO
     * Take the compiled form, use the data to check if the username alredy exist and if not update the user Username
     */
    public static function setEmailMedico(){
        if(CUtente::isLogged()){
            $IdMedico = USession::getInstance()->getSessionElement('id');
            $medico = FPersistentManager::getInstance()->retrieveObj(EMedico::getEntity(), $IdMedico);
            
            if($medico->getEmail() == UHTTPMethods::post('Email')){  //LA MAIL INSERITA NON DEVE ESSERE UGUALE A QUELLA ESISTENTE
                header('Location: /medico/profilopersonale');
            }else{
                if(FPersistentManager::getInstance()->verificaemailmedico(UHTTPMethods::post('Email')) == false)
                {
                    $medico->setEmail(UHTTPMethods::post('Email'));
                    FPersistentManager::getInstance()->updatemailmedico($medico);
                    header('Location: /medico/profilopersonale');
                }else
                {   //QUESTO NEL CASO SIA STATA INSERITA UNA MAIL ATTUALMENTE IN USO DA UN ALTRO UTENTE QUINDI VA MESSA UNA SCHERMATA DI ERRORE
                    $view = new VMedico();
                    //$userAndPropic = FPersistentManager::getInstance()->loadUsersAndImage($userId);
                    $view->usernameError($userAndPropic , true);  //EMAIL ERROR
                }
            }
        }
    }


    /**
     * QUESTO VA APPLICATO PER UN CAMBIO PASSWORD DEL PAZIENTE
     * Take the compiled form and update the user password
     */
    public static function setPasswordPaziente(){
        if(CUtente::isLogged()){
            $IdPaziente = USession::getInstance()->getSessionElement('id');
            $paziente = FPersistentManager::getInstance()->retrieveObj(EPaziente::getEntity(), $IdPaziente);
            $newPass = UHTTPMethods::post('password');
            $paziente->setPassword($newPass);
            FPersistentManager::getInstance()->updatePasswordpaziente($paziente);

            header('Location: /paziente/profilopersonale');
        }
    }

     /**
     * QUESTO VA APPLICATO PER UN CAMBIO PASSWORD DEL MEDICO
     * Take the compiled form and update the user password
     */
    public static function setPasswordMedico(){
        if(CUtente::isLogged()){
            $IdMedico = USession::getInstance()->getSessionElement('id');
            $medico = FPersistentManager::getInstance()->retrieveObj(EMedico::getEntity(), $IdMedico);
            $newPass = UHTTPMethods::post('password');
            $medico->setPassword($newPass);
            FPersistentManager::getInstance()->updatePasswordmedico($medico);

            header('Location: /medico/profilopersonale');
        }
    }




    /**
     * APPLICATO PER UN CAMBIO PROPIC DI UN MEDICO
     * Take the file, check if there is an upload error, if not update the user image and delete the old one 
     */
    public static function setProPicMedico(){
        if(CUtente::isLogged()){
            $IdMedico = USession::getInstance()->getSessionElement('id');
            $medico = FPersistentManager::getInstance()->retrieveObj(EMedico::getEntity(), $IdMedico);
            
            if(UHTTPMethods::files('imageFile','size') > 0){  //MMH
                $uploadedImage = UHTTPMethods::files('imageFile');
                $checkUploadImage = FPersistentManager::getInstance()->caricaimmagine($uploadedImage);
                if($checkUploadImage == 'UPLOAD_ERROR_OK' || $checkUploadImage == 'TYPE_ERROR' || $checkUploadImage == 'SIZE_ERROR')
                {   //ENTRIAMO QUI SE L'IMMAGINE NON VA BENE
                    $view = new VMedico();  
                    $userAndPropic = FPersistentManager::getInstance()->loadUsersAndImage($IdMedico);  //BOH

                    $view->FileError($userAndPropic);  //MESSAGGIO DI ERRORE DEL FILE
                }else{
                    $idImage = FPersistentManager::getInstance()->uploadObj($checkUploadImage);
                    if($medico->getIdImmagine() != 1)  //SE è DIVERSA DA QUELLA DI DEFAULT CANCELLIAMO QUELLA CHE AVEVA DAL DB
                    {
                        if(FPersistentManager::getInstance()->cancellaImmagine($medico->getIdImmagine())){
                            $medico->setIdImmagine($idImage);
                            FPersistentManager::getInstance()->updatemedicopropic($medico);
                        }
                        header('Location: /medico/profilopersonale');
                    }
                    else
                    {   //se ha quella di default, basta settarla senza cancellarla
                        $medico->setIdImage($idImage);
                        FPersistentManager::getInstance()->updatemedicopropic($medico);
                    }
                    header('Location: /medico/profilopersonale');
                }
            }else{
                header('Location: /medico/profilopersonale');
            }
        }
    }



    /**
     * POTREBBE ESSERE ANALOGO AL MOSTRARE GLI APPUNTAMENTI PRENOTABILI DAL PAZIENTE (QUINDI I MEDICI ATTIVI)
     * load all the post finded by a specifyc category
     * @param String $category Refers to a name of a category
     */
    public static function category($category)
    {
        if(CUser::isLogged()){
            $view = new VUser();
        
            $userId = USession::getInstance()->getSessionElement('user');
            $userAndPropic = FPersistentManager::getInstance()->loadUsersAndImage($userId);

            //load the VIP Users, their profile Images and the foillower number
            $arrayVipUserPropicFollowNumb = FPersistentManager::getInstance()->loadVip();

            $postCategory = FPersistentManager::getInstance()->loadPostPerCategory($category);

            $view->prenotaappumento($userAndPropic, $postCategory, $arrayVipUserPropicFollowNumb); //d'esempio
        }
    }

    /**
     * BOH
     * load a limit number of posts that are not belonged to the logged user, so this page is for discover new Users
     */
    public static function explore()
    {
        if(CUser::isLogged()){
            $view = new VUser();
                
            $userId = USession::getInstance()->getSessionElement('user');
            $userAndPropic = FPersistentManager::getInstance()->loadUsersAndImage($userId);

            ///load the VIP Users, their profile Images and the foillower number
            $arrayVipUserPropicFollowNumb = FPersistentManager::getInstance()->loadVip();

            $postExplore = FPersistentManager::getInstance()->loadPostInExplore($userId);

                
            $view->explore($userAndPropic, $postExplore, $arrayVipUserPropicFollowNumb);
        }
    }

    /**
     * POSSIAMO PENSARE A QUALCOSA COME I PAZIENTI VISITATI PER UN MEDICO
     * QUINDI TUTTI GLI APPUNTAMENTI CONCLUSI RELATIVI AD UN MEDICO
     * return a page with a list of Users who are followed by the User logged 
     * @param int $idUser Refers to the id of a user
     */
    public static function followers($idUser)
    {
        if(CUser::isLogged()){
            $usersListAndPropic = FPersistentManager::getInstance()->getFollowedList($idUser);
                
            $view = new VManagePost();
            $view->showUsersList($usersListAndPropic, 'followers');
        }       
    }

    /**
     * QUI POTREMMO METTERE IL CASO SIMMETRICO, OVVERO GLI APPUNTAMENTI PASSATI DI UN PAZIENTE
     * return a page with a list of Users who are following the User logged 
     * @param int $idUser Refers to the id of a user
     */
    public static function followed($idUser)
    {
        if(CUser::isLogged()){
            $usersListAndPropic = FPersistentManager::getInstance()->getFollowerList($idUser);
                
            $view = new VManagePost();
            $view->showUsersList($usersListAndPropic, 'followed');
        }
    }

    /**
     * POSSIBILE DA MODIFICARE PER LA PRENOTAZIONE DEGLI APPUNTAMENTI (CREAZIONE EFFETTIVA)
     * method to follow a user, the check is in the profile() method
     * @param int $followerId Refers to the id of a user
     */
    public static function follow($followedId){
        if(CUser::isLogged()){
            $userId = USession::getInstance()->getSessionElement('user');

            //new Follow Object
            $follow = new EUserFollow($userId, $followedId);
            FPersistentManager::getInstance()->uploadObj($follow);
            $visitedUser = FPersistentManager::getInstance()->retriveObj(EUser::getEntity(), $followedId);
            header('Location: /Agora/User/profile/' . $visitedUser->getUsername());
        }       
    }

    /**
     * CANCELLAZIONE APPUNTAMENTO   PROBABILMENTE SERVE CREARE CAppuntamento
     * method to unfollow a user, the check is in the profile() method
     * @param int $followedId Refers to the id of a user
     */
    public static function unfollow($followedId){
        if(CUser::isLogged()){
            $userId = USession::getInstance()->getSessionElement('user');

            FPersistentManager::getInstance()->deleteFollow($userId, $followedId);
            $visitedUser = FPersistentManager::getInstance()->retriveObj(EUser::getEntity(), $followedId);
            header('Location: /Agora/User/profile/' . $visitedUser->getUsername());
        } 
    }

//QUI PARTO CON I METODI PRESI DALL'SSD

    //[paziente]caso d'uso 1 "prenotazione esame"

    //avvia_prenotazione
    //gli devo passare tutti i medici attivi per visualizzarli con i relativi dati da visualizzare
    //ma anche le tipologie in modo di metterle nella tendina la per la selezione e farmele passare nella prossima funzione
    public static function avviaprenotazione(){
        if(CUtente::isLogged()){ //possiamo tenerlo o toglierlo
            

            $medici = FPersistentManager::getInstance()->retrievemediciattivi(); //è l'array dei medici attivi, ma potrebbe essere raffinato
            $tipologie = FPersistentManager::getInstance()->retrievealltipologie();
            //$view = new VManagePost($medici,$tipologie); //servirebbe una cosa del genere
            header('Location: /appuntamento/esamidaprenotare');
        } 
    }

    //ricerca_esame(tipologia_esame)
    //prendo in input una tipologia e restituisco i medici attivi di quella tipologia alla view
    //dovrebbe servire anche il nome della tipologia per visualizzarlo e per metterlo nella URL
    //bisogna mettere gli id dei medici nei bottoni per passarli poi al metodo successivo
    public static function ricercaesame($IdTipologia){
        if(CUtente::isLogged()){ //possiamo tenerlo o toglierlo
            
            $nometipologia = FTipologia::getObj($IdTipologia)[0]->getNometipologia();
            $medici = FPersistentManager::getInstance()->retrievemediciattivifromTipologia($IdTipologia); //è l'array dei medici attivi, ma potrebbe essere raffinato
            $tipologie = FPersistentManager::getInstance()->retrievealltipologie();
            $view = new VManagePost($medici,$tipologie,$nometipologia); //servirebbe una cosa del genere per il passaggio dei parametri
            header('Location: /appuntamento/esamidaprenotare/$tipologia ');
        } 
    }

    //dettagli_prenotazione(medico)
    //accedendo alla schermata di dettaglio prendendo in input l'id del medico
    //bisogna passare a view i dettagli dell'esame (quindi del medico) e gli orari di disponibilità (complesso) per la tabella
    //ed anche per le tendine
    //serve anche utilizzare gli appuntamenti per capire quali sono gli slot occupati o meno nella visualizzazione
    //query specifica nel persistent manager probabilmente basta passare un array tridimensionale del tipo
    //orari_disponibilità[$settimana][$giorno][$Numero slot orario (da 1 a 5)] = true/false
    //DEVO USARE LE SETTIMANE nel senso che ne passo una alla volta
    //SERVE UN METODO AGGIUNTIVO NEL CASO DI CLIC DEL TASTO ">" o "<" quindi ci deve essere memoria della settimana corrente

    public static function dettagli_prenotazione($IdMedico){
        if(CUtente::isLogged()){ //possiamo tenerlo o toglierlo
            
            $data = new DateTime(); //DATA E ORA AL MOMENTO DELL'ESECUZIONE  //i mesi vanno ignorati
            //DA QUESTA SI RICAVA LA SETTIMANA CHE SI USA PER ESTRARRE I DATI DAL DB (QUINDI CONDIZIONE SU ANNO + SETTIMANA)
            $numerosettimana = $data->format('W'); //numero della settimana nell'anno (es 43)
            $anno = $data->format('o'); //anno attuale (es 2024)
            //$giornosettimana = $data->format('N'); //numero da 1 a 7 della settimana (1=lunedì) non è detto che serva qui
            //L'IDEA è quella di ciclare sul db e mettere true/false nell'array bidimensionale che rappresenta la settimana
            $orari_disponinibilità = FEntityManagerSQL::getInstance()->getdisponibilitàsettimana($IdMedico,$numerosettimana,$anno);
            $medico = FMedico::getObj($IdMedico); //prendo il medico per prendere la tipologia
            $IdTipologia = $medico->getTipologia();
            $Tipologia = FTipologia::getObj($IdTipologia);
            


            //servirebbe anche la valutazione del medico
            $view = new VManagePost($Tipologia->getNometipologia(),$medico,$orari_disponinibilità); //servirebbe una cosa del genere per il passaggio dei parametri
            header('Location: /appuntamento/esamidaprenotare/$idesame '); //che poi id esame sarebbe quello che del medico
        } 
    }

    //conferma_appuntamento(orario_disponibilità)
    //prendiamo un orario di disponibilità ma in realtà abbiamo una data + uno slot orario
    //l'implementazione di un controllo aggiuntivo sull
    public static function conferma_appuntamento($IdMedico,$data,$slotorario){  //DA FARE
        if(CUtente::isLogged()){ //possiamo tenerlo o toglierlo
            //serve controllare l'esistenza della fascia oraria relativa come libera per creare l'appuntamento 
            //$nometipologia = FTipologia::getObj($IdTipologia)[0]->getNometipologia();
            $medico = FPersistentManager::getInstance()->retrievemedicofromId($IdMedico); //è l'array dei medici attivi, ma potrebbe essere raffinato
            $tipologie = FPersistentManager::getInstance()->retrievealltipologie();
            $orari_disponinibilità = F
            $view = new VManagePost($medici,$tipologie,$nometipologia); //servirebbe una cosa del genere per il passaggio dei parametri
            header('Location: /appuntamento/esamidaprenotare/$tipologia ');
        } 
    }











}