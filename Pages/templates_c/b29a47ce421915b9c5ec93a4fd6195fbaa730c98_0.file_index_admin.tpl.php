<?php
/* Smarty version 5.3.0, created on 2024-06-17 19:25:53
  from 'file:index_admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667071a1812ee6_63526156',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b29a47ce421915b9c5ec93a4fd6195fbaa730c98' => 
    array (
      0 => 'index_admin.tpl',
      1 => 1718644420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667071a1812ee6_63526156 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1318390766667071a16c05e8_41391037', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_admin.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1318390766667071a16c05e8_41391037 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


    <section class="gallery">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 ps-0">
                <img src="images/gallery/pexels-tima-miroshnichenko-5452223.jpg" class="img-fluid galleryImage" alt="img home page" title="img home page">
            </div>
        </div>
    </div>
</section>
    
<?php
}
}
/* {/block 'content'} */
}
