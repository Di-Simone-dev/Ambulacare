<?php
require_once __DIR__."/../Pages/smarty_class.php";
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
	 * visualizza la home page del medico
	 */
	public function Home(){
		$this->smarty->display('index_paziente.tpl');
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione della form di login
	 * @param $email email
	 * @param $error eventuale errore
	 * @throws SmartyException
	 */
	public function showFormLogin($email = false, $error = false){
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
	 * Funzione che si occupa di gestire il login in caso di ban del paziente
     * @throws SmartyException
     */
    public function loginBan() {
        $this->smarty->assign('error',"le credenziali inserite sono associate a un account bannato, contatta l'amministratore");
        $this->smarty->display('login_paziente.tpl');
    }
	/**
	 * Funzione che si occupa di gestire la visualizzazione del profilo paziente
	 * @param $user informazioni da visualizzare
	 * @throws SmartyException
	 */
	public function profileCli($user) {
		$this->smarty->assign('paziente',$user);
		$this->smarty->display('profilo_paziente.tpl');
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione della form di registrazione del paziente
	 * @throws SmartyException
	 */
	public function registra_paziente() {
		$this->smarty->display('register_paziente.tpl');
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
		$this->smarty->display('register_paziente.tpl');
	}
	/**
	 * Funzione che si occupa di gestire la visualizzazione della form di modifica dei dati per il paziente
	 * @param $paziente paziente
	 * @throws SmartyException
	 */
	public function formmodificacli($paziente) {
		$this->smarty->assign('paziente',$paziente);
		$this->smarty->display('modificadati_paziente.tpl');
	}
	/**
	 * Funzione che si occupa di gestire la visualizzazione della form di modifica della mail per il paziente
	 * @param $error tipo di errore nel caso in cui le modifiche siano sbagliate
	 * @throws SmartyException
	 */
	public function formmodificaemail($error = false) {
		if($error) $this->smarty->assign('error',$error);
		$this->smarty->display('modificamail_paziente.tpl');
	}
	/**
	 * Funzione che si occupa di gestire la visualizzazione della form di reimpostazione della password per il paziente
	 * @param $error tipo di errore nel caso in cui le modifiche siano sbagliate
	 * @throws SmartyException
	 */
	public function formmodificapassw($error = false) {
		if($error) $this->smarty->assign('error',$error);
		$this->smarty->display('reimppassword_paziente.tpl');
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
	 * Funzione che permette di visualizzare la pagina per la prenotazione di un appuntamento
	 * @param $app un appuntamento
	 * @param $foraria array di fasce orarie
	 * @param $maxdim dimensione massima array fasce orarie
	 * @param $week settimana
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
	 * @param $categorie array di tipologie
	 * @throws SmartyException
	 */
	public function ShowAppuntamentiPrenotati($app,$tipologie){
        $this->smarty->assign('esami',$app);
		$this->smarty->assign('tipologie',$tipologie);
        $this->smarty->display('visualizzaappuntamentiprenotati_paziente.tpl');
    }
	/**
	 * Funzione che permette di visualizzare la pagina per la modifica dell'appuntamento di un paziente
	 * @param $medico medico
	 * @param $foraria fascia oraria appuntamento
	 * @param $giorno giorno appuntamento
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
	 * @param $categorie array di tipologie
	 * @throws SmartyException
	 */
	public function showStoricoEsami($app, $categorie){
        $this->smarty->assign('esami',$app);
		$this->smarty->assign('tipologie',$categorie);
        $this->smarty->display('visualizzastoricoesami_paziente.tpl');
    }
	/**
	 * Funzione che permette di visualizzare la pagina per inserire una recensione
	 * @param $medico medico
	 * @throws SmartyException
	 */
    public function Recensione($medico){
        $this->smarty->assign('medico',$medico);
        $this->smarty->display('inseriscirecensione_paziente.tpl');
    }
	/**
	 * Funzione che permette di visualizzare la lista delle recensioni presenti nel database del paziente
	 * @param $rec array di recensioni
	 * @throws SmartyException
	 */
    public function showRevPage($rec){
        $this->smarty->assign('recensioni',$rec);
        $this->smarty->display('visualizzarecensioni_paziente.tpl');
    }
	/**
	 * Funzione che permette di visualizzare il dettaglio e un eventuale risposta di una recensione
	 * @param $rec recensione
	 * @param $risp risposta
	 * @param $withrisp paramentro che controlla se esiste o no una risposta
	 * @throws SmartyException
	 */
	public function showDettaglioRecRispPaziente($rec,$risp,$withrisp){
        $this->smarty->assign('recensione',$rec);
		$this->smarty->assign('risposta',$risp);
		$this->smarty->assign('crisposta',$withrisp);
        $this->smarty->display('dettaglio_recensione_risposta_paziente.tpl');
    }
	/**
	 * Funzione che permette di visualizzare lo storico degli esami del paziente
	 * @param $tipologie array di tipologie
	 * @param $medici array di medici
	 * @param $IdTipologia id della tipologia
	 * @throws SmartyException
	 */
	public function showEsami($tipologie, $medici, $Idtipologia = false){
		$this->smarty->assign('tipologie', $tipologie);
		$this->smarty->assign('medici',$medici);
		$this->smarty->assign('Idtipologia',$Idtipologia);
		$this->smarty->display('visualizzaappuntamenti_prenotazione_paziente.tpl');
	}
	/**
	 * Funzione che permette di visualizzare il riepilogo di un appuntamento
	 */
	public function riepilogoAppuntamento(){
		$this->smarty->display('riepologoappuntamento_paziente.tpl');
	}

	/**
	 * pagina per visualizzare i messaggi
	 * @param mixed $messaggio messaggio da visualizzare
	 * @return [type]
	 */
	public function messaggio($messaggio){
		$this->smarty->assign('messaggio',$messaggio);
		$this->smarty->display('messaggio_paziente.tpl');
	}

}