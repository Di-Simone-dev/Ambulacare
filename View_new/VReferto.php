<?php

require_once __DIR__."/../Pages/smarty_class.php";

class VReferto{

    private $smarty;

    public function __construct(){
        $this->smarty = Smarty_class::startSmarty();
    }

    public function referto($idref){
        
    }
}