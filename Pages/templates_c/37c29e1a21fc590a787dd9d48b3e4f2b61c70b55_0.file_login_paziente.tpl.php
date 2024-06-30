<?php
/* Smarty version 5.3.0, created on 2024-06-30 17:24:52
  from 'file:login_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_668178c495cdb3_00743050',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37c29e1a21fc590a787dd9d48b3e4f2b61c70b55' => 
    array (
      0 => 'login_paziente.tpl',
      1 => 1719760012,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_668178c495cdb3_00743050 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1092041720668178c4956d73_83773564', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1092041720668178c4956d73_83773564 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

<div style="padding:35px;">
    <form method="post" action="/Ambulacare/Paziente/checkLogin" >
        <h1>ACCESSO PAZIENTE</h1>
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
