<?php
/* Smarty version 5.3.0, created on 2024-06-18 21:25:32
  from 'file:visualizzaesamiprenotati_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6671df2cc9bad2_44249983',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e90cfc8d569967acd958af01e284cba46b079bb' => 
    array (
      0 => 'visualizzaesamiprenotati_paziente.tpl',
      1 => 1718738705,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6671df2cc9bad2_44249983 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1831415166671df2c9878d7_46934467', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1831415166671df2c9878d7_46934467 extends \Smarty\Runtime\Block
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
                        <h2><label for="storico">Elenco Esami</label></h2>
                        <br>
                        <select name="tipologia" id="categ" class="form-select">
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categorie'), 'categoria');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('categoria')->value) {
$foreach0DoElse = false;
?>
                                <option value="<?php echo $_smarty_tpl->getValue('categoria')['id'];?>
"><?php echo $_smarty_tpl->getValue('categoria')['nome'];?>
</option>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </select>
                        <br>
                        <input type="date" id="dataprenot" placeholder="Data prenotazione" name="dataprenot" required>
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
                    <th scope="col">Data</th>
                    <th scope="col">Ora</th>
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
                    <td><?php echo $_smarty_tpl->getValue('esame')['data'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('esame')['orario'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('esame')['medico']['nome'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('esame')['categoria'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('esame')['costo'];?>
</td>
                    <td><a href="modificaappuntamento_profilopaziente.html"><button
                                class="btn btn-primary">Modifica</button></a></td>
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
