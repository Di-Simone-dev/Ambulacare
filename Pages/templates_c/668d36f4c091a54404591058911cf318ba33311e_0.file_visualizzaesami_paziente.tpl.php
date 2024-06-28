<?php
/* Smarty version 5.3.0, created on 2024-06-18 19:33:55
  from 'file:visualizzaesami_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6671c503484cc3_75813174',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '668d36f4c091a54404591058911cf318ba33311e' => 
    array (
      0 => 'visualizzaesami_paziente.tpl',
      1 => 1718732032,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6671c503484cc3_75813174 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_3991756186671c50345e407_99184448', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_3991756186671c50345e407_99184448 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

    <div class="container">
    <div class="row">
        <div class="col">
            <form action="#">
                <div class="form-group">
                    <br><br>
                    <h2><label>Prenotazione esami</label></h2>
                    <br>
                    <select name="tipologia" id="categ" class="form-select">
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categorie'), 'categoria');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('categoria')->value) {
$foreach0DoElse = false;
?>
                            <option value="<?php echo $_smarty_tpl->getValue('categoria')['id'];?>
"><?php echo $_smarty_tpl->getValue('categoria')['nome'];?>
</option>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </select>
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
            <th scope="col">Medico</th>
            <th scope="col">Tipologia</th>
            <th scope="col">Costo</th>
            <th scope="col">Recensioni</th>
            <th scope="col">Azione</th>
        </tr>
    </thead>
    <tbody style="text-align: center;">

    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('esami'), 'esame');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('esame')->value) {
$foreach1DoElse = false;
?>
        <tr>
            <td><?php echo $_smarty_tpl->getValue('esame')['medico']['nome'];?>
</td>
            <td><?php echo $_smarty_tpl->getValue('esame')['categoria'];?>
</td>
            <td><?php echo $_smarty_tpl->getValue('esame')['costo'];?>
</td>
            <td><?php echo $_smarty_tpl->getValue('esame')['medico']['valutazione'];?>
/5</td>
            <td><a href="prenotaesame.html"><button class="btn btn-primary">Prenota</button></a></td>
        </tr>
    <?php ob_start();
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

    </tbody>
</table>
</div>


<?php
}
}
/* {/block 'content'} */
}
