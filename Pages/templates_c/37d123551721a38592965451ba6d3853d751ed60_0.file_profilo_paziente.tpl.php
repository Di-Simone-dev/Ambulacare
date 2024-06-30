<?php
/* Smarty version 5.3.0, created on 2024-06-30 18:04:56
  from 'file:profilo_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66818228c3ea98_04599827',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37d123551721a38592965451ba6d3853d751ed60' => 
    array (
      0 => 'profilo_paziente.tpl',
      1 => 1719747652,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66818228c3ea98_04599827 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_144251007666818228c38992_39017070', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_144251007666818228c38992_39017070 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

<br><br>
    <div style="padding:35px;">
    <h2> Profilo Personale - Sig. <?php echo $_smarty_tpl->getValue('paziente')['nome'];?>
 <?php echo $_smarty_tpl->getValue('paziente')['cognome'];?>
</h2>
    <h4>Informazioni Personali </h4>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 20px;font-weight: bold;"> Nome:</label>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 18px;"><?php echo $_smarty_tpl->getValue('paziente')['nome'];?>
</label>
<br><br>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 20px;font-weight: bold;"> Cognome:</label>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 18px;"><?php echo $_smarty_tpl->getValue('paziente')['cognome'];?>
</label>
<br><br>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 20px;font-weight: bold;"> Email:</label>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 18px;"><?php echo $_smarty_tpl->getValue('paziente')['email'];?>
</label>
<br><br>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 20px;font-weight: bold;"> Codice Fiscale:</label>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 18px;"><?php echo $_smarty_tpl->getValue('paziente')['codice_fiscale'];?>
</label>
<br><br>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 20px;font-weight: bold;"> Data di Nascita:</label>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 18px;"><?php echo $_smarty_tpl->getValue('paziente')['data_nascita'];?>
</label>
<br><br>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 20px;font-weight: bold;"> Luogo di Nascita:</label>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 18px;"><?php echo $_smarty_tpl->getValue('paziente')['luogo_nascita'];?>
</label>
<br><br>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 20px;font-weight: bold;"> Residenza:</label>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 18px;"><?php echo $_smarty_tpl->getValue('paziente')['residenza'];?>
</label>
<br><br>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 20px;font-weight: bold;"> Telefono:</label>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 18px;"><?php echo $_smarty_tpl->getValue('paziente')['numero_telefono'];?>
</label>
<br><br>

        <a class='btn btn-primary' style='width:195px;' href="/Ambulacare/Paziente/formSetInfoPaziente">Modifica Dati</a>
             </div>
<?php
}
}
/* {/block 'content'} */
}
