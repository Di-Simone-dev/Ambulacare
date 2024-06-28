<?php
/* Smarty version 5.3.0, created on 2024-06-27 22:33:30
  from 'file:moderazioneaccountpaz_admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667dcc9a2686c3_62720919',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8e898dbf8f3c597f46325a51dd5e851527ce7e7d' => 
    array (
      0 => 'moderazioneaccountpaz_admin.tpl',
      1 => 1719520405,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667dcc9a2686c3_62720919 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2033180813667dcc9a2305e2_20511849', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_admin.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_2033180813667dcc9a2305e2_20511849 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/Ambulacare/Amministratore/ricerca_pazienti" id="tendina" method="post">
                    <div class="form-group">
                        <h2>Moderazione Pazienti</h2>
                        <br>
                        <input type="text" id="nomepaziente" placeholder="Nome Paziente" name="nomepaziente" />
                        <br><br>
                        <input type="text" id="cognomepaziente" placeholder="Cognome Paziente" name="cognomepaziente" />
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
                    <th scope="col">Nome Paziente</th>
                    <th scope="col">Cognome Paziente</th>
                    <th scope="col">Stato</th>
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
                        <td><?php echo $_smarty_tpl->getValue('paziente')['nome'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('paziente')['cognome'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('paziente')['attivo'] == 1 ? "attivo" : "bloccato";?>
</td>
                        <?php if ($_smarty_tpl->getValue('paziente')['attivo'] == 1) {?>
                            <td><a href="/Ambulacare/Amministratore/moderazione_paziente/<?php echo $_smarty_tpl->getValue('paziente')['IdPaziente'];?>
" class="btn btn-primary">Blocca</a></td>
                        <?php } else { ?>
                            <td><a href="/Ambulacare/Amministratore/moderazione_paziente/<?php echo $_smarty_tpl->getValue('paziente')['IdPaziente'];?>
" class="btn btn-primary">Sblocca</a></td>
                        <?php }?>
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
