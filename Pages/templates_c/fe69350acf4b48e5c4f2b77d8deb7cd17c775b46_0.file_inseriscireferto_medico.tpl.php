<?php
/* Smarty version 5.3.0, created on 2024-06-30 19:18:31
  from 'file:inseriscireferto_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6681936763bb06_71364416',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe69350acf4b48e5c4f2b77d8deb7cd17c775b46' => 
    array (
      0 => 'inseriscireferto_medico.tpl',
      1 => 1719756178,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6681936763bb06_71364416 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_42118082668193676355b4_00018091', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_42118082668193676355b4_00018091 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>


    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h2>Caricamento Referto</h2>
                <br>
                <h3>Esame di <?php echo $_smarty_tpl->getValue('esame')['nomepaziente'];?>
 <?php echo $_smarty_tpl->getValue('esame')['cognomepaziente'];?>
</h3>
                <br>
                <h3>Costo: <?php echo $_smarty_tpl->getValue('esame')['costoappuntamento'];?>
€</h3>
                <br>
                <h3>Data e ora: <?php echo $_smarty_tpl->getValue('esame')['dataeora'];?>
</h3>
                <br><br>
                <form action="/Ambulacare/Medico/caricamento_referto" enctype="multipart/form-data" method="post">
                    <h4><label for="oggettoref">Oggetto Referto: </label>
                        <input id="oggetto" name="oggetto" style="width: 800px;height: 35px;" required/>
                    </h4>
                    <br>
                    <h4><label for="contenutoref">Contenuto Referto:</label>
                        <input id="contenuto" name="contenuto" style="width: 800px;height: 170px;" required/>
                    </h4>
		    <br><br>
                    <h4><label for="immagineref">Immagine Referto: </label>
                    <input id="immagineref" name="immagineref"  type="file"></h4>
                    <br><br>
                    <div>
                        <input type="hidden" value="<?php echo $_smarty_tpl->getValue('esame')['IdAppuntamento'];?>
" name="IdAppuntamento">
                        <a class="btn btn-primary" href="/Ambulacare/Medico/visualizza_storico_appuntamenti_medico" id="annulla">Annulla</a>
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <button type="submit" class="btn btn-primary" id="conferma">Conferma</button>
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
