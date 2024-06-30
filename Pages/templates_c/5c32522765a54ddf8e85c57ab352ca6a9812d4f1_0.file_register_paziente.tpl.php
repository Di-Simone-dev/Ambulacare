<?php
/* Smarty version 5.3.0, created on 2024-06-30 18:42:28
  from 'file:register_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66818af43b2142_24169249',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c32522765a54ddf8e85c57ab352ca6a9812d4f1' => 
    array (
      0 => 'register_paziente.tpl',
      1 => 1719765691,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66818af43b2142_24169249 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_82221088766818af43232a8_72342983', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_82221088766818af43232a8_72342983 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

<br><br>
    <form method="post" action="/Ambulacare/Paziente/registrazionepaziente" style="padding:35px;">
        <h1>REGISTRAZIONE PAZIENTE</h1>
<br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Nome</label>
        <input type="text" id="nome" name="nome" required>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Cognome</label>
        <input type="text" id="cognome" name="cognome" required>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Email</label>
        <input type="email" id="email" name="email" required>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Codice Fiscale</label>
        <input type="text" id="codicefiscale" name="codice_fiscale" required>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Data di nascita</label>
        <input type="date" id="datanascita" name="data_nascita" required>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Luogo di nascita</label>
        <input type="text" id="luogonascita" name="luogo_nascita" required>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Residenza</label>
        <input type="text" id="residenza" name="residenza" required>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Numero di telefono</label>
        <input type="tel" id="numerotelefono" name="numero_telefono" required>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Password</label>
        <input type="password" id="password" name="password" required>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Conferma Password</label>
        <input type="password" id="cpassword" name="cpassword" required>
<br><br>
        <button type="submit" name="register" class="btn btn-primary">REGISTRATI</button>
    </form>

<?php
}
}
/* {/block 'content'} */
}
