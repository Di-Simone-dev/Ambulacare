<?php
require_once __DIR__."/../Pages/smarty_class.php";
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
		$this->smarty = smarty_class::startSmarty();
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione della form di login
	 * @throws SmartyException
	 */
	public function showFormLogin($error = false){
		if ($error)
			$this->smarty->assign('error',$error);
		$this->smarty->display('login_paziente.tpl');
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione della homepage dopo il login ( se è andato a buon fine)
	 * @throws SmartyException
	 */
	public function loginOk() {
		$this->smarty->display('index_paziente.tpl');
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
	 * Funzione che si occupa di gestire il login in caso di ban del paziente
     * @throws SmartyException
     */
    public function loginBan() {
        //$this->smarty->assign('error',false);
        $this->smarty->assign('error',"le credenziali inserite sono associate a un account bannato, contatta l'amministratore");
        //$this->smarty->assign('regErr',false);
        $this->smarty->display('login.tpl');
    }
	/**
	 * Funzione che si occupa di gestire la visualizzazione del profilo paziente
	 * @param $user informazioni da visualizzare
	 * @throws SmartyException
	 */
	public function profileCli($user) {
		//list($type,$pic64) = $this->setImage($img, 'user');
		//$this->smarty->assign('type', $type);
		//$this->smarty->assign('pic64', $pic64);
		//$this->smarty->assign('userlogged',"loggato");
		$this->smarty->assign('nome',$user->getNome());
		$this->smarty->assign('cognome',$user->getCognome());
		$this->smarty->assign('email',$user->getEmail());
		$this->smarty->assign('codice_fiscale',$user->getCodiceFiscale());
		$this->smarty->assign('data_nascita',$user->getDataNascita());
		$this->smarty->assign('luogo_nascita',$user->getLuogoNascita());
		$this->smarty->assign('residenza',$user->getResidenza());
		$this->smarty->assign('numero_telefono',$user->getNumeroTelefono());
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
	 * @param $error tipo di errore da visualizzare nella form
	 * @throws SmartyException
	 */
	public function registrazioneTrasError ($email,$error) {
		if ($email)
			//$this->smarty->assign('errorEmail',"errore");
		switch ($error) {
			case "errorEmail" :
				$this->smarty->assign('errorEmail',"errore");
				break;
			case "errorPassw":
				$this->smarty->assign('errorPassw', "errore");
				break;
		}
		$this->smarty->display('registerpaziente.tpl');
	}
	/**
	 * Funzione che si occupa di gestire la visualizzazione della form di modifica per il paziente
	 * @param $user informazioni sul paziente che desidera modificare i suoi dati
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
		}
		//$this->smarty->assign('userlogged',"loggato");
		//$this->smarty->assign('pic64',$pic64);
		$this->smarty->assign('nome',$user->getNome());
		$this->smarty->assign('cognome',$user->getCognome());
		$this->smarty->assign('email',$user->getEmail());
		$this->smarty->assign('codice_fiscale',$user->getCodiceFiscale());
		$this->smarty->assign('data_nascita',$user->getDataNascita());
		$this->smarty->assign('luogo_nascita',$user->getLuogoNascita());
		$this->smarty->assign('residenza',$user->getResidenza());
		$this->smarty->assign('numero_telefono',$user->getNumeroTelefono());
		$this->smarty->display('modifica_profilo_paziente.tpl');
	}
	/**
	 * Funzione che si occupa di gestire la visualizzazione della form di modifica della password per il paziente
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
		$this->smarty->display('modifica_password_paziente.tpl');
	}
	/**
	 * Funzione che permette di visualizzare la pagina per l'elenco di esami disponibili alla prenotazione
	 * @param $app array di appuntamenti
	 * @throws SmartyException
	 */
	public function showEsamiDisponibiliPrenotazione($app){
        $this->smarty->assign('esami',$app);
        $this->smarty->display('visualizzaesami_paziente.tpl');
    }
	/**
	 * Funzione che permette di visualizzare la pagina per la prenotazione di un esame
	 * @param $app un appuntamento
	 * @param $foraria array di fasce orarie
	 * @param $maxdim dimensione massima array fasce orarie
	 * @throws SmartyException
	 */
	public function PrenotaEsame($medico,$foraria,$giorno, $week=null){
        $this->smarty->assign('medico',$medico);
		$this->smarty->assign('fasceorarie',$foraria);
		$this->smarty->assign('giorno',$giorno);
		$this->smarty->assign('week',$week);
        $this->smarty->display('prenotaappuntamento_paziente.tpl');
    }
	/**
	 * Funzione che permette di visualizzare gli esami prenotati dal paziente
	 * @param $app array di appuntamenti
	 * @param $categorie array di categorie
	 * @throws SmartyException
	 */
	public function ShowAppuntamentiPrenotati($app,$tipologie){
        $this->smarty->assign('esami',$app);
		$this->smarty->assign('tipologie',$tipologie);
        $this->smarty->display('visualizzaappuntamentiprenotati_paziente.tpl');
    }
	/**
	 * Funzione che permette di visualizzare la pagina per la modifica dell'appuntamento di un paziente
	 * @param $app un appuntamento
	 * @throws SmartyException
	 */
	public function ModificaAppuntamento($medico,$foraria,$giorno){
        $this->smarty->assign('medico',$medico);
		$this->smarty->assign('fasceorarie',$foraria);
		$this->smarty->assign('giorno',$giorno);
        $this->smarty->display('modificaappuntamento_paziente.tpl');
    }
	/**
	 * Funzione che permette di visualizzare lo storico degli esami di un paziente
	 * @param $app array di appuntamenti
	 * @param $categorie array di categorie
	 * @throws SmartyException
	 */
	public function showStoricoEsami($app, $categorie){
        $this->smarty->assign('esami',$app);
		$this->smarty->assign('tipologie',$categorie);
        $this->smarty->display('visualizzastoricoesami_paziente.tpl');
    }
	/**
	 * Funzione che permette di visualizzare la pagina per inserire una recensione
	 * @param $app un appuntamento
	 * @throws SmartyException
	 */
    public function Recensione($medico){
        $this->smarty->assign('medico',$medico);
        $this->smarty->display('inseriscirecensione_paziente.tpl');
    }

	public function showEsami($tipologie, $medici, $Idtipologia = false){
		$this->smarty->assign('tipologie', $tipologie);
		$this->smarty->assign('medici',$medici);
		$this->smarty->assign('Idtipologia',$Idtipologia);
		$this->smarty->display('visualizzaappuntamenti_prenotazione_paziente.tpl');
	}

	public function riepilogoAppuntamento(){

		$this->smarty->display('riepologoappuntamento_paziente.tpl');
	}


	public function messaggio($messaggio){
		$this->smarty->assign('messaggio',$messaggio);
		$this->smarty->display('messaggio_paziente.tpl');
	}

}