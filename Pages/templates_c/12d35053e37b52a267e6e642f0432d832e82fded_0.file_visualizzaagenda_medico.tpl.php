<?php
/* Smarty version 5.3.0, created on 2024-06-27 18:13:30
  from 'file:visualizzaagenda_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667d8faae8a5f5_43714377',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '12d35053e37b52a267e6e642f0432d832e82fded' => 
    array (
      0 => 'visualizzaagenda_medico.tpl',
      1 => 1719504807,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667d8faae8a5f5_43714377 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_775748928667d8faae730a6_95775830', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_775748928667d8faae730a6_95775830 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#">
                    <div class="form-group">
                        <h2>Agenda</h2>
                        <br>
                        <input type="date" id="dataprenot" name="dataprenot" />
                        <br><br>
                        <button type="submit" class="btn btn-primary">Filtra Risultati</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br>
    <div>
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
