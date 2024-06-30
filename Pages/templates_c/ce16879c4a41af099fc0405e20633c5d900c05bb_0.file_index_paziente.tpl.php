<?php
/* Smarty version 5.3.0, created on 2024-06-30 16:37:29
  from 'file:index_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66816da90721d9_19175125',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce16879c4a41af099fc0405e20633c5d900c05bb' => 
    array (
      0 => 'index_paziente.tpl',
      1 => 1719744767,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66816da90721d9_19175125 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_143473226366816da9067590_74180867', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_143473226366816da9067590_74180867 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>

    
    <section class="gallery">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 ps-0">
                <img src="/Ambulacare/Pages/images/gallery/pexels-rdne-6129507.jpg" class="img-fluid galleryImage" alt="img home page" title="img home page">
            </div>
        </div>
    </div>
</section>
    
<?php
}
}
/* {/block 'content'} */
}
