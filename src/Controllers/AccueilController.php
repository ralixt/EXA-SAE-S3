<?php

class AccueilController extends AbstractController
{


    public function render(): void
    {
        $tab =[];
        if(isset($_GET["recherche"]) and !empty($_GET["recherche"])){
            $recherche = $_GET["recherche"];
            $tab["recherche"] = trim($recherche);
        }
        if(isset($_GET["tag[]"])){
            $tab["tag"] = [];
            foreach($_GET["tag[]"] as $tag){
                $tab["tag"][] = $tag;
            }
        }
        if(isset($_GET["orderby"])){
            $tab['orderBy'] = $_GET['orderby'];
        }
        echo get_template(__PROJECT_ROOT__ . "/View/accueil.php", [
            "project" => $this->Service->getlist($tab)
        ]);
    }
}