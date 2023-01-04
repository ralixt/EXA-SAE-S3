<?php

class CompteController extends AbstractController
{

    public function render(): void
    {
        if(!isset($_SESSION["ids"])){
            header("location: http://localhost/login");
        }
        $serviceCompte = CompteService::getInstance();
        $userActuel = $serviceCompte->get($_SESSION['ids']);
        $projetLike = $serviceCompte->projectLike($userActuel);
        $vosProj = $serviceCompte->getlist();


        echo get_template(
            __PROJECT_ROOT__."/View/compte.php", [
                "user" => $this->Service->get($userActuel->getId()),
                "nbProjet" => $this->Service->NbrUserProjet(),
                "like" => $projetLike,
                "vosProjets" => $vosProj
            ]
        );
    }
}
