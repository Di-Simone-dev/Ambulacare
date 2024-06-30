<?php
/* Smarty version 5.3.0, created on 2024-06-30 18:07:42
  from 'file:dettaglio_recensione_risposta_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_668182cef37688_79418472',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9059e0c279e571d6a2e58d7dcab662ec943f8a12' => 
    array (
      0 => 'dettaglio_recensione_risposta_paziente.tpl',
      1 => 1719762103,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_668182cef37688_79418472 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1092705686668182cef31173_50362948', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1092705686668182cef31173_50362948 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2><?php echo $_smarty_tpl->getValue('recensione')['titolo'];?>
</h2>
                <h3><?php echo $_smarty_tpl->getValue('recensione')['contenuto'];?>
</h3>
                <h3>Data : <?php echo $_smarty_tpl->getValue('recensione')['data_ora'];?>
</h3>
		<h3>Valutazione : <?php echo $_smarty_tpl->getValue('recensione')['valutazione'];?>
/5&#9733;</h3>
                <br>
		<?php if ($_smarty_tpl->getValue('crisposta') == TRUE) {?>
                	<h2>Risposta</h2>
			<h3>Medico: <?php echo $_smarty_tpl->getValue('risposta')['nominativomedico'];?>
</h3>
                	<h3>Risposta: <?php echo $_smarty_tpl->getValue('risposta')['contenutorisposta'];?>
</h3>
                    	</h4>
		<?php }?>
                    <br><br>
                    <div>
                        <a href="/Ambulacare/Paziente/visualizza_recensioni" class="btn btn-primary" id="annulla">Indietro</a>
                    </div>
        </div>
    </div>
    </div>
<?php
}
}
/* {/block 'content'} */
}
