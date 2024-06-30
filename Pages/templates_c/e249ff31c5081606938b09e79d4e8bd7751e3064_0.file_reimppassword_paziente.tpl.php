<?php
/* Smarty version 5.3.0, created on 2024-06-30 13:48:26
  from 'file:reimppassword_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6681460acb4ef7_31065035',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e249ff31c5081606938b09e79d4e8bd7751e3064' => 
    array (
      0 => 'reimppassword_paziente.tpl',
      1 => 1719748104,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6681460acb4ef7_31065035 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_18351551876681460aca5d97_90199341', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_18351551876681460aca5d97_90199341 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>

<br><br>
    <form method="post" action="/Ambulacare/Paziente/setPasswordPaziente" style="width: 600px;padding:35px;">
    <h1>REIMPOSTAZIONE PASSWORD</h1>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Nuova Password</label>
    <input type="password" id="password" name="password" required>
<br><br>
    <button type="submit" name="register" class="btn btn-primary">Reimposta Password</button>
</form>
<?php
}
}
/* {/block 'content'} */
}
