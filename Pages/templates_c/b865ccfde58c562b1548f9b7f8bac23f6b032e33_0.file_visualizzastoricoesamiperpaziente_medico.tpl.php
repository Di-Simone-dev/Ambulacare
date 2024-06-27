<?php
/* Smarty version 5.3.0, created on 2024-06-27 14:43:41
  from 'file:visualizzastoricoesamiperpaziente_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667d5e7d4cefa5_83838089',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b865ccfde58c562b1548f9b7f8bac23f6b032e33' => 
    array (
      0 => 'visualizzastoricoesamiperpaziente_medico.tpl',
      1 => 1719492086,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667d5e7d4cefa5_83838089 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1091406879667d5e7d4b6de0_85545062', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1091406879667d5e7d4b6de0_85545062 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

    
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/Ambulacare/Medico/ricerca_pazienti" method="post">
                    <div class="form-group" >
                    <h2>Ricerca Pazienti</h2>
                    <br>
                        <input type="text" id="nomepaziente" placeholder="Nome Paziente" name="nome" required>
                        <br><br>
                        <input type="text" id="cognomepaziente" placeholder="Cognome Paziente" name="cognome" required>
                    <br><br>
                    <button type="submit" class="btn btn-primary">Avvia Ricerca Paziente</button>
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
                    <th scope="col">Nome Paziente</th>
                    <th scope="col">Cognome Paziente</th>
                    <th scope="col">Data Di Nascita</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('pazienti'), 'paziente');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('paziente')->value) {
$foreach0DoElse = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->getValue('paziente')['nomepaziente'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('paziente')['cognomepaziente'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('paziente')['data_nascita'];?>
</td>
                    <td><a href="/Ambulacare/Medico/dettagli_storico_paziente/<?php echo $_smarty_tpl->getValue('paziente')['IdPaziente'];?>
" class="btn btn-primary">Visualizza Storico Esami</a></td>
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
