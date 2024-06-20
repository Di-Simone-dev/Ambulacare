<?php
/* Smarty version 5.3.0, created on 2024-06-20 11:56:42
  from 'file:visualizzastoricoesami_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6673fcda3810d4_01431269',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b350a016232ecb88f606888f793e536cbb49dc7' => 
    array (
      0 => 'visualizzastoricoesami_medico.tpl',
      1 => 1718877397,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6673fcda3810d4_01431269 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_13613640406673fcda3647b5_21187716', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_13613640406673fcda3647b5_21187716 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#">
                    <div class="form-group">
                        <h2>Storico Esami</h2>
                        <br>
                        <input type="date" id="dataprenot" name="dataprenot" />
                        <br><br>
                        <button type="submit" class="btn btn-primary">Filtra Risultati</button>
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
                    <th scope="col">Ora</th>
                    <th scope="col">Tipologia</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('esami'), 'esame');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('esame')->value) {
$foreach0DoElse = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->getValue('esame')['paziente'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('esame')['data'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('esame')['orario'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('esame')['categoria'];?>
</td>
                        <td>
                            <?php if ($_smarty_tpl->getValue('esame')['referto']) {?>
                                <a href="/Ambulcare/Referto/visualizza/<?php echo $_smarty_tpl->getValue('esame')['id'];?>
" class="btn btn-primary">Visualizza Referto</a>
                                <a href="/Ambulcare/Referto/cancreferto/<?php echo $_smarty_tpl->getValue('esame')['id'];?>
" class="btn btn-primary">Cancella Referto</a>
                            <?php } else { ?>
                                <a href="/Ambulcare/Medico/caricareferto/<?php echo $_smarty_tpl->getValue('esame')['id'];?>
" class="btn btn-primary">Carica Referto</a>
                            <?php }?>
                        </td>
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
