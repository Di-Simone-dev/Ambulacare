<?php
/* Smarty version 5.3.0, created on 2024-06-18 16:34:36
  from 'file:rispostarecensione_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66719afc8fd950_35928370',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cc27956c9267e218c6ba504d302f60f75eba6530' => 
    array (
      0 => 'rispostarecensione_medico.tpl',
      1 => 1718721274,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66719afc8fd950_35928370 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_78498073066719afc8ef478_23477946', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_78498073066719afc8ef478_23477946 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h1>Risposta Recensione</h1>
                <br><br>
                <h2>Paziente : <?php echo $_smarty_tpl->getValue('esame')['paziente'];?>
</h2>
                <br>
                <h2>Categoria : <?php echo $_smarty_tpl->getValue('esame')['nome'];?>
 &ensp;&ensp;&ensp;&ensp;Costo: <?php echo $_smarty_tpl->getValue('esame')['costo'];?>
€</h2>
                <br>
                <h2>Data : <?php echo $_smarty_tpl->getValue('esame')['data'];?>
 &ensp;&ensp;&ensp;&ensp; Ora: <?php echo $_smarty_tpl->getValue('esame')['orario'];?>
</h2>
                <br>
                <form action="#">
                    <div class="form-group"></div>
                    <h3><label for="oggetto">Oggetto Risposta: </label>
                        <input id="oggetto" name="oggetto" placeholder="Oggetto" style="width: 800px;height: 35px;">
                        <br><br><label for="contenuto">Contenuto Risposta:</label>
                        <input id="contenuto" name="contenuto" placeholder="Scrivi qua" style="width: 800px;height: 170px;">
                    </h3>
                    <br><br><br><br><br>
                    <div>
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
