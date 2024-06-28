<?php
/* Smarty version 5.3.0, created on 2024-06-28 16:55:00
  from 'file:immagine_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667ecec485f1a2_19356824',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd068d369d46ad66d662fc137e2a0da69dc1a8319' => 
    array (
      0 => 'immagine_medico.tpl',
      1 => 1719586498,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667ecec485f1a2_19356824 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1036646753667ecec48592c1_53297805', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1036646753667ecec48592c1_53297805 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


    <br><br>
    <form method="post" action="/Ambulacare/Medico/setProPicMedico" style="width: 600px;" enctype="multipart/form-data">
        <h1 style="font-size: 34px;">Carica Immagine</h1>
        <input id="imageFile" name="imageFile"  type="file">
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;"></label>
        <button type="submit" name="register" style="width: 100px;">Conferma</button>
    </form>

<?php
}
}
/* {/block 'content'} */
}
