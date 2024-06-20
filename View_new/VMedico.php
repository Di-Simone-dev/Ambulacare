<?php

require_once __DIR__."/../Pages/smarty_class.php";
/* IL FILE è ANCORA IN FASE DI ELABORAZIONE, MOLTE RIGHE DI CODICE SONO STATE COPIATE
DAI FILE DI AGORA E FILLSPACEWEB */ 


/**
 * Class VMedico si occupa dell'input-output per funzionalità di filtraggio dei dati
 */
class VMedico
{
	/**
	 * @var Smarty
	 */
	private $smarty;

	/**
	 * Funzione che inizializza e configura smarty.
	 */
	public function __construct() {
		$this->smarty = Smarty_class::startSmarty();
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione della form di login
	 * @throws SmartyException
	 */
	public function showFormLogin(){
		if (isset($_POST['login']))
			$this->smarty->assign('email',$_POST['login']);
		$this->smarty->display('loginmedico.tpl');
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione della homepage dopo il login ( se è andato a buon fine)
	 * //@param $array elenco di Anunci da visualizzare
	 * @throws SmartyException
	 */
	public function loginOk() {
		//$this->smarty->assign('immagine', "/FillSpaceWEB/Smarty/immagini/truck.png");
		//$this->smarty->assign('userlogged',"loggato");
		//$this->smarty->assign('array', $array);
        //$this->smarty->assign('toSearch', 'trasporti');
		$this->smarty->display('index_medico.tpl');
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione degli errori in fase login
	 * @throws SmartyException
	 */
	public function loginError() {
		$this->smarty->assign('error',"errore");
		$this->smarty->display('loginmedico.tpl');
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione del profilo medico
	 * @param $user informazioni da visualizzare
	 * @param $img immagine del medico
	 * @throws SmartyException
	 */
	public function profileCli($user,$img) {
		list($type,$pic64) = $this->setImage($img, 'user');
		$this->smarty->assign('type', $type);
		$this->smarty->assign('pic64', $pic64);
		//$this->smarty->assign('userlogged',"loggato");
		$this->smarty->assign('nome',$user->getNome());
		$this->smarty->assign('cognome',$user->getCognome());
		$this->smarty->assign('email',$user->getEmail());
		$this->smarty->assign('costo',$user->getCosto());
		//$this->smarty->assign('array',$ann);
		$this->smarty->display('profilomedico.tpl');
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione della form di registrazione del medico
	 * @throws SmartyException
	 */
	public function registra_medico() {
		$this->smarty->display('registermedico.tpl');
	}


	/**
	 * Funzione che si occupa di gestire la visualizzazione degli errori nella form di registrazione per il medico
	 * @param $email tipo di errore derivante dall'email inserita
	 * @param $img tipo di errore derivante dall'immagine inserita
	 * @param $error tipo di errore da visualizzare nella form
	 * @throws SmartyException
	 */
	public function registrazioneTrasError ($email, $img, $error) {
		if ($email)
			$this->smarty->assign('errorEmail',"errore");
		if ($img)
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
			$data = file_get_contents( $_SERVER['DOCUMENT_ROOT'] . '/Ambulacare/View/images/gallery/immagine.jpg');
			$pic64= base64_encode($data);
			$type = "image/jpg";
		}
		else {
            $data = file_get_contents( $_SERVER['DOCUMENT_ROOT'] . '/Ambulacare/View/images/gallery/immagine.jpg');
            $pic64= base64_encode($data);
            $type = "image/jpg";
        }
		return array($type, $pic64);
	}
	/**
	 * Funzione che si occupa di gestire la visualizzazione della form di modifica per il medico
	 * @param $user informazioni sul medico che desidera modificare i suoi dati
	 * @param $img immagine del medico
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
			$data = file_get_contents( $_SERVER['DOCUMENT_ROOT'] . '/Ambulacare/View/images/gallery/immagine.jpg');
			$pic64 = base64_encode($data);
		}
		//$this->smarty->assign('userlogged',"loggato");
		$this->smarty->assign('pic64',$pic64);
		$this->smarty->assign('nome',$user->getNome());
		$this->smarty->assign('cognome',$user->getCognome());
		$this->smarty->assign('email',$user->getEmail());
		$this->smarty->assign('costo',$user->getCosto());
		$this->smarty->display('modifica_profilo_medico.tpl');
	}
	/**
	 * Funzione che si occupa di gestire il login in caso di ban del medico
     * @throws SmartyException
     */
    public function loginBan() {
        //$this->smarty->assign('error',false);
        $this->smarty->assign('attivo',0);
        //$this->smarty->assign('regErr',false);
        $this->smarty->display('loginmedico.tpl');
    }
	/**
	 * Funzione che si occupa di gestire la visualizzazione della form di modifica della password per il medico
	 * @param $passw password da modificare
	 * @param $error tipo di errore nel caso in cui le modifiche siano sbagliate
	 * @throws SmartyException
	 */
	public function formmodificapassw($passw,$error) {
		switch ($error) {
			case "errorEmail" :
				$this->smarty->assign('errorEmail', "errore");
				break;
			case "errorPassw":
				$this->smarty->assign('errorPassw', "errore");
				break;
		}
		$this->smarty->assign('password',$passw->getPassword());
		$this->smarty->display('modifica_password_medico.tpl');
	}
	/**
	 * Funzione che permette di visualizzare lo storico degli esami svolti dal medico (serve per gestione referti)
	 * @param $app array di appuntamenti
	 * @throws SmartyException
	 */
	public function showStoricoEsamiReferto($app){
        $this->smarty->assign('esami',$app);
        $this->smarty->display('visualizzastoricoesami_medico.tpl');
    }
	/**
	 * Funzione che permette di visualizzare la pagina per caricare un referto
	 * @param $app un appuntamento
	 * @throws SmartyException
	 */
	public function CaricaReferto($app){
        $this->smarty->assign('esame',$app);
        $this->smarty->display('inseriscireferto.tpl');
    }
	/**
	 * Funzione che permette di visualizzare l'agenda degli appuntamenti
	 * @param $app array di appuntamenti
	 * @throws SmartyException
	 */
	public function ShowAgenda($app){
        $this->smarty->assign('appuntamenti',$app);
        $this->smarty->display('visualizzaagenda_medico.tpl');
    }
	/**
	 * Funzione che permette di visualizzare la pagina per la modifica dell'appuntamento di un paziente
	 * @param $app un appuntamento
	 * @throws SmartyException
	 */
	public function ModificaAppuntamento($app, $fasceorarie, $maxdim){
        $this->smarty->assign('esame',$app);
		$this->smarty->assign('fasceorarie',$fasceorarie);
		$this->smarty->assign('maxdim',$maxdim);
        $this->smarty->display('modificaappuntamento_medicomedico.tpl');
    }
	/**
	 * Funzione che permette di visualizzare la pagina per il caricamento di orari per appuntamenti
	 * @throws SmartyException
	 */
	public function ShowPageOrari($fasceorarie){
        $this->smarty->assign('fasceorarie',$fasceorarie);
        $this->smarty->display('inseriscislotorario_medico.tpl');
    }
	/**
	 * Funzione che permette di visualizzare la pagina per l'inserimento dei dati per la visualizzazione delle statistiche
	 * @throws SmartyException
	 */
	public function ShowDataStatistiche(){
        //$this->smarty->assign('appuntamento',$app);
        $this->smarty->display('datastats_medico.tpl');
    }
	/**
	 * Funzione che permette di visualizzare la pagina per le statistiche del medico
	 * @param $stat array di statistiche
	 * @throws SmartyException
	 */
	public function ShowStatistiche($stat, $datainizio, $datafine, $guadagno){
        $this->smarty->assign('statistiche',$stat);
		$this->smarty->assign('data1',$datainizio);
		$this->smarty->assign('data2',$datafine);
		$this->smarty->assign('guadagno',$guadagno);
        $this->smarty->display('visualizzastats_medico.tpl');
    }
	/**
	 * Funzione che permette di visualizzare la lista dei pazienti presenti nel database
	 * @param $paz array di pazienti
	 * @throws SmartyException
	 */
	public function showPazPage($esami){
        $this->smarty->assign('esami',$esami);
        $this->smarty->display('visualizzastoricoesami_medico.tpl');
    }
	/**
	 * Funzione che permette di visualizzare lo storico degli esami di un paziente
	 * @param $app array di appuntamenti
	 * @throws SmartyException
	 */
	public function showStoricoEsami($paziente,$app){
        $this->smarty->assign('esami',$app);
		$this->smarty->assign('paziente', $paziente);
        $this->smarty->display('visualizzastoricoesamipaz_medico.tpl');
    }
	/**
	 * Funzione che permette di visualizzare la lista delle recensioni presenti nel database
	 * @param $rec array di recensioni
	 * @throws SmartyException
	 */
    public function showRevPage($rec){
        $this->smarty->assign('recensioni',$rec);
        $this->smarty->display('visualizzarecensioni_medico.tpl');
    }
	/**
	 * Funzione che permette di visualizzare la pagina per rispondere ad una recensione
	 * @param $rec una recensione
	 * @throws SmartyException
	 */
    public function RispostaRecensione($rec){
        $this->smarty->assign('recensioni',$rec);
        $this->smarty->display('rispostarecensione_profilomedico.tpl'); //ancora implementata
    }

}