<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Ambula Care</title>

        <!-- CSS FILES -->     

        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/owl.carousel.min.css" rel="stylesheet">

        <link href="css/owl.theme.default.min.css" rel="stylesheet">

        <link href="css/templatemo-medic-care.css" rel="stylesheet">

        <link href="casipaziente.css" rel="stylesheet">

        <link href="font.css" rel="stylesheet">

<!--

TemplateMo 566 Medic Care

https://templatemo.com/tm-566-medic-care

-->
    </head>
    
    <body id="top">
    
        <main>

            <nav class="navbar navbar-expand-lg mx-auto bg-light fixed-top shadow-lg">
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
                                <a class="nav-link" href="indexpaziente.html" >Home</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="visualizzaesami_prenotazione.html">Prenota esame</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="visualizzaesamiprenotati_profilopaziente.html">Visualizza Esami Prenotati</a>
                            </li>

                            <div class="navbar-brand d-none d-lg-block">
                                AmbulaCare
                                <strong class="d-block">HEALTH SPECIALISTS</strong>
                            </div>

                            <li class="nav-item">
                                <a class="nav-link" href="visualizzastoricoesami_profilopaziente.html">Visualizza Storico Esami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profilopaziente.php">Profilo Personale</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        </main>
        <br>
        <div class="container">
            <div class="row">
                <div class="col">
                    <form action="#">
                        <div class="form-group" >
                            <div class="col-9" id="elenco">
                                <h2>Esame: Visita Cardiologica&ensp;&ensp;&ensp;&ensp;Costo: 70€</h2>
                                <h2>Medico: Emanuele Papile&ensp;&ensp;&ensp;Data Odierna: 02/06/24</h2>
                                <h2><?php require_once('valutazione.php');?>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Disponibilità Orari del Medico</h2>
                                <div>
                                    <button><</button>
                                    <button style="position: absolute;left: 1055px;">></button>
                                </div>
                                <br>
                                <table class="table" id="orari" style="border: 1px solid;">
                                    <thead style="background-color: rgb(230, 230, 230);text-align: center;">
                                        <tr>
                                            <th scope="col">LUN 27/05</th>
                                            <th scope="col">MAR 28/05</th>
                                            <th scope="col">MER 29/05</th>
                                            <th scope="col">GIO 30/05</th>
                                            <th scope="col">VEN 31/05</th>
                                            <th scope="col">SAB 01/06</th>
                                            <th scope="col">DOM 02/06</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">14:30</td>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">14:30</td>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">14:30</td>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">14:30</td>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">14:30</td>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">08:30</td>
                                            <td style="background-color: black;"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">15:30</td>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">15:30</td>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">15:30</td>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">15:30</td>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">15:30</td>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">09:30</td>
                                            <td style="background-color: black;"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">16:30</td>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">16:30</td>
                                            <td style="border: 1px solid;background-color: red">16:30</td>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">16:30</td>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">16:30</td>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">10:30</td>
                                            <td style="background-color: black;"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">17:30</td>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">17:30</td>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">17:30</td>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">17:30</td>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">17:30</td>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">11:30</td>
                                            <td style="background-color: black;"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">18:30</td>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">18:30</td>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">18:30</td>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">18:30</td>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">18:30</td>
                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">12:30</td>
                                            <td style="background-color: black"></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                <br>
                                <div>
                                    <h4><label>Data Appuntamento:</label><input type="date" id="dataapp" placeholder="Data Appuntamento" name="datadisp" /></h4>
                                    <h4><label>Ora Appuntamento : </label><input type="time" id="oraapp" placeholder="Ora Appuntamento" name="oraapp" /></h4>
                                    </div>
                            </div>
                        </div>
                            <br><br><br>
                            <div style="position: absolute;left: 550px;">
                            <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Annulla</button>
                            &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Conferma</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
       <!--<footer class="site-footer section-padding" id="contact">
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

                        <p><a href="mailto:emanuele.papile@student.univaq.it">emanuele.papile@student.univaq.it</a><p>
                        <p><a href="mailto:andrea.iannotti@student.univaq.it">andrea.iannotti@student.univaq.it</a><p>
                        <p><a href="mailto:andrealuca.disimone@student.univaq.it">andrealuca.disimone@student.univaq.it</a><p>
                                

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
                        <p class="copyright-text">Copyright © Ambula Care 2024
                        <br><br>Realizzato da: 
                            <p>Emanuele Papile</p>
                            <p>Andrea Iannotti</p>
                            <p>Andrea Luca Di Simone</p>
                    </p>
                    </div>

                </div>
            </section>
        </footer>-->

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/scrollspy.min.js"></script>
        <script src="js/custom.js"></script>
<!--

TemplateMo 566 Medic Care

https://templatemo.com/tm-566-medic-care

-->
    </body>
</html>