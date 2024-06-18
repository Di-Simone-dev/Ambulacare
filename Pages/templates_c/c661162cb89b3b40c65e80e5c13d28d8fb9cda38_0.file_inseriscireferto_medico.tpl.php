<?php
/* Smarty version 5.3.0, created on 2024-06-18 10:28:39
  from 'file:inseriscireferto_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66714537208c82_63902793',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c661162cb89b3b40c65e80e5c13d28d8fb9cda38' => 
    array (
      0 => 'inseriscireferto_medico.tpl',
      1 => 1718699121,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66714537208c82_63902793 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1986829974667145371f9d19_20043043', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1986829974667145371f9d19_20043043 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h1>Caricamento Referto</h1>
                <br>
                <h2>Esame di <?php echo $_smarty_tpl->getValue('esame')['paziente'];?>
</h2>
                <br>
                <h2>Categoria : <?php echo $_smarty_tpl->getValue('esame')['categoria'];?>
 &ensp;&ensp;&ensp;&ensp;Costo: <?php echo $_smarty_tpl->getValue('esame')['costo'];?>
€</h2>
                <br>
                <h2>Data : <?php echo $_smarty_tpl->getValue('esame')['data'];?>
 &ensp;&ensp;&ensp;&ensp; Ora: <?php echo $_smarty_tpl->getValue('esame')['orario'];?>
</h2>
                <br><br>
                <form action="#">
                    <h3><label for="oggetto">Oggetto Referto: </label>
                        <input id="oggetto" name="oggetto" placeholder="Oggetto" style="width: 800px;height: 35px;" />
                    </h3>
                    <br>
                    <h3><label for="contenuto">Contenuto Referto:</label>
                        <input id="contenuto" name="contenuto" placeholder="Scrivi qua" style="width: 800px;height: 170px;">
                    </h3>
                    <br><br><br><br>
                    <div style="position: absolute;left: 550px;">
                        <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Annulla</button>
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Conferma</button>
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
