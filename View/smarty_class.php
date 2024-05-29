<?php
require '../vendor/autoload.php';
use Smarty\Smarty;
$smarty = new Smarty();
$smarty->setTemplateDir('template');
$smarty->setConfigDir('config');
$smarty->setCompileDir('compile');
$smarty->setCacheDir('cache');

/* $smarty->testInstall(); */

$smarty->assign('pazienti',array([
    [
        'nome' => 'Luca',
        'recensione' => 'non male'
    ],
    [
        'nome' => 'Luca',
        'recensione' => 'non male'
    ]
    ]));
$smarty->display("pages/index.tpl");