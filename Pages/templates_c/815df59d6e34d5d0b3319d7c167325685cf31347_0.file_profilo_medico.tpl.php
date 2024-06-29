<?php
/* Smarty version 5.3.0, created on 2024-06-29 17:06:37
  from 'file:profilo_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_668022fd3a4e91_02946555',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '815df59d6e34d5d0b3319d7c167325685cf31347' => 
    array (
      0 => 'profilo_medico.tpl',
      1 => 1719673585,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_668022fd3a4e91_02946555 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_431805979668022fd39fd56_92339127', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_431805979668022fd39fd56_92339127 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


    <div style="padding:5px;"> <br><br>
	<h2> Profilo Personale - Dr. <?php echo $_smarty_tpl->getValue('medico')['nome'];?>
 <?php echo $_smarty_tpl->getValue('medico')['cognome'];?>
</h2>
        <h4>Informazioni Personali</h4>
	<img class='img' src="src="data:<?php echo $_smarty_tpl->getValue('medico')['tipoimmagine'];?>
;base64,<?php echo $_smarty_tpl->getValue('medico')['img'];?>
" alt='Foto Profilo' style='width:300px;height:300px;border-radius:50%; float:right; margin-right:150px;'>
        <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Nome:</p>
        <p style='font-size:20px; font-family:monospace;'><?php echo $_smarty_tpl->getValue('medico')['nome'];?>
</p>
        <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Cognome:</p>
        <p style='font-size:20px; font-family:monospace;'><?php echo $_smarty_tpl->getValue('medico')['cognome'];?>
</p>
        <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Email:</p>
        <p style='font-size:20px; font-family:monospace;'><?php echo $_smarty_tpl->getValue('medico')['email'];?>
</p>
        <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Costo:</p>
        <p style='font-size:20px; font-family:monospace;'><?php echo $_smarty_tpl->getValue('medico')['costo'];?>
€</p>
        <a class='btn btn-primary' style='width:195px;' href="/Ambulacare/Medico/logout">Logout</a>
        <a class='btn btn-primary' style='width:195px;' href="/Ambulacare/Medico/formSetInfoMedico">Modifica Dati</a>
    </div>

<?php
}
}
/* {/block 'content'} */
}
