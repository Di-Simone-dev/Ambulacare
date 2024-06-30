<?php
/* Smarty version 5.3.0, created on 2024-06-30 18:53:14
  from 'file:register_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66818d7a9490a7_24666153',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f518d6d1294e31aadcd9be78f38bd12a8f306cc' => 
    array (
      0 => 'register_medico.tpl',
      1 => 1719765691,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66818d7a9490a7_24666153 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_191812527066818d7a93f052_08426415', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_admin.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_191812527066818d7a93f052_08426415 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

<br><br>
    <form method="post" action="/Ambulacare/Amministratore/registrazionemedico"  enctype="multipart/form-data" style="padding:35px;">
        <h1>REGISTRAZIONE MEDICO</h1>
<br>
        <h6>Nome</h6>
        <input type="text" id="nome" name="nome" required>
<br><br>
        <h6>Cognome</h6>
        <input type="text" id="cognome" name="cognome" required>
<br><br>
        <h6>Email</h6>
        <input type="email" id="email" name="email" required value="<?php echo $_smarty_tpl->getValue('email');?>
">
<br><br>
        <h6>Costo</h6>
        <input type="text" id="costo" name="costo" required>
<br><br>
<h6>Tipologia</h6>
	<select name="tipologia" class="form-select">
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('tipologie'), 'tipologia');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('tipologia')->value) {
$foreach0DoElse = false;
?>
                                <option value="<?php echo $_smarty_tpl->getValue('tipologia')['IdTipologia'];?>
" <?php if ($_smarty_tpl->getValue('tipologia')['IdTipologia'] == $_smarty_tpl->getValue('Idtipologia')) {?>
                                    selected="selected" <?php }?>><?php echo $_smarty_tpl->getValue('tipologia')['nome_tipologia'];?>
</option>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </select>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Password</label>
        <input type="password" id="password" name="password" required>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Conferma Password</label>
        <input type="password" id="password" name="cpassword" required>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Immagine Profilo</label>
        <input type="file" id="imgprofilo" name="imgprofilo" style="background-color: white;">
<br><br>
        <button type="submit" name="register" class="btn btn-primary">REGISTRA MEDICO</button>
    </form>
<?php
}
}
/* {/block 'content'} */
}
