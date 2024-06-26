<?php
/* Smarty version 5.3.0, created on 2024-06-26 12:14:17
  from 'file:messaggio_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667be9f996acd3_98115219',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3da1442cc4931100a9963a605fa94f04bd063b8f' => 
    array (
      0 => 'messaggio_paziente.tpl',
      1 => 1719385847,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667be9f996acd3_98115219 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1714500879667be9f987ee77_38730194', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1714500879667be9f987ee77_38730194 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

    <h1>$messaggio</h1>
<?php
}
}
/* {/block 'content'} */
}
