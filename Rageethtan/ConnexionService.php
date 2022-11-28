<?php

class DeconnexionService
{

    public function connexion()
    {

        include_once("config.php");
        session_start();

        $email=$_POST["adr_email"];
        $createmdp=hash('sha256', $_POST["mp"]);


        $ajoutinfo=$pdo->prepare('SELECT * FROM user where email=:email and password=:mp');

        $ajoutinfo->execute([
            'email'=>$email,
            'mp'=>$createmdp,
        ]);


        if($ajoutinfo->rowCount() > 0){
            $result=$ajoutinfo->fetchall();
            $_SESSION["ids"]=strval($result[0][0]);
            $_SESSION["Pseudo"]=$result[0][1];
            $_SESSION["email"]=$result[0][2];
            $_SESSION["roles"]=strval($result[0][4]);
            // var_dump($_SESSION["roles"]);

            header('location:accueil.php');

        }
        else{
            header('location:login.php');
        }

    }


    public function deconexion()
    {
        //account logout
        session_start();
        session_unset();
        session_destroy();

        header("location:accueil.php");
    }
}

?>