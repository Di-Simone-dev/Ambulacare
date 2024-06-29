<?php
/* Smarty version 5.3.0, created on 2024-06-29 11:15:55
  from 'file:index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667fd0cb65eba2_71501818',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2a1d444c127e2b094d129a8204fac43b229844a4' => 
    array (
      0 => 'index.tpl',
      1 => 1719652546,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667fd0cb65eba2_71501818 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_651079078667fd0cb653f96_57970612', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_651079078667fd0cb653f96_57970612 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>

    <section class="gallery">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 ps-0">
                <img src="/Ambulacare/Pages/images/gallery/pexels-rdne-6129507.jpg" class="img-fluid galleryImage" alt="img home page"
                    title="img home page">
            </div>

        </div>
    </div>
</section>
<?php
}
}
/* {/block 'content'} */
}
