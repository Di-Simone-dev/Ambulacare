<?php
/* Smarty version 5.3.0, created on 2024-06-30 18:20:54
  from 'file:inseriscirecensione_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_668185e630f3a9_12319139',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6bbaf46a64f242307c9a36a81b4aede7577a55c4' => 
    array (
      0 => 'inseriscirecensione_paziente.tpl',
      1 => 1719756333,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_668185e630f3a9_12319139 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_515242297668185e6308866_24077398', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_515242297668185e6308866_24077398 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>


    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h2>Medico : <?php echo $_smarty_tpl->getValue('medico')['nome'];?>
 <?php echo $_smarty_tpl->getValue('medico')['cognome'];?>
</h2>
                <br>
                <h2>Categoria : <?php echo $_smarty_tpl->getValue('medico')['nometipologia'];?>
 &ensp;&ensp;&ensp;&ensp;Costo: <?php echo $_smarty_tpl->getValue('medico')['costo'];?>
€</h2>
                <br>
                <form action="/Ambulacare/Paziente/conferma_recensione" method="post">
                    <div class="form-group"></div>
                    <h4><label>Oggetto : </label>
                        <input id="oggetto" name="titolo" style="width: 800px;height: 35px;">
                    </h4>
                    <br><br>
                    <h4><label>Contenuto :</label>
                        <input id="contenuto" name="contenuto" style="width: 800px;height: 170px;">
                    </h4>
                    <br><br>
                    <h4><label>Valutazione : </label></h4>
                    <fieldset class="rating rating-label">
                        <legend><span class="visually-hidden">Valutazione</span> <span class="visually-hidden">4
                                stelle</span> <span class="visually-hidden">su 5</span></legend>
                        <input type="radio" id="star5b" name="voto" value="5" />
                        <label class="full" for="star5b">
                            <svg class="icon icon-lg">
                                <use href="/Ambulacare/Pages/bootstrap-italia/svg/sprites.svg#it-star-full"></use>
                            </svg>
                            <span class="visually-hidden">Valuta 5 stelle su 5</span>
                        </label>
                        <input type="radio" id="star4b" name="voto" value="4" checked />
                        <label class="full" for="star4b">
                            <svg class="icon icon-lg">
                                <use href="/Ambulacare/Pages/bootstrap-italia/svg/sprites.svg#it-star-full"></use>
                            </svg>
                            <span class="visually-hidden">Valuta 4 stelle su 5</span>
                        </label>
                        <input type="radio" id="star3b" name="voto" value="3" />
                        <label class="full" for="star3b">
                            <svg class="icon icon-lg">
                                <use href="/Ambulacare/Pages/bootstrap-italia/svg/sprites.svg#it-star-full"></use>
                            </svg>
                            <span class="visually-hidden">Valuta 3 stelle su 5</span>
                        </label>
                        <input type="radio" id="star2b" name="voto" value="2" />
                        <label class="full" for="star2b">
                            <svg class="icon icon-lg">
                                <use href="/Ambulacare/Pages/bootstrap-italia/svg/sprites.svg#it-star-full"></use>
                            </svg>
                            <span class="visually-hidden">Valuta 2 stelle su 5</span>
                        </label>
                        <input type="radio" id="star1b" name="voto" value="1" />
                        <label class="full" for="star1b">
                            <svg class="icon icon-lg">
                                <use href="/Ambulacare/Pages/bootstrap-italia/svg/sprites.svg#it-star-full"></use>
                            </svg>
                            <span class="visually-hidden">Valuta 1 stelle su 5</span>
                        </label>
                    </fieldset>
                    <input type="hidden" name="IdMedico" value="<?php echo $_smarty_tpl->getValue('medico')['IdMedico'];?>
">
                    <br><br><br>
                    <div>
                    <input type="hidden" name="IdMedico" value="<?php echo $_smarty_tpl->getValue('medico')['IdMedico'];?>
">
                        <a href="/Ambulacare/Paziente/visualizza_appuntamenti_effettuati" class="btn btn-primary" id="annulla">Annulla</a>
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
