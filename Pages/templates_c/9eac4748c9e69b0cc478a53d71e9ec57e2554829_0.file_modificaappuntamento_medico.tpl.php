<?php
/* Smarty version 5.3.0, created on 2024-06-30 14:41:17
  from 'file:modificaappuntamento_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6681526d9895b7_99239840',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9eac4748c9e69b0cc478a53d71e9ec57e2554829' => 
    array (
      0 => 'modificaappuntamento_medico.tpl',
      1 => 1719751275,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6681526d9895b7_99239840 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_8298220896681526d968063_03339854', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_8298220896681526d968063_03339854 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>


    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/Ambulacare/Medico/modifica_appuntamento" method="post">
                    <div class="form-group">
                        <div class="col-9" id="elenco">
                            <h2>Costo: <?php echo $_smarty_tpl->getValue('esame')['costo'];?>
€</h2>
                            <h2>Data Odierna:
                                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')(time(),'%d/%m/%Y');?>
</h2>
                            <h2>Orari disponibili</h2>
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
                            <br>
                            <div>
                                <h4><label>Nuova Data :</label><input type="date" id="nuovadata"
                                        name="data" />&ensp;&ensp;&ensp;&ensp;&ensp;<label>Vecchia Data:
                                        <?php echo $_smarty_tpl->getValue('esame')['data'];?>
</label></h4>
                                <label for="data">Seleziona una nuova data e ora</label>
                                <select name="nslot" id="orario" class="form-select-m">
                                <option value="1">14:30</option>
                                <option value="2">15:30</option>
                                <option value="3">16:30</option>
                                <option value="4">17:30</option>
                                <option value="5">18:30</option>
                                </select>
                                <input type="hidden" name="IdAppuntamento" value="<?php echo $_smarty_tpl->getValue('esame')['IdAppuntamento'];?>
">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div>
                        <a href="/Ambulacare/Medico/visualizza_agenda" class="btn btn-primary" id="annulla">Annulla</a>
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
