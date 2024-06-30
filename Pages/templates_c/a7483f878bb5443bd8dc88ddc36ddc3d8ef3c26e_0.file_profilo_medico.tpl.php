<?php
/* Smarty version 5.3.0, created on 2024-06-30 13:05:15
  from 'file:profilo_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66813beba3ba72_18207233',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7483f878bb5443bd8dc88ddc36ddc3d8ef3c26e' => 
    array (
      0 => 'profilo_medico.tpl',
      1 => 1719745141,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66813beba3ba72_18207233 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_199702292166813beba2b653_49413526', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_199702292166813beba2b653_49413526 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>

<br><br>
    <div style="padding:35px;">
	<h2> Profilo Personale - Dr. <?php echo $_smarty_tpl->getValue('medico')['nome'];?>
 <?php echo $_smarty_tpl->getValue('medico')['cognome'];?>
</h2>
        <h4>Informazioni Personali</h4>
	<img class='img' src="data:<?php echo $_smarty_tpl->getValue('medico')['tipoimmagine'];?>
;base64,<?php echo $_smarty_tpl->getValue('medico')['img'];?>
" alt='Foto Profilo' style='width:300px;height:300px;border-radius:50%;float:right; margin-right:150px;'>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 20px;font-weight: bold;"> Nome:</label>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 18px;"><?php echo $_smarty_tpl->getValue('medico')['nome'];?>
</label>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 20px;font-weight: bold;"> Cognome:</label>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 18px;"><?php echo $_smarty_tpl->getValue('medico')['cognome'];?>
</label>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 20px;font-weight: bold;"> Email:</label>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 18px;"><?php echo $_smarty_tpl->getValue('medico')['email'];?>
</label>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 20px;font-weight: bold;"> Costo:</label>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 18px;"><?php echo $_smarty_tpl->getValue('medico')['costo'];?>
€</label>
<br><br>
        <a class='btn btn-primary' style='width:195px;' href="/Ambulacare/Medico/formSetInfoMedico">Modifica Dati</a>
    </div>

<?php
}
}
/* {/block 'content'} */
}
