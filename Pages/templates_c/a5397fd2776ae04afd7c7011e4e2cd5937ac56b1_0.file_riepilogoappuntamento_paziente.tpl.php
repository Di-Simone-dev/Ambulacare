<?php
/* Smarty version 5.3.0, created on 2024-06-18 16:22:58
  from 'file:riepilogoappuntamento_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66719842216e72_86394375',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a5397fd2776ae04afd7c7011e4e2cd5937ac56b1' => 
    array (
      0 => 'riepilogoappuntamento_paziente.tpl',
      1 => 1718720575,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66719842216e72_86394375 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_96328896866719842206b10_38281252', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_96328896866719842206b10_38281252 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Riepilogo Dettagli Appuntamento</h1>
                <br>
                <h2>Esame: <?php echo $_smarty_tpl->getValue('esame')['nome'];?>
</h2>
                <br>
                <h2>Medico: <?php echo $_smarty_tpl->getValue('esame')['medico']['nome'];?>
&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Valutazione:<?php echo $_smarty_tpl->getValue('esame')['medico']['valutazione'];?>
/5</h2>
                <br>
                <h2>Costo: <?php echo $_smarty_tpl->getValue('esame')['costo'];?>
€</h2>
                <br>
                <h2>Data: <?php echo $_smarty_tpl->getValue('esame')['data'];?>
</h2>
                <br>
                <h2>Ora: <?php echo $_smarty_tpl->getValue('esame')['orario'];?>
</h2>
                <br><br><br>
                <div>
                    <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Annulla</button>
                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Conferma</button>
                </div>

            </div>
        </div>
    </div>

<?php
}
}
/* {/block 'content'} */
}
