<?php
/* Smarty version 5.3.0, created on 2024-06-30 19:19:01
  from 'file:moderazioneaccountpaz_admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66819385537fb0_19215767',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4897b9fa28dba46f6448ca88c51cc3f58db161de' => 
    array (
      0 => 'moderazioneaccountpaz_admin.tpl',
      1 => 1719744920,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66819385537fb0_19215767 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_204292577266819385520645_62858814', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_admin.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_204292577266819385520645_62858814 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
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
