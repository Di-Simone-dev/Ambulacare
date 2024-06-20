<?php
/* Smarty version 5.3.0, created on 2024-06-20 10:28:36
  from 'file:visualizzastoricoesamipaz_admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6673e8346a22f9_68930561',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a01078c72c872d4f1adc5d41dd66598206d7ebe' => 
    array (
      0 => 'visualizzastoricoesamipaz_admin.tpl',
      1 => 1718872112,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6673e8346a22f9_68930561 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_14627914726673e83467afd5_99675723', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_admin.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_14627914726673e83467afd5_99675723 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
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
                    <th scope="col">Data</th>
                    <th scope="col">Ora</th>
                    <th scope="col">Tipologia</th>
                    <th scope="col">Medico</th>
                    <th scope="col">Azioni</th>
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
                    <td><?php echo $_smarty_tpl->getValue('esame')['data'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('esame')['orario'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('esame')['categoria'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('esame')['medico']['nome'];?>
</td>
                    <td>
                        <?php if ($_smarty_tpl->getValue('esame')['referto']) {?>
                            <a href=""><button class="btn btn-primary">Visualizza Referto</button></a>
                        <?php }?>
                        <a href=""><button class="btn btn-primary">Elimina Esame</button></a>
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
