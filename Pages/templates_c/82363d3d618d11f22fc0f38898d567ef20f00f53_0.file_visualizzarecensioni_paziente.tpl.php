<?php
/* Smarty version 5.3.0, created on 2024-06-30 18:04:54
  from 'file:visualizzarecensioni_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66818226cf2ee1_15514450',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '82363d3d618d11f22fc0f38898d567ef20f00f53' => 
    array (
      0 => 'visualizzarecensioni_paziente.tpl',
      1 => 1719762103,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66818226cf2ee1_15514450 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_57510822366818226ce6238_38664981', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_57510822366818226ce6238_38664981 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

    
    <br><br>
    <div style="padding:35px;">
	<h2>Le mie Recensioni</h2>
<br><br>
        <table class="table">
            <thead style="text-align: center;">
                <tr>
                    <th scope="col">Medico</th>
                    <th scope="col">Data e Ora</th>
                    <th scope="col">Valutazione</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('recensioni'), 'recensione');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('recensione')->value) {
$foreach0DoElse = false;
?>
                <tr>
                    <td><img style="padding:2px" class="rounded-circle ml-3" width="60" height="60" src="data:<?php echo $_smarty_tpl->getValue('recensione')['tipoimg'];?>
;base64,<?php echo $_smarty_tpl->getValue('recensione')['datiimg'];?>
" alt="profile picture" /><?php echo $_smarty_tpl->getValue('recensione')['nominativomedico'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('recensione')['data_ora'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('recensione')['valutazione'];?>
/5&#9733;</td>
                    <td><a href="/Ambulacare/Paziente/dettaglio_recensione_risposta/<?php echo $_smarty_tpl->getValue('recensione')['IdRecensione'];?>
" class="btn btn-primary">Dettagli</a></td>
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
