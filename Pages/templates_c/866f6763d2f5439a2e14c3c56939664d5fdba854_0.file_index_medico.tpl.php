<?php
/* Smarty version 5.3.0, created on 2024-06-28 18:18:14
  from 'file:index_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667ee246679fe0_04352893',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '866f6763d2f5439a2e14c3c56939664d5fdba854' => 
    array (
      0 => 'index_medico.tpl',
      1 => 1719585664,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667ee246679fe0_04352893 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2092520634667ee246676906_26698647', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_medico.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_2092520634667ee246676906_26698647 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
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
