<?php
/* Smarty version 5.3.0, created on 2024-06-18 19:06:37
  from 'file:visualizzaappuntamenti_admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6671be9dcf5c73_54829791',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cc5db144c79b971753648aee3466974a52655439' => 
    array (
      0 => 'visualizzaappuntamenti_admin.tpl',
      1 => 1718730139,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6671be9dcf5c73_54829791 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_5896362296671be9daa2358_42687907', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_admin.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_5896362296671be9daa2358_42687907 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#">
                    <div class="form-group">
                        <br><br>
                        <h2><label>Gestione Appuntamenti</label></h2>
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
                        <input type="date" id="dataprenot" placeholder="Data prenotazione" name="dataprenot" />
                        <br><br>
                        <input type="time" id="oraprenotinizio" placeholder="Orario prenotazione" name="oraprenotinizio" />
                        <input type="time" id="oraprenotfine" placeholder="Orario prenotazione" name="oraprenotfine" />
                        <br><br>
                        <button type="submit" class="btn btn-primary">Filtra Risultati</button>
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
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                <tr>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('appuntamenti'), 'appuntamento');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('appuntamento')->value) {
$foreach1DoElse = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->getValue('appuntamento')['data'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('appuntamento')['orario'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('appuntamento')['medico'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('appuntamento')['categoria'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('appuntamento')['costo'];?>
€</td>
                        <td><a href="modificaappuntamento_profiloadmin.html"><button
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
