<?php
/* Smarty version 5.3.0, created on 2024-06-30 17:24:38
  from 'file:structure.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_668178b6612d36_49051604',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6070be26e80b04061a991f28232f648c66825629' => 
    array (
      0 => 'structure.tpl',
      1 => 1719594346,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_668178b6612d36_49051604 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="en">

<head>
    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_801504036668178b6611740_83401917', 'head');
?>

</head>

<body id="top">

    <main>

        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_94806865668178b6611ee0_76532580', 'nav');
?>



        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_51173918668178b66123f8_08714666', 'content');
?>



    </main>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1861927067668178b66128c1_21139086', 'footer');
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
class Block_801504036668178b6611740_83401917 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


    <?php
}
}
/* {/block 'head'} */
/* {block 'nav'} */
class Block_94806865668178b6611ee0_76532580 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


        <?php
}
}
/* {/block 'nav'} */
/* {block 'content'} */
class Block_51173918668178b66123f8_08714666 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

            
        <?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_1861927067668178b66128c1_21139086 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

    
<?php
}
}
/* {/block 'footer'} */
}
