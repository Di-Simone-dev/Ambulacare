{extends file="structure.tpl"}
{block name=head}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ambula Care</title>

    <!-- CSS FILES -->
    <link rel="stylesheet" href="bootstrap-italia/css/bootstrap-italia.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link href="/Ambulacare/Pages/css/bootstrap.min.css" rel="stylesheet">

    <link href="/Ambulacare/Pages/css/bootstrap-icons.css" rel="stylesheet">

    <link href="/Ambulacare/Pages/css/owl.carousel.min.css" rel="stylesheet">

    <link href="/Ambulacare/Pages/css/owl.theme.default.min.css" rel="stylesheet">

    <link href="/Ambulacare/Pages/css/templatemo-medic-care.css" rel="stylesheet">
    <link rel="stylesheet" href="/Ambulacare/Pages/logregstyle.css">
    <link href="/Ambulacare/Pages/font.css" rel="stylesheet">
    <link href="/Ambulacare/Pages/responsive.css" rel="stylesheet">
{/block}

{block name=nav}

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
                    <li class="nav-item active">
                        <a class="nav-link" href="/Ambulacare/Utente/home">Home</a>
                    </li>


                    <div class="navbar-brand d-none d-lg-block">
                        AmbulaCare
                        <strong class="d-block">HEALTH SPECIALISTS</strong>
                    </div>


                    <li class="nav-item">
                        <a class="nav-link" href="/Ambulacare/Paziente/formregistrazione">Registrati</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Ambulacare/Paziente/login">Accedi</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

{/block}

{block name=footer}
    <footer class="site-footer section-padding" id="contact">
        <div class="container">
            <div class="row">

                <div class="col-lg-5 me-auto col-12">
                    <h5 class="mb-lg-4 mb-3">ORARI DI APERTURA</h5>

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item d-flex">
                            LUNEDI' - SABATO
                        <span>14:30 - 19:30</span>
			<li class="list-group-item d-flex">
                            DOMENICA : CHIUSO
                        </li>
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
                        <li><a href="https://www.facebook.com/profile.php?id=61561622310874" class="social-icon-link bi-facebook"></a></li>

                        <li><a href="https://www.instagram.com/ambulacare/" class="social-icon-link bi-instagram"></a></li>
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
	<!-- JAVASCRIPT FILES -->
        <script src="/Ambulacare/Pages/js/bootstrap.bundle.min.js"></script>
        <script src="/Ambulacare/Pages/js/custom.js"></script>
        <script src="/Ambulacare/Pages/js/jquery.min.js"></script>
        <script src="/Ambulacare/Pages/js/owl.carousel.min.js"></script>
        <script src="/Ambulacare/Pages/js/scrollspy.min.js"></script>
{/block}