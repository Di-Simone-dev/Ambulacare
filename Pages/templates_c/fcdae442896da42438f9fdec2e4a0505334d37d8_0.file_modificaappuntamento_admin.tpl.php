<?php
/* Smarty version 5.3.0, created on 2024-06-21 16:16:46
  from 'file:modificaappuntamento_admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66758b4e971bd6_63289405',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fcdae442896da42438f9fdec2e4a0505334d37d8' => 
    array (
      0 => 'modificaappuntamento_admin.tpl',
      1 => 1718979404,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66758b4e971bd6_63289405 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_22860554066758b4e931fa8_08095307', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_admin.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_22860554066758b4e931fa8_08095307 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/Ambulacre/Admin/" method="post">
                    <input type="hidden" value="<?php echo $_smarty_tpl->getValue('esame')['id'];?>
" name="idesame">
                    <div class="form-group">
                        <div class="col-9" id="elenco">
                            <h2>Esame: <?php echo $_smarty_tpl->getValue('esame')['nome'];?>
&ensp;&ensp;&ensp;&ensp;Costo: <?php echo $_smarty_tpl->getValue('esame')['costo'];?>
€</h2>
                            <h2>Medico: <?php echo $_smarty_tpl->getValue('esame')['medico']['nome'];?>
&ensp;&ensp;&ensp;Data Odierna: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')(time(),'%d/%m/%Y');?>
</h2>
                            <h2>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Disponibilità Orari del Medico</h2>
                            <br>
                            <table class="table" id="orari" style="border: 1px solid;">
                                <thead style="background-color: rgb(230, 230, 230);text-align: center;">
                                    <tr>
                                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('fasceorarie'), 'fasciaoraria');
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
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('fasceorarie'), 'fasciaoraria');
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
                            <label for="data">Seleziona una nuova data e ora</label>
                            <select name="data" id="data">
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('fasceorarie'), 'fasciaoraria');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('fasciaoraria')->value) {
$foreach2DoElse = false;
?>
                                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('fasciaoraria')['orari'], 'ora');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('ora')->value) {
$foreach3DoElse = false;
?>
                                    <option value="<?php echo $_smarty_tpl->getValue('fasciaoraria')['giorno'];?>
 <?php echo $_smarty_tpl->getValue('ora');?>
"><?php echo $_smarty_tpl->getValue('fasciaoraria')['giorno'];?>
 - <?php echo $_smarty_tpl->getValue('ora');?>
</option>
                                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            </select>
                            <input type="hidden" value="" name="idpaz">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div style="left: 550px;">
                        <a href="/Ambulacare/Admin/visualizzaapp" class="btn btn-primary" style="width: 140px;height: 35px;">Annulla</a>
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
