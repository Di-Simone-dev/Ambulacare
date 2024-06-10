<?php

/**
 * Class VPaziente si occupa dell'input-output per funzionalità di filtraggio dei dati
 */
class VUtente
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
		if (isset($_POST['conveyor']))
			$this->smarty->assign('email',$_POST['conveyor']);
		$this->smarty->display('login.tpl');
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione della homepage dopo il login ( se è andato a buon fine)
	 * @param $array elenco di Anunci da visualizzare
	 * @throws SmartyException
	 */
	public function loginOk($array) {
		$this->smarty->assign('immagine', "/FillSpaceWEB/Smarty/immagini/truck.png");
		$this->smarty->assign('userlogged',"loggato");
		$this->smarty->assign('array', $array);
        $this->smarty->assign('toSearch', 'trasporti');
		$this->smarty->display('indexmedico.tpl');
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
	 * @param $ann elenco di annunci pubblicati dall'utente
	 * @param $img immagine dell'utente
	 * @throws SmartyException
	 */
	public function profileCli($user,$ann,$img) {
		list($type,$pic64) = $this->setImage($img, 'user');
		$this->smarty->assign('type', $type);
		$this->smarty->assign('pic64', $pic64);
		$this->smarty->assign('userlogged',"loggato");
		$this->smarty->assign('nome',$user->getName());
		$this->smarty->assign('cognome',$user->getSurname());
		$this->smarty->assign('email',$user->getEmail());
		$this->smarty->assign('array',$ann);
		$this->smarty->display('profilopersonalemedico.tpl');
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione della form di registrazione del paziente
	 * @throws SmartyException
	 */
	public function registra_cliente() {
		$this->smarty->display('registermedico.tpl');
	}


	/**
	 * Funzione che si occupa di gestire la visualizzazione degli errori nella form di registrazione per il paziente
	 * @param $email tipo di errore derivante dall'email inserita
	 * @param $mezzo tipo di errore derivante dall'immagine inserita
	 * @param $error tipo di errore da visualizzare nella form
	 * @throws SmartyException
	 */
	public function registrazioneTrasError ($email, $mezzo, $error) {
		if ($email)
			$this->smarty->assign('errorEmail',"errore");
		if ($mezzo)
			$this->smarty->assign('errorTarga',"errore");
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
		$this->smarty->display('registermedico.tpl');
	}


}