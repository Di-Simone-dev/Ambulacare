<?php
/* Smarty version 5.3.0, created on 2024-06-25 10:08:45
  from 'file:prenotaappuntamento_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667a7b0d7526b5_00707083',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c50ff5a7ff8181894095e250db0ab60cd81eefd0' => 
    array (
      0 => 'prenotaappuntamento_paziente.tpl',
      1 => 1719302922,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667a7b0d7526b5_00707083 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2096056665667a7b0d72d939_26546081', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_2096056665667a7b0d72d939_26546081 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>



    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="">
                    <div class="form-group">
                        <div class="col-9" id="elenco">
                            <h3>Esame: <?php echo $_smarty_tpl->getValue('medico')['nometipologia'];?>
&ensp;&ensp;&ensp;&ensp;Costo: <?php echo $_smarty_tpl->getValue('medico')['costo'];?>
€</h3>
                            <h3>Medico: <?php echo $_smarty_tpl->getValue('medico')['nome'];?>
 <?php echo $_smarty_tpl->getValue('medico')['cognome'];?>
&ensp;&ensp;&ensp;Data Odierna:
                                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')(time(),'%d/%m/%Y');?>
</h3>

                            <h3>Valutazione:
                                <?php echo $_smarty_tpl->getValue('medico')['valutazione'];?>
/5&#9733;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Disponibilità
                                Orari
                                del Medico</h3>
                            <a class="bottonitab">
                                << /a>
                                    <a class="bottonitab">></a>
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
$_smarty_tpl->assign('i', null);
$_smarty_tpl->tpl_vars['i']->value = 1;
if ($_smarty_tpl->getValue('i') < 6) {
for ($_foo=true;$_smarty_tpl->getValue('i') < 6; $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                                <tr>
                                                    <?php
$_smarty_tpl->assign('j', null);
$_smarty_tpl->tpl_vars['j']->value = 1;
if ($_smarty_tpl->getValue('j') <= 6) {
for ($_foo=true;$_smarty_tpl->getValue('j') <= 6; $_smarty_tpl->tpl_vars['j']->value++) {
?>
                                                        <?php if ($_smarty_tpl->getValue('fasceorarie')[$_smarty_tpl->getValue('i')][$_smarty_tpl->getValue('j')]) {?>
                                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">
                                                                <?php echo 13+$_smarty_tpl->getValue('j');?>
:30</td>
                                                        <?php } else { ?>
                                                            <td style="border: 1px solid;background-color: red"><?php echo 13+$_smarty_tpl->getValue('i');?>
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
                                        <label for="data">Seleziona una data e ora</label>
                                        <select name="nslot" id="orario" class="form-select-m">
                                            <option value="14:30">14:30</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:30">18:30</option>
                                        </select>
                                        <input type="hidden" value="{}" name="IdMedico">
                                    </div>
                        </div>
                    </div>
                    <br><br><br>
                    <div>
                        <a class="btn btn-primary" id="annulla">Annulla</a>
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
