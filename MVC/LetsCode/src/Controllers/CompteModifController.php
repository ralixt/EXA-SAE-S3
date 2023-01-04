<?php

class CompteModifController extends AbstractController
{

    public function render(): void
    {
        $raison = $_GET["raison"] ?? "Pseudo";
        switch($raison) :
            case "Pseudo" :
                echo get_template(
                    __PROJECT_ROOT__ . "/View/compteModif.php", [
                        "titre" =>
                ]
                );
                break;
            case "mail" :
                echo get_template(
                    __PROJECT_ROOT__ . "/View/compteModif.php", [
                        "titre" =>
                ]
                );
                break;
            case "mdp" :
                echo get_template(
                    __PROJECT_ROOT__ . "/View/compteModif.php", [
                        "titre" =>
                ]
                );
                break;


        endswitch;

    }
}