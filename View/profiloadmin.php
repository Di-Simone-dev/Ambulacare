<html lang="en">
    <head>
        <title> Profilo </title>
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
        <link href="casiadmin.css" rel="stylesheet">
        <link href="font.css" rel="stylesheet">
    </head>
    <!--<style>
body,h1,h2,h3,h4,h5,h6 {font-family: monospace}
.w3-bar,h1,button {font-family: monospace}
</style>-->
<body id="top">
    
    <br><br>
    <header id="header">
        <h1 style="font-size: 45px;"><b>Profilo Personale - Amministratore - <?php session_start(); print($_SESSION["nome"]."&nbsp"); print($_SESSION["cognome"]);?></b> </h1>
	</header>
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
                                <a class="nav-link" href="visualizzaappuntamenti_profiloadmin.html">Visualizza appuntamenti</a>
                            </li>
                            <div class="navbar-brand d-none d-lg-block">
                                AmbulaCare
                                <strong class="d-block">HEALTH SPECIALISTS</strong>
                            </div>
                            <li class="nav-item">
                                <a class="nav-link" href="visualizzastoricoesami_profiloadmin.html">Visualizza esami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="visualizzarecensioni_profiloadmin.html">Visualizza recensioni</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profiloadmin.php">Profilo Personale</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </nav>
    <br><br>
    <div>
        <h2 style="font-size: 25px;"><b>Informazioni Personali</b> </h2>
        <?php 
                require_once('database.php');
                $query="SELECT * FROM amministratore where IdAdmin='".$_SESSION["IdAdmin"]."'";
                $check = $pdo->prepare($query);
                $check->bindParam(':email', $email, PDO::PARAM_STR);
                $check->execute();
        
                    $nome=$_SESSION["nome"];
                    $cognome=$_SESSION["cognome"];
                    $email=$_SESSION["email"];
                    echo "<p style='font-size:20px;font-family: monospace; font-weight:bold;'> Nome:</p>";
                    echo "<p style='font-size:20px; font-family:monospace;'>$nome</p>";
                    echo "<p style='font-size:20px;font-family: monospace; font-weight:bold;'> Cognome:</p>";
                    echo "<p style='font-size:20px; font-family:monospace;'>$cognome</p>";
                    echo "<p style='font-size:20px;font-family: monospace; font-weight:bold;'> Email:</p>";
                    echo "<p style='font-size:20px; font-family:monospace;'>$email</p>";
                    echo "<a href='logout.php'><button class='w3-button w3-red' style='padding:5px;width:195px;border:solid white 3px;' ><p>Logout </p></button></a>";
                ?>
                <!--<script type="text/javascript">
                    function Conferma() {
                        domanda="Vuoi veramente eliminare il tuo account?";
                        confirm(domanda);
                        /*if(confirm(domanda)== "ok"){
                            location.href= '/eliminaaccount.php';
                        }
                        elseif(confirm(domanda)== "annulla"){
                            location.href= '/profilo.php';
                        }*/
                    }
                </script>-->
                
                 </div>
</body>
</html>