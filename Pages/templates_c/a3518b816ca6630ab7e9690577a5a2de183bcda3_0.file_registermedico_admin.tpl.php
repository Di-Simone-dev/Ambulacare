<?php
/* Smarty version 5.3.0, created on 2024-06-28 11:15:35
  from 'file:registermedico_admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667e7f376345a8_81405166',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3518b816ca6630ab7e9690577a5a2de183bcda3' => 
    array (
      0 => 'registermedico_admin.tpl',
      1 => 1719566132,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667e7f376345a8_81405166 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_277674362667e7f376042d8_61489159', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_admin.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_277674362667e7f376042d8_61489159 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

    <br><br><br>
    <form method="post" action="/Ambulacare/Amministratore/registrazionemedico" style="width: 600px;">
        <h1 style="font-size: 34px;">REGISTRAZIONE</h1>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Nome</label>
        <input type="text" id="nome" name="nome" required>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Cognome</label>
        <input type="text" id="cognome" name="cognome" required>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Email</label>
        <input type="email" id="email" name="email" required>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Costo</label>
        <input type="number" id="email" name="costo" required>
        <select name="tipologia" id="tipologia" class="form-select">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('tipologie'), 'tipologia');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('tipologia')->value) {
$foreach0DoElse = false;
?>
                <option value="<?php echo $_smarty_tpl->getValue('tipologia')['IdTipologia'];?>
"><?php echo $_smarty_tpl->getValue('tipologia')['nome_tipologia'];?>
</option>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </select>
        <button type="submit" name="register" style="width: 100px;">REGISTRATI</button>
    </form>

<?php
}
}
/* {/block 'content'} */
}
