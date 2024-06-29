<?php
/* Smarty version 5.3.0, created on 2024-06-29 16:26:36
  from 'file:modificadati_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6680199ce930e4_66415685',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e58074a90f7d97b9d776b501cc7d6cdfcfbb196' => 
    array (
      0 => 'modificadati_paziente.tpl',
      1 => 1719671191,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6680199ce930e4_66415685 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19950936396680199ce7f8b1_69041925', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_19950936396680199ce7f8b1_69041925 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

    
    <form method="post" action="/Ambulacare/Paziente/setInfoPaziente" style="width: 600px;">
    <h1 style="font-size: 34px;">MODIFICA DATI</h1>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Nome</label>
    <input type="text" id="residenza" name="Nome" required value="<?php echo $_smarty_tpl->getValue('paziente')['nome'];?>
">
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Cognome</label>
    <input type="text" id="residenza" name="Cognome" required value="<?php echo $_smarty_tpl->getValue('paziente')['cognome'];?>
">
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Residenza</label>
    <input type="text" id="residenza" name="Residenza" required value="<?php echo $_smarty_tpl->getValue('paziente')['residenza'];?>
">
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Luogo di Nascita</label>
    <input type="text" id="residenza" name="LuogoNascita" required value="">
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Codice Fiscale</label>
    <input type="text" id="residenza" name="CodiceFiscale" required value="<?php echo $_smarty_tpl->getValue('paziente')['codice_fiscale'];?>
">
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">password</label>
    <input type="password" id="residenza" name="Password" required value="" required>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Data Nascita</label>
    <input type="date" id="residenza" name="DataNascita" required value="<?php echo $_smarty_tpl->getValue('paziente')['data_nascita'];?>
">
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Numero di telefono</label>
    <input type="tel" id="numerotelefono" name="Numerotelefono" required value="<?php echo $_smarty_tpl->getValue('paziente')['numero_telefono'];?>
">
    <button type="submit" name="register" style="width: 100px;">Conferma</button>
    <a href="">Modifica email</a>
    <a href="">Modifica password</a>
</form>
    
<?php
}
}
/* {/block 'content'} */
}
