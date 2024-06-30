<?php

require_once __DIR__ . "/../Pages/smarty_class.php";


class VAmministratore
{
	private $smarty;
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




	public function loginOk()
	{
		$this->smarty->display('index_admin.tpl');
	}




	/**
	 * visualizza la pagina di profilo
	 * @param mixed $admin oggetto admin
	 * 
	 *
	 */
	public function profileAdmin($admin)
	{
		$this->smarty->assign('nome', $admin->getNome());
		$this->smarty->assign('cognome', $admin->getCognome());
		$this->smarty->assign('email', $admin->getEmail());
		$this->smarty->display('profilo_admin.tpl');
	}


	/**
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
	 * @param string $error
	 * 
	 * @return [type]
	 */
	public function formmodificapassw($passw, $error = false)
	{
		if ($error)
			$this->smarty->assign('error', $error);
		$this->smarty->display('reimpostapassword_admin.tpl');
	}

	public function Home()
	{
		$this->smarty->display('index_admin.tpl');
	}


	/**
	 * @param mixed $rec array di recensioni
	 * 
	 * @return [type]
	 */
	public function showRevPage($rec)
	{
		$this->smarty->assign('recensioni', $rec);
		$this->smarty->display('visualizzarecensioni_admin.tpl');
	}


	/**
	 * @param mixed $app array di appuntamenti
	 * @param mixed $tipologie array di tipologie
	 * 
	 * @return [type]
	 */
	public function showAppuntPage($app, $tipologie)
	{
		$this->smarty->assign('appuntamenti', $app);
		$this->smarty->assign('tipologie', $tipologie);
		$this->smarty->display('visualizzaappuntamenti_admin.tpl');
	}

	/**
	 * @param mixed $paz array di pazienti
	 * @param mixed $tipologie array di tipologie
	 * 
	 * @return [type]
	 */
	public function showPazPage($paz, $tipologie)
	{
		$this->smarty->assign('pazienti', $paz);
		$this->smarty->assign('tipologie', $tipologie);
		$this->smarty->display('visualizzastoricoesami_admin.tpl');
	}

	/**
	 * @param mixed $paziente oggetto paziente
	 * @param mixed $esami array di esami
	 * 
	 * @return [type]
	 */
	public function showStoricoEsami($paziente, $esami)
	{
		$this->smarty->assign('esami', $esami);
		$this->smarty->assign('nomePaziente', $paziente->getNome());
		$this->smarty->assign('cognomePaziente', $paziente->getCognome());
		$this->smarty->display('visualizzastoricoesamipaz_admin.tpl');
	}

	/* 	public function showRecensione($recensione)
	{
		$this->smarty->assign('recensione', $recensione);
		$this->smarty->display('dettagli_recensione.tpl');
	} */

	/**
	 * @param mixed $medici array di medici
	 * 
	 * @return [type]
	 */
	public function moderazionemedici($medici)
	{
		$this->smarty->assign('medici', $medici);
		$this->smarty->display('moderazioneaccountmedici_admin.tpl');
	}

	/**
	 * @param mixed $esame
	 * @param mixed $giorno array di giorni [0] per lunedì, [1] per martedì ...
	 * @param mixed $fasceorarie array di fasciaoraria
	 * 
	 * @return [type]
	 */
	public function editApp($esame, $giorno, $fasceorarie)
	{
		$this->smarty->assign('esame', $esame);
		$this->smarty->assign('giorno', $giorno);
		$this->smarty->assign('fasceorarie', $fasceorarie);
		$this->smarty->display('modificaappuntamento_admin.tpl');
	}

	public function messaggio($messaggio){
		$this->smarty->assign('messaggio', $messaggio);
		$this->smarty->display('messaggio_admin.tpl');
	}

	public function moderazionepazienti($pazienti){
		$this->smarty->assign('pazienti', $pazienti);
		$this->smarty->display('moderazioneaccountpaz_admin.tpl');
	}

	public function registrazionemedico($tipologie){
		$this->smarty->assign('tipologie', $tipologie);
		$this->smarty->display('register_medico.tpl');
	}
}
