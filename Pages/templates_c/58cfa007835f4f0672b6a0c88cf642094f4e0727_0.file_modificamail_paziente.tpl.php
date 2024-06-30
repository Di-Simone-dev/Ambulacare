<?php
/* Smarty version 5.3.0, created on 2024-06-30 16:01:49
  from 'file:modificamail_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6681654dd5c3b3_47596991',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '58cfa007835f4f0672b6a0c88cf642094f4e0727' => 
    array (
      0 => 'modificamail_paziente.tpl',
      1 => 1719756106,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6681654dd5c3b3_47596991 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_13287504106681654dd4c816_23834367', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_13287504106681654dd4c816_23834367 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>

<br><br>

    <form method="post" action="/Ambulacare/Paziente/setEmailPaziente" style="padding:35px;">
        <?php if ($_smarty_tpl->getValue('error')) {?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_smarty_tpl->getValue('error');?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php }?>
        <h1 >Modifica E-mail</h1>
<br>
        <h6>Nuova Email</h6>
        <input type="email" id="email" name="Email" required>
<br><br>
        <button type="submit" name="register" class="btn btn-primary">Conferma modifica</button>
    </form>

<?php
}
}
/* {/block 'content'} */
}
