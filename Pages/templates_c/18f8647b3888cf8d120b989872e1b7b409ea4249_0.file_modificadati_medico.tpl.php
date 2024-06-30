<?php
/* Smarty version 5.3.0, created on 2024-06-30 18:52:25
  from 'file:modificadati_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66818d49896487_96627190',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '18f8647b3888cf8d120b989872e1b7b409ea4249' => 
    array (
      0 => 'modificadati_medico.tpl',
      1 => 1719765691,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66818d49896487_96627190 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_170071744166818d49891f76_77162541', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_170071744166818d49891f76_77162541 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

    
    <br><br>
    <form method="post" enctype="multipart/form-data" action="/Ambulacare/Medico/setInfoMedico" style="padding:35px;">
    <h1>MODIFICA DATI</h1>
<br>
    <h6>nome:</h6>
    <input type="text" id="nome" name="Nome" required value="<?php echo $_smarty_tpl->getValue('medico')['nome'];?>
">
<br><br>
    <h6>Cognome:</h6>
    <input type="text" id="cognome" name="Cognome" required value="<?php echo $_smarty_tpl->getValue('medico')['cognome'];?>
">
<br><br>
    <h6>Costo:</h6>
    <input type="text" id="costo" name="Costo" required value="<?php echo $_smarty_tpl->getValue('medico')['costo'];?>
">
<br><br>
    <h6>Immagine Profilo:</h6>
    <input type="file" id="imgprofilo" name="imgprofilo" style="background-color: white;">
<br><br>
    <button type="submit" name="register" class="btn btn-primary">CONFERMA MODIFICHE</button>
<br><br>
    <a href="/Ambulacare/Medico/formEmailMedico" class="btn btn-primary"> Modifica Email</a>
<br><br>
    <a href="/Ambulacare/Medico/formPasswordMedico" class="btn btn-primary"> Modifica Password</a>
</form>

<?php
}
}
/* {/block 'content'} */
}
