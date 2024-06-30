<?php
/* Smarty version 5.3.0, created on 2024-06-30 09:50:18
  from 'file:reimppassword_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66810e3a2a0427_62570090',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '711d01f0b18553c81034044bf9988ecd1a019c8e' => 
    array (
      0 => 'reimppassword_medico.tpl',
      1 => 1719733683,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66810e3a2a0427_62570090 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_204282963266810e3a294730_66516353', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_204282963266810e3a294730_66516353 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>


    <br>
    <form method="post" action="/Ambulacare/Medico/setPasswordMedico" style="width: 600px;padding:35px;">
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
