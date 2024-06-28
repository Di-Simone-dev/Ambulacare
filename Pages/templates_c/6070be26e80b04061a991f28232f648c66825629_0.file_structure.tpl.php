<?php
/* Smarty version 5.3.0, created on 2024-06-16 19:13:02
  from 'file:structure.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_666f1d1e902ee5_34664695',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6070be26e80b04061a991f28232f648c66825629' => 
    array (
      0 => 'structure.tpl',
      1 => 1718557818,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_666f1d1e902ee5_34664695 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="en">

<head>
    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_486947508666f1d1e761b09_28551399', 'head');
?>

</head>

<body id="top">

    <main>

        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1735518160666f1d1e900524_19955211', 'nav');
?>



        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_7053556666f1d1e901467_66522731', 'content');
?>



    </main>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_61227322666f1d1e9021f2_85589682', 'footer');
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
class Block_486947508666f1d1e761b09_28551399 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


    <?php
}
}
/* {/block 'head'} */
/* {block 'nav'} */
class Block_1735518160666f1d1e900524_19955211 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


        <?php
}
}
/* {/block 'nav'} */
/* {block 'content'} */
class Block_7053556666f1d1e901467_66522731 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

            
        <?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_61227322666f1d1e9021f2_85589682 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

    
<?php
}
}
/* {/block 'footer'} */
}
