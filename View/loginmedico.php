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
        $q="SELECT IdMedico,nome,cognome,email,costo,IdTipologia FROM medico WHERE email = :email";
        $query = "
            SELECT email, password
            FROM medico
            WHERE email = :email
        ";
        
        $check = $pdo->prepare($query);
        $check->bindParam(':email', $email, PDO::PARAM_STR);
        $check->execute();
        
        $medico = $check->fetch(PDO::FETCH_ASSOC);

        $check = $pdo->prepare($q);
        $check->bindParam(':email', $email, PDO::PARAM_STR);
        $check->execute();

        while($row=$check->fetch(PDO::FETCH_ASSOC)){
            $_SESSION['IdMedico']=$row['IdMedico'];
            $_SESSION['nome']=$row['nome'];
            $_SESSION['cognome']=$row['cognome'];
            $_SESSION['email']=$row['email'];
            $_SESSION['costo']=$row['costo'];
            $_SESSION['IdTipologia']=$row['IdTipologia'];

        }
        if (!$medico || password_verify($password, $medico['password']) === false) {
            echo '<script type="text/javascript">
            window.onload = function () { alert("Credenziali utente errate %s"); } 
            </script>';
            //header('Location: login.html');
            //$msg = 'Credenziali utente errate %s';
        } else {
            session_regenerate_id();
            $_SESSION['session_id'] = session_id();
            $_SESSION['session_user'] = $medico['email'];
            
            header('Location: indexmedico.html');
            exit;
        }
    }
    
    //printf($msg, '<a href="../login.html">torna indietro</a>');
}
