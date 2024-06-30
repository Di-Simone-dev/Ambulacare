<?php
/* Smarty version 5.3.0, created on 2024-06-30 16:33:47
  from 'file:login_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66816ccb392900_42796882',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '484fb453c4979d8b1a90172c0ee3b11a98a9e7f3' => 
    array (
      0 => 'login_medico.tpl',
      1 => 1719758023,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66816ccb392900_42796882 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_121542711066816ccb3803d8_32276139', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_121542711066816ccb3803d8_32276139 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>

<div style="padding:35px;">
    <form method="post" action="/Ambulacare/Medico/checkLogin" >
        <h1>ACCESSO MEDICO</h1>
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
