<?php
/* Smarty version 5.3.0, created on 2024-06-29 17:34:00
  from 'file:modificadati_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6680296813c046_25415415',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '18f8647b3888cf8d120b989872e1b7b409ea4249' => 
    array (
      0 => 'modificadati_medico.tpl',
      1 => 1719675223,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6680296813c046_25415415 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_93945380466802968137bf7_47994354', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_93945380466802968137bf7_47994354 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

    
    <br>
    <form method="post" enctype="multipart/form-data" action="/Ambulacare/Medico/setInfoMedico" style="width: 600px;padding:35px;">
    <h1>MODIFICA DATI</h1>
<br>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">nome</label>
    <input type="text" id="nome" name="Nome" required value="<?php echo $_smarty_tpl->getValue('medico')['nome'];?>
">
<br><br>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Cognome</label>
    <input type="text" id="nome" name="Cognome" required value="<?php echo $_smarty_tpl->getValue('medico')['cognome'];?>
">
<br><br>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Costo</label>
    <input type="text" id="costo" name="Costo" required value="<?php echo $_smarty_tpl->getValue('medico')['costo'];?>
">
<br><br>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Immagine Profilo</label>
    <input type="file" id="imgprofilo" name="imgprofilo" style="background-color: white;">
<br><br>
    <button type="submit" name="register" class="btn btn-primary">CONFERMA MODIFICHE</button>
<br><br>
    <a href="/Ambulacare/Medico/formEmailMedico" class="btn btn-primary"> Modifica Email</a>
<br>
    <a href="/Ambulacare/Medico/formPasswordMedico" class="btn btn-primary"> Modifica Password</a>
</form>

<?php
}
}
/* {/block 'content'} */
}
