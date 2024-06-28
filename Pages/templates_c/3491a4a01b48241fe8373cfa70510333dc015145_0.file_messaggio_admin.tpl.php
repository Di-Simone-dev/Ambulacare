<?php
/* Smarty version 5.3.0, created on 2024-06-27 21:59:27
  from 'file:messaggio_admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667dc49f6d82b5_61591186',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3491a4a01b48241fe8373cfa70510333dc015145' => 
    array (
      0 => 'messaggio_admin.tpl',
      1 => 1719516427,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667dc49f6d82b5_61591186 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1734704954667dc49f6c5440_76123311', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_admin.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1734704954667dc49f6c5440_76123311 extends \Smarty\Runtime\Block
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
