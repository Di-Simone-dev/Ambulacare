<?php
/* Smarty version 5.3.0, created on 2024-06-16 19:37:34
  from 'file:index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_666f22de8bd4b3_73830306',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8fc20f12ebb407178514d73bdec2d0362c0d9a26' => 
    array (
      0 => 'index.tpl',
      1 => 1718559452,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_666f22de8bd4b3_73830306 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1561294914666f22de896374_35638430', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layout.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1561294914666f22de896374_35638430 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
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
                                <?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->getValue('recensione')['valutazione']+1 - (1) : 1-($_smarty_tpl->getValue('recensione')['valutazione'])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                <i class="bi-star-fill"></i>
                                <?php }
}
?>
                                <?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 4+1 - ($_smarty_tpl->getValue('recensione')['valutazione']) : $_smarty_tpl->getValue('recensione')['valutazione']-(4)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->getValue('recensione')['valutazione'], $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                <i class="bi-star"></i>
                                <?php }
}
?>
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

                                <span class="text-muted">Paziente</span>
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
/* {/block 'content'} */
}
