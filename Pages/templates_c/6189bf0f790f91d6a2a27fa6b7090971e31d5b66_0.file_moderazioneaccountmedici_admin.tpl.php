<?php
/* Smarty version 5.3.0, created on 2024-06-27 19:26:07
  from 'file:moderazioneaccountmedici_admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667da0af78d5b4_10267886',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6189bf0f790f91d6a2a27fa6b7090971e31d5b66' => 
    array (
      0 => 'moderazioneaccountmedici_admin.tpl',
      1 => 1719333347,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667da0af78d5b4_10267886 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1321877924667da0af765010_98715398', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_admin.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1321877924667da0af765010_98715398 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#" id="tendina" method="post">
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
                        <td><?php echo $_smarty_tpl->getValue('medico')['stato'];?>
</td>
                        <?php if ($_smarty_tpl->getValue('medico')['stato'] == "Sbloccato") {?>
                            <td><a href="" class="btn btn-primary">Blocca</a></td>
                        <?php } else { ?>
                            <td><a href="" class="btn btn-primary">Sblocca</a></td>
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
