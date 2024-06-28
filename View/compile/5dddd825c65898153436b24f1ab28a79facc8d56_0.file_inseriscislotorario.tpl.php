<?php
/* Smarty version 5.3.0, created on 2024-06-16 11:10:04
  from 'file:pages/inseriscislotorario.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_666eabec26b173_90567784',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5dddd825c65898153436b24f1ab28a79facc8d56' => 
    array (
      0 => 'pages/inseriscislotorario.tpl',
      1 => 1717065821,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_666eabec26b173_90567784 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\View\\template\\pages';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1185939648666eabebc06490_66984683', 'body');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block 'body'} */
class Block_1185939648666eabebc06490_66984683 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\View\\template\\pages';
?>


    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#">
                    <div class="form-group">
                        <div class="col-9" id="elenco">
                            <h2>Disponibilità Orari Attule</h2>
                            <table class="table" id style="border: 1px solid;">
                                <thead>
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
if ($_smarty_tpl->getValue('i') < $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('fascieorarie')[0]['orari'])) {
for ($_foo=true;$_smarty_tpl->getValue('i') < $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('fascieorarie')[0]['orari']); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                        <tr>
                                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('fascieorarie'), 'fasciaoraria');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('fasciaoraria')->value) {
$foreach1DoElse = false;
?>
                                            <td><?php echo $_smarty_tpl->getValue('fasciaoraria')['orari'][$_smarty_tpl->getValue('i')];?>
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
/* {/block 'body'} */
}
