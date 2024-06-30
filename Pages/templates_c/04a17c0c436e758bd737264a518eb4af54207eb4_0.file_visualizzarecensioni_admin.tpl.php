<?php
/* Smarty version 5.3.0, created on 2024-06-30 09:54:27
  from 'file:visualizzarecensioni_admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66810f334460c4_36541747',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '04a17c0c436e758bd737264a518eb4af54207eb4' => 
    array (
      0 => 'visualizzarecensioni_admin.tpl',
      1 => 1719732249,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66810f334460c4_36541747 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_68002496166810f33431860_93483569', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_admin.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_68002496166810f33431860_93483569 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>


    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/Ambulacare/Amministratore/ricerca_recensioni" method="post">
                    <div class="form-group">
                        <h2>Elenco Recensioni</h2>
                        <br>
                        <input type="text" id="nomemedico" placeholder="Nome Medico" name="nomemedico" />
                        <br><br>
                        <input type="text" id="cognomemedico" placeholder="Cognome Medico" name="cognomemedico" />
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary">Avvia Ricerca</button>
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
                    <th scope="col">Titolo</th>
                    <th scope="col">Contenuto</th>
                    <th scope="col">Data</th>
                    <th scope="col">Valutazione</th>
                    <th scope="col">Medico</th>
                    <th scope="col">Paziente</th>
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
                        <td><?php echo $_smarty_tpl->getValue('recensione')['titolo'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('recensione')['contenuto'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('recensione')['data_creazione'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('recensione')['valutazione'];?>
/5&#9733;</td>
                        <td><?php echo $_smarty_tpl->getValue('recensione')['medico'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('recensione')['paziente'];?>
</td>
                        <td><a href="/Ambulacare/Amministratore/elimina_recensione/<?php echo $_smarty_tpl->getValue('recensione')['IdRecensione'];?>
" class="btn btn-primary">Elimina</a></td>
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
