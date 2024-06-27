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




}