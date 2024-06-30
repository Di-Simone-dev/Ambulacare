<?php
/* Smarty version 5.3.0, created on 2024-06-30 12:34:50
  from 'file:visualizzastoricoesami_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_668134ca939f63_52155994',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7aff309730e3a6ccb17622704abbcab37bad8c94' => 
    array (
      0 => 'visualizzastoricoesami_paziente.tpl',
      1 => 1719743495,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_668134ca939f63_52155994 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1276173467668134ca91f6b4_34071277', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1276173467668134ca91f6b4_34071277 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>

<br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/Ambulacare/Paziente/ricerca_appuntamenti_effettuati" method="post">
                    <div class="form-group">
                        <h2>Storico Esami</h2>
                        <br>
                        <select name="IdTipologia" class="form-select-m" required>
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('tipologie'), 'tipologia');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('tipologia')->value) {
$foreach0DoElse = false;
?>
                                <option value="<?php echo $_smarty_tpl->getValue('tipologia')['IdTipologia'];?>
"
                                    <?php if ($_smarty_tpl->getValue('tipologia')['IdTipologia'] == $_smarty_tpl->getValue('Idtipologia')) {?>
                                        selected="selected"
                                    <?php }?>
                                ><?php echo $_smarty_tpl->getValue('tipologia')['nome_tipologia'];?>
</option>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </select>
                        <br><br>
                        <input type="date" id="dataapp" name="data" required>
                        <br><br>
                        <button type="submit" class="btn btn-primary">Effettua Ricerca</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br>
    <div>
        <table class="table">
            <thead style="text-align: center;">
                <tr>
                    <th scope="col">Data e ora</th>
                    <th scope="col">Medico</th>
                    <th scope="col">Tipologia</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('esami'), 'esame');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('esame')->value) {
$foreach1DoElse = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->getValue('esame')['dataeora'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('esame')['nomemedico'];?>
 <?php echo $_smarty_tpl->getValue('esame')['cognomemedico'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('esame')['nometipologiamedico'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('esame')['costomedico'];?>
</td>
                        <td><a class="btn btn-primary" href="/Ambulacare/Paziente/accedi_schermata_recensioni/<?php echo $_smarty_tpl->getValue('esame')['IdMedico'];?>
/<?php echo $_smarty_tpl->getValue('esame')['IdAppuntamento'];?>
">Aggiungi Recensione</a>
                            <?php if ($_smarty_tpl->getValue('esame')['referto']) {?>
                                <a class="btn btn-primary" href="/Ambulacare/Paziente/visualizza_referto/<?php echo $_smarty_tpl->getValue('esame')['referto'];?>
">Visualizza Referto</a>
                            <?php }?>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </div>

<?php
}
}
/* {/block 'content'} */
}
