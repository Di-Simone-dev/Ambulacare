<?php

require_once __DIR__ . "/../Pages/smarty_class.php";

class VUtente{

    private $smarty;
	function __construct()
	{
		$this->smarty = Smarty_class::startSmarty();
	}

    public function Home()
	{
		$this->smarty->display('index.tpl');
	}
}