<?php
/* Smarty version 5.3.0, created on 2024-06-30 10:41:21
  from 'file:visualizzastoricoesami_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66811a319fe385_36957835',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '148c300412272c7eaf5403040cf9f07cee409de6' => 
    array (
      0 => 'visualizzastoricoesami_medico.tpl',
      1 => 1719731565,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66811a319fe385_36957835 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_142161234966811a319e8b95_21749063', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_142161234966811a319e8b95_21749063 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>


    <br>
    <div style="padding:35px;">
        <h2>Filtra per data</h2>
        <form action="/Ambulacare/Medico/ricerca_storico_appuntamenti_medico" method="post">
            <input type="date" name="data" required>
<br><br>
            <button type="submit" class="btn btn-primary">Procedi</button>
        </form>
    </div>

    <br><br>
    <div>
        <table class="table">
            <thead style="text-align: center;">
                <tr>
                    <th scope="col">Data e ora</th>
                    <th scope="col">Nome Paziente</th>
                    <th scope="col">Cognome Paziente</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Azione</th>
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
                        <td><?php echo $_smarty_tpl->getValue('esame')['dataeora'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('esame')['nomepaziente'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('esame')['cognomepaziente'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('esame')['costoappuntamento'];?>
</td>
                        <td>
                        <?php if ($_smarty_tpl->getValue('esame')['IdReferto']) {?>
                        <a href="/Ambulacare/Medico/visualizza_referto/<?php echo $_smarty_tpl->getValue('esame')['IdReferto'];?>
" class="btn btn-primary">Visualizza Referto</a>
                        <?php } else { ?>
                            <a href="/Ambulacare/Medico/inserimento_referto/<?php echo $_smarty_tpl->getValue('esame')['IdAppuntamento'];?>
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
