<?php
require_once('database.php');

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $isEmailValid = filter_var($email, FILTER_VALIDATE_EMAIL);
    $pwdLenght = mb_strlen($password);
    
    if (empty($email) || empty($password)) {
        echo '<script type="text/javascript">
       window.onload = function () { alert("Compila tutti i campi %s"); } 
       </script>';
        //$msg = 'Compila tutti i campi %s';
    } elseif (false === $isEmailValid) {
        echo '<script type="text/javascript">
       window.onload = function () { alert("Email non valida"); } 
       </script>';
        //$msg = 'email non valida';
    } elseif ($pwdLenght < 8 || $pwdLenght > 20) {
        echo '<script type="text/javascript">
       window.onload = function () { alert("Lunghezza minima password 8 caratteri.
        Lunghezza massima 20 caratteri"); } 
       </script>';
        //$msg = 'Lunghezza minima password 8 caratteri.Lunghezza massima 20 caratteri';
    } else {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $query = "
            SELECT IdMedico
            FROM medico
            WHERE email = :email
        ";
        
        $check = $pdo->prepare($query);
        $check->bindParam(':email', $email, PDO::PARAM_STR);
        $check->execute();
        
        $medico = $check->fetchAll(PDO::FETCH_ASSOC);

        if (count($medico) > 0) {
            $msg = 'email già in uso %s';
        } else {
            $query = "
                INSERT INTO medico 
                (nome,cognome,email,password,attivo,costo,IdTipologia,IdImmagine) VALUES 
                ('".$_POST['nome']."','".$_POST['cognome']."','".$_POST['email']."','".$password_hash."','1','".$_POST['costo']."','1','1')
            ";
        
            $check = $pdo->prepare($query);
            //$check->bindParam(':IdPaz', $email, PDO::PARAM_STR);
            $check->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR);
            $check->bindParam(':cognome', $_POST['cognome'], PDO::PARAM_STR);
            $check->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
            $check->bindParam(':password', $password_hash, PDO::PARAM_STR);
            $check->bindParam(':costo', $_POST['costo'], PDO::PARAM_STR);
            //$check->bindParam(':attivo', $_POST['nome'], PDO::PARAM_STR);
            $check->execute();
            
            if ($check->rowCount() > 0) {
                //$msg = 'REGISTRAZIONE ESEGUITA CON SUCCESSO';
                //header("Location: regeseguita.php");
            } else {
                echo '<script type="text/javascript">
                window.onload = function () { alert("Problemi con l\'inserimento dei dati %s"); } 
                </script>';
                //$msg = 'Problemi con l\'inserimento dei dati %s';
            }
        }
    }
    
    //printf($msg, '<a href="../register.html">torna indietro</a>');
}
?>
<html>
                    <head>
                        <title> Registrazione</title>
                        <meta charset="UTF-8">
                        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
                        <link rel="stylesheet" href="logregstyle.css">
                    </head>
                    <!--<style>
                        body,h1,h2,h3,h4,h5,h6 {font-family: monospace}
                        .w3-bar,h1,button {font-family: monospace}
                        .fa-anchor,.fa-coffee {font-size:200px}
                        </style>-->
                <body>
                    <header id="header">
                        <h1 style="font-size: 45px;"><b>Registrazione Effettuata con Successo</b> </h1>
                    </header>
                    <div>
                                <?php
                                    //require_once(database.php);
                                    $nome=$_POST["nome"];
                                    $cognome=$_POST["cognome"];
                                    $email=$_POST["email"];
                                    $costo=$_POST["costo"];
                                    echo "<p style='text-align:center;font-size:20px;font-family: monospace; font-weight:bold;'> Nome:</p>";
                                    echo "<p style='text-align:center;font-size:20px; font-family:monospace;'>$nome</p>";
                                    echo "<p style='text-align:center;font-size:20px;font-family: monospace; font-weight:bold;'> Cognome:</p>";
                                    echo "<p style='text-align:center;font-size:20px; font-family:monospace;'>$cognome</p>";
                                    echo "<p style='text-align:center;font-size:20px;font-family: monospace; font-weight:bold;'> Email:</p>";
                                    echo "<p style='text-align:center;font-size:20px; font-family:monospace;'>$email</p>";
                                    echo "<p style='text-align:center;font-size:20px;font-family: monospace; font-weight:bold;'> Costo:</p>";
                                    echo "<p style='text-align:center;font-size:20px; font-family:monospace;'>$costo</p>";
                                    echo "<a href='loginmedico.html'><button class='w3-button w3-yellow' style='height:60px;position:relative;left:625px;width:200px;border:solid white 3px;' ><p>Accedi</p></button></a>";
                                ?>
                                </div>
                </body>
                </html>