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
            SELECT IdPaz
            FROM Paziente
            WHERE email = :email
        ";
        
        $check = $pdo->prepare($query);
        $check->bindParam(':email', $email, PDO::PARAM_STR);
        $check->execute();
        
        $email2 = $check->fetchAll(PDO::FETCH_ASSOC);

        if (count($email2) > 0) {
            $msg = 'email già in uso %s';
        } else {
            $query = "
                INSERT INTO Paziente 
                (IdPaz,nome,cognome,email,password,Codice_Fiscale,Data_nascita,Luogo_nascita,residenza,Numero_telefono,attivo) VALUES 
                ('0001','".$_POST['nome']."','".$_POST['cognome']."','".$_POST['email']."','".$password_hash."','".$_POST['codicefiscale']."','".$_POST['datanascita']."','".$_POST['luogonascita']."','".$_POST['residenza']."','".$_POST['numerotelefono']."','1')
            ";
        
            $check = $pdo->prepare($query);
            //$check->bindParam(':IdPaz', $email, PDO::PARAM_STR);
            $check->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR);
            $check->bindParam(':cognome', $_POST['cognome'], PDO::PARAM_STR);
            $check->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
            $check->bindParam(':password', $password_hash, PDO::PARAM_STR);
            $check->bindParam(':Codice_Fiscale', $_POST['codicefiscale'], PDO::PARAM_STR);
            $check->bindParam(':Data_nascita', $_POST['datanascita'], PDO::PARAM_STR);
            $check->bindParam(':Luogo_nascita', $_POST['luogonascita'], PDO::PARAM_STR);
            $check->bindParam(':residenza', $_POST['residenza'], PDO::PARAM_STR);
            $check->bindParam(':Numero_telefono', $_POST['numerotelefono'], PDO::PARAM_STR);
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
                                    $codicefiscale=$_POST["codicefiscale"];
                                    $datanascita=$_POST["datanascita"];
                                    $luogonascita=$_POST["luogonascita"];
                                    $residenza=$_POST["residenza"];
                                    $numerotelefono=$_POST["numerotelefono"];
                                    echo "<p style='text-align:center;font-size:20px;font-family: monospace; font-weight:bold;'> Nome:</p>";
                                    echo "<p style='text-align:center;font-size:20px; font-family:monospace;'>$nome</p>";
                                    echo "<p style='text-align:center;font-size:20px;font-family: monospace; font-weight:bold;'> Cognome:</p>";
                                    echo "<p style='text-align:center;font-size:20px; font-family:monospace;'>$cognome</p>";
                                    echo "<p style='text-align:center;font-size:20px;font-family: monospace; font-weight:bold;'> Email:</p>";
                                    echo "<p style='text-align:center;font-size:20px; font-family:monospace;'>$email</p>";
                                    echo "<p style='text-align:center;font-size:20px;font-family: monospace; font-weight:bold;'> Codice Fiscale:</p>";
                                    echo "<p style='text-align:center;font-size:20px; font-family:monospace;'>$codicefiscale</p>";
                                    echo "<p style='text-align:center;font-size:20px;font-family: monospace; font-weight:bold;'> Data di Nascita:</p>";
                                    echo "<p style='text-align:center;font-size:20px; font-family:monospace;'>$datanascita</p>";
                                    echo "<p style='text-align:center;font-size:20px;font-family: monospace; font-weight:bold;'> Luogo di Nascita:</p>";
                                    echo "<p style='text-align:center;font-size:20px; font-family:monospace;'>$luogonascita</p>";
                                    echo "<p style='text-align:center;font-size:20px;font-family: monospace; font-weight:bold;'> Residenza:</p>";
                                    echo "<p style='text-align:center;font-size:20px; font-family:monospace;'>$residenza</p>";
                                    echo "<p style='text-align:center;font-size:20px;font-family: monospace; font-weight:bold;'> Telefono:</p>";
                                    echo "<p style='text-align:center;font-size:20px; font-family:monospace;'>$numerotelefono</p>";
                                    echo "<a href='login.html'><button class='w3-button w3-yellow' style='height:60px;position:relative;left:625px;width:200px;border:solid white 3px;' ><p>Accedi</p></button></a>";
                                ?>
                                </div>
                </body>
                </html>