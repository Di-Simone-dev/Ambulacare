<?php
/* Smarty version 5.3.0, created on 2024-06-30 17:22:42
  from 'file:dettaglio_recensione_risposta_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_668178426369e4_44080582',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eba974b7aa48e049ba2c403c62db1d7e57b4d188' => 
    array (
      0 => 'dettaglio_recensione_risposta_paziente.tpl',
      1 => 1719760872,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_668178426369e4_44080582 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_194444055266817842630219_00950627', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_194444055266817842630219_00950627 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
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
