<?php
/* Smarty version 5.3.0, created on 2024-06-30 13:54:39
  from 'file:visualizzaappuntamenti_prenotazione_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6681477f0e6ff0_83744792',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95e254caa3fb077c93c700fa78d00931e0c8fb89' => 
    array (
      0 => 'visualizzaappuntamenti_prenotazione_paziente.tpl',
      1 => 1719747652,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6681477f0e6ff0_83744792 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_4216541576681477f027f38_86010459', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_4216541576681477f027f38_86010459 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

<br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/Ambulacare/Paziente/ricercaesame" method="post">
                    <div class="form-group">
                        <br><br>
                        <h2>Prenotazione Appuntamenti</h2>
                        <br>
                        <select name="tipologia" class="form-select-m">
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('tipologie'), 'tipologia');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('tipologia')->value) {
$foreach0DoElse = false;
?>
                                <option value="<?php echo $_smarty_tpl->getValue('tipologia')['IdTipologia'];?>
" <?php if ($_smarty_tpl->getValue('tipologia')['IdTipologia'] == $_smarty_tpl->getValue('Idtipologia')) {?>
                                    selected="selected" <?php }?>><?php echo $_smarty_tpl->getValue('tipologia')['nome_tipologia'];?>
</option>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </select>
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
                    <th scope="col">Medico</th>
                    <th scope="col">Tipologia</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Recensioni</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('medici'), 'medico');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('medico')->value) {
$foreach1DoElse = false;
?>
                    <tr>
                        <td><img style="padding:2px" class="rounded-circle ml-3" width="60" height="60"
                                src="data:<?php echo $_smarty_tpl->getValue('medico')['tipoimmagine'];?>
;base64,<?php echo $_smarty_tpl->getValue('medico')['img'];?>
" alt="profile picture" /><?php echo $_smarty_tpl->getValue('medico')['nome'];?>
 <?php echo $_smarty_tpl->getValue('medico')['cognome'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('medico')['nometipologia'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('medico')['costo'];?>
</td>
                        <td><?php if ($_smarty_tpl->getValue('medico')['valutazione']['IdMedico']) {?>
                                <?php echo $_smarty_tpl->getValue('medico')['valutazione']['valutazione'];?>

                            <?php } else { ?>0
                            <?php }?>/5&#9733;</td>
                        <td><a href="/Ambulacare/Paziente/dettagli_prenotazione/<?php echo $_smarty_tpl->getValue('medico')['IdMedico'];?>
"
                                class="btn btn-primary">Prenota</a></td>
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
