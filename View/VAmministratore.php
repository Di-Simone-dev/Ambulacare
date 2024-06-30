<?php

require_once __DIR__ . "/../Pages/smarty_class.php";


class VAmministratore
{
	private $smarty;
	/**
	 * funzione che inizializza e configura smarty
	 * 
	 */
	function __construct()
	{
		$this->smarty = Smarty_class::startSmarty();
	}



	/**
	 * visualizza form di login
	 * @param string $email da mostrare nel form (opzionale)
	 * @param string $error messaggio di errore da stampare (opzionale)
	 * 
	 */
	public function showFormLogin($email = false, $error = false)
	{
		if ($email) $this->smarty->assign('email', $email);
		if ($error) $this->smarty->assign('error', $error);
		$this->smarty->display('login_admin.tpl');
	}



	/**
	 * Funzione che si occupa di gestire la visualizzazione della homepage dopo il login ( se è andato a buon fine)
	 * @throws SmartyException
	 */
	public function loginOk()
	{
		$this->smarty->display('index_admin.tpl');
	}

	/**
	 * visualizza la pagina di profilo
	 * @param mixed $admin oggetto admin
	 */
	public function profileAdmin($admin)
	{
		$this->smarty->assign('nome', $admin->getNome());
		$this->smarty->assign('cognome', $admin->getCognome());
		$this->smarty->assign('email', $admin->getEmail());
		$this->smarty->display('profilo_admin.tpl');
	}


	/**
	 * visualizza la pagina per la modifica dei dati dell'admin
	 * @param mixed $admin
	 * @param string $error
	 * @param string $email
	 * 
	 */
	public function formmodificacli($admin, $error = false, $email)
	{
		if ($error) $this->smarty->assign('error', $error);
		$this->smarty->assign('nome', $admin->getNome());
		$this->smarty->assign('cognome', $admin->getCognome());
		$this->smarty->assign('email', $email);
		$this->smarty->display('modifica_profilo_admin.tpl');
	}


	/**
	 * visualizza il form per la modifica della password dell'admin
	 * @param string $error
	 * @return [type]
	 */
	public function formmodificapassw($passw, $error = false)
	{
		if ($error)
			$this->smarty->assign('error', $error);
		$this->smarty->display('reimpostapassword_admin.tpl');
	}

	/**
	 * visualizza la home page dell'admin
	 */
	public function Home()
	{
		$this->smarty->display('index_admin.tpl');
	}


	/**
	 * visualizza l'elenco delle recensioni presenti nel db
	 * @param mixed $rec array di recensioni
	 * @return [type]
	 */
	public function showRevPage($rec)
	{
		$this->smarty->assign('recensioni', $rec);
		$this->smarty->display('visualizzarecensioni_admin.tpl');
	}


	/**
	 * viusalizza la pagina per la gestione degli appuntamenti
	 * @param mixed $app array di appuntamenti
	 * @param mixed $tipologie array di tipologie
	 * @return [type]
	 */
	public function showAppuntPage($app, $tipologie)
	{
		$this->smarty->assign('appuntamenti', $app);
		$this->smarty->assign('tipologie', $tipologie);
		$this->smarty->display('visualizzaappuntamenti_admin.tpl');
	}

	/**
	 * visualizza la pagina con l'elenco dei pazienti(serve per visualizzare lo storico esami)
	 * @param mixed $paz array di pazienti
	 * @param mixed $tipologie array di tipologie
	 * @return [type]
	 */
	public function showPazPage($paz, $tipologie)
	{
		$this->smarty->assign('pazienti', $paz);
		$this->smarty->assign('tipologie', $tipologie);
		$this->smarty->display('visualizzastoricoesami_admin.tpl');
	}

	/**
	 * visualizza la pagina con lo storico esami di un paziente
	 * @param mixed $paziente oggetto paziente
	 * @param mixed $esami array di esami
	 * @return [type]
	 */
	public function showStoricoEsami($paziente, $esami)
	{
		$this->smarty->assign('esami', $esami);
		$this->smarty->assign('nomePaziente', $paziente->getNome());
		$this->smarty->assign('cognomePaziente', $paziente->getCognome());
		$this->smarty->display('visualizzastoricoesamipaz_admin.tpl');
	}

	/**
	 * visualizza la pagina per la moderazione dei medici
	 * @param mixed $medici array di medici
	 * @return [type]
	 */
	public function moderazionemedici($medici)
	{
		$this->smarty->assign('medici', $medici);
		$this->smarty->display('moderazioneaccountmedici_admin.tpl');
	}

	/**
	 * visualizza la pagina per la modifica di un appuntamento
	 * @param mixed $esame
	 * @param mixed $giorno array di giorni
	 * @param mixed $fasceorarie array di fasciaoraria
	 * @param mixed $week settimana
	 * @return [type]
	 */
	public function editApp($esame, $giorno, $fasceorarie,$week=null)
	{
		$this->smarty->assign('esame', $esame);
		$this->smarty->assign('giorno', $giorno);
		$this->smarty->assign('fasceorarie', $fasceorarie);
		$this->smarty->assign('week',$week);
		$this->smarty->display('modificaappuntamento_admin.tpl');
	}
	/**
	 * pagina per visualizzare i messaggi
	 * @param mixed $messaggio messaggio da visualizzare
	 * @return [type]
	 */
	public function messaggio($messaggio){
		$this->smarty->assign('messaggio', $messaggio);
		$this->smarty->display('messaggio_admin.tpl');
	}
	/**
	 * visualizza la pagina per la moderazione dei pazienti
	 * @param mixed $pazienti array di pazienti
	 * @return [type]
	 */
	public function moderazionepazienti($pazienti){
		$this->smarty->assign('pazienti', $pazienti);
		$this->smarty->display('moderazioneaccountpaz_admin.tpl');
	}
	/**
	 * visualizza la pagina per la registrazione di un medico
	 * @param mixed $tipologie array di tipologie
	 * @return [type]
	 */
	public function registrazionemedico($tipologie){
		$this->smarty->assign('tipologie', $tipologie);
		$this->smarty->display('register_medico.tpl');
	}
}
