<?php
/* Smarty version 5.3.0, created on 2024-06-30 18:05:14
  from 'file:messaggio_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6681823a7558b5_96797353',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3da1442cc4931100a9963a605fa94f04bd063b8f' => 
    array (
      0 => 'messaggio_paziente.tpl',
      1 => 1719747652,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6681823a7558b5_96797353 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_8861126156681823a752dc0_33731575', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_8861126156681823a752dc0_33731575 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

    <br><br>
    <h1><?php echo $_smarty_tpl->getValue('messaggio');?>
</h1>
<?php
}
}
/* {/block 'content'} */
}
