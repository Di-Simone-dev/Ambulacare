<?php
/* Smarty version 5.3.0, created on 2024-06-30 17:25:27
  from 'file:messaggio_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_668178e750e3f1_19634365',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef8fa02124d36708683970652f46bf4722477e99' => 
    array (
      0 => 'messaggio_paziente.tpl',
      1 => 1719745141,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_668178e750e3f1_19634365 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_528251917668178e750acd7_11102212', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_528251917668178e750acd7_11102212 extends \Smarty\Runtime\Block
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
