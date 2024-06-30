<?php
/* Smarty version 5.3.0, created on 2024-06-30 13:21:44
  from 'file:moderazioneaccountmedici_admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66813fc83240d2_84473302',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8a32a382f1fc64db039b218a1b0f1b4768dd431' => 
    array (
      0 => 'moderazioneaccountmedici_admin.tpl',
      1 => 1719744921,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66813fc83240d2_84473302 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_183173060266813fc830c4e6_53878855', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_admin.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_183173060266813fc830c4e6_53878855 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>


    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/Ambulacare/Amministratore/ricerca_medici" id="tendina" method="post">
                    <div class="form-group">
                        <h2>Moderazione Medici</h2>
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
                    <th scope="col">Nome Medico</th>
                    <th scope="col">Cognome Medico</th>
                    <th scope="col">Stato</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('medici'), 'medico');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('medico')->value) {
$foreach0DoElse = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->getValue('medico')['nome'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('medico')['cognome'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('medico')['attivo'] == 1 ? "attivo" : "bloccato";?>
</td>
                        <?php if ($_smarty_tpl->getValue('medico')['attivo'] == 1) {?>
                            <td><a href="/Ambulacare/Amministratore/moderazione_medico/<?php echo $_smarty_tpl->getValue('medico')['IdMedico'];?>
" class="btn btn-primary">Blocca</a></td>
                        <?php } else { ?>
                            <td><a href="/Ambulacare/Amministratore/moderazione_medico/<?php echo $_smarty_tpl->getValue('medico')['IdMedico'];?>
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
