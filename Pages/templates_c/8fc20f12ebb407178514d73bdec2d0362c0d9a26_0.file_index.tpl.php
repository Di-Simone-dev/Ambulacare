<?php
/* Smarty version 5.3.0, created on 2024-06-30 17:24:38
  from 'file:index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_668178b64f2b70_93581288',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8fc20f12ebb407178514d73bdec2d0362c0d9a26' => 
    array (
      0 => 'index.tpl',
      1 => 1719653342,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_668178b64f2b70_93581288 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1000208629668178b64f0502_58657786', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1000208629668178b64f0502_58657786 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
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
