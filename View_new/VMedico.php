<?php

require_once __DIR__."/../Pages/smarty_class.php";


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

	public function Home(){
		$this->smarty->display('index_medico.tpl');
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione della form di login
	 * @throws SmartyException
	 */
	public function showFormLogin($email = false, $error = false){
		if ($email) $this->smarty->assign('email', $email);
		if ($error) $this->smarty->assign('error', $error);
		$this->smarty->display('login_medico.tpl');
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione della homepage dopo il login ( se è andato a buon fine)
	 * //@param $array elenco di Anunci da visualizzare
	 * @throws SmartyException
	 */
	public function loginOk() {
		$this->smarty->display('index_medico.tpl');
	}



	public function profileCli($medico) {
		$this->smarty->assign('medico',$medico);
        //$this->smarty->assign('immagine',$immagine);
		$this->smarty->display('profilo_medico.tpl');
	}


	public function registra_medico($error = false, $email = false) {
		if ($error) $this->smarty->assign('error', $error);
		if ($email) $this->smarty->assign('email', $email);
		$this->smarty->display('registermedico.tpl');
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione della form di modifica per il medico
	 * @param $user informazioni sul medico che desidera modificare i suoi dati
	 * @param $img immagine del medico
	 * @param $error tipo di errore nel caso in cui le modifiche siano sbagliate
	 * @throws SmartyException
	 */
	public function formmodificacli($medico, $error = false) {
		if($error) $this->smarty->assign('error',$error);
		$this->smarty->assign('medico',$medico);
		$this->smarty->display('modificadati_medico.tpl');
	}

	public function formmodificapassw($error = false) {
		if($error) $this->smarty->assign('error',$error);
		$this->smarty->display('reimppassword_medico.tpl');
	}

	public function formmodificaemail($error = false) {
		if($error) $this->smarty->assign('error',$error);
		$this->smarty->display('modificamail_medico.tpl');
	}
	/**
	 * Funzione che permette di visualizzare lo storico degli esami svolti dal medico (serve per gestione referti)
	 * @param $app array di appuntamenti
	 * @throws SmartyException
	 */
	public function showStoricoEsamiReferto($app){
        $this->smarty->assign('esami',$app);
        $this->smarty->display('visualizzaelencopazperstoricoesami_medico.tpl');
    }

	/**
	 * Funzione che permette di visualizzare la pagina per caricare un referto
	 * @param $app un appuntamento
	 * @throws SmartyException
	 */
	public function CaricaReferto($app){
        $this->smarty->assign('esame',$app);
        $this->smarty->display('inseriscireferto_medico.tpl');
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
	public function ModificaAppuntamento($app, $fasceorarie, $giorno){
        $this->smarty->assign('esame',$app);
		$this->smarty->assign('fasceorarie',$fasceorarie);
		$this->smarty->assign('giorno',$giorno);
        $this->smarty->display('modificaappuntamento_medico.tpl');
    }
	/**
	 * Funzione che permette di visualizzare la pagina per il caricamento di orari per appuntamenti
	 * @throws SmartyException
	 */
	public function ShowPageOrari($fasceorarie,$giorno){
        $this->smarty->assign('fasceorarie',$fasceorarie);
		$this->smarty->assign('giorno',$giorno);
        $this->smarty->display('inserisciorariodisponibile_medico.tpl');
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
        $this->smarty->assign('recensione',$rec);
        $this->smarty->display('rispostarecensione_medico.tpl'); //ancora implementata
    }

	public function showAppHistory($app){
        $this->smarty->assign('esami',$app);
        $this->smarty->display('visualizzastoricoesami_medico.tpl');
    }

	public function messaggio($messaggio){
		$this->smarty->assign('messaggio',$messaggio);
		$this->smarty->display('messaggio_medico.tpl');
	}


	public function listaPazienti($pazienti){
		$this->smarty->assign('pazienti',$pazienti);
		$this->smarty->display("visualizzastoricoesamiperpaziente_medico.tpl");
	}

	public function formImg(){
		$this->smarty->display("immagine_medico.tpl");
	}

}