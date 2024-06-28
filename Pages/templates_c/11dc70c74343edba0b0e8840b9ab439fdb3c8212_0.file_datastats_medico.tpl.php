<?php
/* Smarty version 5.3.0, created on 2024-06-28 18:04:08
  from 'file:datastats_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667edef840c180_33364172',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11dc70c74343edba0b0e8840b9ab439fdb3c8212' => 
    array (
      0 => 'datastats_medico.tpl',
      1 => 1719585664,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667edef840c180_33364172 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1008618614667edef8408561_59051273', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1008618614667edef8408561_59051273 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>


    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/Ambulacare/Medico/calcola_statistiche" method="post">
                    <div class="form-group">
                        <h2>Inserire un intervallo di date per visualizzarne le relative statistiche</h2>
                        <br>
                        <input type="date" id="datainizio" name="data1" />
                        <br><br><br>
                        <input type="date" id="datafine" name="data2" />
                        <br><br><br>
                        <button class="btn btn-primary" type="submit">Visualizza statistiche nell'intervallo
                            selezionato</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
}
}
/* {/block 'content'} */
}
