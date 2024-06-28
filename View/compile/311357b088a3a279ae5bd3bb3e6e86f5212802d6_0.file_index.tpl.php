<?php
/* Smarty version 5.1.0, created on 2024-05-29 18:11:28
  from 'file:pages/index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_665753b048a2c3_70007016',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '311357b088a3a279ae5bd3bb3e6e86f5212802d6' => 
    array (
      0 => 'pages/index.tpl',
      1 => 1716999063,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_665753b048a2c3_70007016 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\View\\template\\pages';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_669890214665753b0477d87_70183560', 'body');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block 'body'} */
class Block_669890214665753b0477d87_70183560 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\View\\template\\pages';
?>

<section class="gallery">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 ps-0">
                <img src="images/gallery/pexels-rdne-6129507.jpg" class="img-fluid galleryImage" alt="img home page"
                    title="img home page">
            </div>

        </div>
    </div>
</section>


<section class="section-padding pb-0" id="reviews">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <h2 class="text-center mb-lg-5 mb-4">I NOSTRI PAZIENTI</h2>

                <div class="owl-carousel reviews-carousel">

                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('recensioni'), 'recensione');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('recensione')->value) {
$foreach0DoElse = false;
?>
                        <figure class="reviews-thumb d-flex flex-wrap align-items-center rounded">
                            <div class="reviews-stars">
                                <i class="bi-star-fill"></i>
                                <i class="bi-star-fill"></i>
                                <i class="bi-star-fill"></i>
                                <i class="bi-star-fill"></i>
                                <i class="bi-star"></i>
                            </div>

                            <p class="text-primary d-block mt-2 mb-0 w-100"><strong><?php echo $_smarty_tpl->getValue('recensione')['titolo'];?>
</strong></p>

                            <p class="reviews-text w-100"><?php echo $_smarty_tpl->getValue('recensione')['descrizione'];?>
</p>

                            <img src="images/reviews/beautiful-woman-face-portrait-brown-background.jpeg"
                                class="img-fluid reviews-image" alt="">

                            <figcaption class="ms-4">
                                <strong><?php echo $_smarty_tpl->getValue('recensione')['paziente'];?>
</strong>

                                <span class="text-muted">Patient</span>
                            </figcaption>
                        </figure>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

                </div>
            </div>

        </div>
    </div>
</section>
<?php
}
}
/* {/block 'body'} */
}
