<?php

/**
 * classe sql
 */
class FPersistentManager{

    /**
     * classe singleton
     */

     private static $instance;


     private function __construct(){


     }

     /**
     * Metodo per creare una istanza di PersistentManager
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    //METODI DI BASE PER IL RETRIEVE E L'UPLOAD
    /**
     * returna un oggetto dandone in input la classe e l'id
     * @param string $class è la classe Entity dell'oggetto
     * @param int $id è l'id dell'oggetto
     * @return mixed
     */
    public static function retrieveObj($class, $id){
       
        $foundClass = "F" . substr($class, 1);
        $staticMethod = "getObj";    //il metodo della classe si deve chiamare così

        $result = call_user_func([$foundClass, $staticMethod], $id);

        return $result;
    }    //metodo molto potente, ma serve chiamare tutti i metodi "retrieveObj"

    /**
     * caricamento di un qualsiasi oggetto nel db
     * @param object $obj è l'oggetto da caricare nel db
     * @return mixed
     */
    public static function uploadObj($obj){
        $foundClass = "F" . substr(get_class($obj), 1);
        $staticMethod = "saveObj";  

        $result = call_user_func([$foundClass, $staticMethod], $obj);

        return $result;
    }   //metodo molto potente, ma serve chiamare tutti i metodi "saveObj"

    //-----------------------------METODI RETRIEVE------------------------------


    //PAZIENTE

    /**
     * ritorna un paziente dando come argomento la sua mail (è una credenziale di accesso univoca)
     * @param string $email è la mail del paziente
     */
    public static function retrievepazientefromemail($email)
    {
        $result = FPaziente::getpazientefromemail($email);
        return $result;
    }

    /**
     * ritorna un'array contenente tutti i pazienti della piattaforma (uso dell'admin)
     */
    public static function retrieveallpazienti(){
        $result = FEntityManagerSQL::getInstance()->retrieveall(FPaziente::getTable());
        //var_dump($queryResult);

        return $result;
    }

    /**
     * ritorna un'array contenente tutti gli appuntamenti della di un determinato paziente dando come argomento il suo Id
     * @param int $idUser Refrs to the user who follow
     */
    public static function retrieveappuntamentifrompaziente($IdPaziente){
        //prende gli APPUNTAMENTI di IdPaziente (ottimo per caricare i propri appuntamenti da svolgere)
        $appuntamenti = FEntityManagerSQL::getInstance()->retrieveObj(FAppuntamento::getTable(), 'IdPaziente', $IdPaziente);
        $appuntamentipaziente = array();
        if(count($appuntamenti) > 0){
            for($i = 0; $i < count($appuntamenti); $i++){
                $appuntamenti = FAppuntamento::getObj($appuntamenti[$i]['IdAppuntamento']);
                $appuntamentipaziente[] = $appuntamenti; 
            }
        }
        return $appuntamentipaziente;
    }


    //MEDICO

    /**
     * ritorna un medico dando come argomento la sua mail (è una credenziale di accesso univoca)
     * @param string $email è la mail del medico
     */
    public static function retrievemedicofromemail($email){

        $result = FMedico::getmedicofromemail($email);
        return $result;
    }

    /**
     * ritorna un'array contenente tutti i medici della piattaforma (uso dell'admin)
     */
    public static function retrieveallmedici(){
        $result = FEntityManagerSQL::getInstance()->retrieveall(FMedico::getTable());
        //var_dump($queryResult);
        return $result;
    }

    /**
     * ritorna un'array contenente le propic dei medici contenuti nell'array inserito come argomento
     */
    public static function retrievemedicipropic($arraymedici){
        $mediciProfilePic = array();
        if(count($arraymedici) > 0){
            foreach($arraymedici as $u){
                $proPic = FImmagine::getObj($u->getIdImmagine());  //da ogni medico mi prendo l'id dell'immagine
                //associative array (hash table)
                $mediciProfilePic[$u->getId()] = $proPic;
            }
        }
        return $mediciProfilePic;
    }

    /**
     * $mediciInput è un'array di medici fornito come argomento e ritorniamo un'array contenente il medico con la relativa IdImmagine di propic
     * Method to load Users and their Profile Image
     * @param array | int $userInput 
     */

     //UTILIZZABILE PER LA LOAD DI MEDICI CON LE FOTO PRIFILO?
     public static function retrievemedicieimmagini($mediciInput){
        $result = array();
        if(is_array($mediciInput)){
            foreach($mediciInput as $u){
                $arrayData = array($u, self::retrieveObj(FImmagine::getClass(), $u->getIdImmagine())); 
                $result[] = $arrayData;
            }
        }else{
            $medico = self::retrieveObj(FMedico::getClass(), $mediciInput);
            $arrayData = array($medico, self::retrieveObj(FImmagine::getClass(), $medico->getIdImmagine())); 
            $result[] = $arrayData;
        }
        return $result;
    }

    /**
     * ritorna un'array di medici non bannati della categoria inserita 
     * @param $IdTipologia è il campo della tabella tipologia ed fk nella tabella medico
     */
    public static function retrivemediciattivifromtipologia($IdTipologia)
    {
        $result = FMedico::getMedicinonBannati($IdTipologia);
        return $result;
    }

    
    /**
     * ritorna un'array contenenti tutti i medici della tipologia inserita come argomento (uso dell'admin)
     * @param string $keyword 
     */
    public static function retrievemedicifromtipologia($IdTipologia){
        //ritorna una lista di post con settati gli utenti
        $result = FMedico::getmedicofromtipologia($IdTipologia);

        return $result;
    }

    /**
     * ritorna la valutazione media (data dalle recensioni) di un medico il cui Id è fornito come argomento
     */
    public static function retrieveaveragevalutazione($IdMedico)
    {
        $result = FMedico::getaveragevalutazione($IdMedico);
        //è un po' ridondato ma non fa niente
        return $result;
    }

    /** 
     * ritorna il numero di recensioni di un medico il cui id è fornito come argomento del metodo
    */
    public static function retrievenumerorecensionimedico($IdMedico){
        $result = FRecensione::getnumerorecensionimedico($IdMedico);

        return $result;
    }
    
    /**
     * metodo che ritorna l'agenda (appuntamenti non scaduti) di un medico il cui Id è inserito come argomento
     */

    //MI SERVE UN METODO PER MOSTRARE AL MEDICO GLI APPUNTAMENTI NELLA SUA AGENDA  //DA FINIRE
    public static function retrieveagendamedico($IdMedico){
        //prende gli utenti seguti da $idUser, crea una lista di utenti
        $followRow = FEntityManagerSQL::getInstance()->retrieveObj(FUserFollow::getTable(), 'idFollower', $IdMedico);
        $result = array();
        if(count($followRow) > 0){
            for($i = 0; $i < count($followRow); $i++){
                $user = FUser::getObj($followRow[$i]['idFollowed']);
                $result[] = $user; 
            }
        }
        return $result;
    }

    //AMMINISTRATORE


    /**
     * ritorna un amministratore dandone in input la sua mail (è una credenziale di accesso univoca)
     * @param string $email è la mail del'admin
     */
    public static function retrieveamministratorefromemail($email){

        $result = FAmministratore::getadminbyemail($email);
        return $result;
    }

    /**
     * ritorna un'array contenente tutti gli appuntamenti della piattaforma (uso dell'admin)
     */
    public static function getallappuntamenti(){
        $result = FEntityManagerSQL::getInstance()->retrieveall(FAppuntamento::getTable());
        //var_dump($queryResult);

        return $result;
    }



    //-----------------------------METODI PER LE VERIFICHE------------------------------


    /**
     * verifica se esiste un paziente con la mail data in input
     * @param string $email
     */
    public static function verificaemailpaziente($email){   //CI SERVE QUESTO CONTROLLO PER NON AVERE DUPLICATI
        $result = FPaziente::verify('email', $email);       //possono esserci un medico ed un paziente con la stessa mail

        return $result; //ritorno una booleano
    }

    /**
     * verifica se esiste un medico con la mail in input
     * @param string $email
     */
    public static function verificaemailmedico($email){   //CI SERVE QUESTO CONTROLLO PER NON AVERE DUPLICATI
        $result = FMedico::verify('email', $email);       //possono esserci un medico ed un paziente con la stessa mail

        return $result; //ritorna un booleano
    }

    /**
     * controllo sull'immagine, se non è corretta (formato e dimensione) ritorna errore
     */
    public static function validaimmagine($file){
        if($file['error'] !== UPLOAD_ERR_OK){
            $error = 'UPLOAD_ERROR_OK';

            return [false, $error];
        }

        if(!in_array($file['type'],['image/jpeg', 'image/png', 'image/jpg'])){    //QUESTA PUò ESSERE RITOCCATA
            $error = 'TYPE_ERROR';

            return [false, $error];
        }

        if($file['size'] > 5242880){       //QUESTA è DA DEFINIRE, QUESTO EQUIVALE A 5 MEGABYTE
            $error = 'SIZE_ERROR';

            return [false, $error];
        }

        return [true, null];
    }

//-----------------------------METODI PER L'UPLOAD------------------------------

    /**
     *
     * Metodo generale che applica la validazione dell'immagine e crea l'oggetto immagine per poi metterlo nel db
    */
    public static function caricaimmagine($file){
    $check = self::validaimmagine($file);
    if($check[0]){
        
        //create new Image Obj ad perist it
        $immagine = new EImmagine($file['nome'], $file['dimensione'], $file['tipo'], file_get_contents($file['tmp_name']));
        return $immagine;                                                            //????????????????????????????????
    }else{
        return $check[1];
    }
}


    //PAZIENTE

    /**
     * Metodo per l'aggiornamento dei campi del paziente (residenza e numero di telefono) dando in input l'oggetto paziente
     * @param \EPaziente $paziente
     */
    public static function updateinfopaziente($paziente){
        $field = [['residenza', $paziente->getResidenza()],['numero_telefono', $paziente->getNumerotelefono()]];
        $result = FPaziente::saveObj($paziente, $field);

        return $result;
    }

    /**
     * metodo che aggiorna l'attributo "attivo" di un paziente per bannarlo o sbannarlo dando in input l'oggetto paziente
     * @param \EPaziente $paziente
     */
    public static function aggiornabanpaziente($paziente){
        $field = [['attivo', $paziente->getAttivo()]];
        $result = FMedico::saveObj($paziente, $field);

        return $result;
    }

    /**
     * Metodo per aggiornare la mail di un paziente dando in input l'oggetto paziente
     * @param \EUser $user
     */
    public static function updatemailpaziente($paziente){
        $field = [['email', $paziente->getEmail()]];
        $result = FPaziente::saveObj($paziente, $field);

        return $result;
    }

    /**
     * Metodo per aggiornare la password di un paziente dando in input l'oggetto paziente
     * @param \EUser $user
     */
    public static function updatepasswordpaziente($paziente){
        $field = [['password', $paziente->getPassword()]];
        $result = FPaziente::saveObj($paziente, $field);

        return $result;
    }

    //MEDICO

    /**
     * Metodo per aggiornare costo e propic di un medico dando in input l'oggetto medico
     * @param \EMedico $medico
     */
    //I DATI DA AGGIORNARE DEL MEDICO SONO COSTO ED IMMAGINE
    public static function updateinfomedico($medico){
        $field = [['costo', $medico->getCosto()],['IdImmagine', $medico->getIdImmagine()]];
        $result = FMedico::saveObj($medico, $field);

        return $result;
    }

    /**
     *  metodo che aggiorna l'attributo "attivo" di un medico per bannarlo o sbannarlo dando in input l'oggetto medico
     * @param \EMedico $medico
     */
    public static function aggiornabanmedico($medico){
        $field = [['attivo', $medico->getAttivo()]];
        $result = FMedico::saveObj($medico, $field);

        return $result;
    }

    /**
     * Metodo per aggiornare la mail di un medico dando in input l'oggetto medico
     * @param \EMedico $medico
     */
    public static function updatemailmedico($medico){
        $field = [['email', $medico->getEmail()]];
        $result = FMedico::saveObj($medico, $field);

        return $result;
    }

    /**
     * metodo per aggiornare la password di un medico dando in input l'oggetto medico
     * @param \EMedico $medico
     */
    public static function updatepasswordmedico($medico){
        $field = [['password', $medico->getPassword()]];
        $result = FMedico::saveObj($medico, $field);

        return $result;
    }

    /**
     * Metodo per aggiornare sul db il campo IdImmagine dando in pasto l'oggetto medico
     * @param \EMedico $medico
     */
    //PER AGGIORNARE LE PROPIC DI MEDICI 
    public static function updatemedicopropic($medico){
        $field = [['IdImmagine', $medico->getIdImmagine()]];    //NON è DETTO CHE FUNZIONI anche in entity è settato bene
        $result = FMedico::saveObj($medico, $field);            //risulta necessario che nell'oggetto venga messa la fk con l'id
                                                                //
        return $result;
    }

    /**
     * Metodo che salva l'immagine nel db e come propic del medico (INSIEME)
     * @param \EImmagine $immagine l'oggetto dell'immagine della propic
     * @param \EMedico $medico l'oggetto medico a cui settiamo la propic
     * @return boolean
     */
    public static function caricaimmaginemedico(EImmagine $immagine, EMedico $medico){

        $medico->setIdImmagine($immagine);

        $uploadImmagine = FImmagine::saveObj($immagine);
        //devo mettere un array in cui il primo elemento è "IdImmagine", mentre il secondo elemento è l'id dell'immagine
        $fieldarray=array();
        $fieldarray[0] = "IdImmagine";
        $fieldarray[1] = $immagine->getIdImmagine(); 
        $updatemedico =FMedico::saveObj($medico,$fieldarray);  //dovrebbe funzionare

        if($uploadImmagine){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Metodo per aggiornare sul db il campo IdImmagine dando in pasto l'oggetto referto
     * @param \EReferto $referto 
     */
    //PER AGGIORNARE LE IMMAGINI DEI REFERTI
    public static function updateimmaginereferto($referto){
        $field = [['IdImmagine', $referto->getIdImmagine()]];  //NON è DETTO CHE FUNZIONI
        $result = FReferto::saveObj($referto, $field);   //DA FIXARE L'UPDATE DEL REFERTO IN FREFERTO

        return $result;
    }


    /**
     * Metodo che salva l'immagine nel db e come contenuto del referto (INSIEME)
     * @param \EImmagine $immagine l'oggetto immagine da mettere nel referto 
     * @param \EReferto $referto l'oggetto referto a cui vogliamo associare l'immagine
     * @return boolean
     */
    public static function caricaimmaginereferto(EImmagine $immagine, EReferto $referto){

        $referto->setIdImmagine($immagine);

        $uploadImage = FImmagine::saveObj($immagine);
        //devo mettere un array in cui il primo elemento è "IdImmagine", mentre il secondo elemento è l'id dell'immagine
        $fieldarray=array();
        $fieldarray[0] = "IdImmagine";
        $fieldarray[1] = $immagine->getIdImmagine(); 
        $updatemedico =FReferto::saveObj($referto,$fieldarray);  //dovrebbe funzionare ok no
        //DEVO METTERE LA POSSIBILITà DI MODIFICA DI UN REFERTO   OPPURE NO 
        if($uploadImage){
            return true;
        }else{
            return false;
        }
    }



        //DA FARE SE NECESSARIO
    /**
     * Method to update a Cooment that have changed the ban attribute 
     * @param \EComment $comment
     */
    public static function updateCommentBan($comment){
        $field = [['removed', $comment->isBanned()]];           //SERVE UN MECCANISMO SIMILE PER LE RECENSIONI
        $result = FComment::saveObj($comment, $field);

        return $result;

    }

//-----------------------------METODI PER LE CANCELLAZIONI------------------------------

    //MEDICO

    /**
     * metodo che controlla se la fascia oraria è stata occupata da un appuntamento, altrimenti la rimuove, dando in input il suo id
     * @param int $idFasciaOraria è L'id della fascia oraria che vogliamo liberare
     */
    public static function liberafasciaoraria($IdFasciaOraria){ //pensiamo ad un cambio di disponibilità

        $existappuntamento = FEntityManagerSQL::existInDb(FAppuntamento::getappuntamentofromfasciaoraria($IdFasciaOraria));
        //$existappuntamento ritorna un booleano, quindi true se l'appuntamento esiste
        if(!$existappuntamento){  //se NON esiste l'appuntamento, allora possiamo liberare (cancellare) la fascia oraria 
            $result = FFasciaOraria::eliminaFasciaOraria($IdFasciaOraria);
            return $result;
        }
        else {
            return false; //QUI NON LA ELIMINIAMO NEL CASO DI appuntamento PRESENTE
        }
        //return $result;
        
    }

    /**
     * Metodo che cancella una recensione dando in input il suo id
     * @param int $IdRecensione l'id della recensione da eliminare
     */
    public static function cancellaRecensione($IdRecensione){
        //NON DOVREBBERO SERVIRE CONTROLLI QUI
        $result = FRecensione::eliminaRecensione($IdRecensione);

        return $result;
    }


    /**
     * Metodo per cancellare un'immagine dal db dando il suo id
     * @param int $IdImmagine è l'id dell'immagine da cancellare
     */
    public static function cancellaImmagine($IdImmagine){   //fare questa cancellazione toglie anche l'immagine come propic o nel referto
        $result = FImmagine::eliminaimmagine($IdImmagine);
        //tanto abbiamo l'effetto cascade per toglierla da referto o medico
        return $result;
    }
    


//---------------------------------------------------USER PAGE-----------------------------------------------------------------
//-----------------------CATEGORY PAGE----------------------------------------------

    /*
     * return all post that are not banned finded on a specific category
     * @param string $category Refers to the category serched
     */
    /*
    public static function loadPostPerCategory($category)
    {
        $field = 'category';
        $categoryPagePost = FPost::getSearched($field, $category);

        usort($categoryPagePost,  ['FPost', 'comparePostsByCreationTime']);

        $categoryPagePostsAndUserPropic = array();
        foreach($categoryPagePost as $p){
            $arrayData = array($p, self::retrieveObj(FImage::getClass(), $p->getUser()->getIdImage()));
            $categoryPagePostsAndUserPropic[] = $arrayData;
        }

        return $categoryPagePostsAndUserPropic;
    }
    */

    /*
     * Method to load the post of a visited user
     * @param int $idPost Refers to the visited User
     */
    /*
    public static function loadPostInVisited($idPost){
        $result = FPost::postInVisited($idPost);

        return $result;
    }
    */

    
    /*
     * Method to load Posts and their like number
     * @param array $postArray Refers to an array of Posts
     */
    /*
    public static function loadPostsAndLikes($postArray){   
        $result = array();
            foreach($postArray as $p){
                $arrayData = array($p, self::getLikeNumber($p->getId()));
                $result[] = $arrayData;
            }
        return $result;
    }
    */

    /*
     * Method to load in an array the number of like, number of follower and number of followed
     * @param \EPost $post 
     */
    /*
    public static function loadFollLikeNumb($post){
        $likeNumb = self::getLikeNumber($post->getId());
        $followerNumb = self::getFollowerNumb($post->getUser()->getId());
        $followedNumb = self::getFollowedNumb($post->getUser()->getId());

        $result = array($likeNumb, $followerNumb, $followedNumb);

        return $result;
    }*/

    /*
     * Method to return COmments and their user Propic
     * @param int $idPost
     */

     //RISULTA NECESSARIO UN METODO CHE RITORNI LE RECENSIONI DI UN DETERMINATO MEDICO 
     /*
    public static function loadCommentsAndUsersPic($idPost){
        $comments = self::getCommentList($idPost);
        $result = array();

        foreach($comments as $c){
            $arrayData = array($c, self::retriveObj(FImage::getClass(), $c->getUser()->getIdImage()));
            $result[] = $arrayData;
        }
        return $result;
    }*/

    /*
     * Method to load likes of a Post and their users Propic
     * @param int $idPost
     */
    /*
    public static function getLikesPage($idPost){
        $user = self::getLikesUserOfAPost($idPost);
        return self::loadUsersAndImage($user);
    }*/

    /*
     * Method to return a Post(Proxy) with the User setted
     * @param int $idPost
     */
    /*
    public static function getPostAndUser($idPost){

        $queryResult = FEntityManagerSQL::getInstance()->retriveObj(FPost::getTable(), FPost::getKey(), $idPost);

        $post = FPost::getPostWithUser($queryResult);

        return $post;

    }*/

//----------------------------------------------------IMAGE VALIDATION------------------------------------------------------------------------

/*
public static function manageImages($uploadedImages, $post, $idUser){
    foreach($uploadedImages['tmp_name'] as $index => $tmpName){
        $file = [
        'name' => $uploadedImages['name'][$index],
        'type' => $uploadedImages['type'][$index],
        'size' => $uploadedImages['size'][$index],
        'tmp_name' => $tmpName,
        'error' => $uploadedImages['error'][$index]
    ];

        //check if the uploaded image is ok 
        $checkUploadImage = self::uploadImage($file);
        if($checkUploadImage == 'UPLOAD_ERROR_OK' || $checkUploadImage == 'TYPE_ERROR' || $checkUploadImage == 'SIZE_ERROR'){
            self::deletePost($post->getId(), $idUser);
            break;
        }else{
            $checkUploadImage = self::uploadImagePost($checkUploadImage, $post);
        }
    }
    return $checkUploadImage;
} */



    
}