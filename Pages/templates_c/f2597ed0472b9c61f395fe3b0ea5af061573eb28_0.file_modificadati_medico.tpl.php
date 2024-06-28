<?php
/* Smarty version 5.3.0, created on 2024-06-28 18:34:53
  from 'file:modificadati_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667ee62d9c4505_61398903',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2597ed0472b9c61f395fe3b0ea5af061573eb28' => 
    array (
      0 => 'modificadati_medico.tpl',
      1 => 1719592492,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667ee62d9c4505_61398903 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1583031694667ee62d9b59f3_37320552', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1583031694667ee62d9b59f3_37320552 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>

    
    <br>
    <form method="post" action="/Ambulacare/Medico/setInfoMedico" style="width: 600px;padding:35px;">
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
    <a href="/Ambulacare/Medico/formPasswordMedico" class="btn btn-primary"> Modifica Password</a>
</form>

<?php
}
}
/* {/block 'content'} */
}
