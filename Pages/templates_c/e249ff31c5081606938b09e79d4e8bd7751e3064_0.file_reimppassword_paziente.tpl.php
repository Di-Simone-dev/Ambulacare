<?php
/* Smarty version 5.3.0, created on 2024-06-30 16:01:28
  from 'file:reimppassword_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_668165387a9681_69269034',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e249ff31c5081606938b09e79d4e8bd7751e3064' => 
    array (
      0 => 'reimppassword_paziente.tpl',
      1 => 1719755354,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_668165387a9681_69269034 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_6266967106681653879baa7_32938709', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_6266967106681653879baa7_32938709 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>

<br><br>
    <form method="post" action="/Ambulacare/Paziente/setPasswordPaziente" style="padding:35px;">
    <h1>REIMPOSTAZIONE PASSWORD</h1>
    <?php if ($_smarty_tpl->getValue('error')) {?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_smarty_tpl->getValue('error');?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php }?>
    <h6>Nuova Password</h6>
    <input type="password" id="password" name="password" required>
<br><br>
    <button type="submit" name="register" class="btn btn-primary">Reimposta Password</button>
</form>
<?php
}
}
/* {/block 'content'} */
}
