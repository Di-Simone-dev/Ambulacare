<?php
/* Smarty version 5.3.0, created on 2024-06-30 16:32:25
  from 'file:login_admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66816c797f7e18_85364497',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08aa644efc4d71c07fc74c25043ea4011c8a1180' => 
    array (
      0 => 'login_admin.tpl',
      1 => 1719757944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66816c797f7e18_85364497 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_151617889466816c797ebdf0_23216251', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_151617889466816c797ebdf0_23216251 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>

<div style="padding:35px;">
    <form method="post" action="/Ambulacare/Amministratore/checkLogin" >
        <h1>ACCESSO ADMIN</h1>
        <?php if ($_smarty_tpl->getValue('error')) {?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_smarty_tpl->getValue('error');?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php }?>
        <h6>Email</h6>
        <input type="email" id="email" name="email" required value="<?php echo $_smarty_tpl->getValue('email');?>
">
        <h6>Password</h6>
        <input type="password" id="Password" name="password" required>
        <br><br>
        <button type="submit" name="login" class="btn btn-primary">ACCEDI</button>
    </form>
</div>
<?php
}
}
/* {/block 'content'} */
}
