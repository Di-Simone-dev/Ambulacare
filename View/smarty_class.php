<?php
require '../vendor/autoload.php';
use Smarty\Smarty;
$smarty = new Smarty();
$smarty->setTemplateDir('template');
$smarty->setConfigDir('config');
$smarty->setCompileDir('compile');
$smarty->setCacheDir('cache');

/* $smarty->testInstall(); */

$smarty->assign('recensioni',[
    [
        'paziente'=>'Luca',
        'titolo'=>'Buono',
        'descrizione' => 'non male',
    ],
    [
        'paziente'=>'Maurizio',
        'titolo'=>'Bua',
        'descrizione' => 'aiiiiiii',
    ]
    ]);
$smarty->display("pages/index.tpl");