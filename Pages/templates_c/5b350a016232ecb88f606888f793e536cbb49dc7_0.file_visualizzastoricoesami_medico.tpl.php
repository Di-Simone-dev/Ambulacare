<?php
/* Smarty version 5.3.0, created on 2024-06-27 09:29:07
  from 'file:visualizzastoricoesami_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667d14c3a75237_72093292',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b350a016232ecb88f606888f793e536cbb49dc7' => 
    array (
      0 => 'visualizzastoricoesami_medico.tpl',
      1 => 1719473315,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667d14c3a75237_72093292 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1259197759667d14c3a65567_81640503', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1259197759667d14c3a65567_81640503 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


    <br><br>
    <div>
        <h2>Filtra per data</h2>
        <form action="/Ambulacare/Medico/ricerca_storico_appuntamenti_medico" method="post">
            <input type="date" name="data" required>
            <button type="submit">Procedi</button>
        </form>
    </div>

    <br><br>
    <div>
        <table class="table">
            <thead style="text-align: center;">
                <tr>
                    <th scope="col">Data e ora</th>
                    <th scope="col">Nome Paziente</th>
                    <th scope="col">Cognome Paziente</th>
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
                        <td><?php echo $_smarty_tpl->getValue('esame')['nomepaziente'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('esame')['cognomepaziente'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('esame')['costoappuntamento'];?>
</td>
                        <td><a href="/Ambulacare/Medico/" class="btn btn-primary">Referto</a></td>
                    </tr>
                <?php ob_start();
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

            </tbody>
        </table>
    </div>

<?php
}
}
/* {/block 'content'} */
}
