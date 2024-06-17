<?php
/* IL FILE è ANCORA IN FASE DI ELABORAZIONE, MOLTE RIGHE DI CODICE SONO STATE COPIATE
DAI FILE DI AGORA E FILLSPACEWEB */ 


/**
 * Class VPaziente si occupa dell'input-output per funzionalità di filtraggio dei dati
 */
class VPaziente
{
	/**
	 * @var Smarty
	 */
	private $smarty;

	/**
	 * Funzione che inizializza e configura smarty.
	 */
	public function __construct() {
		$this->smarty = StartSmarty::configuration();
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione della form di login
	 * @throws SmartyException
	 */
	public function showFormLogin(){
		if (isset($_POST['login']))
			$this->smarty->assign('email',$_POST['login']);
		$this->smarty->display('login.tpl');
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione della homepage dopo il login ( se è andato a buon fine)
	 * //@param $array elenco di Anunci da visualizzare
	 * @throws SmartyException
	 */
	public function loginOk() {
		$this->smarty->assign('userlogged',"loggato");
		//$this->smarty->assign('array', $array);
        //$this->smarty->assign('toSearch', 'trasporti');
		$this->smarty->display('indexpaziente.tpl');
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione degli errori in fase login
	 * @throws SmartyException
	 */
	public function loginError() {
		$this->smarty->assign('error',"errore");
		$this->smarty->display('login.tpl');
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione del profilo paziente
	 * @param $user informazioni da visualizzare
	 * //@param $ann elenco di annunci pubblicati dall'utente
	 * //@param $img immagine dell'utente
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
		$this->smarty->display('profilopaziente.tpl');
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione della form di registrazione del paziente
	 * @throws SmartyException
	 */
	public function registra_paziente() {
		$this->smarty->display('registerpaziente.tpl');
	}


	/**
	 * Funzione che si occupa di gestire la visualizzazione degli errori nella form di registrazione per il paziente
	 * @param $email tipo di errore derivante dall'email inserita
	 * //@param $mezzo tipo di errore derivante dall'immagine inserita
	 * @param $error tipo di errore da visualizzare nella form
	 * @throws SmartyException
	 */
	public function registrazioneTrasError ($email,$error) {
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
		$this->smarty->display('registerpaziente.tpl');
	}
	/**
	 * Funzione che si occupa di gestire la visualizzazione della form di modifica per il paziente
	 * @param $user informazioni sul paziente che desidera modificare i suoi dati
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
		$this->smarty->display('modifica_profilo_paziente.tpl');
	}


}