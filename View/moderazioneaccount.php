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
<!--
        <link rel="stylesheet" href="casiadmin.css">


TemplateMo 566 Medic Care

https://templatemo.com/tm-566-medic-care

-->
    </head>
    
    <body id="top">
    
        <main>

            <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">
                <div class="container">
                    <div class="navbar-brand mx-auto d-lg-none">
                        AmbulaCare
                        <strong class="d-block">HEALTH SPECIALISTS</strong>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="indexadmin.html">Home</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="moderazioneaccount.html">Visualizza medici e pazienti</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="visualizzaappuntamenti_admin.html">Visualizza appuntamenti</a>
                            </li>

                            <!--<li class="nav-item">
                                <a class="nav-link" href="#timeline">Timeline</a>
                            </li>-->

                            <div class="navbar-brand d-none d-lg-block">
                                AmbulaCare
                                <strong class="d-block">HEALTH SPECIALISTS</strong>
                            </div>

                            <!--<li class="nav-item">
                                <a class="nav-link" href="#reviews">Testimonials</a>
                            </li>-->

                            <!--<li class="nav-item">
                                <a class="nav-link" href="#booking">Booking</a>
                            </li>-->

                            <li class="nav-item">
                                <a class="nav-link" href="visualizzaesami_admin.html">Visualizza esami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="visualizzarecensioni_admin.html">Visualizza recensioni</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profiloadmin.php">Profilo Personale</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </nav>

        </main>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col">
                    <form action="moderazioneaccount.php" id="tendina">
                        <div class="form-group">
                            <input type="text" id="nomeutente" placeholder="Nome Utente" name="nomeutente" >
                            </input>
                            <br><br>
                            <input type="text" id="cognomeutente" placeholder="Cognome Utente" name="cognomeutente" >
                            </input>
                            </div>
                            <br>
                        <div class="form-group">
                            <select name="categoria" id="categ" class="form-select">
                                <option value="select">Seleziona categoria utente</option>
                                <option value="paziente">paziente</option>
                                <option value="medico">medico</option>
                            </select>
                        </div>
                        <br><br>
                        <button type="submit" class="btn btn-primary">Avvia Ricerca</button>
                    </form>
                </div>
            </div>
        </div>
        <?
        require_once('database.php');
            if($_POST['categoria']='paziente'){
                $q="SELECT nome,cognome,attivo FROM paziente WHERE nome='".$_POST['nomeutente']."' AND cognome='".$_POST['cognomeutente']."'";
               
                $check = $pdo->prepare($q);
                //$check->bindParam(':email', $email, PDO::PARAM_STR);
                $check->execute();
        
                while($row=$check->fetch(PDO::FETCH_ASSOC)){
                echo '<div class="col-9" id="elenco">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nome Utente</th>
                                <th scope="col">Cognome Utente</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Stato</th>
                                <th scope="col">Azione</th>
                            </tr>
                        </thead>
                        <tbody>';
                            echo '<tr>
                                <td>'.$row['nome'].'</td>
                                <td>'.$row['cognome'].'</td>
                                <td>'.$_POST['categoria'].'</td>
                                <td>'.$row['attivo'].'</td>';
                                if($row['attivo']=='1'){
                                    echo '<td><button class=btn btn-primary">Blocca</button></td>';
                                }
                                else{
                                    echo '<td><button class=btn btn-primary">Sblocca</button></td>';
                                }
                                echo '</tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>';
                }
            }
            elseif($_POST['categoria']='medico'){
                $q="SELECT nome,cognome,attivo FROM medico WHERE nome='".$_POST['nomeutente']."' AND cognome='".$_POST['cognomeutente']."'";
               
                $check = $pdo->prepare($q);
                //$check->bindParam(':email', $email, PDO::PARAM_STR);
                $check->execute();
        
                while($row=$check->fetch(PDO::FETCH_ASSOC)){

                echo '<div class="col-9" id="elenco">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nome Utente</th>
                                <th scope="col">Cognome Utente</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Stato</th>
                                <th scope="col">Azione</th>
                            </tr>
                        </thead>
                        <tbody>';
                            echo '<tr>
                                <td>'.$row['nome'].'</td>
                                <td>'.$row['cognome'].'</td>
                                <td>'.$_POST['categoria'].'</td>
                                <td>'.$row['attivo'].'</td>';
                                if($row['attivo']=='1'){
                                    echo '<td><button class=btn btn-primary">Blocca</button></td>';
                                }
                                else{
                                    echo '<td><button class=btn btn-primary">Sblocca</button></td>';
                                }
                                echo '</tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>';
                }
            }
        
?>
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