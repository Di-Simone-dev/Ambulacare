<?php
/* Smarty version 5.1.0, created on 2024-05-26 19:04:14
  from 'file:pages/indexmedico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_66536b8e8d7d71_65539679',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '278a842576a56f74de14487b1e420d671b3d38f9' => 
    array (
      0 => 'pages/indexmedico.tpl',
      1 => 1716743050,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header/medico_header.tpl' => 1,
    'file:../footer/medico_footer.tpl' => 1,
  ),
))) {
function content_66536b8e8d7d71_65539679 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\View\\template\\pages';
$_smarty_tpl->renderSubTemplate("file:../header/medico_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
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

<?php $_smarty_tpl->renderSubTemplate("file:../footer/medico_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
