<?php
/* Smarty version 5.3.0, created on 2024-06-18 16:08:20
  from 'file:prenotaesame_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667194d4bbe482_24532928',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'acceed5d7a1b5a938deb8b741d0b0b1df2a6fdf7' => 
    array (
      0 => 'prenotaesame_paziente.tpl',
      1 => 1718719693,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667194d4bbe482_24532928 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_21278570667194d4b78693_28234553', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_21278570667194d4b78693_28234553 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>



    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#">
                    <div class="form-group">
                        <div class="col-9" id="elenco">
                            <h3>Esame: <?php echo $_smarty_tpl->getValue('esame')['nome'];?>
&ensp;&ensp;&ensp;&ensp;Costo: <?php echo $_smarty_tpl->getValue('esame')['costo'];?>
€</h3>
                            <h3>Medico: <?php echo $_smarty_tpl->getValue('esame')['medico']['nome'];?>
&ensp;&ensp;&ensp;Data Odierna: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')(time(),'%d/%m/%Y');?>
</h3>
                  
                            <h3>Valutazione: <?php echo $_smarty_tpl->getValue('esame')['medico']['valutazione'];?>
/5&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Disponibilità Orari
                                del Medico</h3>
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
                                <h4><label>Data Appuntamento:</label><input type="date" id="dataapp"
                                        placeholder="Data Appuntamento" name="datadisp" /></h4>
                                <h4><label>Ora Appuntamento : </label><input type="time" id="oraapp"
                                        placeholder="Ora Appuntamento" name="oraapp" /></h4>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <div>
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
