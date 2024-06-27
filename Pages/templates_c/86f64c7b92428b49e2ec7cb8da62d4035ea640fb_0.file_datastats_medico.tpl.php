<?php
/* Smarty version 5.3.0, created on 2024-06-27 15:41:24
  from 'file:datastats_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667d6c04db18f1_33714798',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86f64c7b92428b49e2ec7cb8da62d4035ea640fb' => 
    array (
      0 => 'datastats_medico.tpl',
      1 => 1719495680,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667d6c04db18f1_33714798 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_7854780667d6c04da7bf5_90377999', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_7854780667d6c04da7bf5_90377999 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
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
