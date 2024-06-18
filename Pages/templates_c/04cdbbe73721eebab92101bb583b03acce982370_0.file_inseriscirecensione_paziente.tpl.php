<?php
/* Smarty version 5.3.0, created on 2024-06-18 10:18:27
  from 'file:inseriscirecensione_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667142d3814820_72504882',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '04cdbbe73721eebab92101bb583b03acce982370' => 
    array (
      0 => 'inseriscirecensione_paziente.tpl',
      1 => 1718698703,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667142d3814820_72504882 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1770309239667142d37f7e77_91899714', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1770309239667142d37f7e77_91899714 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h2>Medico : <?php echo $_smarty_tpl->getValue('esame')['medico'];?>
</h2>
                <br>
                <h2>Categoria : <?php echo $_smarty_tpl->getValue('esame')['categoria'];?>
 &ensp;&ensp;&ensp;&ensp;Costo: <?php echo $_smarty_tpl->getValue('esame')['costo'];?>
€</h2>
                <br>
                <h2>Data : <?php echo $_smarty_tpl->getValue('esame')['data'];?>
 &ensp;&ensp;&ensp;&ensp; Ora: <?php echo $_smarty_tpl->getValue('esame')['orario'];?>
</h2>
                <form action="#">
                    <div class="form-group"></div>
                    <h4><label>Oggetto : </label>
                        <input id="oggetto" name="oggetto" style="width: 800px;height: 35px;">
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
                        <input type="radio" id="star5b" name="ratingB" value="5" />
                        <label class="full" for="star5b">
                            <svg class="icon icon-lg">
                                <use href="bootstrap-italia/svg/sprites.svg#it-star-full"></use>
                            </svg>
                            <span class="visually-hidden">Valuta 5 stelle su 5</span>
                        </label>
                        <input type="radio" id="star4b" name="ratingB" value="4" checked />
                        <label class="full" for="star4b">
                            <svg class="icon icon-lg">
                                <use href="bootstrap-italia/svg/sprites.svg#it-star-full"></use>
                            </svg>
                            <span class="visually-hidden">Valuta 4 stelle su 5</span>
                        </label>
                        <input type="radio" id="star3b" name="ratingB" value="3" />
                        <label class="full" for="star3b">
                            <svg class="icon icon-lg">
                                <use href="bootstrap-italia/svg/sprites.svg#it-star-full"></use>
                            </svg>
                            <span class="visually-hidden">Valuta 3 stelle su 5</span>
                        </label>
                        <input type="radio" id="star2b" name="ratingB" value="2" />
                        <label class="full" for="star2b">
                            <svg class="icon icon-lg">
                                <use href="bootstrap-italia/svg/sprites.svg#it-star-full"></use>
                            </svg>
                            <span class="visually-hidden">Valuta 2 stelle su 5</span>
                        </label>
                        <input type="radio" id="star1b" name="ratingB" value="1" />
                        <label class="full" for="star1b">
                            <svg class="icon icon-lg">
                                <use href="bootstrap-italia/svg/sprites.svg#it-star-full"></use>
                            </svg>
                            <span class="visually-hidden">Valuta 1 stelle su 5</span>
                        </label>
                    </fieldset>
                    <br><br><br>
                    <div style="position: absolute;left: 550px;">
                        <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Annulla</button>
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Conferma</button>
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
