<?php
/* Smarty version 5.3.0, created on 2024-06-30 20:01:45
  from 'file:modificaappuntamento_admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66819d8989f464_72469113',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee1d8945a326e2d1c573b6b5c93939faacd2e16c' => 
    array (
      0 => 'modificaappuntamento_admin.tpl',
      1 => 1719770504,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66819d8989f464_72469113 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_109295850366819d89891821_53210994', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_admin.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_109295850366819d89891821_53210994 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>


    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/Ambulacare/Amministratore/modifica_appuntamento" method="post">
                    <div class="form-group">
                        <div class="col-9" id="elenco">
                            <h3>Esame: <?php echo $_smarty_tpl->getValue('esame')['nometipologia'];?>
&ensp;&ensp;&ensp;&ensp;Costo: <?php echo $_smarty_tpl->getValue('esame')['costo'];?>
€</h3>
                            <h3>Medico: <?php echo $_smarty_tpl->getValue('esame')['nome'];?>
 <?php echo $_smarty_tpl->getValue('esame')['cognome'];?>
&ensp;&ensp;&ensp;Data Odierna:
                                <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')(time(),'%d/%m/%Y');?>
</h3>
                            <h3>Disponibilità Orari del Medico</h3>
			<?php if ($_smarty_tpl->getValue('week')) {?>
                                <a class="bottonitab" href="/Ambulacare/Amministratore/dettagli_appuntamento_modifica/<?php echo $_smarty_tpl->getValue('medico')['IdAppuntamento'];?>
"> < </a>
                              <?php } else { ?>
                                <a class="bottonitab" href="/Ambulacare/Amministratore/dettagli_appuntamento_modifica/<?php echo $_smarty_tpl->getValue('medico')['IdAppuntamento'];?>
/1"> > </a>
                                    <?php }?>
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
                                <h4>Nuova Data :<input type="date" id="nuovadata"
                                        name="data" /><br><br>Vecchia Data:
                                        <?php echo $_smarty_tpl->getValue('esame')['data'];?>
</h4>
<br>
                                <h4>Seleziona una nuova data e ora</h4>
                                <select name="nslot" id="orario" class="form-select">
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
                        <a href="/Ambulacare/Amministratore/gestione_appuntamenti" class="btn btn-primary" id="annulla">Annulla</a>
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
