<?php
/* Smarty version 5.3.0, created on 2024-06-30 17:31:06
  from 'file:visualizzaappuntamentiprenotati_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66817a3a30e752_51894947',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8c02fe0a55e975a5dc204b01f458ec78ed16232' => 
    array (
      0 => 'visualizzaappuntamentiprenotati_paziente.tpl',
      1 => 1719761465,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66817a3a30e752_51894947 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_62784222366817a3a303e51_58589037', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_62784222366817a3a303e51_58589037 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>


    <br><br>
    <div style="padding:35px;">
	<h2>Elenco Appuntamenti prenotati</h2>
<br><br>
        <table class="table">
            <thead style="text-align: center;">
                <tr>
                    <th scope="col">Data e ora</th>
                    <th scope="col">Medico</th>
                    <th scope="col">Tipologia</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('esami'), 'esame');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('esame')->value) {
$foreach0DoElse = false;
?>
                <tr>
                <td><?php echo $_smarty_tpl->getValue('esame')['dataeora'];?>
</td>
                <td><?php echo $_smarty_tpl->getValue('esame')['nomemedico'];?>
 <?php echo $_smarty_tpl->getValue('esame')['cognomemedico'];?>
</td>
                <td><?php echo $_smarty_tpl->getValue('esame')['nometipologiamedico'];?>
</td>
                <td><?php echo $_smarty_tpl->getValue('esame')['costomedico'];?>
</td>
                    <td><a href="/Ambulacare/Paziente/dettagli_appuntamento_modifica/<?php echo $_smarty_tpl->getValue('esame')['IdAppuntamento'];?>
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
