<?php
/* IL FILE è ANCORA IN FASE DI ELABORAZIONE, MOLTE RIGHE DI CODICE SONO STATE COPIATE
DAI FILE DI AGORA E FILLSPACEWEB */ 


/**
 * Class VError si occupa di gestire la visualizzazione della pagina di errore in funzione dell'azione vietata
 */
class VError
{
	/**
	 * @var Smarty
	 */
	private $smarty;
	/**
	 * Funzione che inizializza e configura smarty.
	 */
	public function __construct()
	{
		$this->smarty = StartSmarty::configuration();
	}

	/**
	 * @param $i tipo di errore da mostrare
	 * @throws SmartyException
	 */
	public function error($i) {
		$this->smarty->assign('i', $i);
		switch ($i) {
			case 1 :
				$this->smarty->assign('testo', 'Autorizzazione necessaria.');
				break;
			case 4 :
				$this->smarty->assign('testo', 'La URL richiesta non esiste/non è stata trovata su questo server.');
				break;
		}

		$this->smarty->display('error404.tpl');

	}




}