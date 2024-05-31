<?php
session_start();
require_once('database.php');

/*if (isset($_SESSION['session_id'])) {
    header('Location: dashboard.php');
    exit;
}*/

if (isset($_POST['login'])) {
    $_SESSION['email']=$_POST['email'];
    $_SESSION['password']=$_POST['password'];
    $email=$_SESSION['email'];
    $password=$_SESSION['password'];
    
    if (empty($email) || empty($password)) {
        echo '<script type="text/javascript">
        window.onload = function () { alert("Inserisci email e password %s"); } 
         </script>';
        //$msg = 'Inserisci email e password %s';
    } else {
        $q="SELECT IdPaziente,nome,cognome,email,codice_fiscale,data_nascita,luogo_nascita,residenza,numero_telefono FROM paziente WHERE email = :email";
        $query = "
            SELECT email, password
            FROM paziente
            WHERE email = :email
        ";
        
        $check = $pdo->prepare($query);
        $check->bindParam(':email', $email, PDO::PARAM_STR);
        $check->execute();
        
        $email2 = $check->fetch(PDO::FETCH_ASSOC);

        $check = $pdo->prepare($q);
        $check->bindParam(':email', $email, PDO::PARAM_STR);
        $check->execute();

        while($row=$check->fetch(PDO::FETCH_ASSOC)){
            $_SESSION['IdPaziente']=$row['IdPaziente'];
            $_SESSION['nome']=$row['nome'];
            $_SESSION['cognome']=$row['cognome'];
            $_SESSION['email']=$row['email'];
            $_SESSION['codicefiscale']=$row['codice_fiscale'];
            $_SESSION['datanascita']=$row['data_nascita'];
            $_SESSION['luogonascita']=$row['luogo_nascita'];
            $_SESSION['residenza']=$row['residenza'];
            $_SESSION['numerotelefono']=$row['numero_telefono'];
        }
        
        if (!$email2 || password_verify($password, $email2['password']) === false) {
            echo '<script type="text/javascript">
            window.onload = function () { alert("Credenziali utente errate %s"); } 
            </script>';
            //header('Location: login.html');
            //$msg = 'Credenziali utente errate %s';
        } else {
            session_regenerate_id();
            $_SESSION['session_id'] = session_id();
            $_SESSION['session_user'] = $email2['email'];
            
            header('Location: indexpaziente.html');
            exit;
        }
    }
    
    //printf($msg, '<a href="../login.html">torna indietro</a>');
}
