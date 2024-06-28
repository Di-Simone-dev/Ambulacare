<?php
/* Smarty version 5.3.0, created on 2024-06-28 18:04:52
  from 'file:visualizzarecensioni_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667edf24e984b6_12571102',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ea29e53f60c673784fb594652aa0232599fafe4' => 
    array (
      0 => 'visualizzarecensioni_medico.tpl',
      1 => 1719585664,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667edf24e984b6_12571102 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1529244433667edf24e8cc37_66260425', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1529244433667edf24e8cc37_66260425 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>

    
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#">
                    <div class="form-group" >
                        <h2>Recensioni</h2>
                        <br>
                            <input type="date" id="dataapp" name="dataapp" required/>
                            <br><br>
                            <button type="submit" class="btn btn-primary">Effettua ricerca</button>
                            <br><br>
                            <select name="recensioni" class="form-select-m" required>
                                <option value="">Ordina per</option>
                                <option value="nome">Nome</option>
                                <option value="cognome">Cognome</option>
                                <option value="dataapp">Data appuntamento</option>
                            </select>
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
                    <td><?php echo $_smarty_tpl->getValue('recensione')['nominativopaziente'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('recensione')['data_creazione'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('recensione')['valutazione'];?>
/5&#9733;</td>
                    <td><a href="/Ambulacare/Medico/dettagli_recensione/<?php echo $_smarty_tpl->getValue('recensione')['IdRecensione'];?>
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
