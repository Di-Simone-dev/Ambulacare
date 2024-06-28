<?php
/* Smarty version 5.3.0, created on 2024-06-28 16:31:09
  from 'file:structure.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667ec92d13fcd5_01597720',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b6449ee32d415e5bce05be36a9afaf63bca5e07' => 
    array (
      0 => 'structure.tpl',
      1 => 1719584609,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667ec92d13fcd5_01597720 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="en">

<head>
    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_650475880667ec92d13e2c4_82167148', 'head');
?>

</head>

<body id="top">

    <main>

        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1573091893667ec92d13ea03_79022192', 'nav');
?>



        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1357916045667ec92d13f014_31047530', 'content');
?>



    </main>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1159788976667ec92d13f5e5_11311327', 'footer');
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
class Block_650475880667ec92d13e2c4_82167148 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>


    <?php
}
}
/* {/block 'head'} */
/* {block 'nav'} */
class Block_1573091893667ec92d13ea03_79022192 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>


        <?php
}
}
/* {/block 'nav'} */
/* {block 'content'} */
class Block_1357916045667ec92d13f014_31047530 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>

            
        <?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_1159788976667ec92d13f5e5_11311327 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?>

    
<?php
}
}
/* {/block 'footer'} */
}
