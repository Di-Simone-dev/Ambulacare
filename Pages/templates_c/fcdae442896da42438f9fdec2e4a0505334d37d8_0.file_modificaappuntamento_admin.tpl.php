<?php
/* Smarty version 5.3.0, created on 2024-06-18 15:40:26
  from 'file:modificaappuntamento_admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66718e4ab7aec5_95347870',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fcdae442896da42438f9fdec2e4a0505334d37d8' => 
    array (
      0 => 'modificaappuntamento_admin.tpl',
      1 => 1718718024,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66718e4ab7aec5_95347870 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_120878380066718e4ab49d98_71244443', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_admin.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_120878380066718e4ab49d98_71244443 extends \Smarty\Runtime\Block
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
                        <div class="col-9" id="elenco">
                            <h2>Esame: <?php echo $_smarty_tpl->getValue('esame')['categoria'];?>
&ensp;&ensp;&ensp;&ensp;Costo: <?php echo $_smarty_tpl->getValue('esame')['costo'];?>
€</h2>
                            <h2>Medico: <?php echo $_smarty_tpl->getValue('esame')['medico'];?>
&ensp;&ensp;&ensp;Data Odierna: <?php echo $_smarty_tpl->getValue('esame')['data'];?>
</h2>
                            <h2>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Disponibilità Orari del Medico</h2>
                            <br>
                            <table class="table" id="orari" style="border: 1px solid;">
                                <thead style="background-color: rgb(230, 230, 230);text-align: center;">
                                    <tr>
                                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('fascieorarie'), 'fasciaoraria');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('fasciaoraria')->value) {
$foreach0DoElse = false;
?>
                                        <th scope="col"><?php echo $_smarty_tpl->getValue('fasciaoraria')['giorno'];?>
</th>
                                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
$_smarty_tpl->assign('i', null);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->getValue('i') < $_smarty_tpl->getValue('maxdim')) {
for ($_foo=true;$_smarty_tpl->getValue('i') < $_smarty_tpl->getValue('maxdim'); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                    <tr>
                                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('fascieorarie'), 'fasciaoraria');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('fasciaoraria')->value) {
$foreach1DoElse = false;
?>
                                            <td <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('fasciaoraria')['orari']) > $_smarty_tpl->getValue('i')) {?>
                                                style="border: 1px solid;background-color: rgb(105, 200, 255);"><?php echo $_smarty_tpl->getValue('fasciaoraria')['orari'][$_smarty_tpl->getValue('i')];?>

                                            <?php } else { ?>
                                                style="border: 1px solid;background-color: red">
                                            <?php }?>
                                            </td>
                                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                                    </tr>
                                <?php }
}
?>
                                </tbody>
                            </table>
                            <br>
                            <div>
                                <h4><label>Nuova Data :</label><input type="date" id="nuovadata" placeholder="Nuova Data"
                                        name="nuovadata" />&ensp;&ensp;&ensp;&ensp;&ensp;<label>Vecchia Data:
                                        <?php echo $_smarty_tpl->getValue('esame')['data'];?>
</label></h4>
                                <h4><label>Nuovo Orario : </label><input type="time" id="nuovoorario"
                                        placeholder="Nuovo Orario"
                                        name="nuovoorario" />&ensp;&ensp;&ensp;&ensp;&ensp;<label>Vecchio Orario:
                                        <?php echo $_smarty_tpl->getValue('esame')['orario'];?>
</label></h4>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div style="left: 550px;">
                        <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Annulla</button>
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Conferma</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
}
}
/* {/block 'content'} */
}
