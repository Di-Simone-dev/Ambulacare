<?php
/* Smarty version 5.3.0, created on 2024-06-28 16:00:53
  from 'file:modificadati_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667ec2150bace3_70153666',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '18f8647b3888cf8d120b989872e1b7b409ea4249' => 
    array (
      0 => 'modificadati_medico.tpl',
      1 => 1719583157,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667ec2150bace3_70153666 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_300079856667ec2150ab398_12911527', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_300079856667ec2150ab398_12911527 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

    
    <br><br><br>
    <form method="post" action="/Ambulacare/Medico/setInfoMedico" style="width: 600px;">
    <h1 style="font-size: 34px;">MODIFICA DATI</h1>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">nome</label>
    <input type="text" id="nome" name="Nome" required value="<?php echo $_smarty_tpl->getValue('medico')['nome'];?>
">
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Cognome</label>
    <input type="text" id="nome" name="Cognome" required value="<?php echo $_smarty_tpl->getValue('medico')['cognome'];?>
">
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Costo</label>
    <input type="text" id="costo" name="Costo" required value="<?php echo $_smarty_tpl->getValue('medico')['costo'];?>
">
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Immagine Profilo</label>
    <input type="file" id="imgprofilo" name="imgprofilo" style="background-color: white;">
    <button type="submit" name="register" style="width: 100px;">MODIFICA</button>
    <a href="/Ambulacare/Medico/formEmailMedico" class="btn btn-primary"> Modifica Email</a>
    <a href="/Ambulacare/Medico/formPasswordMedico" class="btn btn-primary"> Modifica Password</a>
</form>

<?php
}
}
/* {/block 'content'} */
}
