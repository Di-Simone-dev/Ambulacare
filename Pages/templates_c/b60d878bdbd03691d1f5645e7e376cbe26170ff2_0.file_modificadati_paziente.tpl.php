<?php
/* Smarty version 5.3.0, created on 2024-06-30 17:38:55
  from 'file:modificadati_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66817c0f047b51_70454368',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b60d878bdbd03691d1f5645e7e376cbe26170ff2' => 
    array (
      0 => 'modificadati_paziente.tpl',
      1 => 1719755354,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66817c0f047b51_70454368 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_59513553366817c0f03fd35_25743097', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_59513553366817c0f03fd35_25743097 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>

    <br><br>
    <form method="post" action="/Ambulacare/Paziente/setInfoPaziente" style="padding:35px;">
    <h1>MODIFICA DATI</h1>
<br>
    <h6>Nome</h6>
    <input type="text" id="nome" name="Nome" required value="<?php echo $_smarty_tpl->getValue('paziente')['nome'];?>
">
<br><br>
    <h6>Cognome</h6>
    <input type="text" id="cognome" name="Cognome" required value="<?php echo $_smarty_tpl->getValue('paziente')['cognome'];?>
">
<br><br>
    <h6>Residenza</h6>
    <input type="text" id="residenza" name="Residenza" required value="<?php echo $_smarty_tpl->getValue('paziente')['residenza'];?>
">
<br><br>
    <h6>Luogo di Nascita</h6>
    <input type="text" id="luogonascita" name="LuogoNascita" required value="">
<br><br>
    <h6>Codice Fiscale</h6>
    <input type="text" id="codicefiscale" name="CodiceFiscale" required value="<?php echo $_smarty_tpl->getValue('paziente')['codice_fiscale'];?>
">
<br><br>
    <h6>Data Nascita</h6>
    <input type="date" id="datanascita" name="DataNascita" required value="<?php echo $_smarty_tpl->getValue('paziente')['data_nascita'];?>
">
<br><br>
    <h6>Numero di telefono</h6>
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
