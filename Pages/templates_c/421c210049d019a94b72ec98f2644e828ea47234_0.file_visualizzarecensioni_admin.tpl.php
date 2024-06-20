<?php
/* Smarty version 5.3.0, created on 2024-06-20 11:24:44
  from 'file:visualizzarecensioni_admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6673f55ca839e0_02025989',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '421c210049d019a94b72ec98f2644e828ea47234' => 
    array (
      0 => 'visualizzarecensioni_admin.tpl',
      1 => 1718875482,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6673f55ca839e0_02025989 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_7520717636673f55ca6eb06_43756416', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_admin.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_7520717636673f55ca6eb06_43756416 extends \Smarty\Runtime\Block
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
                    <td><a href="/Ambulacare/Admin/recensione/<?php echo $_smarty_tpl->getValue('recensione')['id'];?>
" class="btn btn-primary">Dettagli</a></td>
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
