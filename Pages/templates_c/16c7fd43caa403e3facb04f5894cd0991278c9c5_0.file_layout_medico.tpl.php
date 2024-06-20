<?php
/* Smarty version 5.3.0, created on 2024-06-20 11:50:39
  from 'file:layout_medico.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_6673fb6fbb2145_95003294',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16c7fd43caa403e3facb04f5894cd0991278c9c5' => 
    array (
      0 => 'layout_medico.tpl',
      1 => 1718876585,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6673fb6fbb2145_95003294 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_16589745436673fb6fbaa193_82377041', 'head');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_3345317166673fb6fbb05a4_36174194', 'nav');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_13118971086673fb6fbb1528_54120061', 'footer');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "structure.tpl", $_smarty_current_dir);
}
/* {block 'head'} */
class Block_16589745436673fb6fbaa193_82377041 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ambula Care</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link href="/Ambulacare/Pages/css/bootstrap.min.css" rel="stylesheet">

    <link href="/Ambulacare/Pages/css/bootstrap-icons.css" rel="stylesheet">

    <link href="/Ambulacare/Pages/css/owl.carousel.min.css" rel="stylesheet">

    <link href="/Ambulacare/Pages/css/owl.theme.default.min.css" rel="stylesheet">

    <link href="/Ambulacare/Pages/css/templatemo-medic-care.css" rel="stylesheet">
    <?php echo '<script'; ?>
 src="https://cdn.anychart.com/releases/8.10.0/js/anychart-base.min.js"><?php echo '</script'; ?>
>
    <link href="/Ambulacare/Pages/font.css" rel="stylesheet">
    <link href="/Ambulacare/Pages/responsive.css" rel="stylesheet">
<?php
}
}
/* {/block 'head'} */
/* {block 'nav'} */
class Block_3345317166673fb6fbb05a4_36174194 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>


    <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">
        <div class="container">
            <div class="navbar-brand mx-auto d-lg-none">
                AmbulaCare
                <strong class="d-block">HEALTH SPECIALISTS</strong>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Ambulacare/Medico/storico">Storico
                            esami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Visualizza agenda</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="">Carica slot per appuntamento</a>
                    </li>

                    <div class="navbar-brand d-none d-lg-block">
                        AmbulaCare
                        <strong class="d-block">HEALTH SPECIALISTS</strong>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="">Statistiche</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Ricerca
                            pazienti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Recensioni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Profilo Personale</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

<?php
}
}
/* {/block 'nav'} */
/* {block 'footer'} */
class Block_13118971086673fb6fbb1528_54120061 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Ambulacare\\Pages\\templates';
?>

    <footer class="site-footer section-padding" id="contact">
        <div class="container">
            <div class="row">

                <div class="col-lg-5 me-auto col-12">
                    <h5 class="mb-lg-4 mb-3">ORARI DI APERTURA</h5>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex">
                            DOMENICA : CHIUSO
                        </li>

                        <li class="list-group-item d-flex">
                            LUNEDI' - MARTEDI' - VENERDI'
                        <span>8:00 - 15:30</span>
                    </li>

                    <li class="list-group-item d-flex">
                        SABATO
                        <span>10:30 - 17:30</span>
                    </li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-6 col-12 my-4 my-lg-0">
                <h5 class="mb-lg-4 mb-3">LA NOSTRA CLINICA</h5>

                <p><a href="mailto:emanuele.papile@student.univaq.it">emanuele.papile@student.univaq.it</a>
                </p>
                <p><a href="mailto:andrea.iannotti@student.univaq.it">andrea.iannotti@student.univaq.it</a>
                </p>
                <p><a href="mailto:andrealuca.disimone@student.univaq.it">andrealuca.disimone@student.univaq.it</a>
                </p>


                <p>EDIFICIO RENATO RICAMO, VIA VETOIO, COPPITO - 67100 L'AQUILA</p>
                </div>

                <div class="col-lg-3 col-md-6 col-12 ms-auto">
                    <h5 class="mb-lg-4 mb-3">SOCIAL MEDIA</h5>

                    <ul class="social-icon">
                        <li><a href="https://www.facebook.com/" class="social-icon-link bi-facebook"></a></li>

                        <li><a href="https://www.instagram.com/" class="social-icon-link bi-instagram"></a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-12 ms-auto mt-4 mt-lg-0">
                    <div class="copyright-text">Copyright © Ambula Care 2024
                        <br><br>Realizzato da:
                        <p>Emanuele Papile</p>
                        <p>Andrea Iannotti</p>
                        <p>Andrea Luca Di Simone</p>
                    </div>
                </div>

            </div>
    </footer>
<?php
}
}
/* {/block 'footer'} */
}
