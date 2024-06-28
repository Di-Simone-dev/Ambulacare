<?php
/* Smarty version 5.3.0, created on 2024-06-28 16:29:45
  from 'file:login_admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667ec8d95425a7_20874663',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08aa644efc4d71c07fc74c25043ea4011c8a1180' => 
    array (
      0 => 'login_admin.tpl',
      1 => 1719584609,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667ec8d95425a7_20874663 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/Ambulacare/Pages/templates';
?><!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ambula Care</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link href="/Ambulacare/Pages/css/bootstrap.min.css" rel="stylesheet">

    <link href="/Ambulacare/Pages/css/bootstrap-icons.css" rel="stylesheet">

    <link href="/Ambulacare/Pages/css/owl.carousel.min.css" rel="stylesheet">

    <link href="/Ambulacare/Pages/css/owl.theme.default.min.css" rel="stylesheet">

    <link href="/Ambulacare/Pages/css/templatemo-medic-care.css" rel="stylesheet">

    <link href="/Ambulacare/Pages/font.css" rel="stylesheet">

    <link rel="stylesheet" href="/Ambulacare/Pages/logregstyle.css">
    <link rel="stylesheet" href="/Ambulacare/Pages/responsive.css">

</head>

<body style="background-color: #9fc2fa;" id="top">
    <form method="post" action="/Ambulacare/Amministratore/checkLogin" style="width: 600px;">
        <h1 style="font-size: 34px;">ACCESSO</h1>
        <?php if ($_smarty_tpl->getValue('error')) {?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_smarty_tpl->getValue('error');?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php }?>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Email</label>
        <input type="email" id="email" name="email" required value="<?php echo $_smarty_tpl->getValue('email');?>
">
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Password</label>
        <input type="password" id="Password" name="password" required>
        <br>
        <button type="submit" name="login" style="width: 100px;">ACCEDI</button>
    </form>

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
}
