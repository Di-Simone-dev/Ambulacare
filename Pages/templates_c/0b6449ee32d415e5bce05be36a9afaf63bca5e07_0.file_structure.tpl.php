<?php
/* Smarty version 5.3.0, created on 2024-06-30 16:22:22
  from 'file:structure.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_66816a1e93c106_09846832',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b6449ee32d415e5bce05be36a9afaf63bca5e07' => 
    array (
      0 => 'structure.tpl',
      1 => 1719585664,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66816a1e93c106_09846832 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="en">

<head>
    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_189320071166816a1e93a5d2_31369215', 'head');
?>

</head>

<body id="top">

    <main>

        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_204096448866816a1e93ae24_43484272', 'nav');
?>



        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_98624864666816a1e93b475_61091927', 'content');
?>



    </main>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_111811441266816a1e93ba39_07874151', 'footer');
?>


    <!-- JAVASCRIPT FILES -->
    <?php echo '<script'; ?>
 src="js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/owl.carousel.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/scrollspy.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/custom.js"><?php echo '</script'; ?>
>
</body>

</html><?php }
/* {block 'head'} */
class Block_189320071166816a1e93a5d2_31369215 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>


    <?php
}
}
/* {/block 'head'} */
/* {block 'nav'} */
class Block_204096448866816a1e93ae24_43484272 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>


        <?php
}
}
/* {/block 'nav'} */
/* {block 'content'} */
class Block_98624864666816a1e93b475_61091927 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>

            
        <?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_111811441266816a1e93ba39_07874151 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>

    
<?php
}
}
/* {/block 'footer'} */
}
