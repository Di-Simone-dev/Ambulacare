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
    </head>
    <!--<style>
body,h1,h2,h3,h4,h5,h6 {font-family: monospace}
.w3-bar,h1,button {font-family: monospace}
</style>-->
<body id="top">
    
    <br><br>
    <header id="header">
        <h1 style="font-size: 45px;"><b>Profilo Personale - <?php session_start(); print($_SESSION["nome"]."&nbsp"); print($_SESSION["cognome"]);?></b> </h1>
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
                                <a class="nav-link" href="index.html">Home</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="index.html">Prenota esame</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#about">Visualizza Esami Prenotati</a>
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
                                <a class="nav-link" href="#contact">Visualizza Storico Esami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profilopaziente.php">Profilo Personale</a>
                            </li>
                            <li class="nav-item" >
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                            <!--<li class="nav-item" >
                                <a class="nav-link" href="login.html">ACCEDI</a>
                            </li>-->
                        </ul>
                    </div>

                </div>
            </nav>
    <!--<div class="w3-top">
        <div class="w3-bar w3-red w3-card w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="indexutente.html" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Home</a>
            <a href="prodottiutente.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Prodotti</a>
            <a href="profilo.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Profilo</a>
            <a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Logout</a>
    </div>-->
    <br><br>
    <div>
        <h2 style="font-size: 25px;"><b>Informazioni Personali</b> </h2>
        <?php 
                require_once('database.php');
                $query="SELECT * FROM Paziente where IdPaz='".$_SESSION["IdPaz"]."'";
                $check = $pdo->prepare($query);
                $check->bindParam(':email', $email, PDO::PARAM_STR);
                $check->execute();
            
        /*if(empty($riga['immagine'])){
            echo "<img class='img' src='img/profiloanonimo.png' alt='Foto Profilo' style='width:300px;height:300px;border-radius:50%; float:right; margin-right:150px;'>";
        }
        else{
            echo "<img class='img' src='img/".$riga['immagine']."' alt='Foto Profilo' style='width:300px;height:300px;border-radius:50%; float:right; margin-right:150px;'>";
        }*/
        //<img class="img" src="img/download.jpeg" alt="Foto Profilo" style="width:300px;height:300px;border-radius:50%; float:right; margin-right:150px;">
        //mysqli_close($conn);
       
        
                    $nome=$_SESSION["nome"];
                    $cognome=$_SESSION["cognome"];
                    $email=$_SESSION["email"];
                    $codicefiscale=$_SESSION["codicefiscale"];
                    $datanascita=$_SESSION["datanascita"];
                    $luogonascita=$_SESSION["luogonascita"];
                    $residenza=$_SESSION["residenza"];
                    $numerotelefono=$_SESSION["numerotelefono"];
                    echo "<p style='font-size:20px;font-family: monospace; font-weight:bold;'> Nome:</p>";
                    echo "<p style='font-size:20px; font-family:monospace;'>$nome</p>";
                    echo "<p style='font-size:20px;font-family: monospace; font-weight:bold;'> Cognome:</p>";
                    echo "<p style='font-size:20px; font-family:monospace;'>$cognome</p>";
                    echo "<p style='font-size:20px;font-family: monospace; font-weight:bold;'> Email:</p>";
                    echo "<p style='font-size:20px; font-family:monospace;'>$email</p>";
                    echo "<p style='font-size:20px;font-family: monospace; font-weight:bold;'> Codice Fiscale:</p>";
                    echo "<p style='font-size:20px; font-family:monospace;'>$codicefiscale</p>";
                    echo "<p style='font-size:20px;font-family: monospace; font-weight:bold;'> Data di Nascita:</p>";
                    echo "<p style='font-size:20px; font-family:monospace;'>$datanascita</p>";
                    echo "<p style='font-size:20px;font-family: monospace; font-weight:bold;'> Luogo di Nascita:</p>";
                    echo "<p style='font-size:20px; font-family:monospace;'>$luogonascita</p>";
                    echo "<p style='font-size:20px;font-family: monospace; font-weight:bold;'> Residenza:</p>";
                    echo "<p style='font-size:20px; font-family:monospace;'>$residenza</p>";
                    echo "<p style='font-size:20px;font-family: monospace; font-weight:bold;'> Telefono:</p>";
                    echo "<p style='font-size:20px; font-family:monospace;'>$numerotelefono</p>";
                    echo "<a href='eliminaaccountpaziente.php'><button class='w3-button w3-red' style='padding:5px;width:195px;border:solid white 3px;' ><p>Elimina Account </p></button></a>";
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