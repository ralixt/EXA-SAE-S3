<?php

class CompteController extends AbstractController
{

    public function render(): void
    {

       // $serviceCompte = CompteService::getInstance();
        echo get_template(
            __PROJECT_ROOT__."/Views/compte.php"
        );
        $email = $_POST["adr_email"];
        $mdp = hash('sha256', $_POST["mp"]);

        $compte = connexion($email, $mdp);


        if(isset($compte)){
            $id = get($compte);
        }





    }
}
