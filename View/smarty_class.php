<?php
require '../vendor/autoload.php';
use Smarty\Smarty;
$smarty = new Smarty();
$smarty->setTemplateDir('template');
$smarty->setConfigDir('config');
$smarty->setCompileDir('compile');
$smarty->setCacheDir('cache');

/* $smarty->testInstall(); */

$smarty->display("pages/indexmedico.tpl");