<?php
/* Smarty version 5.3.0, created on 2024-06-30 19:21:09
  from 'file:visualizzastoricoesamipaz_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66819405f17b55_84752771',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7d62dcabc425e214b6d3002dc6c4241f76edda0' => 
    array (
      0 => 'visualizzastoricoesamipaz_medico.tpl',
      1 => 1719767826,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66819405f17b55_84752771 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_184776333466819405f067c5_41264988', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_184776333466819405f067c5_41264988 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>


    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Storico Esami di <?php echo $_smarty_tpl->getValue('paziente')['nome'];?>
 <?php echo $_smarty_tpl->getValue('paziente')['cognome'];?>
</h2>
            </div>
        </div>
    </div>
    <br><br>
    <div>
        <table class="table">
            <thead style="text-align: center;">
                <tr>
                    <th scope="col">Data e ora</th>
                    <th scope="col">Tipologia</th>
                    <th scope="col">Medico</th>
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
                    <td><?php echo $_smarty_tpl->getValue('esame')['nometipologiamedico'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('esame')['nomemedico'];?>
 <?php echo $_smarty_tpl->getValue('esame')['cognomemedico'];?>
</td>
                    <td>
                        <?php if ($_smarty_tpl->getValue('esame')['IdReferto']) {?>
                            <a href="/Ambulacare/Medico/visualizza_referto/<?php echo $_smarty_tpl->getValue('esame')['IdReferto'];?>
" class="btn btn-primary">Visualizza Referto</a>
                        <?php }?>
                    </td>
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
