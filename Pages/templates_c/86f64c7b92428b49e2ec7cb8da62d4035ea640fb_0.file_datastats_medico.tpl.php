<?php
/* Smarty version 5.3.0, created on 2024-06-19 18:57:59
  from 'file:datastats_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66730e17dc8c64_06187548',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86f64c7b92428b49e2ec7cb8da62d4035ea640fb' => 
    array (
      0 => 'datastats_medico.tpl',
      1 => 1718816275,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66730e17dc8c64_06187548 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_71948547166730e17dc31a9_61864250', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_71948547166730e17dc31a9_61864250 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="../test" method="post">
                    <div class="form-group">
                        <h2>Inserire un intervallo di date per visualizzarne le relative statistiche</h2>
                        <br>
                        <input type="date" id="datainizio" placeholder="Data Inizio" name="datainizio" />
                        <br><br><br>
                        <input type="date" id="datafine" placeholder="Data Fine" name="datafine" />
                        <br><br><br>
                        <button class="btn btn-primary" type="submit">Visualizza statistiche <br>nell'intervallo
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
