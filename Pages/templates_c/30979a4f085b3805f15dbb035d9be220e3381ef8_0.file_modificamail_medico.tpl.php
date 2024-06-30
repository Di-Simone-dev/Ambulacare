<?php
/* Smarty version 5.3.0, created on 2024-06-30 15:29:16
  from 'file:modificamail_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66815dac932806_81944623',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30979a4f085b3805f15dbb035d9be220e3381ef8' => 
    array (
      0 => 'modificamail_medico.tpl',
      1 => 1719754154,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66815dac932806_81944623 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_165345672866815dac9274a4_50289994', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_165345672866815dac9274a4_50289994 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>

<br><br>

    <form method="post" action="/Ambulacare/Medico/setEmailMedico" style="width: 600px;padding:35px;">
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
