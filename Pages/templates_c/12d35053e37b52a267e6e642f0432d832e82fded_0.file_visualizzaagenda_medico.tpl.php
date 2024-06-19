<?php
/* Smarty version 5.3.0, created on 2024-06-18 16:56:45
  from 'file:visualizzaagenda_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6671a02da9a271_71397112',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '12d35053e37b52a267e6e642f0432d832e82fded' => 
    array (
      0 => 'visualizzaagenda_medico.tpl',
      1 => 1718722330,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6671a02da9a271_71397112 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_149593836671a02da7b555_11633892', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_149593836671a02da7b555_11633892 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#">
                    <div class="form-group">
                        <h2>Agenda</h2>
                        <br>
                        <input type="date" id="dataprenot" name="dataprenot" />
                        <br><br>
                        <button type="submit" class="btn btn-primary">Filtra Risultati</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br>
    <div>
        <table class="table">
            <thead style="text-align: center;">
                <tr>
                    <th scope="col">Nome Paziente</th>
                    <th scope="col">Cognome Paziente</th>
                    <th scope="col">Data</th>
                    <th scope="col">Ora</th>
                    <th scope="col">Tipologia</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('appuntamenti'), 'appuntamento');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('appuntamento')->value) {
$foreach0DoElse = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->getValue('appuntamento')['paziente']['nome'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('appuntamento')['paziente']['cognome'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('appuntamento')['data'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('appuntamento')['orario'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('appuntamento')['categoria'];?>
</td>
                        <td><a href="modificaappuntamento_profilomedico.html"><button
                                    class="btn btn-primary">Modifica</button></a></td>
                    </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </div>

<?php
}
}
/* {/block 'content'} */
}
