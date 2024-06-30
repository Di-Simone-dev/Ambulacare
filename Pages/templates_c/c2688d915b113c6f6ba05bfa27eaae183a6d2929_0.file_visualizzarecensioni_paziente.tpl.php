<?php
/* Smarty version 5.3.0, created on 2024-06-30 15:11:27
  from 'file:visualizzarecensioni_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6681597f02cf72_30576614',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c2688d915b113c6f6ba05bfa27eaae183a6d2929' => 
    array (
      0 => 'visualizzarecensioni_paziente.tpl',
      1 => 1719752867,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6681597f02cf72_30576614 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_9102604726681597f014cf2_41939683', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_9102604726681597f014cf2_41939683 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
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
                    <td><img style="padding:2px" class="rounded-circle ml-3" width="60" height="60" src="data:<?php echo $_smarty_tpl->getValue('medico')['tipoimmagine'];?>
;base64,<?php echo $_smarty_tpl->getValue('medico')['img'];?>
" alt="profile picture" /><?php echo $_smarty_tpl->getValue('recensione')['nominativomedico'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('recensione')['data_ora'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('recensione')['valutazione'];?>
/5&#9733;</td>
                    <td><a href="/Ambulacare/Admin/recensione/<?php echo $_smarty_tpl->getValue('recensione')['id'];?>
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
