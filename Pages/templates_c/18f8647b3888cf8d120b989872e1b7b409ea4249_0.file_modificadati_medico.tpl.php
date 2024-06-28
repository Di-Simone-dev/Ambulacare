<?php
/* Smarty version 5.3.0, created on 2024-06-28 14:43:47
  from 'file:modificadati_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667eb003db4cd7_91241233',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '18f8647b3888cf8d120b989872e1b7b409ea4249' => 
    array (
      0 => 'modificadati_medico.tpl',
      1 => 1719578625,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667eb003db4cd7_91241233 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_437153199667eb003da78f5_87628484', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_437153199667eb003da78f5_87628484 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

    
    <br><br><br>
    <form method="post" action="" style="width: 600px;">
    <h1 style="font-size: 34px;">MODIFICA DATI</h1>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Email</label>
    <input type="email" id="email" name="email" required value="<?php echo $_smarty_tpl->getValue('medico')['email'];?>
">
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Costo</label>
    <input type="text" id="costo" name="costo" required value="<?php echo $_smarty_tpl->getValue('medico')['costo'];?>
">
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Immagine Profilo</label>
    <input type="file" id="imgprofilo" name="imgprofilo" style="background-color: white;">
    <button type="submit" name="register" style="width: 100px;">MODIFICA</button>
</form>

<?php
}
}
/* {/block 'content'} */
}
