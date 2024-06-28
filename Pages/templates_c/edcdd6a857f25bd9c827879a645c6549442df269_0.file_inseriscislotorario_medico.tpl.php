<?php
/* Smarty version 5.3.0, created on 2024-06-18 11:51:09
  from 'file:inseriscislotorario_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6671588d2481d5_47042765',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'edcdd6a857f25bd9c827879a645c6549442df269' => 
    array (
      0 => 'inseriscislotorario_medico.tpl',
      1 => 1718704266,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6671588d2481d5_47042765 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1130293276671588d2262d1_02053084', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1130293276671588d2262d1_02053084 extends \Smarty\Runtime\Block
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
                            <h2>Disponibilità Orari Attule</h2>
                            <table class="table" id style="border: 1px solid;">
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
                            <div>
                                <label>Disponibile in data : </label>&ensp;<input type="date" id="datadisp"
                                    placeholder="Data Disponibile" name="datadisp" />
                                <br>
                                <label>Inizio orario di Disponibilità : </label>&ensp;<input type="time" id="inizioorario"
                                    placeholder="Inizio Orario" name="inizioorario" />
                                <br>
                                <label>Fine orario di Disponibilità : </label>&ensp;<input type="time" id="fineorario"
                                    placeholder="Fine Orario" name="fineorario" />
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Annulla</button>
                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Conferma</button>
                </form>
            </div>
        </div>
    </div>


<?php
}
}
/* {/block 'content'} */
}
