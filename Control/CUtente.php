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
                if(!($user[0]->getAttivo())){
                    $view = new VPaziente();   //DA CONCONCORDARE CON LA VIEW PER IL RESTO
                    USession::unsetSession();
                    USession::destroySession();
                    $view->loginBan();
                }
                break;
            case "medico":
                $user = FPersistentManager::getInstance()->retrieveObj(FMedico::getTable(), $ID);
                if(!($user[0]->getAttivo())){
                    $view = new VMedico();   //DA CONCONCORDARE CON LA VIEW PER IL RESTO
                    USession::unsetSession();
                    USession::destroySession();
                    $view->showFormLogin(false,"Medico bannato!");
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
     *
     */
    public static function home(){  
/*         if(!CUtente::isLogged())
        { */

           
            $view = new VUtente();
            $view->Home();
/*         }   */
    }

}