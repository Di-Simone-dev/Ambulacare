<?php
/* Smarty version 5.3.0, created on 2024-06-30 15:38:49
  from 'file:register_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66815fe92cf945_48577156',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3cd95f4395168d22ba6200a56dc1d297ffe9790' => 
    array (
      0 => 'register_paziente.tpl',
      1 => 1719754728,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66815fe92cf945_48577156 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19289655666815fe92cbe21_71232502', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_19289655666815fe92cbe21_71232502 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
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
