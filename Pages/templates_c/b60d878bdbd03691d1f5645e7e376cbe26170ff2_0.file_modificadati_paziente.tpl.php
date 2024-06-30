<?php
/* Smarty version 5.3.0, created on 2024-06-30 09:44:34
  from 'file:modificadati_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66810ce23139d5_04273662',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b60d878bdbd03691d1f5645e7e376cbe26170ff2' => 
    array (
      0 => 'modificadati_paziente.tpl',
      1 => 1719733471,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66810ce23139d5_04273662 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_167237324866810ce230ce03_02852005', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_167237324866810ce230ce03_02852005 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>

    
    <form method="post" action="/Ambulacare/Paziente/setInfoPaziente" style="width: 600px;padding:35px;">
    <h1>MODIFICA DATI</h1>
<br>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Nome</label>
    <input type="text" id="residenza" name="Nome" required value="<?php echo $_smarty_tpl->getValue('paziente')['nome'];?>
">
<br><br>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Cognome</label>
    <input type="text" id="residenza" name="Cognome" required value="<?php echo $_smarty_tpl->getValue('paziente')['cognome'];?>
">
<br><br>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Residenza</label>
    <input type="text" id="residenza" name="Residenza" required value="<?php echo $_smarty_tpl->getValue('paziente')['residenza'];?>
">
<br><br>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Luogo di Nascita</label>
    <input type="text" id="residenza" name="LuogoNascita" required value="">
<br><br>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Codice Fiscale</label>
    <input type="text" id="residenza" name="CodiceFiscale" required value="<?php echo $_smarty_tpl->getValue('paziente')['codice_fiscale'];?>
">
<br><br>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Data Nascita</label>
    <input type="date" id="residenza" name="DataNascita" required value="<?php echo $_smarty_tpl->getValue('paziente')['data_nascita'];?>
">
<br><br>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Numero di telefono</label>
    <input type="tel" id="numerotelefono" name="Numerotelefono" required value="<?php echo $_smarty_tpl->getValue('paziente')['numero_telefono'];?>
">
<br><br>
    <button type="submit" name="register" class="btn btn-primary">Conferma Modifiche</button>
<br><br>
    <a href="/Ambulacare/Paziente/formEmail" class="btn btn-primary">Modifica email</a>
<br><br>
    <a href="/Ambulacare/Paziente/formPasswordPaziente" class="btn btn-primary"> Modifica Password</a>
</form>
    
<?php
}
}
/* {/block 'content'} */
}
