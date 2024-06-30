<?php
/* Smarty version 5.3.0, created on 2024-06-30 17:22:23
  from 'file:rispostarecensione_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6681782fbb0ec9_88790605',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30f4ab14567a5fa5203e89f3cb6844c6276d81f0' => 
    array (
      0 => 'rispostarecensione_medico.tpl',
      1 => 1719760938,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6681782fbb0ec9_88790605 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_7091946836681782fbac381_49128301', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_7091946836681782fbac381_49128301 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Titolo Recensione: <?php echo $_smarty_tpl->getValue('recensione')['titolo'];?>
</h2>
                <h3>Oggetto Recensione: <?php echo $_smarty_tpl->getValue('recensione')['contenuto'];?>
</h3>
		<h3>Paziente : <?php echo $_smarty_tpl->getValue('recensione')['nominativopaziente'];?>
</h3>
                <h3>Data : <?php echo $_smarty_tpl->getValue('recensione')['data_creazione'];?>
</h3>
                <br>
                <h2>Risposta Recensione</h2>
                <br>
                <form action="/Ambulacare/Medico/inserisci_risposta" method="post">
                    <div class="form-group">
		    <h4>Contenuto</h4>
                    <input id="contenuto" name="contenuto" placeholder="Contenuto Risposta" style="width: 800px;height: 170px;"/>
                        <input type="hidden" name="IdRecensione" value="<?php echo $_smarty_tpl->getValue('recensione')['IdRecensione'];?>
">
                    </h4>
                    <br><br>
                    <div>
                        <a href="/Ambulacare/Medico/visualizza_recensioni" class="btn btn-primary" id="annulla">Annulla</a>
                            &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            <button type="submit" class="btn btn-primary" id="conferma">Conferma</button>
                    </div>
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
