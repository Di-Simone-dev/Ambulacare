<?php
/* Smarty version 5.3.0, created on 2024-06-17 19:26:14
  from 'file:index_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667071b63b8d79_82202074',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09968ea0aede1b8cf571672fa32748681dbcd6e1' => 
    array (
      0 => 'index_medico.tpl',
      1 => 1718644724,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667071b63b8d79_82202074 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1854131708667071b63ad7b8_93016080', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1854131708667071b63ad7b8_93016080 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

    
    <section class="gallery">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 ps-0">
                <img src="images/gallery/pexels-pixabay-356040.jpg" class="img-fluid galleryImage" alt="img home page" title="img home page">
            </div>

        </div>
    </div>
</section>

<?php
}
}
/* {/block 'content'} */
}
