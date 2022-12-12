<?php

class AccueilContoller extends AbstractController
{


    public function render(): void
    {
        $tab =[];
        if(isset($_GET["recherche"])){
            $recherche = $_GET["recherche"];
            $tab["recherche"] = $recherche;
        }
        echo get_template(__PROJECT_ROOT__ . "/View/accueil.php", [
            "project" => $this->Service->getlist($tab)
        ]);
    }
}