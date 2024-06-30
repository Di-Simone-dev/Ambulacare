<?php
/* Smarty version 5.3.0, created on 2024-06-30 17:22:29
  from 'file:messaggio_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_668178355acd55_16504419',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6bc9baa7c1dbddd54f7fa1a0eccc22cc3108639b' => 
    array (
      0 => 'messaggio_medico.tpl',
      1 => 1719744903,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_668178355acd55_16504419 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1506579146668178355a7738_83076327', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1506579146668178355a7738_83076327 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>

    <br><br>
    <h1><?php echo $_smarty_tpl->getValue('messaggio');?>
</h1>
<?php
}
}
/* {/block 'content'} */
}
