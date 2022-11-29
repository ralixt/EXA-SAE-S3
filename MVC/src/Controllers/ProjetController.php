<?php

class ProjetController extends AbstractController
{

    public function render(): void
    {
        $serviceCommmentaire=CommentaireService::getInstance();
        $commentaire=new Commentaire();

        $contenu=null;
        $rating=null;
        $Pseudo=null;
        $projet=null;

        if(isset($_POST["commentaire"])){
            $contenu=$_POST["commentaire"];
        }
        if(isset($_POST["note"])){
            $rating=$_POST["note"];
        }
        if(isset($_SESSION["ids"])){
            $Pseudo=$_SESSION["ids"];
        }



    }
}