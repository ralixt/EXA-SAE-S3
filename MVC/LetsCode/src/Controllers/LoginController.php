<?php

class LoginController extends AbstractController
{


    public function render(): void
    {

        echo get_template(__PROJECT_ROOT__ . "/View/login.php", [
            "p"=>null
        ]);
       // $serviceCompte = CompteService::getInstance();

        $email = $_POST["adr_email"];
        $mdp = hash('sha256', $_POST["mp"]);

        $compte = connexion($email, $mdp);


        if(isset($compte)){
            $id = get($compte);
        }


    }
}

?>