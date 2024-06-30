<?php
/* Smarty version 5.3.0, created on 2024-06-30 13:54:37
  from 'file:index_paziente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6681477d1fc1b9_93172312',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a07ec2dd79e6e95d5884850a79b49d3e34983555' => 
    array (
      0 => 'index_paziente.tpl',
      1 => 1719744695,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6681477d1fc1b9_93172312 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2019243286681477d1f96f7_38601638', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout_paziente.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_2019243286681477d1f96f7_38601638 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
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
