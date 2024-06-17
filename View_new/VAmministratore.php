<?php
/* IL FILE è ANCORA IN FASE DI ELABORAZIONE, MOLTE RIGHE DI CODICE SONO STATE COPIATE
DAI FILE DI AGORA E FILLSPACEWEB */ 


/**
 * La classe VAmministratore si occupa dell'input-output per la sezione privata dell'amministratore
 */
class VAmministratore
{
    private $smarty;
    /**
     * Funzione che inizializza e configura smarty.
     */
    function __construct ()
    {
        $this->smarty = StartSmarty::configuration();
    }
	/**
	 * Funzione che si occupa di gestire la visualizzazione della form di login
	 * @throws SmartyException
	 */
	public function showFormLogin(){
		if (isset($_POST['login']))
			$this->smarty->assign('email',$_POST['login']);
		$this->smarty->display('loginadmin.tpl');
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione della homepage dopo il login ( se è andato a buon fine)
	 * //@param $array elenco di Anunci da visualizzare
	 * @throws SmartyException
	 */
	public function loginOk() {
		//$this->smarty->assign('immagine', "/FillSpaceWEB/Smarty/immagini/truck.png");
		$this->smarty->assign('userlogged',"loggato");
		//$this->smarty->assign('array', $array);
        //$this->smarty->assign('toSearch', 'trasporti');
		$this->smarty->display('indexadmin.tpl');
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione degli errori in fase login
	 * @throws SmartyException
	 */
	public function loginError() {
		$this->smarty->assign('error',"errore");
		$this->smarty->display('loginadmin.tpl');
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione del profilo admin
	 * @param $user informazioni da visualizzare
	 * //@param $ann elenco di annunci pubblicati dall'utente
	 * //@param $img immagine del medico
	 * @throws SmartyException
	 */
	public function profileCli($user) {
		//list($type,$pic64) = $this->setImage($img, 'user');
		//$this->smarty->assign('type', $type);
		//$this->smarty->assign('pic64', $pic64);
		$this->smarty->assign('userlogged',"loggato");
		$this->smarty->assign('nome',$user->getNome());
		$this->smarty->assign('cognome',$user->getCognome());
		$this->smarty->assign('email',$user->getEmail());
		//$this->smarty->assign('array',$ann);
		$this->smarty->display('profiloadmin.tpl');
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione della form di registrazione dell'admin
	 * @throws SmartyException
	 */
	public function registra_admin() {
		$this->smarty->display('registeradmin.tpl');
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione degli errori nella form di registrazione per l'admin
	 * @param $email tipo di errore derivante dall'email inserita
	 * //@param $img tipo di errore derivante dall'immagine inserita
	 * @param $error tipo di errore da visualizzare nella form
	 * @throws SmartyException
	 */
	public function registrazioneTrasError ($email, $error) {
		if ($email)
			$this->smarty->assign('errorEmail',"errore");
		switch ($error) {
			case "typeimg" :
				$this->smarty->assign('errorType',"errore");
				break;
			case "typeimgM" :
				$this->smarty->assign('errorTypeM',"errore");
				break;
			case "size" :
				$this->smarty->assign('errorSize',"errore");
				break;
			case "sizeM" :
				$this->smarty->assign('errorSizeM',"errore");
				break;
		}
		$this->smarty->display('registeradmin.tpl');
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione della form di modifica per l'admin
	 * @param $user informazioni sull'admin che desidera modificare 
	 * //@param $img immagine del medico
	 * @param $error tipo di errore nel caso in cui le modifiche siano sbagliate
	 * @throws SmartyException
	 */
	public function formmodificacli($user,$error) {
		switch ($error) {
			case "errorEmail" :
				$this->smarty->assign('errorEmail', "errore");
				break;
			case "errorPassw":
				$this->smarty->assign('errorPassw', "errore");
				break;
			case "errorSize" :
				$this->smarty->assign('errorSize', "errore");
				break;
			case "errorType" :
				$this->smarty->assign('errorType', "errore");
				break;
		}
		$this->smarty->assign('userlogged',"loggato");
		//$this->smarty->assign('pic64',$pic64);
		$this->smarty->assign('name',$user->getNome());
		$this->smarty->assign('surname',$user->getCognome());
		$this->smarty->assign('email',$user->getEmail());
		$this->smarty->display('modifica_profilo_admin.tpl');
	}

    /**
     * Restituisce l'email dell'utente da bannare/riattivare dal campo hidden input
     * Inviato con metodo post
     * @return string contenente l'email dell'utente
     */
    function getEmail(){
        $value = null;
        if (isset($_POST['email']))
            $value = $_POST['email'];
        return $value;
    }

    /**
     * Restituisce l'id della recensione da eliminare (proviene dal campo input hidden)
     * Inviato con metodo post
     * @return string contenente l'id della recensione
     */
    function getId(){
        $value = null;
        if (isset($_POST['valore']))
            $value = $_POST['valore'];
        return $value;
    }

	/**
	 * Funzione che permette di visualizzare la pagina home dell'admin (contenente tutti gli utenti della piattaforma),divisi in attivi e bannati.
	 * @param $utentiAttivi array di utenti attivi
	 * @param $utentiBannati array di utenti bannati
	 * @param $img_attivi array di immagini degli utenti attivi
	 * @param $img_bann array di immagini degli utenti bannati
	 * @throws SmartyException
	 */
    public function HomeAdmin($utentiAttivi, $utentiBannati,$img_attivi,$img_bann) {
		list($typeA,$pic64att) = $this->SetImageRecensione($img_attivi);
		if ($typeA == null && $pic64att == null)
			$this->smarty->assign('immagine', "no");
		if (isset($img_attivi)) {
			if (is_array($img_attivi)) {
				$this->smarty->assign('typeA', $typeA);
				$this->smarty->assign('pic64att', $pic64att);
				$this->smarty->assign('n_attivi', count($img_attivi) - 1);
			}
			else {
				$this->smarty->assign('typeA', $typeA);
				$this->smarty->assign('pic64att', $pic64att);
			}
		}
		else
			$this->smarty->assign('n_attivi', 0);
		list($typeB,$pic64ban) = $this->SetImageRecensione($img_bann);
		if ($typeB == null && $pic64ban == null)
			$this->smarty->assign('immagine_1', "no");
		if (isset($img_bann)) {
			if (is_array($img_bann)) {
				$this->smarty->assign('typeB', $typeB);
				$this->smarty->assign('pic64ban', $pic64ban);
				$this->smarty->assign('n_bannati', count($img_bann) - 1);
			}
			else {
				$this->smarty->assign('typeB', $typeB);
				$this->smarty->assign('pic64ban', $pic64ban);
			}
		}
		else
			$this->smarty->assign('n_bannati', 0);
        $this->smarty->assign('utenti',$utentiAttivi);
        $this->smarty->assign('utentiBan',$utentiBannati);
        $this->smarty->display('moderazione_account.tpl');//il file tpl inserito è provvisorio non è stato ancora creato
    }


	/**
	 * Funzione che permette di visualizzare la lista delle recensioni presenti nel database
	 * @param $rec array di recensioni
	 * @param $img array di immagini
	 * @throws SmartyException
	 */
    public function showRevPage($rec,$img){

		list($typeA,$pic64att) = $this->SetImageRecensione($img);
		if ($typeA == null && $pic64att == null)
			$this->smarty->assign('immagine', "no");
		if (isset($img)) {
			if (is_array($img)) {
				$this->smarty->assign('typeA', $typeA);
				$this->smarty->assign('pic64att', $pic64att);
				$this->smarty->assign('n_attivi', count($img) - 1);
			}
			else {
				$this->smarty->assign('typeA', $typeA);
				$this->smarty->assign('pic64att', $pic64att);
			}
		}
        $this->smarty->assign('recensioni',$rec);
        $this->smarty->display('visualizzarecensioni_profiloadmin.tpl');
    }

	







}
