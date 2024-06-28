<?php
/* Smarty version 5.3.0, created on 2024-06-26 18:52:27
  from 'file:visualizzaappuntamentiprenotati_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667c474bd47c92_92652148',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bac608cf80f2068010c76cc3f1f90967d35ff694' => 
    array (
      0 => 'visualizzaappuntamentiprenotati_paziente.tpl',
      1 => 1719420745,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667c474bd47c92_92652148 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1098856092667c474bd19b08_72177455', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1098856092667c474bd19b08_72177455 extends \Smarty\Runtime\Block
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
                        <h2><label for="storico">Elenco Appuntamenti</label></h2>
                        <br>
                        <select name="tipologia" id="categ" class="form-select">
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('tipologie'), 'tipologia');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('tipologia')->value) {
$foreach0DoElse = false;
?>
                                <option value="<?php echo $_smarty_tpl->getValue('tipologia')['IdTipologia'];?>
"><?php echo $_smarty_tpl->getValue('tipologia')['nome_tipologia'];?>
</option>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </select>
                        <br>
                        <input type="date" id="dataprenot" name="data" required>
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
                    <th scope="col">Azione</th>
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
                    <td><a href="/Ambulcare/Paziente/dettagli_appuntamento_modifica/<?php echo $_smarty_tpl->getValue('esame')['IdAppuntamento'];?>
" class="btn btn-primary">Modifica</a></td>
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
