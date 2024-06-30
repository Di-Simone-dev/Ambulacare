<?php
/* Smarty version 5.3.0, created on 2024-06-30 09:12:50
  from 'file:inserisciorariodisponibile_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_668105725c29a5_53296698',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '861b2ea6806dba2aba3a6eed88592096b4f1154c' => 
    array (
      0 => 'inserisciorariodisponibile_medico.tpl',
      1 => 1719730588,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_668105725c29a5_53296698 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1621682490668105725ae2b3_17661739', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1621682490668105725ae2b3_17661739 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>


    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/Ambulacare/Medico/conferma_orari_disponibilita" method="post">
                    <div class="form-group">
                        <div class="col-9" id="elenco">
                            <h2>Disponibilità Orari Attuale</h2>
                            <br>
                            <a class="bottonitab"></a>
                                    <a class="bottonitab"></a>
                                    <br>
                                    <table class="table" id="orari" style="border: 1px solid;">
                                        <thead style="background-color: rgb(230, 230, 230);text-align: center;">
                                            <tr>
                                                <th scope="col">Lunedì <?php echo $_smarty_tpl->getValue('giorno')[0];?>
</th>
                                                <th scope="col">Martedì <?php echo $_smarty_tpl->getValue('giorno')[1];?>
</th>
                                                <th scope="col">Mercoledì <?php echo $_smarty_tpl->getValue('giorno')[2];?>
</th>
                                                <th scope="col">Giovedì <?php echo $_smarty_tpl->getValue('giorno')[3];?>
</th>
                                                <th scope="col">Venerdì <?php echo $_smarty_tpl->getValue('giorno')[4];?>
</th>
                                                <th scope="col">Sabato <?php echo $_smarty_tpl->getValue('giorno')[5];?>
</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
$_smarty_tpl->assign('j', null);
$_smarty_tpl->tpl_vars['j']->value = 1;
if ($_smarty_tpl->getValue('j') < 6) {
for ($_foo=true;$_smarty_tpl->getValue('j') < 6; $_smarty_tpl->tpl_vars['j']->value++) {
?>
                                                <tr>
                                                    <?php
$_smarty_tpl->assign('i', null);
$_smarty_tpl->tpl_vars['i']->value = 1;
if ($_smarty_tpl->getValue('i') < 7) {
for ($_foo=true;$_smarty_tpl->getValue('i') < 7; $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                                        <?php if ($_smarty_tpl->getValue('fasceorarie')[$_smarty_tpl->getValue('i')][$_smarty_tpl->getValue('j')]) {?>
                                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">
                                                                <?php echo 13+$_smarty_tpl->getValue('j');?>
:30</td>
                                                        <?php } else { ?>
                                                            <td style="border: 1px solid;background-color: red"><?php echo 13+$_smarty_tpl->getValue('j');?>
:30</td>
                                                        <?php }?>
                                                    <?php }
}
?>
                                                </tr>
                                            <?php }
}
?>
                                        </tbody>
                                    </table>
                                    <div>
                                        <label>Disponibile in data : </label>&ensp;<input type="date" id="datadisp"
                                            name="datadisp" />
                                        <br>
                                        <label>Orario di Disponibilità: </label><br>
                                        <input type="checkbox" id="orariodisp" name="orariodisp[]"
                                            value="14:30" />14:30-15:30<br>
                                        <input type="checkbox" id="orariodisp" name="orariodisp[]"
                                            value="15:30" />15:30-16:30<br>
                                        <input type="checkbox" id="orariodisp" name="orariodisp[]"
                                            value="16:30" />16:30-17:30<br>
                                        <input type="checkbox" id="orariodisp" name="orariodisp[]"
                                            value="17:30" />17:30-18:30<br>
                                        <input type="checkbox" id="orariodisp" name="orariodisp[]"
                                            value="18:30" />18:30-19:30
                                        </h3>
                                    </div>
                        </div>
                    </div>
                    <br><br>
                    <div>
                        <a type="submit" class="btn btn-primary" id="annulla">Annulla</a>
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <button type="submit" class="btn btn-primary" id="conferma">Conferma</button>
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
