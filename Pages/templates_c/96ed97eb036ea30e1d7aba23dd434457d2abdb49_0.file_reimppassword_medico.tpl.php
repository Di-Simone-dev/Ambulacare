<?php
/* Smarty version 5.3.0, created on 2024-06-28 16:20:30
  from 'file:reimppassword_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667ec6aed5b8b7_80985568',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '96ed97eb036ea30e1d7aba23dd434457d2abdb49' => 
    array (
      0 => 'reimppassword_medico.tpl',
      1 => 1719584419,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667ec6aed5b8b7_80985568 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_281196017667ec6aed53fd1_03702155', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_281196017667ec6aed53fd1_03702155 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


    <br><br>
    <form method="post" action="/Ambulacare/Medico/setPasswordMedico" style="width: 600px;">
        <h1 style="font-size: 34px;">REIMPOSTAZIONE PASSWORD</h1>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Nuova Password</label>
        <input type="password" id="password" name="password" required>
        <button type="submit" name="register" style="width: 100px;">REIMPOSTA</button>
    </form>

<?php
}
}
/* {/block 'content'} */
}
