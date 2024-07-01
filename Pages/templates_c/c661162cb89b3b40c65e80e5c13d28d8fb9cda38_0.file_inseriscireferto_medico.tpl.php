<?php
/* Smarty version 5.3.0, created on 2024-07-01 09:32:45
  from 'file:inseriscireferto_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66825b9d843828_69412890',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c661162cb89b3b40c65e80e5c13d28d8fb9cda38' => 
    array (
      0 => 'inseriscireferto_medico.tpl',
      1 => 1719765691,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66825b9d843828_69412890 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_64127264666825b9d7bc8a1_28675305', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_64127264666825b9d7bc8a1_28675305 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
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
