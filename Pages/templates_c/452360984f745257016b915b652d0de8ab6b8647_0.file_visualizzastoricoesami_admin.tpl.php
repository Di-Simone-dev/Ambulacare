<?php
/* Smarty version 5.3.0, created on 2024-06-20 10:08:58
  from 'file:visualizzastoricoesami_admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6673e39a606253_85934136',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '452360984f745257016b915b652d0de8ab6b8647' => 
    array (
      0 => 'visualizzastoricoesami_admin.tpl',
      1 => 1718870405,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6673e39a606253_85934136 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_8691100936673e39a5eed00_54015664', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_admin.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_8691100936673e39a5eed00_54015664 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

    
    <br><br>
    <div>
        <table class="table">
            <thead style="text-align: center;">
                <tr>
                    <th scope="col">Nome Paziente</th>
                    <th scope="col">Cognome Paziente</th>
                    <th scope="col">Data di Nascita</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('pazienti'), 'paziente');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('paziente')->value) {
$foreach0DoElse = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->getValue('paziente')['nome'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('paziente')['cognome'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('paziente')['data'];?>
</td>
                    <td><a href="/Ambulacare/Admin/esamipaziente/<?php echo $_smarty_tpl->getValue('paziente')['id'];?>
"><button class="btn btn-primary">Visualizza Storico Esami</button></a></td>
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
