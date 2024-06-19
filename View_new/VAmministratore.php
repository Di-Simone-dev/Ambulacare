<?php

require_once __DIR__."/../Pages/smarty_class.php";

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
        $this->smarty = Smarty_class::startSmarty();
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
		//$this->smarty->assign('userlogged',"loggato");
		//$this->smarty->assign('array', $array);
        //$this->smarty->assign('toSearch', 'trasporti');
		$this->smarty->display('index_admin.tpl');
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
	 * @throws SmartyException
	 */
	public function profileAdmin($user) {
		//list($type,$pic64) = $this->setImage($img, 'user');
		//$this->smarty->assign('type', $type);
		//$this->smarty->assign('pic64', $pic64);
		//$this->smarty->assign('userlogged',"loggato");
		$this->smarty->assign('nome',$user->getNome());
		$this->smarty->assign('cognome',$user->getCognome());
		$this->smarty->assign('email',$user->getEmail());
		//$this->smarty->assign('array',$ann);
		$this->smarty->display('profiloadmin.tpl');
	}

	/**
	 * Funzione che si occupa di gestire la visualizzazione della form di modifica per l'admin
	 * @param $user informazioni sull'admin che desidera modificare 
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
		$this->smarty->display('modifica_profilo_admin.tpl');
	}
	/**
	 * Funzione che si occupa di gestire la visualizzazione della form di modifica della password per l'admin
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
		$this->smarty->display('modifica_password_admin.tpl');
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
    function getIdRecensione(){
        $value = null;
        if (isset($_POST['idrecensione']))
            $value = $_POST['iderecensione'];
        return $value;
    }

	/**
	 * Funzione che permette di visualizzare la pagina dell'admin (contenente tutti gli utenti della piattaforma),divisi in attivi e bannati.
	 * @param $utentiAttivi array di utenti attivi
	 * @param $utentiBannati array di utenti bannati
	 * @throws SmartyException
	 */
    public function HomeAdmin() {
		//list($typeA,$pic64att) = $this->SetImageRecensione($img_attivi);
/* 		$this->smarty->assign('n_bannati', 0);
        $this->smarty->assign('utenti',$utentiAttivi);
        $this->smarty->assign('utentiBan',$utentiBannati); */
        $this->smarty->display('index_admin.tpl');
    }


	/**
	 * Funzione che permette di visualizzare la lista delle recensioni presenti nel database
	 * @param $rec array di recensioni
	 * @throws SmartyException
	 */
    public function showRevPage($rec){
        $this->smarty->assign('recensioni',$rec);
        $this->smarty->display('visualizzarecensioni_admin.tpl');
    }
	/**
	 * Funzione che permette di visualizzare la lista degli appuntamenti presenti nel database
	 * @param $app array di appuntamenti
	 * @throws SmartyException
	 */
	public function showAppuntPage($app, $categorie){
        $this->smarty->assign('appuntamenti',$app);
		$this->smarty->assign('categorie',$categorie);
        $this->smarty->display('visualizzaappuntamenti_admin.tpl');
    }
	/**
	 * Funzione che permette di visualizzare la lista dei pazienti presenti nel database
	 * @param $paz array di pazienti
	 * @throws SmartyException
	 */
	public function showPazPage($paz){
        $this->smarty->assign('pazienti',$paz);
        $this->smarty->display('visualizzastoricoesami_admin.tpl');
    }
	/**
	 * Funzione che permette di visualizzare lo storico degli esami di un paziente
	 * @param $app array di appuntamenti
	 * @throws SmartyException
	 */
	public function showStoricoEsami($paziente, $app){
        $this->smarty->assign('esami',$app);
		$this->smarty->assign('paziente',$paziente);
        $this->smarty->display('visualizzastoricoesamipaziente_admin.tpl');
    }
	/**
	 * Funzione che permette di visualizzare una recensione
	 * @param $recensione una recensione
	 * @throws SmartyException
	 */
	public function showRecensione($recensione){
        $this->smarty->assign('recensione',$recensione);
        $this->smarty->display('dettagli_recensione.tpl');
    }
}
