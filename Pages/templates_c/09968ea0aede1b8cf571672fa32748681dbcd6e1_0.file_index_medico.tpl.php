<?php
/* Smarty version 5.3.0, created on 2024-06-30 17:26:00
  from 'file:index_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66817908150565_54940871',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09968ea0aede1b8cf571672fa32748681dbcd6e1' => 
    array (
      0 => 'index_medico.tpl',
      1 => 1719594345,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66817908150565_54940871 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_3238056766681790814dfa1_41858076', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_3238056766681790814dfa1_41858076 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

    
    <section class="gallery">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 ps-0">
                <img src="/Ambulacare/Pages/images/gallery/pexels-pixabay-356040.jpg" class="img-fluid galleryImage" alt="img home page" title="img home page">
            </div>

        </div>
    </div>
</section>

<?php
}
}
/* {/block 'content'} */
}
