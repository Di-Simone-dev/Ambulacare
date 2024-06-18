<?php
/* Smarty version 5.3.0, created on 2024-06-18 17:36:43
  from 'file:visualizzaappuntamenti_admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6671a98b95acf3_72433461',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cc5db144c79b971753648aee3466974a52655439' => 
    array (
      0 => 'visualizzaappuntamenti_admin.tpl',
      1 => 1718725001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6671a98b95acf3_72433461 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_16548979746671a98b944241_78372699', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_admin.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_16548979746671a98b944241_78372699 extends \Smarty\Runtime\Block
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
                            <option value="select">Seleziona una tipologia</option>
                            <option value="dentista">dentista</option>
                            <option value="oculista">oculista</option>
                            <option value="otorino">otorino</option>
                            <option value="cardiologo">cardiologo</option>
                            <option value="radiologo">radiologo</option>
                            <option value="neurologo">neurologo</option>
                            <option value="urologo">urologo</option>
                            <option value="neurofisiopatologo">neurofisiopatologo</option>
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
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('appuntamento')->value) {
$foreach0DoElse = false;
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
