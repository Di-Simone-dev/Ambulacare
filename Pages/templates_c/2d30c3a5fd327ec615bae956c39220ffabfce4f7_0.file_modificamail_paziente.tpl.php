<?php
/* Smarty version 5.3.0, created on 2024-06-29 16:42:15
  from 'file:modificamail_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66801d47156f30_06032166',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d30c3a5fd327ec615bae956c39220ffabfce4f7' => 
    array (
      0 => 'modificamail_paziente.tpl',
      1 => 1719671574,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66801d47156f30_06032166 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_51909335466801d4703d0f4_94629956', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_51909335466801d4703d0f4_94629956 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

<br>

    <form method="post" action="/Ambulacare/Paziente/setEmailPaziente" style="width: 600px;padding:35px;">
        <?php if ($_smarty_tpl->getValue('error')) {?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_smarty_tpl->getValue('error');?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php }?>
        <h1 >Modifica E-mail</h1>
<br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Nuova Email</label>
        <input type="email" id="email" name="Email" required>
<br><br>
        <button type="submit" name="register" class="btn btn-primary">Conferma modifica</button>
    </form>

<?php
}
}
/* {/block 'content'} */
}
