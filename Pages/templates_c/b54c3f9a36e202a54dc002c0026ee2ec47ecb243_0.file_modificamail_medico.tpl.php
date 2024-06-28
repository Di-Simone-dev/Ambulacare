<?php
/* Smarty version 5.3.0, created on 2024-06-28 16:12:29
  from 'file:modificamail_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667ec4cde84785_63621349',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b54c3f9a36e202a54dc002c0026ee2ec47ecb243' => 
    array (
      0 => 'modificamail_medico.tpl',
      1 => 1719583947,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667ec4cde84785_63621349 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1728813690667ec4cde727e4_02356656', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1728813690667ec4cde727e4_02356656 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


    formEmailMedico
    <form method="post" action="/Ambulacare/Medico/setEmailMedico" style="width: 600px;">
        <?php if ($_smarty_tpl->getValue('error')) {?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_smarty_tpl->getValue('error');?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php }?>
        <h1 style="font-size: 34px;">Modifica mail</h1>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Nuova Email</label>
        <input type="email" id="email" name="Email" required>
        <button type="submit" name="register" style="width: 100px;">Procedi</button>
    </form>

<?php
}
}
/* {/block 'content'} */
}
