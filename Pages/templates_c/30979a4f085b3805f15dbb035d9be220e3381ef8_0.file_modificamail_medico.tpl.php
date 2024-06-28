<?php
/* Smarty version 5.3.0, created on 2024-06-28 18:37:22
  from 'file:modificamail_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667ee6c29e21e9_17828858',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30979a4f085b3805f15dbb035d9be220e3381ef8' => 
    array (
      0 => 'modificamail_medico.tpl',
      1 => 1719592642,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667ee6c29e21e9_17828858 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_417175188667ee6c29d3c46_41938299', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_417175188667ee6c29d3c46_41938299 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>

<br>

    <form method="post" action="/Ambulacare/Medico/setEmailMedico" style="width: 600px;padding:35px;">
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
