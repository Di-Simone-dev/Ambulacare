<?php
/* Smarty version 5.3.0, created on 2024-06-30 16:09:30
  from 'file:messaggio_admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6681671aeccb18_43035583',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed1296ac091e6a5d6563377049819af0a288ce31' => 
    array (
      0 => 'messaggio_admin.tpl',
      1 => 1719744906,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6681671aeccb18_43035583 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_6366443846681671aec4016_95785656', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_admin.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_6366443846681671aec4016_95785656 extends \Smarty\Runtime\Block
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
