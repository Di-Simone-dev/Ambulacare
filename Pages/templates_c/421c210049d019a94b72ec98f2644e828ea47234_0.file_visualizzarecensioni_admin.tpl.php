<?php
/* Smarty version 5.3.0, created on 2024-06-18 21:39:55
  from 'file:visualizzarecensioni_admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6671e28bcc3059_14124987',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '421c210049d019a94b72ec98f2644e828ea47234' => 
    array (
      0 => 'visualizzarecensioni_admin.tpl',
      1 => 1718739592,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6671e28bcc3059_14124987 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1961913816671e28bcadf54_61575000', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_admin.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1961913816671e28bcadf54_61575000 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

    
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#">
                    <div class="form-group" >
                        <h2><label for="recensioni">Recensioni</label></h2>
                        <br>
                        <select name="recensioni" id="categ" class="form-select">
                            <option value="">Ordina per</option>
                            <option value="">Nome</option>
                            <option value="">Cognome</option>
                            <option value="">Data appuntamento</option>
                        </select>
                        <br>
                                <input type="date" id="dataprenot" placeholder="Data prenotazione" name="dataprenot" required/>
                                <br><br>
                        <button type="submit" class="btn btn-primary">Effettua ricerca</button>
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
                    <th scope="col">Paziente</th>
                    <th scope="col">Medico</th>
                    <th scope="col">Data</th>
                    <th scope="col">Valutazione</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('recensioni'), 'recensione');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('recensione')->value) {
$foreach0DoElse = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->getValue('recensione')['paziente'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('recensione')['medico'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('recensione')['data'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('recensione')['valutazione'];?>
/5</td>
                    <td><button class="btn btn-primary">Dettagli</button></td>
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
