<?php

class CUser{

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
        $userId = USession::getSessionElement('user');     //dipende da come settiamo l'array session
        $user = FPersistentManager::getInstance()->retriveObj(EPaziente::getEntity(), $userId);
        if(!($user->getAttivo())){
            $view = new VUser();   //DA CONCONCORDARE CON LA VIEW PER IL RESTO
            USession::unsetSession();
            USession::destroySession();
            $view->loginBan();
        }
    }

    public static function login(){                     
        if(UCookie::isSet('PHPSESSID')){
            if(session_status() == PHP_SESSION_NONE){
                USession::getInstance();
            }
        }
        if(USession::isSetSessionElement('user')){          //QUI ANDIAMO A CONTROLLARE SE L0UTENTE e loggato e lo portiamo sulla home
            header('Location: /Agora/User/home');       //REDIRECT LOCATION DELLA HOME DELL'UTENTE
            //DOVREBBE USCIRE DOPO AVER USATO HEADER
            //exit; IN CASO 
        }
        $view = new VUser();        //ALTRIMENTI PARTE VIEW CON SMARTY
        $view->showLoginForm();     //MOSTRARE IL FORM DI LOGIN CON SMARTY
    }

    /**
     * verify if the choosen username and email already exist, create the User Obj and set a default profile image 
     * @return void
     */
    public static function registration(){
    //construct($nome,$cognome,$email, $password, $codice_fiscale,$data_nascita,$luogo_nascita,$residenza,$numero_telefono,$attivo)
        $view = new VUser();  
        //PER QUESTE COSE DEVO AGGIUNGERE METODI NEL PERSISTENT MANAGER PER VERIFICARE CHE NON SIANO IN USO LE CREDENZIALI INSERITE
        if(FPersistentManager::getInstance()->verifyUserEmail(UHTTPMethods::post('email')) == false &&  //DA METTERE IN FOUNDATION
           FPersistentManager::getInstance()->verifyUserUsername(UHTTPMethods::post('username')) == false){   
                //QUI SI ISTANZIA UN PAZIENTE QUINDI SERVONO I CORRETTI ARGOMENTI DA PASSARGLI
                $user = new EPaziente(UHTTPMethods::post('nome'), UHTTPMethods::post('cognome'),UHTTPMethods::post('email'),
                                  UHTTPMethods::post('codice_fiscale'),UHTTPMethods::post('data_nascita'),UHTTPMethods::post('residenza'),
                                  UHTTPMethods::post('numero_telefono'));
                //$user->setIdImage(1);  //i pazienti non hanno la propic MA PER IL MEDICO AVREBBE COMPLETAMENTE SENSO METTERE PROPIC DI DEF
                FPersistentManager::getInstance()->uploadObj($user);  //da sistemare il persistent manager

                $view->showLoginForm();   //DA FARE CON LA VIEW E SMARTY
        }else{
                $view->registrationError(); //DA FARE CON LA VIEW E SMARTY
            }
    }

    /**
     * check if exist the Username inserted, and for this username check the password. If is everything correct the session is created and
     * the User is redirected in the homepage
     */
    public static function checkLogin(){   //FACCIAMO IL LOGIN
        $view = new VUser();
        //ESEGUO UN CHECK SULL'ESISTENZA DELL'USERNAME NEL DB (CONTROLLERO LA MAIL)
        $username = FPersistentManager::getInstance()->verifyUserUsername(UHTTPMethods::post('username'));  
        //SE ESISTE NEL DB ALLORA CONTINUO                                          
        if($username)
        {
            //PER FARE QUESTA DEVO AGGIUNGERE UN METODO "GETPAZIENTEFROMMAIL($MAIL)"
            $user = FPersistentManager::getInstance()->retriveUserOnUsername(UHTTPMethods::post('username'));  
            //CONTROLLO LA PASSWORD CON QUELLA HASHATA 
            if(password_verify(UHTTPMethods::post('password'), $user->getPassword()))
            {
                if($user->isBanned())  //PRIMA DI FARLO ACCEDERE EFFETTIVAMENTE CONTROLLIAMO SE è BANNATO
                {
                    $view->loginBan(); //LO MANDIAMO ALLA SCHERMATA DI UTENTE BANNATO
                }
                elseif(USession::getSessionStatus() == PHP_SESSION_NONE)   //ALTRIMENTI SE LO STATO è NULLO LO SETTIAMO 
                {
                    USession::getInstance();
                    USession::setSessionElement('user', $user->getId());
                    header('Location: /Agora/User/home');
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
        header('Location: /Agora/User/login');
    }

    /**
     * load all the Posts in homepage (Posts of the Users that the logged User are following). Also are loaded Information about vip User and
     * about profile Images of all the involved User
     */
    public static function home(){
        if(CUser::isLogged()){
            $view = new VUser();

            $userId = USession::getInstance()->getSessionElement('user');
            $userAndPropic = FPersistentManager::getInstance()->loadUsersAndImage($userId);

            //load all the posts of the users who you follow(post have user attribute) and the profile pic of the author of teh post
            $postInHome = FPersistentManager::getInstance()->loadHomePage($userId);
            
            //load the VIP Users, their profile Images and the foillower number
            $arrayVipUserPropicFollowNumb = FPersistentManager::getInstance()->loadVip();
        
            $view->home($userAndPropic, $postInHome,$arrayVipUserPropicFollowNumb);
        }  
    }

    /**
     * load Posts belonged to the logged User and his Bio information
     */
    public static function personalProfile(){
        if(CUser::isLogged()){ 
            $view = new VUser();

            $userId = USession::getInstance()->getSessionElement('user');
            $userAndPropic = FPersistentManager::getInstance()->loadUsersAndImage($userId);
                
            //load all the Posts belonged to a User that are not Banned
            $postProfileAndLikes = FPersistentManager::getInstance()->loadUserPage($userId);

            //load the number of followed and following users
            $followerNumb = FPersistentManager::getInstance()->getFollowerNumb($userId);
            $followedNumb = FPersistentManager::getInstance()->getFollowedNumb($userId);

            $view->uploadPersonalUserInfo($userAndPropic, $postProfileAndLikes, $followerNumb, $followedNumb);
        }
    }

    /**
     * load post belonged to the visited User and his informations
     * @param String $username Refers to the username of a user
     */
    public static function profile($username)
    {
        if(CUser::isLogged()){
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
    }

    /**
     * load the settings page compiled with the user data
     */
    public static function settings(){
        if(CUser::isLogged()){
            $view = new VUser();

            $userId = USession::getInstance()->getSessionElement('user');
            $userAndPropic = FPersistentManager::getInstance()->loadUsersAndImage($userId);    
            $view->settings($userAndPropic);
        }
    }

    /**
     * Take the compiled form and use the data for update the user info (Biography, Working, StudeiedAt, Hobby)
     */
    public static function setUserInfo(){
        if(CUser::isLogged()){
            $userId = USession::getInstance()->getSessionElement('user');
            $user = FPersistentManager::getInstance()->retriveObj(EUser::getEntity(), $userId);

            $user->setBio(UHTTPMethods::post('Bio'));
            $user->setWorking(UHTTPMethods::post('Working'));                                               
            $user->setStudiedAt(UHTTPMethods::post('StudiedAt'));
            $user->setHobby(UHTTPMethods::post('Hobby'));
            FPersistentManager::getInstance()->updateUserInfo($user);

            header('Location: /Agora/User/personalProfile');
        }
    }

    /**
     * Take the compiled form, use the data to check if the username alredy exist and if not update the user Username
     */
    public static function setUsername(){
        if(CUser::isLogged()){
            $userId = USession::getInstance()->getSessionElement('user');
            $user = FPersistentManager::getInstance()->retriveObj(EUser::getEntity(), $userId);
            
            if($user->getUsername() == UHTTPMethods::post('username')){
                header('Location: /Agora/User/personalProfile');
            }else{
                if(FPersistentManager::getInstance()->verifyUserUsername(UHTTPMethods::post('username')) == false)
                {
                    $user->setUsername(UHTTPMethods::post('username'));
                    FPersistentManager::getInstance()->updateUserUsername($user);
                    header('Location: /Agora/User/personalProfile');
                }else{
                    $view = new VUser();
                    $userAndPropic = FPersistentManager::getInstance()->loadUsersAndImage($userId);
                    $view->usernameError($userAndPropic , true);
                }
            }
        }
    }

    /**
     * Take the compiled form and update the user password
     */
    public static function setPassword(){
        if(CUser::isLogged()){
            $userId = USession::getInstance()->getSessionElement('user');
            $user = FPersistentManager::getInstance()->retriveObj(EUser::getEntity(), $userId);$newPass = UHTTPMethods::post('password');
            $user->setPassword($newPass);
            FPersistentManager::getInstance()->updateUserPassword($user);

            header('Location: /Agora/User/personalProfile');
        }
    }

    /**
     * Take the file, check if there is an upload error, if not update the user image and delete the old one 
     */
    public static function setProPic(){
        if(CUser::isLogged()){
            $userId = USession::getInstance()->getSessionElement('user');
            $user = FPersistentManager::getInstance()->retriveObj(EUser::getEntity(), $userId);
            
            if(UHTTPMethods::files('imageFile','size') > 0){
                $uploadedImage = UHTTPMethods::files('imageFile');
                $checkUploadImage = FPersistentManager::getInstance()->uploadImage($uploadedImage);
                if($checkUploadImage == 'UPLOAD_ERROR_OK' || $checkUploadImage == 'TYPE_ERROR' || $checkUploadImage == 'SIZE_ERROR'){
                    $view = new VUser();
                    $userAndPropic = FPersistentManager::getInstance()->loadUsersAndImage($userId);

                    $view->FileError($userAndPropic);
                }else{
                    $idImage = FPersistentManager::getInstance()->uploadObj($checkUploadImage);
                    if($user->getIdImage() != 1){
                        if(FPersistentManager::getInstance()->deleteImage($user->getIdImage())){
                            $user->setIdImage($idImage);
                            FPersistentManager::getInstance()->updateUserIdImage($user);
                        }
                        header('Location: /Agora/User/personalProfile');
                    }else{
                        $user->setIdImage($idImage);
                        FPersistentManager::getInstance()->updateUserIdImage($user);
                    }
                    header('Location: /Agora/User/personalProfile');
                }
            }else{
                header('Location: /Agora/User/settings');
            }
        }
    }

    /**
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

            $view->category($userAndPropic, $postCategory, $arrayVipUserPropicFollowNumb);
        }
    }

    /**
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
}