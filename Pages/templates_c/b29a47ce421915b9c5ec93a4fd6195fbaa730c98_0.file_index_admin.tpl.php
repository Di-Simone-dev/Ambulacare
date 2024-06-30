<?php
/* Smarty version 5.3.0, created on 2024-06-30 18:52:45
  from 'file:index_admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66818d5d3ba954_72990119',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b29a47ce421915b9c5ec93a4fd6195fbaa730c98' => 
    array (
      0 => 'index_admin.tpl',
      1 => 1719765691,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66818d5d3ba954_72990119 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_110042532566818d5d3b7902_86261057', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_admin.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_110042532566818d5d3b7902_86261057 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


    <section class="gallery">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 ps-0">
                <img src="/Ambulacare/Pages/images/gallery/pexels-tima-miroshnichenko-5452223.jpg" class="img-fluid galleryImage" alt="img home page" title="img home page">
            </div>
        </div>
    </div>
</section>
    
<?php
}
}
/* {/block 'content'} */
}
