<?php

/**
 * Class VMedico si occupa dell'input-output per funzionalità di filtraggio dei dati
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
	 * Funzione che si occupa di gestire la visualizzazione del profilo medico
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
	 * Funzione che si occupa di gestire la visualizzazione della form di registrazione del medico
	 * @throws SmartyException
	 */
	public function registra_cliente() {
		$this->smarty->display('registermedico.tpl');
	}


	/**
	 * Funzione che si occupa di gestire la visualizzazione degli errori nella form di registrazione per il medico
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


	/**
	 * Funzione che si occupa del supporto per le immagini
	 * @param $image immagine da analizzare
	 * @param $tipo variabile che indirizza al tipo di file di default da settare nel caso in cui $image = null
	 * @return array contenente informazioni sul tipo e i dati che costituiscono un immagine (possono essere anche degli array)
	 */
	public function setImage($image, $tipo) {
		if (isset($image)) {
			$pic64 = base64_encode($image->getData());
			$type = $image->getType();
		}
		elseif ($tipo == 'user') {
			$data = file_get_contents( $_SERVER['DOCUMENT_ROOT'] . '/FillSpaceWEB/Smarty/immagini/user.png');
			$pic64= base64_encode($data);
			$type = "image/png";
		}
		else {
            $data = file_get_contents( $_SERVER['DOCUMENT_ROOT'] . '/FillSpaceWEB/Smarty/immagini/truck2.png');
            $pic64= base64_encode($data);
            $type = "image/png";
        }
		return array($type, $pic64);
	}

	/**
	 * Funzione di supporto per gestire le immagini presenti nell'elenco delle recensioni
	 * @param $imgrec elenco di immagini degli utenti presenti nelle recensioni
	 * @return array
	 */

	public function SetImageRecensione ($imgrec) {
		$type = null;
		$pic64 = null;
		if (is_array($imgrec)) {
			foreach ($imgrec as $item) {
				if (isset($item)) {
					$pic64[] = base64_encode($item->getData());
					$type[] = $item->getType();
				} else {
					$data = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/FillSpaceWEB/Smarty/immagini/user.png');
					$pic64[] = base64_encode($data);
					$type[] = "image/png";
				}
			}
		}
		elseif (isset($imgrec)) {
			$pic64 = base64_encode($imgrec->getData());
			$type = $imgrec->getType();
		}
		return array($type, $pic64);
	}


	/**
	 * Funzione che si occupa di gestire la visualizzazione del profilo pubblico di un medico
	 * @param $user informazioni sull'utente da visitare
	 * @param $img immagine dell'utente da visitare
	 * @param $cont possibilità di contattare o meno il cliente
	 * @throws SmartyException
	 */
	public function profilopubblico_cli($user,$img,$cont) {
		list($type,$pic64) = $this->setImage($img, 'user');
		$this->smarty->assign('type', $type);
		$this->smarty->assign('pic64', $pic64);
		if ($cont == "no")
			$this->smarty->assign('contatta', $cont);
        if(CUtente::isLogged())
            $this->smarty->assign('userlogged',"loggato");
		$this->smarty->assign('nome',$user->getName());
		$this->smarty->assign('cognome',$user->getSurname());
		$this->smarty->assign('email',$user->getEmail());
		$this->smarty->display('profilo_cliente_pubblico.tpl');
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione della form di modifica per il medico
	 * @param $user informazioni sull'utente che desidera mdificare i suoi dati
	 * @param $img immagine dell'utente
	 * @param $error tipo di errore nel caso in cui le modifiche siano sbagliate
	 * @throws SmartyException
	 */
	public function formmodificacli($user,$img,$error) {
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
		if (isset($img)) {
			$pic64 = base64_encode($img->getData());
		}
		else {
			$data = file_get_contents( $_SERVER['DOCUMENT_ROOT'] . '/FillSpaceWEB/Smarty/immagini/user.png');
			$pic64 = base64_encode($data);
		}
		$this->smarty->assign('userlogged',"loggato");
		$this->smarty->assign('pic64',$pic64);
		$this->smarty->assign('name',$user->getName());
		$this->smarty->assign('surname',$user->getSurname());
		$this->smarty->assign('email',$user->getEmail());
		$this->smarty->assign('name',$user->getName());
		$this->smarty->display('modifica_prof_cliente.tpl');
	}


}