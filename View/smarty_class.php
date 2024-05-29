<?php
require '../vendor/autoload.php';
use Smarty\Smarty;
$smarty = new Smarty();
$smarty->setTemplateDir('template');
$smarty->setConfigDir('config');
$smarty->setCompileDir('compile');
$smarty->setCacheDir('cache');

/* $smarty->testInstall(); */

$smarty->assign('pazienti',[
    [
        'nome'=>'Luca',
        'titolo'=>'Buono',
        'recensione' => 'non male',
    ],
    [
        'nome'=>'Maurizio',
        'titolo'=>'Bua',
        'recensione' => 'aiiiiiii',
    ]
    ]);
$smarty->display("pages/index.tpl");