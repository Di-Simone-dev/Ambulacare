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
        $q="SELECT IdAdmin,nome,cognome,email FROM amministratore WHERE email = :email";
        $query = "
            SELECT email, password
            FROM amministratore
            WHERE email = :email
        ";
        
        $check = $pdo->prepare($query);
        $check->bindParam(':email', $email, PDO::PARAM_STR);
        $check->execute();
        
        $admin = $check->fetch(PDO::FETCH_ASSOC);

        $check = $pdo->prepare($q);
        $check->bindParam(':email', $email, PDO::PARAM_STR);
        $check->execute();

        while($row=$check->fetch(PDO::FETCH_ASSOC)){
            $_SESSION['IdAdmin']=$row['IdAdmin'];
            $_SESSION['nome']=$row['nome'];
            $_SESSION['cognome']=$row['cognome'];
            $_SESSION['email']=$row['email'];

        }
        if (!$admin || password_verify($password, $admin['password']) === false) {
            echo '<script type="text/javascript">
            window.onload = function () { alert("Credenziali utente errate %s"); } 
            </script>';
            //header('Location: login.html');
            //$msg = 'Credenziali utente errate %s';
        } else {
            session_regenerate_id();
            $_SESSION['session_id'] = session_id();
            $_SESSION['session_user'] = $admin['email'];
            
            header('Location: indexadmin.html');
            exit;
        }
    }
    
    //printf($msg, '<a href="../login.html">torna indietro</a>');
}
