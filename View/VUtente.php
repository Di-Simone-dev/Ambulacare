<?php

require_once __DIR__ . "/../Pages/smarty_class.php";

class VUtente{

    private $smarty;
	/**
	 * Funzione che inizializza e configura smarty.
	 */
	function __construct()
	{
		$this->smarty = Smarty_class::startSmarty();
	}
	/**
	 * Funzione che visualizza la home page di un utente generico
	 */
    public function Home()
	{
		$this->smarty->display('index.tpl');
	}
}