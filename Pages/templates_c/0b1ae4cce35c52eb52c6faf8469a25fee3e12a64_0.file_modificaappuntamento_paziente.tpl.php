<?php
/* Smarty version 5.3.0, created on 2024-06-26 19:43:10
  from 'file:modificaappuntamento_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667c532ec74a89_75992163',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b1ae4cce35c52eb52c6faf8469a25fee3e12a64' => 
    array (
      0 => 'modificaappuntamento_paziente.tpl',
      1 => 1719423788,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667c532ec74a89_75992163 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_927376830667c532ec4f889_86803068', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_927376830667c532ec4f889_86803068 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/Ambulacare/Paziente/modifica_appuntamento" method="post">
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
                                <?php if ($_smarty_tpl->getValue('medico')['valutazione']['IdMedico']) {?>
                                    <?php echo $_smarty_tpl->getValue('medico')['valutazione']['valutazione'];?>

                                <?php } else { ?>0
                                <?php }?>/5&#9733;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Disponibilità
                                    Orari
                                    del Medico</h3>
                            <a class="bottonitab">
                                < </a>
                                    <a class="bottonitab"> > </a>
                                    <br>
                                    <table class="table" id="orari" style="border: 1px solid;">
                                        <thead style="background-color: rgb(230, 230, 230);text-align: center;">
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
                                        <label for="data">Seleziona una data e ora</label>
                                        <input type="date" name="data" required>
                                        <select name="nslot" id="orario" class="form-select-m">
                                            <option value="1">14:30</option>
                                            <option value="2">15:30</option>
                                            <option value="3">16:30</option>
                                            <option value="4">17:30</option>
                                            <option value="5">18:30</option>
                                        </select>
                                        <input type="hidden" value="<?php echo $_smarty_tpl->getValue('medico')['IdAppuntamento'];?>
" name="IdAppuntamento">
                                    </div>
                        </div>
                    </div>
                    <br>
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
