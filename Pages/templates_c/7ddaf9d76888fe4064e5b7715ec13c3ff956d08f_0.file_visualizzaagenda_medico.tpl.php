<?php
/* Smarty version 5.3.0, created on 2024-06-30 20:10:45
  from 'file:visualizzaagenda_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66819fa5744f96_99660425',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ddaf9d76888fe4064e5b7715ec13c3ff956d08f' => 
    array (
      0 => 'visualizzaagenda_medico.tpl',
      1 => 1719771044,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66819fa5744f96_99660425 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_75440530866819fa5729756_73074510', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_75440530866819fa5729756_73074510 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>


    <br><br>
    <div style="padding:35px;">
	<h2>Agenda</h2>
<br>
        <table class="table">
            <thead style="text-align: center;">
                <tr>
                    <th scope="col">Nome e Cognome Paziente</th>
                    <th scope="col">Data e Ora</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('appuntamenti'), 'appuntamento');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('appuntamento')->value) {
$foreach0DoElse = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->getValue('appuntamento')['nominativo_paziente'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('appuntamento')['data_ora_appuntamento'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('appuntamento')['costo'];?>
</td>
                        <td><a href="/Ambulacare/Medico/dettagli_appuntamento_modifica/<?php echo $_smarty_tpl->getValue('appuntamento')['IdAppuntamento'];?>
" class="btn btn-primary">Modifica</a></td>
                    </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </div>

<?php
}
}
/* {/block 'content'} */
}
