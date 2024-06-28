<?php
/* Smarty version 5.3.0, created on 2024-06-20 09:05:59
  from 'file:moderazioneaccount_admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6673d4d7b1c4b1_71695637',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb73240af42f0f77434110696cd5c6e4bda9fbb0' => 
    array (
      0 => 'moderazioneaccount_admin.tpl',
      1 => 1718867157,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6673d4d7b1c4b1_71695637 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_13865887436673d4d7afb601_70906689', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_admin.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_13865887436673d4d7afb601_70906689 extends \Smarty\Runtime\Block
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
                        <h2>Moderazione Account</h2>
                        <br>
                        <input type="text" id="nomeutente" placeholder="Nome Utente" name="nomeutente" />
                        <br><br>
                        <input type="text" id="cognomeutente" placeholder="Cognome Utente" name="cognomeutente" />
                        <br><br>
                        <select name="categoria" id="categ" class="form-select">
                            <option value="select">Seleziona categoria utente</option>
                            <option value="medico">medico</option>
                            <option value="paziente">paziente</option>
                        </select>
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
                    <th scope="col">Nome Utente</th>
                    <th scope="col">Cognome Utente</th>
                    <th scope="col">Categoria</th>
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
                        <td>Medico</td>
                        <td><?php echo $_smarty_tpl->getValue('medico')['stato'];?>
</td>
                        <?php if ($_smarty_tpl->getValue('medico')['stato'] == "Sbloccato") {?>
                            <td><button class="btn btn-primary"><a href="/Ambulacare/Admin/bloccamedico/<?php echo $_smarty_tpl->getValue('medico')['id'];?>
">Blocca</button></td>
                        <?php } else { ?>
                            <td><button class="btn btn-primary">Sblocca</button></td>
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
